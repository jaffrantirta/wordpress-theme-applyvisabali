# Apply Visa Bali - WordPress Theme

A modern, responsive WordPress theme designed specifically for visa service businesses in Bali.

## Features

- **Responsive Design**: Built with Bootstrap 5 for mobile-first responsive layout
- **Hero Carousel**: Eye-catching carousel slider on the homepage with customizable slides
- **Customizable Sections**:
  - What We Offer (Services)
  - Why Choose Us
  - Latest Updates (Blog)
  - Testimonials
- **Custom Page Templates**:
  - About Us
  - Contact Us
  - Articles (Blog Archive)
  - Our Services (with category filtering)
- **Modern Design**: Rounded pill design elements throughout
- **Floating WhatsApp Button**: Integrated WhatsApp chat button
- **Custom Post Type**: Testimonials post type for customer reviews
- **SEO Friendly**: Clean, semantic HTML markup
- **Easy Customization**: WordPress Customizer integration for easy setup

## Installation

1. Download the theme folder `apply-visa-bali`
2. Upload to your WordPress installation's `wp-content/themes/` directory
3. Activate the theme from WordPress Admin > Appearance > Themes
4. Go to Appearance > Customize to configure theme settings

## Theme Setup

### 1. Create Navigation Menus
Go to **Appearance > Menus** and create:
- Primary Menu (main navigation)
- Footer Menu (footer links)

### 2. Configure Hero Carousel
Go to **Appearance > Customize > Hero Carousel** to set:
- Slide images (3 slides)
- Titles and subtitles
- Button text and links

### 3. Configure WhatsApp Button
Go to **Appearance > Customize > WhatsApp Settings** to set:
- WhatsApp number (with country code, e.g., 6281234567890)
- Default message

### 4. Setup Services
Create a category called "Services" and add posts to it. These will appear in the "What We Offer" section on the homepage.

### 5. Add Testimonials
Go to **Testimonials** in the admin menu and create testimonial posts with:
- Title (customer name)
- Content (testimonial text)
- Featured Image (customer photo - optional)

### 6. Create Pages
Create the following pages and assign templates:
- **About Us** - Use "About Us" template
- **Contact Us** - Use "Contact Us" template
- **Articles** - Use "Articles" template
- **Our Services** - Use "Our Services" template
- **Home** - Set as homepage in Settings > Reading

### 7. Configure Why Us Section
Go to **Appearance > Customize > Why Us Section** to configure:
- Section title and subtitle
- 4 advantage items with icons, titles, and descriptions

## Customization

### Colors
Edit the CSS variables in `style.css`:
```css
:root {
    --primary-color: #2563eb;
    --secondary-color: #0ea5e9;
    --accent-color: #f59e0b;
    --dark-color: #1e293b;
    --light-color: #f8fafc;
    --text-color: #334155;
}
```

### Bootstrap Icons
The theme uses Bootstrap Icons. Available icon classes can be found at:
https://icons.getbootstrap.com/

## File Structure

```
apply-visa-bali/
├── css/
│   └── custom.css          # Custom styles
├── js/
│   └── custom.js           # Custom JavaScript
├── inc/                    # Additional includes
├── template-parts/         # Template parts
├── images/                 # Theme images
├── style.css              # Main stylesheet
├── functions.php          # Theme functions
├── header.php             # Header template
├── footer.php             # Footer template
├── front-page.php         # Homepage template
├── index.php              # Blog archive
├── single.php             # Single post
├── page.php               # Default page template
├── template-about.php     # About Us template
├── template-contact.php   # Contact Us template
├── template-articles.php  # Articles template
├── template-services.php  # Our Services template
└── screenshot.png         # Theme screenshot
```

## Support

For support and customization requests, please contact the theme developer.

## Credits

- Bootstrap 5: https://getbootstrap.com/
- Bootstrap Icons: https://icons.getbootstrap.com/
- Google Fonts (Inter): https://fonts.google.com/

## License

This theme is licensed under the GNU General Public License v2 or later.

## Changelog

### Version 1.0.0
- Initial release
- Hero carousel with 3 customizable slides
- Custom page templates
- Testimonials custom post type
- WhatsApp floating button
- Responsive design
- Modern rounded pill design elements
