# Rafli Personal Portfolio Website

Website portfolio statis yang mudah di-hosting dan mudah dikelola menggunakan file JSON.

## Struktur File

```
rafli-personal-portofolio-website/
├── index.php              # Halaman utama
├── projects.php           # Halaman daftar proyek
├── project_detail.php     # Halaman detail proyek
├── assets/
│   ├── css/
│   │   └── style.css     # Styling website
│   └── js/
│       └── script.js     # JavaScript interaktif
├── includes/
│   ├── header.php        # Header HTML
│   └── footer.php        # Footer HTML
├── data/                  # Folder JSON data
│   ├── education.json    # Data pendidikan
│   ├── experience.json   # Data pengalaman
│   └── projects.json     # Data proyek
└── uploads/              # Folder untuk gambar proyek dan logo
```

## Cara Mengelola Data

### 1. Menambah/Edit Pendidikan (data/education.json)

```json
[
    {
        "degree": "Gelar Pendidikan",
        "institution": "Nama Institusi",
        "year": "2020 - 2022",
        "description": "Deskripsi singkat tentang pendidikan"
    }
]
```

### 2. Menambah/Edit Pengalaman (data/experience.json)

```json
[
    {
        "position": "Posisi Jabatan",
        "company": "Nama Perusahaan",
        "period": "2022 - Present",
        "description": "Deskripsi pekerjaan dan tanggung jawab"
    }
]
```

### 3. Menambah/Edit Proyek (data/projects.json)

```json
[
    {
        "title": "Judul Proyek",
        "description": "Deskripsi lengkap proyek",
        "image": "uploads/nama-gambar.jpg",
        "completion_date": "2023-12-15",
        "dataset": "Deskripsi dataset yang digunakan"
    }
]
```

## Cara Mengubah Informasi Hero & Contact

Edit langsung di file **index.php**:

### Hero Section (baris 38-46)
```php
<h1 class="hero-title">Rafli Damara</h1>
<h2 class="hero-subtitle">Data Scientist & Analyst</h2>
<p class="hero-description">Deskripsi singkat tentang Anda</p>
```

### Social Media Links (baris 53-61)
```php
<a href="mailto:email@example.com">...</a>
<a href="https://linkedin.com/in/username">...</a>
<a href="https://github.com/username">...</a>
```

### Contact Section (baris 145-161)
```php
<a href="mailto:rafli@example.com">rafli@example.com</a>
<a href="tel:+62812345678">+62 812-3456-789</a>
<p>Jakarta, Indonesia</p>
```

## Deployment

Website ini adalah PHP statis (tanpa database) sehingga sangat mudah di-hosting:

1. **Hosting PHP biasa**: Upload semua file ke server
2. **XAMPP/WAMP (lokal)**: Taruh di folder `htdocs`
3. **Shared Hosting**: Pastikan support PHP 7.4+

## Tips

- Gambar proyek disimpan di folder `uploads/`
- Format gambar yang disarankan: JPG atau PNG, max 500KB
- JSON harus valid, gunakan [JSONLint](https://jsonlint.com/) untuk validasi
- Untuk menambah data, cukup tambahkan object baru ke array JSON
- Urutan data di JSON akan menjadi urutan tampilan di website

## Teknologi

- PHP Native (tanpa framework)
- JSON untuk data storage
- CSS3 untuk styling
- Vanilla JavaScript untuk interaktivitas
- Font Awesome untuk icons
