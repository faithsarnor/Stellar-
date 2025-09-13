# Stellar — E-commerce Web App

Modern e-commerce UI built with **PHP (Apache)**, **JavaScript**, **CSS Grid/Flexbox**, and **MySQL**.  
Focus: responsive UI, cart flow, secure data access, and a reproducible dev setup.


## Features
- Responsive product grid & detail pages
- Add/remove cart flow and checkout stub
- Modular PHP layout (`header.php`, `footer.php`) + CSS/JS assets
- SQL schema (`database.sql`) with a simple data access layer

## Tech Stack
PHP · JavaScript · HTML/CSS (Grid/Flexbox) · MySQL · Docker · GitHub Actions · CodeQL

## Architecture

### Top-level files
| Path | Purpose |
|---|---|
| `index.php` | Entry page |
| `products.php` | Product listing |
| `product_details.php` | Product detail view |
| `cart.php` | Cart UI/logic |
| `checkout.php` | Checkout stub |
| `category.php` | Category filter page |
| `about.html`, `faq.html` | Static pages |
| `header.php`, `footer.php` | Reusable layout includes |
| `database.php` | DB connection via PDO (reads env vars if present) |
| `database.sql` | MySQL schema |
| `main.css` | Global styles (Grid/Flexbox) |
| `app.js` | Front-end JS (renamed from `java1.js`) |

### Directories
| Dir | Purpose |
|---|---|
| `img/` | Images & assets |
| `glam/` | Extra assets (project-specific) |
| `Log/` | Non-sensitive logs |
| `docs/` | README screenshots/docs |

**Flow:** pages include `header.php`/`footer.php`; DB access is centralized in `database.php`; UI is `main.css` + `app.js`; schema lives in `database.sql`.  
**Conventions:** use prepared statements; keep secrets in `.env` (gitignored).


## Quickstart
1. Install PHP 8 and MySQL (e.g., MAMP/XAMPP or Homebrew).
2. Create a database named `stellar` and import `database.sql`.
3. Copy `.env.example` to `.env` and set DB creds if needed.
4. From the project root, start a PHP dev server:
   php -S localhost:8080
5. Open http://localhost:8080 in your browser.
