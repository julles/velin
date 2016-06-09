# Minimalist Admin Panel For Laravel 5

Velin adalah admin panel untuk laravel 5 , sudah include RBAC.

### Cara install

Clone Repo
```sh
git clone https://github.com/julles/velin.git
```
copy file .env.example dan rename menjadi .env , lalu setting  koneksi database di file .env

```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=namaDatabase
DB_USERNAME=namaUsername
DB_PASSWORD=password
```

lalu composer install sampai beres.

lalu jalan kan script artisan command berikut
``` sh 
php artisan velin:install
```

buka project di browser di url localhost:8000/login-page.

username : superadmin

password : superadmin

### Dokumentasi 

SOON!