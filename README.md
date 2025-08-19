# Game Events Hub - Laravel MVC Website

A comprehensive event management system built with Laravel following the MVC design pattern. Users can create, view, and manage events with a robust approval system for administrators.

## 🎯 Project Overview

Game Events Hub is a web application that allows users to view and create events (football matches, concerts, fundraisers, etc.). Events require admin approval before being displayed publicly, ensuring quality control and content moderation.

## ✨ Features

### Core Functionality
- **Event Management**: Full CRUD operations for events
- **User Authentication**: Three-tier user system (Guest, Registered User, Admin)
- **Approval System**: Admin approval required for non-admin created events
- **Image Upload**: Event images with proper storage handling
- **Search & Filter**: Find events by title and location
- **Responsive Design**: Mobile-friendly interface

### User Levels
- **Guest Users**: View approved events only
- **Registered Users**: Create, edit, delete their own events
- **Admin Users**: Approve events, manage users, view all events

### Additional Features
- **Professional UI**: Modern glassmorphism design with Tailwind CSS
- **Dashboard Systems**: Separate dashboards for users and admins
- **User Management**: Admin can view and edit user details
- **Contact Page**: Basic contact form
- **Image Helper**: Centralized image handling with placeholders

## 🛠️ Technology Stack

- **Backend**: Laravel 12.x (PHP 8.4)
- **Frontend**: Blade Templates, Tailwind CSS
- **Database**: MySQL/SQLite
- **Authentication**: Laravel Breeze
- **File Storage**: Laravel Storage
- **Testing**: Pest PHP

## 📋 Requirements

- PHP 8.4 or higher
- Composer
- MySQL or SQLite
- Node.js & NPM (for asset compilation)

## 🚀 Installation

1. **Clone the repository**
   ```bash
   git clone <your-repository-url>
   cd game-events-hub
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configure database**
   Edit `.env` file and set your database credentials:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=game_events_db
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

6. **Run migrations and seed data**
   ```bash
   php artisan migrate:fresh --seed
   ```

7. **Create storage link**
   ```bash
   php artisan storage:link
   ```

8. **Compile assets**
   ```bash
   npm run build
   ```

9. **Start the development server**
   ```bash
   php artisan serve
   ```

## 👤 Default Users

After seeding, you can log in with:

**Admin User:**
- Email: `admin@example.com`
- Password: `password`

**Regular Users:**
- Multiple users are created with random credentials
- Check the seeder files for details

## 📁 Project Structure

```
game-events-hub/
├── app/
│   ├── Http/Controllers/
│   │   ├── EventController.php          # Main event CRUD
│   │   ├── UserController.php           # User dashboard
│   │   └── Admin/                       # Admin controllers
│   ├── Models/
│   │   ├── Event.php                    # Event model
│   │   └── User.php                     # User model
│   ├── Policies/
│   │   └── EventPolicy.php              # Authorization policies
│   └── Helpers/
│       └── ImageHelper.php              # Image handling
├── database/
│   ├── migrations/                      # Database schema
│   ├── seeders/                         # Sample data
│   └── factories/                       # Model factories
├── resources/views/
│   ├── events/                          # Event views
│   ├── admin/                           # Admin panel views
│   ├── user/                            # User dashboard views
│   └── layouts/                         # Layout templates
└── routes/
    └── web.php                          # Web routes
```

## 🧪 Testing

Run the test suite:
```bash
php artisan test
```

## 📝 Database Schema

### Users Table
- `id` (Primary Key)
- `name`
- `email`
- `password`
- `role` (user/admin)
- `email_verified_at`
- `remember_token`
- `created_at`, `updated_at`

### Events Table
- `id` (Primary Key)
- `user_id` (Foreign Key to Users)
- `title`
- `description`
- `date`
- `location`
- `image` (nullable)
- `capacity`
- `approved` (boolean)
- `created_at`, `updated_at`

## 🔐 Security Features

- **Authentication**: Laravel's built-in authentication system
- **Authorization**: Policy-based authorization for events
- **CSRF Protection**: Automatic CSRF token validation
- **Input Validation**: Server-side validation for all forms
- **File Upload Security**: Image validation and secure storage

## 🎨 Design Features

- **Responsive Design**: Mobile-first approach
- **Modern UI**: Glassmorphism effects and gradients
- **Professional Color Scheme**: Blue and slate color palette
- **Interactive Elements**: Hover effects and animations
- **Accessibility**: Proper semantic HTML and ARIA labels

## 📚 References & Resources

### Laravel Documentation
- [Laravel 12.x Documentation](https://laravel.com/docs/12.x)
- [Laravel Breeze](https://laravel.com/docs/12.x/starter-kits#laravel-breeze)
- [Laravel Policies](https://laravel.com/docs/12.x/authorization#creating-policies)

### Frontend Resources
- [Tailwind CSS Documentation](https://tailwindcss.com/docs)
- [Blade Templates](https://laravel.com/docs/12.x/blade)

### Tutorials & Guides
- [Laravel MVC Pattern](https://laravel.com/docs/12.x/architecture-concepts)
- [Laravel File Storage](https://laravel.com/docs/12.x/filesystem)
- [Laravel Testing](https://laravel.com/docs/12.x/testing)

### Stack Overflow References
- Image upload handling in Laravel
- Blade template best practices
- Laravel authorization patterns

## 🤝 Contributing

This is an academic project for Laravel MVC assessment. For educational purposes only.

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 👨‍💻 Author

Created as part of Laravel MVC assessment requirements.

---

**Note**: This project demonstrates proficiency in Laravel MVC development, database design, authentication systems, and modern web development practices.
