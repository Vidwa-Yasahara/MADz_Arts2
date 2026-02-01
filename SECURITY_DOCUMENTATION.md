# Security Documentation and Implementation

This document outlines the security features, data protection measures, and authentication mechanisms implemented in the MADz Arts Laravel 12 application.

## 1. Authentication & Authorization

### Token-Based Authentication (Laravel Sanctum)
- The application implements **Laravel Sanctum** for secure, token-based authentication for its API.
- Users can authenticate via the `/api/login` endpoint to receive a Personal Access Token.
- All sensitive API endpoints are protected by the `auth:sanctum` middleware, ensuring only authenticated users can access data.
- Token revocation is handled via the `/api/logout` endpoint.

### Laravel Jetstream Authentication
- The web interface uses **Laravel Jetstream** and **Fortify** for robust session-based authentication.
- Authentication features include secure login, registration, and email verification.
- **Session Protection:** All web routes are protected by CSRF (Cross-Site Request Forgery) middleware.

### Role-Based Access Control (RBAC)
- Scalable role management is implemented via a custom `RoleMiddleware`.
- **Static Roles:** Currently supports `admin` and `user` roles stored in the `role` column of the `users` table.
- **Middleware Enforcement:** Routes under the `/admin` prefix are protected by the `role:admin` middleware, preventing unauthorized access to administrative functions.

## 2. Security & Data Protection

### Secure Storage (Hashing & Encryption)
- **Password Hashing:** All user passwords are securely hashed using the **Bcrypt** algorithm (via Laravel's `Hash` facade) before being stored in the database. Raw passwords are never stored.
- **Sensitive Information:** Personal details in the `user_details` table are protected through standard SQL security practices.
- **Application Key:** A 32-character AES-256 application key (`APP_KEY`) is used for all built-in encryption services (session data, cookies, etc.).

### Data sanitization & XSS Protection
- **Blade Templating:** The application uses Laravel's Blade engine, which automatically escapes all dynamic content using `{{ }}` to prevent Cross-Site Scripting (XSS) attacks.
- **Livewire Components:** All interactive components (Livewire/Volt) automatically escape data and handle secure data binding on the client side.

### SQL Injection Protection
- The application exclusively uses **Laravel's Eloquent ORM** and **Query Builder**, which utilize PDO parameter binding internally to protect against SQL injection vulnerabilities.

## 3. API Integration & Data Exposure

### Exposed Endpoints
The application exposes several RESTful API endpoints for data integration:
- `GET /api/artworks`: List all art items.
- `GET /api/artworks/{id}`: View specific artwork details.
- `GET /api/categories`: List all artwork categories.
- `GET /api/categories/{id}`: View category details and associated artworks.
- `GET /api/search?q={query}`: Search through the art collection.

All data is returned in **JSON format**, ensuring compatibility with external integrations.
