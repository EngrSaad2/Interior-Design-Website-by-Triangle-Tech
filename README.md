# Triangle Interior Design - Interior Design Website & CMS

A full-stack, enterprise-grade Interior Design Website and dynamic Content Management System (CMS) built with Laravel, MySQL, Vanilla CSS, and modern JavaScript. The platform replicates the luxury aesthetics and high-performance user experience of DitStudio while delivering a complete backend management suite adapted from proven architectural patterns.

Primary SEO Target Keyword: **Interior Design Website**

---

## Key Highlights

- **Dynamic Hero Slider**: High-resolution luxury presentation slider with smooth animations, custom headings, highlight spans, subtitles, and direct action triggers.
- **Custom Admin CMS**: Complete administrative control panel for slides, services, projects, furniture products, blogs, FAQs, testimonials, leads, inquiries, and site configuration.
- **Full Database Backup Included**: Pre-populated database with 30 production-grade projects, category taxonomies, factory joinery specifications, and real asset references stored in `DB/interior.sql`.
- **Comprehensive SEO Architecture**: Built-in Schema.org JSON-LD structured data (HomeAndConstructionBusiness, ProfessionalService, WebSite, FAQPage), OpenGraph tags, Twitter Card metadata, geographic local SEO tags, and targeted keyword hierarchy.
- **Responsive Engineering**: Tailored layouts across ultra-wide desktop, laptop, tablet, and mobile viewports.

---

## Core Features

### 1. Frontend Experience

- **Hero Slider**:
  - Auto-playing carousel with pause on hover and keyboard navigation.
  - Aligned action buttons (Get Free Consultation and Portfolio Download) integrated into the slide content flow.
  - Social media integration (Facebook, LinkedIn, YouTube, Messenger, Pinterest, WhatsApp).
- **Home Interior Services Carousel**:
  - Horizontal multi-card service slider with interactive arrows and hover depth.
  - Links to dedicated service landing pages.
- **Project Portfolio Gallery**:
  - Live filtering by category (Living Room, Bedroom, Dining, Kitchen, Office, Duplex).
  - 30 distinct architectural projects with high-resolution imagery and client detail pages.
- **Furniture & Joinery Showcase**:
  - Interactive product catalog categorized by type (Sofas, Dining Sets, Consoles, Cabinetry).
  - Quick-inquiry modal for specific furniture fit-out pricing.
- **Why Choose Us Section**:
  - Core value propositions highlighting factory prefabrication, German hardware (Blum, Hafele), and moisture-resistant marine plywood.
  - High-definition video modal integration.
- **Editorial Blog Engine**:
  - Categorized interior architecture design guides and advice articles.
  - Dedicated article view with sidebar widgets and related reading.
- **Schema-Powered FAQ Section**:
  - Accordion interface with instant expansion for pricing, timelines, factory visits, and material specifications.
  - Synced with Google FAQPage rich snippet schema.
- **Lead Capture & Consultation**:
  - Universal consultation modal accessible across all page sections.
  - Real-time client-side and server-side validation with instant response feedback.
  - WhatsApp direct connect integration (+8801810536303).
- **Developer Attribution**:
  - Footer credits linking to Engr Saad (engr-saad.com).

### 2. Administrative CMS Suite

Accessible at `/admin` with protected authentication middleware:

- **Dashboard**:
  - Statistical summary metrics: Active Sliders, Total Projects, Products, Services, Blogs, FAQs, and Leads.
  - Quick action links and recent activity logs.
- **Slider Management**:
  - Add, edit, reorder, and toggle hero banner slides.
  - Dynamic image upload with preview, highlight word styling, custom button labels, and catalog attachments.
- **Service Management**:
  - Manage services, slug generators, iconography, and descriptive highlights.
- **Project Management**:
  - Create and update portfolio entries with primary cover images and multi-image project galleries.
  - Client metadata: Project location, area square footage, completion year, and category tagging.
- **Furniture Catalog Management**:
  - Manage products, categories, SKU codes, pricing, materials, and stock availability.
