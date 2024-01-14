# contact-manager

## Overview

Contacts Manager is a web application built with PHP and CodeIgniter that allows users to manage their contacts. It provides features for creating, editing, and deleting contacts, as well as user authentication.

## Live Demo

Visit the live demo: [Contacts Manager Demo](https://apps.1lybio.in/contacts-manager/)

Demo Credentials:

- Username: demo user
- Password: demouser123

## Features

- User Authentication: Users can log in with their credentials.
- Contact Management: Create, edit, and delete contacts.
- Pagination: Display contacts in a paginated manner.
- Bootstrap Styling: Responsive and user-friendly interface.

## Setup Instructions

Follow these instructions to set up the Contacts Manager locally:

1. **Clone the Repository:**

   ```bash
   git clone https://github.com/code-with-varun/contacts-manager.git
   ```

2. **Install Dependencies:**

   Navigate to the project folder and run Composer to install PHP dependencies.

composer install

3. **Environment Variables:**
   Create a .env file in the project root and set the following environment variables:

```bash
DB_HOSTNAME="your_database_host"
DB_PBK_USERNAME="your_database_username"
DB_PBK_DATABASE="your_database_name"
DB_PBK_PASSWORD="your_database_password"
```

4. **Database Setup:**
   Import the provided SQL files (Public/user.sql and contacts.sql) into your database.

Run the Application:
Start a local development server:

```bash
php -S localhost:8000 -t public
Open your browser and visit http://localhost:8000.
```

5. **Login:**
   Use the provided demo credentials or create a new account to log in.
