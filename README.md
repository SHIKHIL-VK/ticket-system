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

## 🗂️ Project Structure

