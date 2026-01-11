# Mini Ticketing System (API-Based)

This project is a RESTful API built using **Laravel** as part of a technical assignment for the PHP Laravel Developer position at Trizion.

The application allows users to create support tickets, add replies, and manage ticket statuses with proper authentication and role-based access control using **Laravel Sanctum**.

---

## 🚀 Features

### Authentication
- User registration
- User login & logout
- Token-based authentication using Laravel Sanctum

### Ticket Management
- Create support tickets
- Update tickets
- Close tickets
- List tickets (user-specific)

### Replies
- Users can reply to their own tickets
- Admins can reply to any ticket
- Replies are restricted for closed tickets

### Admin Capabilities
- View all tickets
- Update ticket status (`open`, `in_progress`, `closed`)
- Admin routes protected using middleware

---

## 🧱 Tech Stack

- PHP 8+
- Laravel 11
- Laravel Sanctum
- MySQL
- RESTful APIs (JSON)

---


---

## 🔐 Authentication

This API uses **Laravel Sanctum** for authentication.

All protected endpoints require the following header:




---

## 📡 API Endpoints

### Authentication
| Method | Endpoint | Description |
|------|---------|------------|
| POST | /api/register | Register a new user |
| POST | /api/login | Login user |
| POST | /api/logout | Logout user |

### Tickets (User)
| Method | Endpoint | Description |
|------|---------|------------|
| GET | /api/tickets | List user tickets |
| POST | /api/tickets | Create a ticket |
| PUT | /api/tickets/{id} | Update ticket |
| PATCH | /api/tickets/{id}/close | Close ticket |

### Replies
| Method | Endpoint | Description |
|------|---------|------------|
| POST | /api/tickets/{id}/replies | Add reply to ticket |

### Admin
| Method | Endpoint | Description |
|------|---------|------------|
| GET | /api/admin/tickets | List all tickets |
| PATCH | /api/admin/tickets/{id}/status | Update ticket status |

---

## 🧪 Validation & Error Handling

- Request validation is handled using **Form Request classes**
- Business logic is separated into **Service classes**
- Consistent JSON responses for both success and error cases
- Role-based access enforced at middleware and service layers

---

## 🛠️ Setup Instructions

```bash
git clone https://github.com/SHIKHIL-VK/ticket-system.git
cd ticket-system
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve


