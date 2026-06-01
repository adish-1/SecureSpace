#  SecureSpace – Secure PHP Authentication & Private Notes System

SecureSpace is a full-stack web application built using **PHP and MySQL** that provides secure user authentication, account management, and a private notes workspace.  
It focuses on **security, user isolation, and real-world backend design principles**.

---

## Tech Stack

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)
![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)

---

## Features

- 🔐 Secure login and registration with bcrypt password hashing
- 🛡️ SQL injection prevention using prepared statements throughout
- 🗝️ Two-layer security — login password + separate access code
- 🚪 PHP session-based authentication on every protected page
- 🏠 Personal dashboard showing user details
- ⚙️ Full settings panel — change password, username, delete account, set access code
- 📝 Private notes workspace — create, view, search and delete notes
- 👤 All notes are user-scoped — users only ever see their own notes
- 🔑 Forget password recovery using access code
- 📱 Mobile responsive settings panel

---


## Live Demo
🌐 [adish.free.nf/auth/login](https://adish.free.nf/auth/login)

> Hosted on free.nf — Indexed and verified via Google Search Console
---

## Folder Structure

project/
├── database/
│   └── db.php
├── login/
│   └── index.html
├── authentication/
│   ├── auth.php
│   └── mess.php
├── create/
│   ├── index.html
│   ├── create.php
│   ├── create.js
│   ├── style.css
│   └── mess.php
├── forget/
│   ├── index.html
│   ├── forget.php
│   └── password.php
├── dash/
│   ├── home.php
│   ├── logout.php
│   ├── settings.php
│   ├── change.php
│   ├── delete.php
│   ├── username.php
│   ├── access.php
│   └── message.php
├── space/
│   ├── space.php
│   ├── create.html
│   ├── create.php
│   ├── read.php
│   └── mess.php
├── .gitignore
└── README.md

---

## Database Setup

Create a database called `auth` and run the following SQL:

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(100) NOT NULL,
    phno VARCHAR(15) NOT NULL,
    mail VARCHAR(100) NOT NULL,
    age INT NOT NULL,
    acc_code VARCHAR(255)
);

CREATE TABLE notes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    content TEXT NOT NULL,
    username VARCHAR(100) NOT NULL
);
```

---

## Installation

1. Clone the repository
```bash
git clone https://github.com/adish-1/securespace.git
```
2. Move the project folder into your server root
   - XAMPP → `htdocs/`
   - WAMP → `www/`

3. Open phpMyAdmin, create a database called `auth` and run the SQL above

4. Create `database/db.php` and add your credentials
```php
<?php
$host="localhost";
$user="root";
$pass="";
$db="auth";
$conn=mysqli_connect($host,$user,$pass,$db);
if(!$conn)
{
    die("<h3>connection failed</h3>");
}
?>
```
5. Open your browser and go to

http://localhost/project/login/index.html

---

## How It Works
Register → Login → Dashboard → Space (Notes) or Settings

- Register on the create account page
- Login with your username and password
- Dashboard shows your name, age and account status
- Go to **Space** to create and manage your personal notes
- Go to **Settings** to manage your account
- Use **Forget Password** with your access code to recover your account

---

## Security

| Feature | Implementation |
|---|---|
| Password Hashing | `password_hash()` with `PASSWORD_DEFAULT` (bcrypt) |
| Access Code | Separately hashed with bcrypt, stored in `acc_code` column |
| SQL Injection | All queries use `mysqli_prepare()` and `mysqli_stmt_bind_param()` |
| Session Guard | Every protected page checks `$_SESSION['username']` before rendering |
| Logout | `session_destroy()` clears session on logout and password reset |

---

##  Known Limitations

- Notes editing not implemented yet  
- Suggestion box UI not connected to backend  
- No API layer yet (PHP monolith)  

---

## 🚀 Future Improvements

- Edit notes feature  
- Email OTP password recovery  
- UI upgrade using Bootstrap / Tailwind CSS  
- REST API version for mobile/web apps  

## Developer

Made by Adish
📧 adishjagano@gmail.com
🔗 [github.com/adish-1](https://github.com/adish-1)
