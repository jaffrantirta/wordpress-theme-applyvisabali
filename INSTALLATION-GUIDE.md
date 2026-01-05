# Apply Visa Bali Theme - Installation & Setup Guide

## Quick Start Guide

### Step 1: Install the Theme

1. Copy the `apply-visa-bali` folder to your WordPress installation:
   ```
   your-wordpress-site/wp-content/themes/apply-visa-bali
   ```

2. Log in to your WordPress Admin Panel
3. Go to **Appearance > Themes**
4. Find "Apply Visa Bali" and click **Activate**

### Step 2: Initial Configuration

#### 2.1 Create Required Pages

Create these pages in **Pages > Add New**:

1. **Home** (leave blank)
   - Do NOT assign any template yet

2. **About Us**
   - Add your about us content
   - Select Template: **About Us**

3. **Contact Us**
   - Add contact form shortcode (if using Contact Form 7 or similar)
   - Select Template: **Contact Us**

4. **Articles**
   - Leave content blank
   - Select Template: **Articles**

5. **Our Services**
   - Leave content blank
   - Select Template: **Our Services**

#### 2.2 Set Homepage

1. Go to **Settings > Reading**
2. Select "A static page" for "Your homepage displays"
3. Choose "Home" as Homepage
4. Choose "Articles" as Posts page
5. Click **Save Changes**

### Step 3: Configure Theme Settings

#### 3.1 Hero Carousel

Go to **Appearance > Customize > Hero Carousel**:

**Slide 1:**
- Upload image (recommended: 1920x800px)
- Title: "Welcome to Apply Visa Bali"
- Subtitle: "Your Trusted Partner for Visa Services in Bali"
- Button Text: "Get Started"
- Button Link: Link to your services page

**Slide 2:**
- Upload image
- Title: "Fast & Reliable Visa Processing"
- Subtitle: "Professional assistance for all your visa needs"
- Button Text: "Our Services"
- Button Link: Link to services page

**Slide 3:**
- Upload image
- Title: "Expert Visa Consultation"
- Subtitle: "Get expert guidance for your visa application"
- Button Text: "Contact Us"
- Button Link: Link to contact page

#### 3.2 WhatsApp Settings

Go to **Appearance > Customize > WhatsApp Settings**:

- **WhatsApp Number**: Enter your number with country code (e.g., `6281234567890`)
- **Default Message**: "Hello! I need information about visa services."

#### 3.3 Why Us Section

Go to **Appearance > Customize > Why Us Section**:

- **Section Title**: "Why Choose Us"
- **Section Subtitle**: "Our Advantages"

Configure 4 items:
1. **Fast Processing**
   - Icon: `bi-lightning-charge-fill`
   - Title: "Fast Processing"
   - Description: "Quick visa processing times"

2. **Expert Team**
   - Icon: `bi-people-fill`
   - Title: "Expert Team"
   - Description: "Experienced professionals"

3. **100% Legal**
   - Icon: `bi-shield-check`
   - Title: "100% Legal"
   - Description: "Fully compliant with regulations"

4. **Customer Support**
   - Icon: `bi-headset`
   - Title: "24/7 Support"
   - Description: "Always here to help"

Find more icons at: https://icons.getbootstrap.com/

#### 3.4 Upload Logo

Go to **Appearance > Customize > Site Identity**:
- Click "Select logo" and upload your logo (recommended: 200x50px)

### Step 4: Create Menus

#### 4.1 Primary Menu

1. Go to **Appearance > Menus**
2. Create a new menu called "Primary Menu"
3. Add pages:
   - Home
   - About Us
   - Our Services
   - Articles
   - Contact Us
4. Check "Primary Menu" under Display location
5. Click **Save Menu**

#### 4.2 Footer Menu

1. Create another menu called "Footer Menu"
2. Add quick links:
   - About Us
   - Services
   - Articles
   - Contact
   - Privacy Policy
3. Check "Footer Menu" under Display location
4. Click **Save Menu**

### Step 5: Add Content

#### 5.1 Create Services Category

1. Go to **Posts > Categories**
2. Create a category named "Services"
3. Add a description (optional)

#### 5.2 Add Service Posts

