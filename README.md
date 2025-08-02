# 🐪 Local Morocco Tours

> A modern Laravel-based tourism platform offering immersive desert tours, trekking adventures, cultural activities, and curated travel experiences across Morocco.

![Laravel](https://img.shields.io/badge/Laravel-Framework-red?logo=laravel)
![SEO Optimized](https://img.shields.io/badge/SEO-Optimized-brightgreen)
![Mobile Ready](https://img.shields.io/badge/Mobile-Responsive-blue)
![License](https://img.shields.io/badge/License-MIT-lightgrey)

---

## 🌍 Project Overview

**Local Morocco Tours** is a full-featured travel website built with Laravel, designed to connect global travelers with authentic Moroccan experiences. From Sahara camel rides and Atlas Mountains trekking to cultural city tours, the platform is SEO-optimized, mobile-ready, and easy to manage.

✨ Key Modules:
- Multi-day & Day Trip Tours
- Trekking Experiences
- Cultural Activities
- Blog & Travel Stories
- Custom Tour Builder (planned)
- Full SEO Metadata Control
- Admin Dashboard (Lightable Theme)

---

## 🚀 Features

- ✅ **Tour & Activity Management** with image galleries, alt/title metadata, highlights, pricing, and detailed itineraries.
- 🏕️ **Structured Itinerary System** (polymorphic: multi-paragraph days)
- 📍 **Location-Based Filtering** for tours/activities
- 🌐 **Multilingual & Multi-Currency Support**
- 💬 **Reviews System** (for future version)
- 🔍 **Optimized for Search Engines** (JSON-LD, Open Graph, Twitter Cards via SEOTools)
- 📱 **Mobile Responsive UI**
- 📸 **Spatie MediaLibrary** integration
- 🧠 **AI-ready tour generation pipeline** (future)

---

## 🧱 Tech Stack

| Layer       | Technology                                |
|-------------|-------------------------------------------|
| Backend     | Laravel 10.x                              |
| Frontend    | Blade + Tailwind CSS (optional custom theme) |
| SEO Tools   | [artesaos/seotools](https://github.com/artesaos/seotools) |
| Media       | [Spatie Laravel Media Library](https://spatie.be/docs/laravel-medialibrary) |
| DB          | MySQL                          |
| Admin Panel | Lightable Bootstrap Theme                 |
| Maps        | Google Maps Embed                         |

---

## 📁 Folder Structure Highlights

```
resources/views/
├── tours/
│   ├── index.blade.php
│   ├── create.blade.php
│   └── show.blade.php
├── activities/
├── trekking/
├── layouts/
│   └── app.blade.php
└── components/
```

```
database/seeders/
├── TourSeeder.php
├── TrekkingSeeder.php
├── ActivitySeeder.php
└── LocationSeeder.php
```

---

## ⚙️ Installation Guide

1. **Clone the repository**
```bash
git clone https://github.com/Rochdi7/LocalMoroccoTours.git
cd local-morocco-tours
```

2. **Install dependencies**
```bash
composer install
npm install && npm run build
```

3. **Configure `.env`**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Set up the database**
```bash
php artisan migrate --seed
```

5. **Run the app**
```bash
php artisan serve
```

---

## ✨ Screenshots

<!-- <p align="center">
  <img src="public/assets/screenshots/home.png" width="600" />
  <img src="public/assets/screenshots/tour-detail.png" width="600" />
  <img src="public/assets/screenshots/admin-dashboard.png" width="600" />
</p> -->

---

## 💡 SEO & Performance

- Meta & OpenGraph via `SEOTools`
- Sitemap via `spatie/laravel-sitemap`
- Critical CSS loading
- Lazy-loading for images
- Schema Markup for tours (coming soon)

---

## 🧪 Testing

```bash
php artisan test
```

Laravel test coverage includes:
- Tour creation and detail routes
- Admin panel tour CRUD
- SEO metadata presence
- Gallery/media associations

---

## 📅 Roadmap

- [x] Tours CRUD
- [x] Activities & Trekking Modules
- [x] SEO Optimizations
- [ ] Booking & Payments (CMI Gateway)
- [ ] Multilingual Support (frontend)
- [x] Tour Review System

---

## 🤝 Author

Developed by **Rochdi Karouali**  
Laravel Developer | Passionate about SEO, APIs, and Moroccan travel experiences

---

## 📜 License

This project is licensed under the **MIT License**. Feel free to use, adapt, or contribute!

---

> **🌟 If you like the project, don’t forget to star it!**  
> For inquiries or partnership, contact via the website or open an issue.
