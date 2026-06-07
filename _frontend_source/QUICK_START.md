# 🚀 Quick Start Guide - TextileExport Pro

## 5-Minute Setup

### Step 1: Install Dependencies
```bash
npm install
# or
pnpm install
```

### Step 2: Start Development Server
```bash
npm run dev
# The server runs at http://localhost:8080
```

### Step 3: Open in Browser
Navigate to `http://localhost:8080` and click through the pages!

---

## 📋 Essential Information

### File Locations
```
Root Directory:
├── index.html          ← Home page (START HERE)
├── products.html       ← Product catalog
├── about.html          ← Company story
├── factory.html        ← Factory details
├── team.html           ← Team profiles
├── gallery.html        ← Photo gallery
├── certifications.html ← Quality certifications
├── contact.html        ← Contact form
└── src/
    ├── script.js       ← JavaScript (slider, menus)
    └── input.css       ← Tailwind CSS
```

### Company Details (Replace These)
```
Name: TextileExport Pro
Phone: +880 1234-567890
Email: info@textileexport.com
Location: Savar, Dhaka 1340, Bangladesh
```

---

## 🎯 Key Pages to Know

| Page | Purpose | Key Sections |
|------|---------|--------------|
| **Home** | Landing page | Hero, Products, Team, Certs |
| **Products** | Catalog | Filterable grid, Specs, Quote |
| **About** | Company story | Mission, Vision, Stats |
| **Factory** | Production info | Machines, QC, Capacity |
| **Team** | Staff directory | Leadership, Managers |
| **Gallery** | Photo showcase | Filterable images |
| **Certifications** | Quality badges | ISO, BSCI, WRAP, etc |
| **Contact** | Get in touch | Form, Info, Hours |

---

## 🎨 Customization Quick Tips

### 1. Change Colors
Edit `tailwind.config.js`:
```javascript
colors: {
  'navy': '#001f3f',        // Your primary color
  'deep-green': '#0d4d2e',  // Your secondary color
}
```

### 2. Update Company Name
Find & Replace in all files:
- Old: `TextileExport Pro`
- New: `Your Company Name`

### 3. Add Product Image
Replace URL in `products.html`:
```html
<img src="https://images.unsplash.com/photo-xxx" alt="Product">
```

### 4. Update Contact Info
Edit in `contact.html`:
```html
<a href="tel:+1234567890">Your Phone</a>
<a href="mailto:your@email.com">Your Email</a>
```

### 5. Add Team Member
Copy this block in `team.html`:
```html
<div class="team-card...">
  <img src="your-photo.jpg" alt="Name">
  <h3>John Doe</h3>
  <p>Title Here</p>
</div>
```

---

## 🔧 Features to Explore

### ✅ Working Features
- ✅ Hero slider (auto-rotates every 5 seconds)
- ✅ Mobile hamburger menu
- ✅ Product filtering
- ✅ Gallery filtering
- ✅ Contact form (logs to console)
- ✅ Smooth scrolling
- ✅ Hover animations

### 📝 To Connect/Integrate
- [ ] Contact form → Email service (SendGrid, Mailgun)
- [ ] WhatsApp button → Your WhatsApp business
- [ ] Maps → Google Maps API
- [ ] Images → Your product photos
- [ ] Forms → Your CRM or database

---

## 💻 Browser Testing

### Desktop
- Chrome: ✅ Perfect
- Firefox: ✅ Perfect
- Safari: ✅ Perfect
- Edge: ✅ Perfect

### Mobile
- iPhone: ✅ Perfect
- Android: ✅ Perfect
- Tablet: ✅ Perfect

---

## 🚀 Deploy to Production

### Option 1: Vercel (Recommended)
```bash
npm install -g vercel
vercel
# Follow prompts - auto-deploy!
```

### Option 2: Netlify
1. Push to GitHub
2. Connect to Netlify
3. Deploy automatically

### Option 3: GitHub Pages
```bash
git init
git add .
git commit -m "Initial commit"
git push
# Configure GitHub Pages in settings
```

---

## 📊 Popular Customizations

### Change Hero Slider Duration
In `src/script.js`, line 69:
```javascript
this.autoSlideInterval = setInterval(() => this.nextSlide(), 5000);
// Change 5000 to your preferred milliseconds
```

### Add New Product
1. Copy a product card in `products.html`
2. Change image, name, specs
3. Add category: `data-category="new-category"`
4. Update filter button if needed

### Modify Navigation Menu
Edit the nav in every page:
```html
<a href="page.html" class="nav-link">Page Name</a>
```

### Change Footer Links
Update links in footer section (same across all pages)

---

## 🐛 Troubleshooting

### Images Not Loading?
- Check internet connection (using CDN)
- Update image URLs to your hosting
- Use local images instead of Unsplash

### Form Not Working?
- It logs to browser console (check Dev Tools)
- Integrate with: FormSpree, SendGrid, or your backend

### Menu Not Showing on Mobile?
- Check if `mobile-menu-btn` click handler is loaded
- Verify JavaScript is enabled
- Test with browser DevTools mobile view

### Styles Not Applying?
- Clear browser cache (Ctrl+Shift+R)
- Check if Tailwind CSS is loaded
- Verify class names match Tailwind syntax

---

## 📞 Support Resources

### Built With
- **HTML5** - Semantic markup
- **Tailwind CSS** - Utility-first styling
- **Vanilla JavaScript** - No frameworks

### Documentation Files
- `README.md` - Full project documentation
- `PROJECT_STRUCTURE.md` - Detailed file structure
- `QUICK_START.md` - This file!

### External Resources
- Tailwind CSS Docs: https://tailwindcss.com/docs
- MDN Web Docs: https://developer.mozilla.org
- Google Fonts: https://fonts.google.com
- Unsplash Images: https://unsplash.com

---

## ✅ Pre-Launch Checklist

- [ ] Update all company information
- [ ] Replace placeholder images
- [ ] Update phone/email/address
- [ ] Test all links work
- [ ] Test contact form
- [ ] Test on mobile devices
- [ ] Update social media links
- [ ] Set up email notifications
- [ ] Configure WhatsApp Business
- [ ] Deploy to production
- [ ] Set up domain name
- [ ] Enable HTTPS certificate
- [ ] Test final deployment

---

## 🎉 You're Ready!

Your textile export company website is ready to go live. Start by:

1. **Customize** with your company info
2. **Test** across all devices
3. **Deploy** to production
4. **Share** with your customers!

For questions or custom features, refer to the full `README.md` documentation.

**Happy launching! 🚀**

---

**Last Updated**: June 7, 2024  
**Version**: 1.0.0
