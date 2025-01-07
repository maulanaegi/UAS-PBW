# Book Management System

A web-based Book Management System dibuat dengan Laravel 10, memungkinkan users untuk manage dan mengorganize buku secara efisien.

# Anggota Kelompok
M. Shandy Agustian (220660121150)
Tito Purwana S (220660121003)
Muhamad Deni Ramdani (220660121068)
Rifqi Rahmatullah (220660121018)
Luthfi Firmansyah (220660121103)


## Features

- CRUD operasi untuk buku (Create, Read, Update, Delete)
- Responsive dan user-friendly interface
- memberikan notifikasi langsung untuk user feedback
- Indonesian language support menggunakan Laraindo package

## Tech Stack

- PHP 8.1+
- Laravel 10
- MySQL Database
- Bootstrap for styling
- Toastr for notifications
- Laraindo for Indonesian language support

## Prerequisites

- PHP >= 8.1
- Composer
- MySQL
- XAMPP/Web Server

## Installation

1. Clone the repository
```bash
git clone [your-repository-url]
```

2. Install dependencies
```bash
composer install
```

3. Copy the example environment file
```bash
cp .env.example .env
```

4. Configure your database settings in `.env`

5. Generate application key
```bash
php artisan key:generate
```

6. Run database migrations
```bash
php artisan migrate
```

7. Start the development server
```bash
php artisan serve
```

## Usage

Akses aplikasi di web browser:
- Homepage/Book List: `/books`
- Create new book: `/books/create`
- Edit book: `/books/{id}/edit`
- View book details: `/books/{id}`

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
