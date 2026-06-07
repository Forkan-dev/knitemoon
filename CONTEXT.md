# CMS Context — TextileExport Pro

> **Build status:** ✅ Complete — migrations, models, Filament resources, seeders, frontend controller, and CMS partial all built and verified.

## Stack
- **Backend:** Laravel 13, Filament v5 Admin Panel
- **Frontend:** Laravel Blade (resources/views/frontend/)
- **Database:** MySQL 8.0 (Docker) — local dev uses root/empty credentials via `.env`
- **Infrastructure:** Docker (PHP-FPM + Nginx + MySQL + phpMyAdmin)

---

## Project Structure

```
app/
  Http/Controllers/Frontend/   ← public-facing page controllers
  Filament/                    ← all Filament resources (auto-generated here)
  Models/                      ← Page, Section, Post

resources/views/frontend/
  layouts/app.blade.php        ← master layout (nav + footer + CSS)
  pages/                       ← one blade per page type

_frontend_source/              ← original HTML reference (do not touch)
```

---

## CMS Hierarchy

```
PAGE
 └── belongsToMany SECTION  (via page_section pivot)
       └── hasMany POST
```

---

## Hierarchy Rules

| Rule | Behaviour |
|---|---|
| Page → Section | Many-to-many via `page_section` pivot |
| Section → Post | One-to-many (direct) |
| Post → Page | Indirect only — Post → Section → pivot → Page |
| Section without a Page | Allowed (standalone, reusable) |
| Post without a Section | NOT allowed |
| Detach Section from Page | Deletes pivot row only — Section and Posts survive |
| Delete Page | Removes pivot rows only — Sections and Posts untouched |
| Delete Section | Removes pivot rows AND permanently deletes all its Posts |
| Same Section on multiple Pages | Allowed — appears at independent order per page |

---

## Database Schema

### `pages`
| Column | Type | Notes |
|---|---|---|
| id | bigint PK | |
| name | string | required — e.g. Home, About |
| slug | string unique | required — e.g. home, about-us |
| title | string nullable | SEO `<title>` tag |
| meta_description | text nullable | SEO meta, max 160 chars |
| meta_keywords | string nullable | SEO keywords |
| og_image | string nullable | Open Graph image path |
| status | enum(active,inactive) | default: active |
| order | integer | default: 0, manual sort |
| created_at, updated_at | timestamps | |

### `sections`
| Column | Type | Notes |
|---|---|---|
| id | bigint PK | |
| name | string | required — e.g. Hero, Team |
| identifier | string unique nullable | Blade key — e.g. hero, features |
| description | text nullable | subtitle shown under section heading |
| background_color | string nullable | hex or Tailwind class |
| css_class | string nullable | extra CSS classes |
| status | enum(active,inactive) | default: active |
| created_at, updated_at | timestamps | |

> **No `page_id` column on sections** — the connection is entirely through the pivot table.
> **No `order` column on sections** — order lives on the pivot per page.

### `page_section` (pivot)
| Column | Type | Notes |
|---|---|---|
| id | bigint PK | |
| page_id | FK → pages.id | cascade delete |
| section_id | FK → sections.id | cascade delete |
| order | integer | default: 0, per-page sort order |
| created_at, updated_at | timestamps | |
| unique | (page_id, section_id) | same section can't attach twice |

### `posts`
| Column | Type | Notes |
|---|---|---|
| id | bigint PK | |
| section_id | FK → sections.id | cascade delete, required |
| title | string | required |
| slug | string nullable | URL identifier |
| excerpt | text nullable | short summary for cards/previews |
| body | longtext nullable | rich text HTML content |
| image | string nullable | featured image path |
| icon | string nullable | icon class e.g. `ti ti-star` |
| button_text | string nullable | CTA label |
| button_url | string nullable | CTA link |
| button_target | string | default: `_self` |
| badge | string nullable | label e.g. New, Popular |
| tag | string nullable | grouping tag |
| order | integer | default: 0, sort within section |
| status | enum(published,draft) | default: published |
| published_at | timestamp nullable | scheduled publish date |
| created_at, updated_at | timestamps | |

---

## Model Relationships

### Page
```php
belongsToMany(Section::class)->withPivot('order')->withTimestamps()
// Active sections scoped: where sections.status = active, ordered by pivot.order
// Posts reached by: $page->sections->flatMap->posts (NOT hasManyThrough)
```

### Section
```php
belongsToMany(Page::class)->withPivot('order')->withTimestamps()
hasMany(Post::class)                        // all posts
hasMany(Post::class) scoped to published    // status=published, published_at past, ordered by order
hasMany(Post::class) scoped to draft        // status=draft
```

### Post
```php
belongsTo(Section::class)
// Reach pages via: $post->section->pages
```

---

## Foreign Key Cascade Summary

```
pages.id         ──< page_section.page_id    (cascade delete)
sections.id      ──< page_section.section_id (cascade delete)
sections.id      ──< posts.section_id        (cascade delete)

NO direct FK from posts → pages
NO page_id on sections table
```

---

## Filament Admin Resources

