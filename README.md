# NexGen Build Tech — CCTV Security Solutions Platform

A complete e-commerce showcase website + admin panel built for **NexGen Build Tech**, a CCTV security solutions company. The public site is a fully database-driven landing page; the admin panel manages every piece of content on it.

---

## Tech Stack & Tools Used

| Layer | Tool / Package | Purpose |
|-------|----------------|---------|
| Backend Framework | **Laravel 12** (PHP 8.2+) | Core application framework |
| Authentication | **Laravel Breeze** | Login, password reset, email verification (registration disabled) |
| Frontend | **Tailwind CSS 3** + Custom CSS | Styling |
| JS Framework | **Alpine.js 3** | Lightweight interactivity (dropdowns, toggles) |
| Icons | **Font Awesome 6.5.1** (public site), **Tabler Icons** (admin panel) | Iconography |
| Fonts | **Barlow** (headings), **Roboto** (body) | Typography |
| Build Tool | **Vite 7** + PostCSS + Autoprefixer | Asset bundling |
| Database | **MySQL** | Data storage |
| PDF Export | **barryvdh/laravel-dompdf** | Reports → PDF download |
| Excel Export | **phpoffice/phpspreadsheet** | Reports → XLSX download |
| Email | **SMTP via cPanel mail** (port 465) | Contact form notifications |
| Queue | **Database driver** | Queued email sending (`php artisan queue:work` required) |
| Session / Cache | File-based | — |
| Version Control | **Git + GitHub** | Source control |
| Hosting | **cPanel** (nexgenbuildtech.com) | Production deployment, mail, Roundcube webmail |

---

## What We Built

### 1. Public Website (100% DB-driven)
- **Landing page** with sections: Hero (rotating camera videos), Products, Why Choose Us (stats), Testimonials, About, Services, Contact
- Every section pulls live data from the database — no hardcoded content
- **Contact form** — saves message to DB + sends a queued email notification to sales@nexgenbuildtech.com
- Custom **404 error page**

### 2. Authentication (Laravel Breeze)
- Login / logout / forgot password / reset password
- Public registration **disabled** — admin-only access
- Profile management (name, email, password, delete account)

### 3. Admin Panel — Full CRUD for Everything
| Module | Features |
|--------|----------|
| **Dashboard** | Total products, categories, low-stock & out-of-stock counts, recent & top-rated products |
| **Products** | Create / edit / delete, image upload, auto-slug, SKU, price + old price, stock, rating, badges (hot/new/sale), status (active/draft/archived), featured flag, search by name/SKU, filter by category, pagination |
| **Categories** | Full CRUD, product counts, delete blocked if products are assigned |
| **Hero Cameras** | Full CRUD, video upload (mp4/webm/ogg, max 50MB), sort order, active toggle |
| **Stats (Why Choose Us)** | Full CRUD with icon, value, label, sort order |
| **Testimonials** | Full CRUD, photo upload or avatar emoji, rating, sort order, active toggle |
| **Messages** | Paginated inbox, detail view (auto-marks read), delete, mark-all-as-read, new/read status |
| **Reports** | Stats by category, top products, recent products, **XLSX export**, **PDF export**, print view |
| **Notifications** | Live topbar badge for unread messages — auto-polls every 30 seconds via JS |

### 4. Email Integration
- SMTP configured through cPanel mail server
- `ContactNotificationMail` — queued mail with reply-to set to the sender
- "Reply via Email" buttons open **cPanel Roundcube webmail** (webmail.nexgenbuildtech.com) compose window

---

## Database Schema

| Table | Key Columns |
|-------|-------------|
| `users` | name, email, password (admin accounts only) |
| `products` | name, slug, category_id (FK), description, price, old_price, stock, sku, image, rating, badge, status, is_featured, features |
| `categories` | name, slug, description |
| `stats` | icon, value, label, sort_order |
| `testimonials` | quote, avatar, photo, name, role, rating, sort_order, is_active |
| `hero_cameras` | label, video_path, sort_order, is_active |
| `contact_messages` | name, email, phone, subject, message, status (new/read) |
| + standard Laravel | sessions, cache, jobs, failed_jobs, password_reset_tokens |

