

# 🚀 AnajakSoftware Project

This is a **fullstack web application** built with the following technologies:

* **Backend**: [Laravel 12](https://laravel.com/) (`/backend`)
* **Frontend**: [Next.js 15](https://nextjs.org/) (`/website`)
* **Database**: [MySQL](https://www.mysql.com/)
* **Styling**:

  * **Admin Dashboard**: [Bootstrap](https://getbootstrap.com/) with Laravel Blade
  * **Frontend Website**: [Tailwind CSS](https://tailwindcss.com/)

---

## 📂 Project Structure

```
├── backend   # Laravel 12 backend (API + Admin Dashboard)
├── website   # Next.js 15 frontend (client website)
└── README.md # Project documentation
```

---

## ⚙️ Requirements

* PHP **8.2+**
* Composer **2+**
* Node.js **18+**
* MySQL **5.7+ / 8.0+**
* NPM or Yarn

---

## 🛠️ Setup Instructions

### 1. Clone the Repository

```bash
git clone https://github.com/BunthongDev/SoftwareFactory.git
```

---

### 2. Backend (Laravel 12)

```bash
cd backend
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

➡️ Backend will run at: **[http://localhost:8000](http://localhost:8000)**

---

### 3. Frontend (Next.js 15)

```bash
cd website
cp .env.example .env.local
npm install
npm run dev
```

➡️ Frontend will run at: **[http://localhost:3000](http://localhost:3000)**

---

### 4. Database

* Default: **MySQL**
* Update your `.env` files (both backend and frontend) with correct database credentials.
* Run migrations if needed:

```bash
php artisan migrate
```


---

## 📦 Features

### Backend (Laravel 12)

* RESTful API endpoints for the frontend
* **Admin Dashboard (Bootstrap + Blade)** with modules:

  * Dashboard overview (latest posts, counts, views)
  * Manage **Top Navbar**, **Menu**, **Sliders**
  * Manage **Services**, **Case Studies**, **Testimonials**, **Our Clients**
  * Manage **Blog** (categories, publish date, views, edit)
  * Manage **Footer**, **About Us**, **Contact Us**
  * **Settings** and **Ad Banners**
* **Account management**

  * Update **profile information**
  * **Change password**
  * **Two-Factor Authentication (2FA)** via time-based one-time codes
* Database migrations and seeding

### Frontend (Next.js 15)

* Modern **Server Side Component (SSC)/ Service Side Generation (SSG) ** website
* **Tailwind CSS** styling & fully responsive UI
* API integration with the Laravel backend
* Auth-aware data fetching; works with secured API + 2FA flow

---

## 🔐 Security

* Password hashing, auth middleware, CSRF protection (Laravel)
* Optional **2FA** for admin accounts to protect dashboard access


---

## 📸 Screenshots

### Admin Dashboard

<img width="1509" height="830" alt="image" src="https://github.com/user-attachments/assets/6e434c6b-064b-41c3-af6b-36a0d5a80982" />

### Frontend

* checking in this URL [https://anajaksoftware.com](https://www.anajaksoftware.com/)


---


