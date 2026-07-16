# School CMS

A web-based content management system for schools to manage their official website. Built with Laravel 12 + Filament 5.

## Requirements

- PHP 8.3+
- MySQL/MariaDB or SQLite
- Node.js 18+
- Composer

## Quick Setup

```bash
# Clone the repo
git clone <repo-url>
cd School-CMS

# Install PHP dependencies
composer install

# Setup environment
cp .env.example .env
php artisan key:generate

# Configure database in .env (SQLite works out of the box)
# For MySQL, set DB_CONNECTION=mysql and fill in DB_DATABASE, DB_USERNAME, DB_PASSWORD

# Run migrations and seed
php artisan migrate --seed

# Install frontend dependencies and build
npm install
npm run build

# Publish vendor assets (Filament, Livewire, etc.)
php artisan vendor:publish --all

# Start the dev server
php artisan serve
```

Admin panel: `http://localhost:8000/admin`
Login: `admin@schoolcms.test` / `password`

## Development

Run all services concurrently:

```bash
composer dev
```

This starts: Laravel server, queue worker, log viewer (Pail), and Vite dev server.

## Tech Stack

| Layer | Technology |
|-------|-----------|
| Backend | Laravel 12, PHP 8.3 |
| Admin Panel | Filament 5 |
| Frontend | Blade, Tailwind CSS 4, Alpine.js 3 |
| Database | SQLite (dev) / MySQL (prod) |
| Build | Vite 7 |
| Auth & Roles | Spatie Permission + Filament Shield |

## Project Structure

```
app/
  Actions/        # Business logic actions
  Enums/          # Status and type enums
  Filament/       # Admin panel resources, widgets
  Http/           # Public-facing controllers
  Listeners/      # Event listeners
  Models/         # 20 Eloquent models
  Policies/       # Authorization policies
  Services/       # Helper services
  Traits/         # Shared traits (HasSlug, HasStatus)
```

## License

MIT
