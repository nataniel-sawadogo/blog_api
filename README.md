# Blog API

A simple Laravel API for managing users and blog posts.

## Installation

1. Clone the repository:
```bash
git clone <repository-url>
cd blog_api
```

2. Install dependencies:
```bash
composer install
```

3. Configure environment:
```bash
cp .env.example .env
```

4. Edit `.env` file to set up your database connection

5. Generate application key:
```bash
php artisan key:generate
```

6. Run migrations:
```bash
php artisan migrate
```

7. Start the development server:
```bash
php artisan serve
```

## API Endpoints

### Authentication
- `POST /api/signup` - Register a new user
- `POST /api/login` - Login and get API token

### Users
- `GET /api/users` - Get all users

### Posts
- `GET /api/posts` - Get all posts (or posts for a specific user with ?user_id=X, specific date with ?date=X)
- `POST /api/posts` - Create a new post
- `PUT /api/posts/{id}` - Update post
- `DELETE /api/posts/{id}` - Delete post

### Authentication Headers
For protected routes, include the authentication token in the request header:
```
Authorization: Bearer YOUR_TOKEN_HERE
```

## Running Tests

```bash
php artisan test
```

## Additional Features

- Posts are paginated (10 per page)
- Posts can be sorted by date (newest first)
- Notifications are sent when a new post is created