- **Blog & Content Management**:
  - Rich text article authoring with WYSIWYG integration.
  - Featured image handling, publication status toggle, and author credits.
- **Testimonials & Social Proof**:
  - Manage verified client reviews, star ratings, client avatars, and company designations.
- **FAQ Management**:
  - Add, edit, and sort frequently asked questions reflected immediately on the public site and Schema markup.
- **Inquiry & Lead Management**:
  - Review incoming customer consultations and quotation requests.
  - Status progression workflow (New, In Progress, Closed, Archived).
- **System Administration & Database Backup**:
  - Secure profile credential and password updates.
  - One-click MySQL database dump generation and download utility.

---

## Technical Stack

- **Backend Framework**: Laravel 11.x
- **Language**: PHP 8.2+
- **Database**: MySQL 8.0+ / MariaDB (Local database name: `interior`)
- **Frontend Architecture**: Laravel Blade, Vanilla CSS (Design tokens, BEM structure), Modern JavaScript (ES6+)
- **Icons**: Font Awesome 6 Free + SVG Inline Vectors
- **Fonts**: Outfit & Jost (Google Fonts)

---

## Directory Structure

```
interior/
├── app/
│   ├── Http/Controllers/       # Public and Admin Controllers
│   └── Models/                 # Eloquent Models (Slider, Project, Service, Product, etc.)
├── DB/
│   └── interior.sql            # Complete database dump with all tables and seed data
├── public/
│   ├── css/style.css           # Core stylesheet with responsive design system
│   ├── js/main.js              # Frontend interactive scripts
│   └── images/                 # Optimized web assets, logos, and slider banners
├── resources/
│   └── views/
│       ├── layouts/            # Master layout with comprehensive SEO tags
│       ├── pages/              # Public views (Home, Projects, Services, Contact, etc.)
│       └── admin/              # Complete administrative CRUD dashboard views
└── routes/
    └── web.php                 # Public and authenticated admin routing
```

---

## Installation & Setup

### 1. Clone Repository
```bash
git clone https://github.com/EngrSaad2/Interior-Design-Website-by-Triangle-Tech.git
cd Interior-Design-Website-by-Triangle-Tech
```

### 2. Environment Configuration
Copy the environment template and configure database parameters:
```bash
cp .env.example .env
```
Ensure database credentials match your local MySQL server:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=interior
DB_USERNAME=root
DB_PASSWORD=
```

### 3. Install Dependencies & Generate Key
```bash
composer install
php artisan key:generate
```

### 4. Database Import
Import the provided database dump located in the `DB` directory:

#### Using Command Line:
```bash
mysql -u root -p -e "CREATE DATABASE IF NOT EXISTS interior CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
mysql -u root -p interior < DB/interior.sql
```

#### Using phpMyAdmin:
1. Open `http://localhost/phpmyadmin/`.
2. Create a new database named `interior`.
3. Select `Import` and choose `DB/interior.sql`.
4. Click `Go` to execute the import.

### 5. Start Development Server
```bash
php artisan serve
```
Or access directly via local server:
`http://localhost/interior/public/`

---

## Default Administrative Credentials

- **Admin Login URL**: `http://localhost/interior/public/admin/login`
- **Email**: `saad@gmail.com`
- **Password**: `123456`

---

## Search Engine Optimization (SEO) Specifications

- **Primary Keyword**: Interior Design Website
- **Secondary Keywords**: Best interior design website, modern interior design website, luxury interior design website, interior design website bangladesh, interior design company dhaka, best interior designer in bangladesh, residential interior design website, commercial interior design, turnkey interior architecture, custom furniture bangladesh
- **Structured Data**:
  - HomeAndConstructionBusiness
  - ProfessionalService
  - WebSite with SearchAction
  - FAQPage
- **Geographic Metatags**: Dhaka, Bangladesh (`BD-13`, Coordinates: `23.777176, 90.399452`)

---

## License

This project is licensed under the MIT License.
Developed by Engr Saad for Triangle Interior Design.