---

## Project Structure

```
nexgen/
├── app/
│   ├── Http/Controllers/        # Product, Category, Stat, HeroCamera,
│   │                            # Testimonial, Message, Contact controllers
│   ├── Mail/
│   │   └── ContactNotificationMail.php
│   └── Models/                  # User, Product, Category, Stat,
│                                # HeroCamera, Testimonial, ContactMessage
├── database/
│   ├── migrations/              # All schema migrations
│   └── seeders/                 # AdminUserSeeder (Category/Product seeders empty)
├── resources/views/
│   ├── home.blade.php           # Public landing page
│   ├── layouts/                 # app (public), admin (sidebar+topbar), guest
│   ├── partials/                # navbar, footer, product-card, testimonial…
│   ├── auth/                    # Breeze auth views
│   ├── emails/
│   │   └── contact-notification.blade.php
│   └── admin/                   # dashboard, inventory, reports +
│                                # products/, categories/, stats/,
│                                # hero_cameras/, testimonials/, messages/, reports/
├── routes/web.php               # Public + /admin (auth+verified middleware)
└── public/
    ├── images/                  # Logo (nexgen_logo.png), camera images
    ├── videos/                  # Hero fallback video
    ├── products/                # Uploaded product images
    ├── cameras/                 # Uploaded hero videos
    ├── testimonials/            # Uploaded testimonial photos
    └── admin-assets/            # Admin CSS/JS, Tabler icon fonts
```

---

## Routes Overview

### Public
| Method | URI | Action |
|--------|-----|--------|
| GET | `/`, `/about`, `/services`, `/products`, `/reviews`, `/contact` | Landing page |
| POST | `/contact` | Save message + queue email |

### Admin (`/admin`, middleware: `auth` + `verified`)
- `/admin` — dashboard
- `/admin/products/*` — product CRUD + inventory list
- `/admin/categories/*` — category CRUD
- `/admin/hero-cameras/*` — hero camera CRUD
- `/admin/stats/*` — stats CRUD
- `/admin/testimonials/*` — testimonial CRUD
- `/admin/messages/*` — inbox, detail, delete, mark-all-read
- `/admin/reports` + `/print`, `/download/csv`, `/download/pdf`
- `/admin/notifications/poll` — JSON endpoint for live badge (30s polling)

---

## Setup & Run

```bash
# 1. Install dependencies
composer install
npm install

# 2. Configure environment
cp .env.example .env        # set DB + mail credentials here
php artisan key:generate

# 3. Database
php artisan migrate
php artisan db:seed         # creates the admin user

# 4. Build assets
npm run build               # or `npm run dev` while developing

# 5. Run
php artisan serve
php artisan queue:work      # REQUIRED — emails are queued (database driver)
```

> **Note:** All credentials (database, SMTP, admin login) live in `.env` — never committed to the repo.

---

## Development Timeline (Git History)

1. **Initial frontend** — complete static landing page
2. **Client-requested changes** — design tweaks, content updates
3. **New system functions** — admin panel, full CRUD for all entities
4. **Branding** — replaced all logos with `nexgen_logo.png`, favicon, cache busting
5. **Contact mail** — email sent via terminating callback after response
6. **Messages UX** — mark-all-as-read on messages page + notifications dropdown
7. **Reply via email** — opens cPanel Roundcube webmail compose
8. **Live notifications** — 30s auto-polling for the unread badge

---

## Known Notes / Remaining Items

- `CategorySeeder` and `ProductSeeder` are empty — demo data is entered manually via the admin panel
- Uploads are stored directly in `public/` (no `storage:link` needed)
- The queue worker must be running in production for contact emails to send

---

## Deployment

Hosted on **cPanel** at nexgenbuildtech.com. See the deployment checklist before zipping:
build assets (`npm run build`), clear caches, set production `.env`, configure the queue worker (cron or supervisor).