### PageResource — `app/Filament/Resources/Pages/`
- **Form:** Two sections — *Page Details* (name→auto-slug, slug, status, order) and *SEO & Open Graph* (collapsible — title, meta_description, meta_keywords, og_image)
- **Slug:** Auto-generated from `name` on blur via `afterStateUpdated`; editable
- **Table:** order#, name, slug (prefixed /), status badge, sections count badge, last updated
- **Filters:** status
- **Relation Manager:** `SectionsRelationManager`
  - Table shows pivot `order`, section name, identifier, status, post count
  - **Attach** action — select existing section + set pivot `order` in same modal
  - **Create & attach** action — full section form + auto-attached
  - **Edit** action — edit section fields AND pivot `order` (saved separately to pivot)
  - **Detach / Delete** per row

### SectionResource — `app/Filament/Resources/Sections/`
- **Form:** Two sections — *Identity* (name→auto-identifier on blur, identifier, description, status) and *Appearance* (collapsible — background_color, css_class)
- **Identifier:** Auto-generated from `name` only when field is blank (does not overwrite on edit)
- **Table:** name, identifier (prefixed #), status badge, posts count, pages count, last updated
- **Filters:** status
- **Relation Managers:**
  - `PagesRelationManager` — read-only list of pages this section is attached to, with pivot order; detach allowed
  - `PostsRelationManager` — full CRUD for posts, same tabbed form as PostResource

### PostResource — `app/Filament/Resources/Posts/`
- **Assignment panel:** `section_id` select at top (searchable, preloaded)
- **Form tabs (with icons):**
  - *Content* — title (auto-slug), slug, status, excerpt, body (RichEditor), published_at
  - *Media* — image FileUpload (disk: public) + icon text field
  - *Call to Action* — button_text, button_target, button_url
  - *Meta* — badge, tag, order (3-col grid)
- **Table:** image thumbnail (circular), title + excerpt description, section badge, status badge, tag, order#, published_at
- **Filters:** status, section (searchable)

---

## Filament Behaviours

- No soft deletes — records are permanently deleted
- **Slugs** auto-generated from `name` (Page/Section) or `title` (Post) via `spatie/laravel-sluggable` AND via `afterStateUpdated` in the form for instant feedback
- **Section identifier** only auto-fills when blank — safe to edit manually
- **BadgeColumn deprecated** — all tables use `TextColumn::make()->badge()->color()`
- **Pivot `order`** is a separate field in the AttachAction modal and EditAction form; Filament extracts it via `Arr::only($data, $relationship->getPivotColumns())`
- **Image uploads** go to `public` disk (`storage/app/public`)
- `body` uses `RichEditor` with a curated toolbar (bold, italic, link, lists, headings, blockquote, undo/redo)
- `published_at` schedules posts — frontend hides them until the date passes
- `->native(false)` on all `Select` fields for a consistent styled dropdown

---

## Blade Frontend Behaviour

1. URL contains a page slug → load page where `status = active`
2. Eager-load active sections ordered by `pivot.order`
3. Within each section eager-load published posts where `published_at` is null or in the past, ordered by `posts.order`
4. Page not found → 404
5. Pass full `$page` object (with nested sections and posts) to Blade view

**Section rendering:**
- `id` attribute = `section.identifier`
- `class` attribute includes `section.css_class`
- `style` attribute includes `background-color: section.background_color`

**Post rendering:**
- Show `image` if set, else show `icon`
- Show `badge` label if set
- Show `excerpt` if set, else show `body`
- Show CTA button only when both `button_text` and `button_url` are set

**Page `<head>`:**
- `<title>` = `page.title`
- `<meta name="description">` = `page.meta_description`
- `<meta property="og:image">` = `page.og_image`

---

## Frontend Controller Loading Strategy

```php
Page::where('slug', $slug)
    ->where('status', 'active')
    ->with([
        'sections' => fn($q) => $q
            ->where('sections.status', 'active')
            ->orderByPivot('order'),
        'sections.posts' => fn($q) => $q
            ->where('status', 'published')
            ->where(fn($q) => $q->whereNull('published_at')->orWhere('published_at', '<=', now()))
            ->orderBy('order'),
    ])
    ->firstOrFail();
```

---

## Seeders

| Seeder | Creates |
|---|---|
| PageSeeder | Home, Blog, About, Contact |
| SectionSeeder | Hero, Features, Team, Mission, Latest Articles, Contact Form, FAQ, Testimonials |
| PivotSeeder | Attaches sections to pages (see mapping below) |
| PostSeeder | 3–5 sample posts per section |

### Pivot Attachments

| Page | Sections (in order) |
|---|---|
| Home | Hero (1), Features (2), Testimonials (3) |
| Blog | Latest Articles (1), Features (2) |
| About | Hero (1), Mission (2), Team (3) |
| Contact | Contact Form (1), FAQ (2) |

> Hero is reused on **Home** and **About**.
> Features is reused on **Home** and **Blog**.

---

## Required Packages

| Package | Purpose |
|---|---|
| `filament/filament` | Admin panel |
| `spatie/laravel-sluggable` | Auto slug generation |
| `spatie/laravel-medialibrary` | Advanced image handling (optional) |
| `spatie/laravel-activitylog` | Admin change tracking (optional) |

---

## Docker Services

| Container | Port | Purpose |
|---|---|---|
| `garment_nginx` | `:80` | Nginx web server |
| `garment_app` | internal | PHP 8.4-FPM |
| `garment_mysql` | `:3306` | MySQL 8.0 |
| `garment_phpmyadmin` | `:8080` | phpMyAdmin GUI |

```bash
# Start everything
docker-compose up --build -d

# Create Filament admin user
docker-compose exec app php artisan make:filament-user
```
