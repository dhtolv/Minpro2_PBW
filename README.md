# Mini Project Pemrogram Berbasis Web

> Dhita Olivia Ramadhayanti Kusuma

> 2409116040

> Sistem Informasi A'2024

---

## 📌Deskripsi Website Portofolio 

Mini Project ini merupakan website portofolio sederhana yang dikembangkan dari versi statis menjadi dinamis dengan menggunakan PHP dan database MySQL. Website portofolio ini menampilkan informasi pribadi, pengalaman, skills, dan sertifikat. 

---

## 💻Tampilan Website 

<img width="1920" height="1020" alt="image" src="https://github.com/user-attachments/assets/9f9da15d-804c-4422-a63f-e670847860e6" />

<img width="1920" height="1020" alt="image" src="https://github.com/user-attachments/assets/be90f5b7-1162-4a11-b74a-efbec2434cf2" />

<img width="1920" height="1020" alt="image" src="https://github.com/user-attachments/assets/4c352391-861b-4469-936e-74a79c1f1029" />

---

## 🛠️Teknologi yang Digunakan

| Teknologi | Fungsi |
|-----------|--------|
| HTML | Struktur halaman website |
| CSS | Styling dan tampilan visual |
| Bootstrap 5 | Framework responsive & komponen UI |
| PHP | Backend & koneksi database |
| MySQL | Penyimpanan Data |

---

## 🗄️Penjelasan Database 

Website ini menggunakan database **portofolio_db** yang terdiri dari beberapa tabel berikut:

### 1. Tabel `profile` — menyimpan informasi utama

| Field         | Tipe Data | Keterangan         |
| ------------- | --------- | ------------------ |
| id            | INT       | Primary Key        |
| name          | VARCHAR   | Nama               |
| tagline       | VARCHAR   | Tagline            |
| intro         | TEXT      | Deskripsi hero     |
| about_text    | TEXT      | Deskripsi about    |
| profile_image | VARCHAR   | Path gambar profil |

### 2. Tabel `skills` — menyimpan daftar skill 

| Field       | Tipe Data | Keterangan  |
| ----------- | --------- | ----------- |
| id          | INT       | Primary Key |
| skill_name  | VARCHAR   | Nama skill  |
| skill_level | INT       | Level (%)   |

### 📌 3. Tabel `experiences` — menyimpan data pengalaman organisasi atau kegiatan

| Field | Tipe Data | Keterangan       |
| ----- | --------- | ---------------- |
| id    | INT       | Primary Key      |
| title | VARCHAR   | Judul pengalaman |
| role  | VARCHAR   | Posisi           |
| year  | VARCHAR   | Tahun            |

### 📌 4. Tabel `certificates` — menyimpan data sertifikat

| Field       | Tipe Data | Keterangan             |
| ----------- | --------- | ---------------------- |
| id          | INT       | Primary Key            |
| title       | VARCHAR   | Judul sertifikat       |
| issuer      | VARCHAR   | Penerbit               |
| year        | VARCHAR   | Tahun                  |
| description | TEXT      | Deskripsi              |
| image_path  | VARCHAR   | Path gambar sertifikat |

---

## 🧾Penjelasan Kode 

<details>
  <summary>Navbar</summary>

Narbar berfungsi untuk navigasi ke setiap section

Fungsi : 
- Mempermudah perpindahan antar halaman (scroll ke section)
- Menampilkan nama sebagai identitas

### PHP
```php
<nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow custom-navbar">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#home">
        <?php echo htmlspecialchars($profile['name']); ?>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#about">About Me</a></li>
          <li class="nav-item"><a class="nav-link" href="#certificates">Certificates</a></li>
        </ul>
      </div>
    </div>
  </nav>
```

### CSS 
```css
.custom-navbar {
  background: var(--denim);
}

.custom-navbar .navbar-brand {
  color: #ffffff;
  font-weight: 600;
}

.custom-navbar .nav-link {
  color: rgba(255,255,255,0.8);
  transition: 0.3s;
}

.custom-navbar .nav-link:hover {
  color: #ffffff;
}
```

</details>

---

<details>
  <summary>Hero</summary>

Hero menampilkan informasi utama seperti nama, tagline, deskripsi, dan foto profil.

Fungsi:
- Memberikan first impression
- Menampilkan identitas utama

### PHP
```php
  <section id="home" class="vh-100 d-flex align-items-center bg-light">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <h1 class="fw-bold display-4 hero-title">
            Hi!
            <br>
            <span class="hero-name">I'm <?php echo htmlspecialchars($profile['name']); ?></span>
          </h1>

          <p class="lead mt-3">
            <?php echo htmlspecialchars($profile['tagline']); ?>
          </p>

          <p class="text-muted">
            <?php echo htmlspecialchars($profile['intro']); ?>
          </p>

          <a href="#about" class="btn hero-btn mt-3">Explore More</a>
        </div>

        <div class="col-md-6 text-center">
          <div class="image-wrapper">
            <img src="<?php echo htmlspecialchars($profile['profile_image']); ?>" class="img-fluid hero-img" alt="Profile">
          </div>
        </div>
      </div>
    </div>
  </section>
```