Create posts for each visa service:

1. Go to **Posts > Add New**
2. Title: E.g., "Tourist Visa Extension"
3. Content: Service details
4. Featured Image: Service image (400x300px recommended)
5. Category: Check "Services"
6. You can also add subcategories like:
   - Tourist Visa
   - Business Visa
   - Social Visa
   - Retirement Visa
7. Click **Publish**

Create at least 6 service posts for the homepage.

#### 5.3 Add Blog Posts

1. Go to **Posts > Add New**
2. Title: Your blog post title
3. Content: Article content
4. Featured Image: Upload image (600x400px recommended)
5. Category: Create and assign categories (NOT "Services")
   - Visa Tips
   - Bali Guide
   - Immigration News
   - etc.
6. Click **Publish**

#### 5.4 Add Testimonials

1. Go to **Testimonials > Add New** (in admin sidebar)
2. Title: Customer name (e.g., "John Smith")
3. Content: The testimonial text
4. Featured Image: Customer photo (optional, 150x150px recommended)
5. Click **Publish**

Add at least 3 testimonials for the homepage.

### Step 6: Configure Footer Widgets

1. Go to **Appearance > Widgets**

**Footer Widget 1:**
- Add "Text" widget
- Title: "About Apply Visa Bali"
- Content: Brief description of your business

**Footer Widget 2:**
- Add "Custom Menu" widget
- Select "Footer Menu"

**Footer Widget 3:**
- Add "Text" widget
- Title: "Contact Info"
- Content:
  ```
  📍 Jl. Raya Seminyak No. 123
  Seminyak, Bali 80361

  📧 info@applyvisabali.com
  📱 +62 812 3456 7890
  ```

### Step 7: Recommended Plugins

Install these plugins for enhanced functionality:

1. **Contact Form 7** - For contact forms
2. **Yoast SEO** - For SEO optimization
3. **WP Super Cache** - For performance
4. **Wordfence Security** - For security
5. **Akismet Anti-Spam** - For spam protection

### Step 8: Final Checks

- [ ] All pages created and templates assigned
- [ ] Homepage and blog page set in Reading Settings
- [ ] Hero carousel configured with images
- [ ] WhatsApp number configured
- [ ] Logo uploaded
- [ ] Primary and footer menus created
- [ ] At least 6 service posts published
- [ ] At least 3 blog posts published
- [ ] At least 3 testimonials published
- [ ] Footer widgets configured

## Customization Tips

### Change Colors

Edit `apply-visa-bali/style.css` around line 15:

```css
:root {
    --primary-color: #2563eb;      /* Main blue color */
    --secondary-color: #0ea5e9;    /* Light blue */
    --accent-color: #f59e0b;       /* Orange accent */
    --dark-color: #1e293b;         /* Dark gray */
    --light-color: #f8fafc;        /* Light background */
    --text-color: #334155;         /* Text color */
}
```

### Add Social Media Links

Edit `apply-visa-bali/footer.php` around line 50 to add your social media URLs.

### Customize Contact Page

Edit contact information in `apply-visa-bali/template-contact.php`.

## Troubleshooting

### Hero Carousel Not Showing
- Make sure you've uploaded images in Appearance > Customize > Hero Carousel
- Check that you're viewing the homepage (not the blog page)

### Services Not Appearing
- Ensure posts are assigned to "Services" category
- Check that you have at least one service post published

### WhatsApp Button Not Working
- Enter WhatsApp number WITHOUT + sign and spaces (e.g., 6281234567890)
- Make sure number includes country code

### Menu Not Showing
- Check that menu is assigned to "Primary Menu" location in Appearance > Menus

## Support

For customization help or issues, you can:
- Check the WordPress Codex: https://codex.wordpress.org/
- Bootstrap documentation: https://getbootstrap.com/docs/5.3/

## Next Steps

1. Add more content (blog posts, services)
2. Set up Google Analytics
3. Configure SEO settings with Yoast
4. Add SSL certificate (https)
5. Set up regular backups
6. Optimize images for web
7. Test on mobile devices
8. Submit sitemap to Google Search Console

Enjoy your new Apply Visa Bali website!
