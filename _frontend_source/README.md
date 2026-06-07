# TextileExport Pro - Premium Textile & Garments Export Company Website

A professional, production-ready HTML website for a premium textile and garments export company. Built with pure HTML5, Tailwind CSS, and vanilla JavaScript.

## 🎯 Project Overview

This is a complete website solution for a textile manufacturing and export company with:
- **8 fully responsive pages**
- **Modern corporate design** with navy blue and deep green color scheme
- **Pure HTML/CSS/JavaScript** - No frameworks required
- **Mobile-first approach** with Tailwind CSS
- **Fast loading** and optimized for performance
- **Professional sections** for products, team, certifications, and factory showcase

## 📁 Project Structure

```
textile-export-company/
├── index.html                 # Home page
├── products.html             # Products listing with filters
├── about.html                # Company story & mission
├── factory.html              # Factory details & capabilities
├── team.html                 # Management team profiles
├── gallery.html              # Photo gallery with categories
├── certifications.html       # Quality certifications
├── contact.html              # Contact form & information
├── src/
│   ├── input.css            # Tailwind CSS input
│   └── script.js            # Vanilla JavaScript utilities
├── tailwind.config.js       # Tailwind configuration
├── package.json             # Project dependencies
└── README.md                # This file
```

## 🎨 Design System

### Color Palette
- **Navy Blue**: `#001f3f` - Primary brand color
- **Deep Green**: `#0d4d2e` - Secondary/hover state
- **White**: `#ffffff` - Backgrounds
- **Light Gray**: `#f5f5f5` - Accent backgrounds

### Typography
- **Headers**: Poppins (bold, 600-800 weight)
- **Body**: Inter (300-700 weight)

### Spacing & Layout
- **Container Max Width**: 7xl (80rem)
- **Section Padding**: 4-5rem (vertical), 1rem (horizontal)
- **Mobile First**: Responsive from 320px+

## 📄 Pages & Features

### 1. **Home (index.html)**
- Hero slider (3 slides with auto-rotation)
- Global clients showcase
- Featured products grid
- About preview section
- Factory highlights
- Management team preview
- Certifications badges
- Gallery preview
- Contact CTA section

### 2. **Products (products.html)**
- Product listing with filtering
- 6 product categories:
  - T-Shirts
  - Polo Shirts
  - Hoodies
  - Jackets
  - Denim
  - Sports Wear
- Product cards with specs
- Production capacity stats
- Custom inquiry CTA

### 3. **About (about.html)**
- Company journey story
- Mission & vision statements
- Key statistics (20+ years, 50+ countries, 500+ clients)
- Core values section
- Location map placeholder
- Contact information

### 4. **Factory (factory.html)**
- Factory overview with highlights
- Production line explanation
- Machinery & equipment details
- Multi-stage quality control
- Production capacity stats
- Certifications compliance

### 5. **Team (team.html)**
- Executive leadership (4 members)
- Senior management (3 members)
- Department heads (4 departments)
- Workplace culture section
- Career opportunities CTA

### 6. **Gallery (gallery.html)**
- Image gallery with categories
- Filter by: All, Factory, Production, Team, Events
- Hover zoom effects
- Grid layout

### 7. **Certifications (certifications.html)**
- 6 major certifications:
  - ISO 9001:2015
  - BSCI Certification
  - WRAP Certification
  - OEKO-TEX Standard 100
  - ISO 14001:2015
  - SA8000
- Additional compliance standards
- Why certifications matter section

### 8. **Contact (contact.html)**
- Contact form with fields:
  - Name, Email, Phone
  - Company, Subject, Message
- Contact information cards
- Working hours
- Quick contact buttons (Call, WhatsApp, Email)
- Additional services overview

## 🚀 Getting Started

### Prerequisites
- Node.js and npm (or pnpm)
- No build tools required - works as static HTML

### Installation

