This is a PHP 8.1 project as UFBA demands.

Download the project and get into the directory

```bash
git clone https://github.com/hblado/infoviva-ufba.git
```

```bash
cd infoviva-ufba
```

Install PHP and node dependencies:
```bash
composer install --no-dev --optimize-autoloader
```

```bash
npm i
```

Now build the npm:
```bash
npm run build
```

And run the artisan:
```bash
php artisan serve
```

It should be running on `127.0.0.1:8000`.

