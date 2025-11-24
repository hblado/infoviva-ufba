# infoviva-ufba

This repository contains the source code for InfoViva UFBA, a PHP 8.1 platform built using the Laravel framework, following UFBA’s technical requirements.

## Installing and running

There are two major ways to run `infoviva-ufba`. Via the terminal or through an Apache server.

### Getting the files

Download the project and navigate into the directory.
- If you are using the apache method, I recommend setting the new directory as the public default (changes can be made in `/etc/httpd/conf.d/php.conf`). Instead of `/var/www/html/` it would be something like `/var/www/html/infoviva-ufba/public` (See apache method).

```bash
git clone https://github.com/hblado/infoviva-ufba.git
```

```bash
cd infoviva-ufba
```

### Running on the terminal

Ignore the next steps if you are going to use an apache server.

Install PHP and node dependencies:
```bash
composer install --no-dev --optimize-autoloader
```

```bash
npm i
```

Now build the frontend assets:
```bash
npm run build
```

Copy the env files...
```bash
cp .env.example .env
```

...and generate a key for the artisan:
```bash
php artisan key:generate
```

Then run the Laravel development server:
```bash
php artisan serve
```

It should be running on `127.0.0.1:8000`.

### Apache method

#### Structure tree

There is a security concern here: Laravel must not be served directly from the project root, apache must point to the 'public' directory.
In the UFBA hosting environment, the required structure looks like this:

- `/home/username/infoviva.ufba.br/laravel_app/` for the entire laravel project (app, bootstrap, config, vendor and other folders and files like composer.json...)

- `/home/username/infoviva.ufba.br/public_html/` for all the contents of `/public` folder.

So, you're going to have 2 folders: `/laravel_app` will have the entire project **except the /public folder**, and `/public_html` will have everything that is inside of /public.

#### Assets locally built

You will need a terminal to run:
```bash
npm install
npm run build
```

This will generate a `/build` directory. Move it to `/public_html`.

#### Changing paths

Since we're working with another structure, access `/home/username/infoviva.ufba.br/public_html/index.php` on a text editor and change the line `require __DIR__.'/../vendor/autoload.php';` for:

```php
require __DIR__ . '/../laravel_app/vendor/autoload.php';
```

and change the `$app = require_once __DIR__.'/../bootstrap/app.php';` line for:

```php
$app = require_once __DIR__ . '/../laravel_app/bootstrap/app.php';
```

#### Environment file

Create a file inside `laravel_app/`

```bash
touch .env
```

Edit it. Minimal example:
```
APP_NAME=InfoViva
APP_ENV=production
APP_DEBUG=false
APP_URL=https://infoviva.ufba.br

LOG_CHANNEL=stack
LOG_LEVEL=warning

CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_CONNECTION=sync
FILESYSTEM_DISK=local
```

#### About permissions

It will need permission to write on these paths for cache and logging purposes (just `chmod -R 775` or `chmod -R 777` then).

- laravel_app/storage/
- laravel_app/bootstrap/cache/