### CSS
```css
.hero-img {
  max-width: 350px;
  border-radius: 20px;
  position: relative;
  z-index: 2;
}

.hero-title {
  line-height: 1.2;
}

.hero-name {
  color: var(--denim);
  font-weight: 700;
}

.hero-btn {
  background-color: var(--denim);
  color: #ffffff;
  padding: 10px 22px;
  border-radius: 8px;
  font-weight: 500;
  transition: all 0.3s ease;
}

.hero-btn:hover {
  background-color: #4f739b;
  color: #ffffff;
  transform: translateY(-2px);
  box-shadow: 0 6px 14px rgba(0,0,0,0.15);
}
```

</details>

---

<details>
  <summary>About</summary>

Berisi deskripsi singkat profil

### PHP
```php
<section id="about" class="about-section py-5">
    <div class="container">
      <div class="about-title text-center mb-4">
        <h2 class="fw-bold mb-0">About Me 𐀪⭑.ᐟ</h2>
      </div>

      <div class="row g-4 align-items-stretch">
        <div class="col-lg-7">
          <div class="about-card about-card-denim p-4 p-lg-5 mb-4">
            <h4 class="fw-bold mb-3">Tentang Saya</h4>
            <p class="mb-0 about-text">
              <?php echo htmlspecialchars($profile['about_text']); ?>
            </p>
          </div>

          <div class="about-card about-card-seashell p-4 p-lg-5">
            <h4 class="fw-bold text-center mb-4">Skills</h4>
```

### CSS 
```css
.about-section {
  background: #ffffff;
}

.about-title {
  background: rgba(94, 131, 174, 0.45);
  border-radius: 10px;
  padding: 10px 14px;
}

.about-card {
  border-radius: 14px;
  border: 1px solid rgba(0, 0, 0, 0.06);
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.06);
}

.about-card-denim {
  background: var(--denim);
  color: #ffffff;
}

.about-card-seashell {
  background: var(--seashell);
  color: var(--obsidian);
}

.about-text {
  line-height: 1.9;
  font-size: 0.98rem;
}

```
</details>

---

<details>
  <summary>Skills / Pengalaman</summary>

Berisi menampilkan skill dan pengalaman dalam bentuk badge/card dan timeline

### PHP
```php
<?php while ($skill = mysqli_fetch_assoc($skillsQuery)) : ?>
              <div class="mb-3">
                <div class="d-flex justify-content-between small fw-semibold">
                  <span><?php echo htmlspecialchars($skill['skill_name']); ?></span>
                  <span><?php echo (int)$skill['skill_level']; ?>%</span>
                </div>

                <div class="progress about-progress mt-2">
                  <div
                    class="progress-bar about-progress-bar"
                    style="width: <?php echo (int)$skill['skill_level']; ?>%;"
                  ></div>
                </div>
              </div>
            <?php endwhile; ?>
```

### CSS
```css
.about-progress {
  height: 10px;
  background: rgba(42, 42, 42, 0.15);
  border-radius: 999px;
  overflow: hidden;
}

.about-progress-bar {
  background: var(--denim);
  border-radius: 999px;
  transition: width 0.6s ease;
}

.timeline::before {
  content: "";
  position: absolute;
  left: 10px;
  top: 10px;
  bottom: 0;
  width: 2px;
  background: rgba(94, 131, 174, 0.6);
}

.timeline-item {
  display: grid;
  grid-template-columns: 18px 1fr;
  gap: 14px;
  margin-bottom: 20px;
}

.timeline-dot {
  width: 12px;
  height: 12px;
  margin-top: 6px;
  border-radius: 50%;
  background: var(--pinkdot);
  box-shadow: 0 0 0 4px rgba(217, 165, 181, 0.25);
}
```
</details>

---

<details>
  <summary>Certificates</summary>

Berisi menampilkan daftar sertifikat

### PHP
```php
<section id="certificates" class="py-5 bg-light">
    <div class="container">
      <div class="about-title text-center mb-4">
        <h2 class="fw-bold mb-0">CERTIFICATES</h2>
      </div>

      <p class="text-center text-muted mb-5">
        Beberapa sertifikat keikutsertaan saya dalam berbagai kegiatan
      </p>

      <div class="row g-4 cert-grid">
        <?php while ($cert = mysqli_fetch_assoc($certificatesQuery)) : ?>
          <div class="col-12 col-md-6 col-lg-4 d-flex">
            <div
              class="cert-tile shadow-sm w-100"
              role="button"
              data-bs-toggle="modal"
              data-bs-target="#certModal<?php echo $cert['id']; ?>"
            >
              <img
                src="<?php echo htmlspecialchars($cert['image_path']); ?>"
                class="cert-img"
                alt="<?php echo htmlspecialchars($cert['title']); ?>"
              >
            </div>
          </div>
```

### CSS
```css
.cert-tile {
  border-radius: 18px;
  overflow: hidden;
  background: #ffffff;
  cursor: pointer;
  transition: transform 0.25s ease, box-shadow 0.25s ease;

  width: 100%;
  padding: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.cert-tile:hover {
  transform: translateY(-6px);
  box-shadow: 0 12px 24px rgba(0, 0, 0, 0.12);
}

.cert-img {
  width: 100%;
  aspect-ratio: 4 / 3;
  object-fit: contain;
  background: #ffffff;
  display: block;
}
```
</details>
