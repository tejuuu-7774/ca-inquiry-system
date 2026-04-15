# CA Inquiry System

## Overview

This project is a backend-focused web application built for a CA / Tax Consultancy firm. It allows users to submit inquiries through a public form and provides an admin panel to manage those inquiries efficiently.

The application demonstrates core PHP development skills including database handling, authentication, and CRUD operations.

---

## Features

### Public Side

* Inquiry form with fields:

  * Full Name
  * Email
  * Mobile
  * City
  * Service
  * Message
* Form validation
* Data stored in MySQL database
* Success feedback after submission

### Admin Panel

* Secure login with session-based authentication
* Password hashing using PHP `password_hash`
* Protected routes (unauthorized access restricted)

### Dashboard

* Displays:

  * Total inquiries
  * New inquiries
  * Contacted inquiries
  * Closed inquiries

### Inquiry Management

* View all inquiries in table format
* Search by name, email, or mobile
* Filter by status (new, contacted, closed)
* Update inquiry status
* Delete inquiries with confirmation

---

## Tech Stack

* PHP (Core PHP, no framework)
* MySQL
* PDO (Prepared Statements for secure queries)
* HTML, CSS (basic UI)

---

## Project Structure

```
ca-inquiry-system/
├── admin/
│   ├── dashboard.php
│   ├── delete-inquiry.php
│   ├── edit-inquiry.php
│   ├── inquiries.php
│   ├── login.php
│   ├── login_process.php
│   └── logout.php
├── assets/
│   └── style.css
├── config/
│   └── db.php
├── index.php
├── submit.php
├── test.php
```

---

## Database Setup

### Database Name

```
ca_system
```

### Tables

#### admins

* id
* name
* email
* password (hashed)
* created_at

#### inquiries

* id
* full_name
* email
* mobile
* city
* service
* message
* status (new, contacted, closed)
* created_at

---

## Admin Credentials

```
Email: admin@gmail.com
Password: admin123
```

---

## Setup Instructions

1. Install and start XAMPP (Apache and MySQL).
2. Place the project folder inside:

   ```
   /Applications/XAMPP/xamppfiles/htdocs/
   ```
3. Open phpMyAdmin:

   ```
   http://localhost/phpmyadmin
   ```
4. Create database:

   ```
   ca_system
   ```
5. Create required tables using provided SQL.
6. Start the project:

   * Public form:

     ```
     http://localhost/ca-inquiry-system/
     ```
   * Admin login:

     ```
     http://localhost/ca-inquiry-system/admin/login.php
     ```

---

## Notes

* All database interactions use prepared statements for security.
* Authentication is handled using PHP sessions.
* The project focuses on backend functionality with a simple, clean UI.

---
