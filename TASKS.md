# Form UI Redesign Tasks

## Objective
Replace verbose helper-text with icons + tooltips, add prefix icons for visual identity, custom validation messages, compact section headers, and a clean professional layout across all Filament resources.

## Design Rules Applied to Every Form
- `Section::make()->icon()->iconColor()` — no verbose descriptions on sections
- `->hintIcon('heroicon-m-information-circle', 'tooltip')` replaces every `->helperText()`
- `->prefixIcon()` on every text/select input for visual identity
- `->validationMessages([])` for friendly, readable error messages
- `->placeholder()` kept short — no sentences in placeholders
- `->compact()` not used; sections use `->columns(2)` with clean padding
- `->hint()` only for live character counters (meta_description)

---

## Tasks

### 1. PageForm ✅
- [x] Section icons + iconColor on all three sections
- [x] Slider select — prefixIcon, hintIcon tooltip, clear placeholder
- [x] name — prefixIcon, hintIcon, custom validationMessages
- [x] slug — prefixIcon(/), hintIcon, validationMessages (required, unique)
- [x] status — prefixIcon, no helperText
- [x] order — prefixIcon, hintIcon tooltip only
- [x] SEO title — prefixIcon, hintIcon
- [x] meta_description — live char counter via hint(), hintIcon
- [x] meta_keywords — prefixIcon, hintIcon
- [x] og_image — panelLayout compact, acceptedFileTypes, maxSize, hintIcon

### 2. SectionForm ⬜
- [ ] Section icons on Identity + Appearance sections
- [ ] name — prefixIcon, hintIcon, validationMessages
- [ ] identifier — prefixIcon(#), hintIcon tooltip
- [ ] description — hintIcon (replaces helperText)
- [ ] status — prefixIcon
- [ ] background_color — prefixIcon, hintIcon
- [ ] css_class — prefixIcon, hintIcon

### 3. PostForm ⬜
- [ ] Section icons on Assignment panel
- [ ] section_id — prefixIcon, hintIcon
- [ ] Tab icons already present — verify
- [ ] title — prefixIcon, hintIcon, validationMessages
- [ ] slug — prefixIcon, hintIcon
- [ ] status — prefixIcon
- [ ] excerpt — hintIcon (replaces helperText)
- [ ] body — hintIcon on RichEditor
- [ ] published_at — prefixIcon, hintIcon
- [ ] image — panelLayout compact, acceptedFileTypes, maxSize, hintIcon
- [ ] icon field — prefixIcon, hintIcon
- [ ] CTA fields — prefixIcons
- [ ] Meta fields — prefixIcons

### 4. SliderForm ⬜
- [ ] Section icons
- [ ] name — prefixIcon, hintIcon, validationMessages
- [ ] identifier — prefixIcon, hintIcon
- [ ] effect — prefixIcon, hintIcon
- [ ] status — prefixIcon
- [ ] autoplay toggle — onColor/offColor, onIcon/offIcon
- [ ] autoplay_speed — prefixIcon, hintIcon

### 5. SliderItemsRelationManager form ⬜
- [ ] Section icons
- [ ] image — panelLayout, acceptedFileTypes, maxSize, hintIcon
- [ ] heading — prefixIcon, hintIcon
- [ ] subheading — prefixIcon, hintIcon
- [ ] CTA fields — prefixIcons, hintIcons
- [ ] order + status — prefixIcons

### 6. SectionsRelationManager form (inside PageResource) ⬜
- [ ] Same improvements as SectionForm
- [ ] order pivot field — prefixIcon, hintIcon

### 7. PostsRelationManager form (inside SectionResource) ⬜
- [ ] Same improvements as PostForm

---

## Status Legend
- ✅ Complete
- ⬜ Pending
- 🔄 In Progress
