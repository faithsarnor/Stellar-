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

├── index.php                 # Entry page
├── products.php              # Product listing
├── product_details.php       # Product detail view
├── cart.php                  # Cart UI/logic
├── checkout.php              # Checkout stub
├── category.php              # Category filter page
├── about.html | faq.html     # Static pages
├── header.php | footer.php   # Reusable layout includes
├── database.php              # DB connection (env-aware)
├── database.sql              # MySQL schema
├── main.css                  # Global styles (Grid/Flexbox)
├── app.js                    # Front-end JS (rename from java1.js if not yet)
├── img/                      # Images/assets
├── glam/                     # Extra assets
├── Log/                      # Logs (non-sensitive)
└── docs/                     # README screenshots/docs


## Quickstart
1. Install PHP 8 and MySQL (e.g., MAMP/XAMPP or Homebrew).
2. Create a database named `stellar` and import `database.sql`.
3. Copy `.env.example` to `.env` and set DB creds if needed.
4. From the project root, start a PHP dev server:
   php -S localhost:8080
5. Open http://localhost:8080 in your browser.

Flow: pages include header.php/footer.php; DB access via database.php (PDO); UI via main.css + app.js; schema lives in database.sql.

Conventions: use prepared statements in database.php; keep secrets in .env (gitignored); assets in /img & CSS/JS at root (can move to /assets later).