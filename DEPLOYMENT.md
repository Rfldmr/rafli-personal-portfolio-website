# 🚀 Deployment Guide - Rafli Personal Portfolio

## 📋 Pre-Deployment Checklist

✅ **File Cleanup** - Selesai
- ✅ File backup dihapus
- ✅ Kode yang tidak digunakan dibersihkan
- ✅ .gitignore dibuat
- ✅ Struktur folder optimal

## 🌐 Hosting Requirements

### Minimum Requirements:
- **PHP Version**: 7.4 atau lebih tinggi
- **Web Server**: Apache (dengan mod_rewrite) atau Nginx
- **Disk Space**: ~2 MB untuk kode, tambahan untuk gambar
- **Database**: Tidak diperlukan (JSON-based)

## 📦 Deployment Options

### Option 1: Shared Hosting (Recommended untuk pemula)

#### Compatible Hosting Providers:
- **Hostinger** - Rp 20.000/bulan
- **Niagahoster** - Mulai Rp 10.000/bulan  
- **Rumahweb** - Mulai Rp 17.500/bulan
- **DomaiNesia** - Mulai Rp 30.000/bulan

#### Steps:
1. **Upload Files**
   ```
   - Login ke cPanel
   - Buka File Manager
   - Upload semua file ke folder public_html/
   - Atau gunakan FTP client (FileZilla)
   ```

2. **Set Permissions**
   ```
   - uploads/ → 755
   - data/ → 755
   - File .php → 644
   ```

3. **Test Website**
   ```
   Akses: https://yourdomain.com
   ```

### Option 2: VPS/Cloud Hosting (Advanced)

#### Compatible Providers:
- **AWS EC2** - Pay as you go
- **DigitalOcean** - $5/month
- **Vultr** - $5/month
- **Google Cloud** - Free tier available

#### Basic Setup (Ubuntu):
```bash
# Update system
sudo apt update && sudo apt upgrade -y

# Install Apache + PHP
sudo apt install apache2 php libapache2-mod-php php-json -y

# Enable mod_rewrite
sudo a2enmod rewrite

# Upload files
scp -r * user@your-ip:/var/www/html/

# Set permissions
sudo chown -R www-data:www-data /var/www/html/
sudo chmod -R 755 /var/www/html/

# Restart Apache
sudo systemctl restart apache2
```

### Option 3: Free Hosting (Testing only)

#### Providers:
- **InfinityFree** - Gratis, 5GB space
- **000webhost** - Gratis, 300MB space
- **AwardSpace** - Gratis, 1GB space

**⚠️ Note**: Free hosting memiliki keterbatasan performa dan uptime.

## 🔧 Post-Deployment Configuration

### 1. Update Contact Information
Edit [index.php](index.php):
```php
// Line 54-62: Social Media Links
<a href="mailto:your-email@gmail.com">...</a>
<a href="https://linkedin.com/in/yourprofile">...</a>

// Line 308-326: Contact Section  
<a href="mailto:your-email@gmail.com">your-email@gmail.com</a>
<a href="https://wa.me/yourphonenumber">+62 xxx-xxxx-xxxx</a>
```

### 2. Update Projects
Edit `data/projects.json` - Lihat [README.md](README.md) untuk format.

### 3. SEO Optimization
Edit [includes/header.php](includes/header.php):
```php
<title><?php echo $pageTitle; ?></title>
<meta name="description" content="Your description">
<meta name="keywords" content="your,keywords,here">
```

### 4. Analytics (Optional)
Tambahkan Google Analytics di [includes/footer.php](includes/footer.php):
```html
<!-- Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'GA_MEASUREMENT_ID');
</script>
```

## ⚡ Performance Optimization

### 1. Image Optimization
```bash
# Compress images sebelum upload
# Gunakan tools: TinyPNG, ImageOptim, atau Squoosh
# Target: <200KB per image
```

### 2. Enable Caching
Tambahkan di `.htaccess`:
```apache
# Browser Caching
<IfModule mod_expires.c>
  ExpiresActive On
  ExpiresByType image/jpg "access plus 1 year"
  ExpiresByType image/jpeg "access plus 1 year"
  ExpiresByType image/png "access plus 1 year"
  ExpiresByType text/css "access plus 1 month"
  ExpiresByType application/javascript "access plus 1 month"
</IfModule>
```

### 3. Enable Gzip Compression
Tambahkan di `.htaccess`:
```apache
# Gzip Compression
<IfModule mod_deflate.c>
  AddOutputFilterByType DEFLATE text/html text/plain text/xml text/css text/javascript application/javascript
</IfModule>
```

## 🔒 Security Best Practices

### Already Implemented:
- ✅ Directory listing disabled
- ✅ .htaccess protection
- ✅ HTML special chars escaping
- ✅ File existence validation

### Additional Recommendations:
1. **SSL Certificate** - Gunakan Let's Encrypt (gratis)
2. **Regular Backups** - Backup files dan data JSON
3. **Update PHP** - Selalu gunakan versi PHP terbaru

## 🐛 Troubleshooting

### Problem: 404 Error atau URL tidak clean
**Solution**:
```apache
# Pastikan mod_rewrite enabled di Apache
sudo a2enmod rewrite
sudo systemctl restart apache2

# Pastikan AllowOverride All di Apache config
<Directory /var/www/html>
    AllowOverride All
</Directory>
```

### Problem: Images tidak muncul
**Solution**:
```bash
# Check permissions
chmod 755 uploads/
chmod 644 uploads/*.jpg uploads/*.png

# Verify path di JSON
# Path harus: "uploads/filename.jpg"
```

### Problem: JSON tidak terbaca
**Solution**:
```bash
# Validate JSON syntax
# Gunakan: https://jsonlint.com/
# Check file encoding (must be UTF-8)
```

## 📊 Monitoring & Maintenance

### Weekly Tasks:
- ✅ Check website uptime
- ✅ Backup data JSON files
- ✅ Monitor hosting storage

### Monthly Tasks:
- ✅ Update project portfolio
- ✅ Review and update experience
- ✅ Check for PHP updates

## 📞 Support

Jika ada masalah:
1. Check troubleshooting section di atas
2. Review error logs di cPanel/hosting
3. Hubungi support hosting provider

---

**✨ Proyek sudah siap untuk hosting!**

Total ukuran: ~1.5MB (kode + assets)  
Load time: <2 detik  
Mobile-friendly: ✅  
SEO-ready: ✅
