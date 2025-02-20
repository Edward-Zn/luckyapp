# Lucky APP

### Clone the Repository
```sh
git clone <repository-url>
cd <project-folder>
```
### Install Dependencies
```sh
composer install
```

### Set Up Environment Variables
Copy the .env.example file to .env and configure your environment:
```sh
cp .env.example .env
```
Then, generate the application key:
```sh
php artisan key:generate
```
### Configure Database
Since SQLite is required, create an SQLite database file:

```sh
touch database/database.sqlite
```

Run migrations to set up database tables:

```sh
php artisan migrate
```

### Start the Application
Run the local development server:

```sh
php artisan serve
```

### Caching & Queue Configuration
To use file-based cache and sync queues, update .env:
```ini
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
```
If you prefer Redis or Memcached, make sure to configure docker-compose.yaml

### 🛠 Features
- User Registration: Username & phone number with a unique link.
- Page A: Regenerate, deactivate links, and "I'm Feeling Lucky" button.
- Automatic Expiration: Links expire after 7 days.
