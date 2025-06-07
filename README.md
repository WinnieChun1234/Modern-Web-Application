# Music Store E-Commerce Platform

A full-stack e-commerce web application for a music store built with PHP and MySQL, featuring comprehensive shopping functionality and user account management.

## Features

### User Experience
- Product browsing with advanced filtering options
- Shopping cart with session persistence
- User registration and authentication
- Account management and order history
- Secure checkout process
- Responsive design for all devices

### Technical Implementation
- Secure login/registration system
- Session-based shopping cart
- MySQL database integration
- Dynamic product filtering
- Order processing and tracking
- Invoice generation

## File Structure

### Core Files
- `index.php` - Main product listing and store homepage
- `cart_page.php` - Shopping cart display and management
- `checkout_page.php` - Order processing and payment
- `login.php` / `create_account.php` - User authentication
- `MusicInfo.php` - Product information handling

### Cart Functionality
- `AddToCart.php` - Add products to shopping cart
- `cart_function.php` - Cart management utilities
- `checkId.php` - Product validation

### User Management
- `create.php` - User registration processing
- `verifyLogin.php` - Authentication verification
- `logout.php` - Session termination

### System Components
- `config.php` - Database configuration
- `header.php` - Common page elements
- `invoice.php` - Order receipt generation

## Technology Stack

- **Frontend**: HTML5, CSS3, JavaScript
- **Backend**: PHP
- **Database**: MySQL
- **Session Management**: PHP Sessions
- **Styling**: Custom CSS with responsive design

## Installation

1. Clone the repository
2. Import the database schema from `database.sql`
3. Configure database connection in `config.php`
4. Deploy to a PHP-enabled web server

## Security Features

- Password hashing for user credentials
- Input validation and sanitization
- Protection against SQL injection attacks
- Secure session management