1. **Install dependencies:**
   ```bash
   npm install
   # or
   pnpm install
   ```

2. **Build Tailwind CSS (optional):**
   ```bash
   npm run build
   # or
   pnpm build
   ```

3. **Serve locally:**
   ```bash
   npm run dev
   # or
   npx http-server -p 8080
   ```

4. **Open in browser:**
   - Navigate to `http://localhost:8080`

## 📱 Features

### Responsive Design
- **Mobile** (320px - 640px): Stack layout, hamburger menu
- **Tablet** (641px - 1024px): 2-column layouts
- **Desktop** (1025px+): Full 3-4 column layouts

### Interactive Elements
- **Sticky Navigation** with smooth scroll
- **Hero Slider** with auto-rotation (5-second interval)
- **Mobile Menu** with toggle button
- **Product Filtering** by category
- **Gallery Filtering** by type
- **Hover Animations** on cards and images
- **Form Validation** on contact form

### Performance Optimizations
- Pure CSS transitions (no JavaScript animations)
- Lazy-loaded images via Unsplash CDN
- Minimal JavaScript (vanilla only)
- Tailwind CSS for optimized styling
- No external dependencies

## 🛠️ Customization Guide

### Change Colors
Edit `tailwind.config.js`:
```javascript
colors: {
  'navy': '#001f3f',           // Change to your brand color
  'deep-green': '#0d4d2e',     // Change to your secondary color
}
```

### Update Company Information
Search and replace throughout files:
- `TextileExport Pro` → Your company name
- `+880 1234-567890` → Your phone
- `info@textileexport.com` → Your email
- `Savar, Dhaka` → Your location

### Modify Slider
Edit `src/script.js` - `HeroSlider` class:
- Change `5000` milliseconds for slide duration
- Add/remove slides by duplicating `.slide` divs in HTML

### Add Products
In `products.html`, duplicate the product card and update:
- Image URL
- Product name
- Specifications
- Category (data-category attribute)

## 📊 Product Categories

| Category | MOQ | Colors | GSM |
|----------|-----|--------|-----|
| T-Shirt | 500 | 15+ | 180-200 |
| Polo Shirt | 300 | 20+ | 200-220 |
| Hoodie | 200 | 12+ | 300-350 |
| Jacket | 150 | 8+ | 400-450 |
| Denim | 100 | 5+ | 350-400 |

## 📋 Forms & Integration

### Contact Form
- Currently logs to console
- Can integrate with:
  - Email service (SendGrid, Mailgun)
  - CRM (HubSpot, Salesforce)
  - Database (Firebase, Supabase)

### Sample Integration (Email via FormSpree)
```html
<form action="https://formspree.io/f/YOUR_FORM_ID" method="POST">
  <!-- form fields -->
</form>
```

## 🔗 SEO & Meta Tags

All pages include:
- Unique meta titles
- Meta descriptions
- Responsive viewport settings
- Font optimization via Google Fonts

## 📦 Browser Support

- Chrome/Edge 90+
- Firefox 88+
- Safari 14+
- Mobile browsers (iOS Safari, Chrome Mobile)

## 🎯 Deployment Options

### Static Hosting (Recommended)
- **Vercel** (Fast, free)
- **Netlify** (Free tier available)
- **GitHub Pages** (Free)
- **AWS S3 + CloudFront**

### How to Deploy
1. Push to GitHub repository
2. Connect to Vercel/Netlify
3. Enable automatic deploys
4. Your site goes live instantly!

## 📞 Support & Customization

For custom changes:
- Replace images with your own
- Update company information throughout
- Modify color scheme in tailwind.config.js
- Add Google Maps embed in about.html
- Connect contact form to email service

## 📄 License

This project is ready for production use. Customize as needed for your business.

---

**Version**: 1.0.0  
**Last Updated**: June 2024  
**Built with**: HTML5, Tailwind CSS, Vanilla JavaScript
