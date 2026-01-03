# 🎤 JKT48 Fanmade Website

🌐 **Language / Bahasa:**  
[🇬🇧 English](#english) | [🇮🇩 Bahasa Indonesia](#bahasa-indonesia)

---

## 🇬🇧 English

### 📖 Description
This project is a **JKT48 Fanmade API & Web Application** built using **Laravel Framework version 11** and **MySQL** as the database. It serves as a personal project created by a JKT48 fan to present JKT48-related information through both a web-based interface and RESTful API endpoints.

Initially, this project was inspired by a senior of mine who developed a mobile application with a similar concept. That inspiration motivated me to create a web application that not only allows users to explore JKT48 content through a browser but also provides structured API endpoints that can be used for further development or integration.

This project is still under continuous development. Feedback and suggestions are highly appreciated to help improve functionality, performance, and overall user experience. Please use the provided API endpoints responsibly.

### 🛠️ Tech Stack
- **⚙️ Backend:** Laravel 11  
- **🗄️ Database:** MySQL  
- **🎨 Frontend:** Blade Template, HTML, CSS  
- **💅 Styling:** Tailwind CSS  
- **🔐 Authentication:** Laravel Authentication  
- **🔌 API:** RESTful API  
- **🌱 Version Control:** Git & GitHub  

### 🚀 Installation
1. Clone the repository  
```bash
git clone https://github.com/StarVinn/JKT48-Represented-Official-Website.git
````

2. Install dependencies

```bash
composer install
```

3. Copy environment file

```bash
cp .env.example .env
```

4. Generate application key

```bash
php artisan key:generate
```

5. Run database migration and seeder

```bash
php artisan migrate --seed
```

6. Create storage symbolic link

```bash
php artisan storage:link
```

7. Run the development server

```bash
php artisan serve
```

### 🧭 Usage

1. Open a web browser and navigate to `http://127.0.0.1:8000/`
2. Register and login to access the system
3. After logging in, you can view all available JKT48 members and related content

### 🔗 API Endpoints

* `GET /api/members` – Retrieve all JKT48 members
* `GET /api/setlists` – Retrieve all JKT48 setlists
* `GET /api/setlists/{id}` – Retrieve a single setlist by ID
* `GET /api/news` – Retrieve all JKT48 news
* `GET /api/showroom` – Retrieve all JKT48 showroom data

### ⚠️ Disclaimer

This project is a **fanmade and non-official** application. It is **not affiliated with, endorsed by, or associated with JKT48, AKB48 Group, or their management**. All content is used for educational and non-commercial purposes only.

### 💬 Message

This API & Web Application is part of an ongoing development journey. Regular updates will be made to ensure the project remains relevant and aligned with best development practices. Your feedback and support are highly appreciated.

---

## 🇮🇩 Bahasa Indonesia

### 📖 Deskripsi

Proyek ini merupakan **API & Aplikasi Web Fanmade JKT48** yang dibangun menggunakan **Laravel Framework versi 11** dan **MySQL** sebagai basis data. Aplikasi ini dibuat sebagai proyek personal oleh seorang penggemar JKT48 untuk menyajikan berbagai informasi terkait JKT48 melalui antarmuka web serta endpoint RESTful API.

Pada awalnya, proyek ini terinspirasi dari seorang senior saya yang mengembangkan aplikasi mobile dengan konsep serupa. Inspirasi tersebut mendorong saya untuk membangun sebuah aplikasi web yang tidak hanya memungkinkan pengguna menjelajahi konten JKT48 melalui browser, tetapi juga menyediakan API terstruktur yang dapat digunakan untuk pengembangan atau integrasi lebih lanjut.

Proyek ini masih dalam tahap pengembangan berkelanjutan. Masukan dan saran sangat diapresiasi untuk membantu meningkatkan fungsionalitas, performa, dan pengalaman pengguna secara keseluruhan. Mohon gunakan endpoint API yang disediakan dengan bijak.

### 🛠️ Tech Stack

* **⚙️ Backend:** Laravel 11
* **🗄️ Database:** MySQL
* **🎨 Frontend:** Blade Template, HTML, CSS
* **💅 Styling:** Tailwind CSS
* **🔐 Autentikasi:** Laravel Authentication
* **🔌 API:** RESTful API
* **🌱 Version Control:** Git & GitHub

### 🚀 Instalasi

1. Clone repository

```bash
git clone https://github.com/StarVinn/JKT48-Represented-Official-Website.git
```

2. Install dependency

```bash
composer install
```

3. Salin file environment

```bash
cp .env.example .env
```

4. Generate application key

```bash
php artisan key:generate
```

5. Jalankan migrasi dan seeder database

```bash
php artisan migrate --seed
```

6. Buat symbolic link untuk storage

```bash
php artisan storage:link
```

7. Jalankan development server

```bash
php artisan serve
```

### 🧭 Penggunaan

1. Buka web browser dan akses `http://127.0.0.1:8000/`
2. Lakukan registrasi dan login untuk mengakses sistem
3. Setelah login, Anda dapat melihat daftar member JKT48 serta konten terkait lainnya

### 🔗 API Endpoints

* `GET /api/members` – Mengambil daftar seluruh member JKT48
* `GET /api/setlists` – Mengambil daftar seluruh setlist JKT48
* `GET /api/setlists/{id}` – Mengambil detail setlist berdasarkan ID
* `GET /api/news` – Mengambil daftar berita JKT48
* `GET /api/showroom` – Mengambil daftar data showroom JKT48

### ⚠️ Disclaimer

Proyek ini merupakan **aplikasi fanmade dan tidak resmi**. Proyek ini **tidak berafiliasi, tidak didukung, dan tidak berhubungan dengan JKT48 Group maupun pihak manajemen terkait**. Seluruh konten digunakan untuk tujuan edukasi dan non-komersial.

### 💬 Pesan

API & Aplikasi Web ini merupakan bagian dari perjalanan pengembangan yang terus berlanjut. Pembaruan akan dilakukan secara berkala untuk memastikan proyek ini tetap relevan, andal, dan selaras dengan praktik pengembangan terbaik.

Terima kasih atas ketertarikan Anda terhadap proyek ini.