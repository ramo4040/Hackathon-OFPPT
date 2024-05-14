# Simple PHP User Authentication System

This project demonstrates a basic user authentication system implemented in native PHP, utilizing a simple router and a service container for dependency management. 

## Features:

* **Registration:** Users can create new accounts with unique usernames and passwords.
* **Login:** Registered users can log in using their credentials.
* **Logout:** Logged in users can log out securely.
* **Dashboard:** A protected area accessible only to authenticated users.
* **Password Hashing:**  Passwords are securely stored using bcrypt hashing.
* **Basic Routing:** Implements a simple router to handle URL requests.
* **Service Container:** Utilizes a service container to manage dependencies and improve code organization.

## Requirements:

* PHP 7.4 or higher
* Web server (e.g., Apache, Nginx)
* MySQL database
* Basic understanding of PHP

## Installation:

1. Clone this repository to your web server directory.
2. Create a MySQL database and configure the database credentials in `config.php`.

## Usage:

1. Access the application through your web browser (e.g., `http://localhost/hackathon/`).
2. You will be presented with the login page.
3. To register a new account, click on the "Register" link.
4. Once registered and logged in, you will be redirected to the dashboard.

## File Structure:

* **index.php:**  The main entry point of the application.
* **config.php:**  Contains database configuration and other settings.
* **router.php:**  Implements the routing logic.
* **Container.php:** Defines the service container.
* **controllers/**  Contains the controllers (AuthController, DashboardController).
* **models/**  Contains the data models (User.php).
* **views/**  Holds the HTML templates for the user interface.

## Endpoints:

| HTTP Method | Endpoint | Controller Action | Description |
|---|---|---|---|
| GET | /register | AuthController::showSignupForm | Displays the registration form. |
| POST | /register | AuthController::register | Processes the registration form submission. |
| GET | /login | AuthController::showLoginForm | Displays the login form. |
| POST | /login | AuthController::login | Processes the login form submission. |
| GET | /dashboard | DashboardController::index | Displays the protected dashboard (requires authentication). |
| GET | /logout | AuthController::logOut | Logs the user out. |


## Security Considerations:

* **Password Hashing:** Passwords are hashed using bcrypt, a strong one-way hashing algorithm.
* **Password Salt**
* **Input Validation:**  The project includes basic input validation, but always validate and sanitize user input thoroughly to prevent common security vulnerabilities like SQL injection and cross-site scripting (XSS).
* **Session Management:**  The provided code includes session management; however, ensure you implement secure session management practices to protect user data further.

## Contributions:

Contributions to this project are welcome! Feel free to submit issues, fork the repository, and propose improvements.

## License:

This project is open-source and available under the [MIT License](LICENSE).
