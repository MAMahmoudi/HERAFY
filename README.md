# HERAFY (حرفي)

HERAFY is a website for Algeria that brings together **customers** looking for a craftsman, **craftsmen** showing their work, and **companies** promoting their products to craftsmen.

- [Features](#features)
- [Getting started](#getting-started)
- [Configuration](#configuration)
- [Project structure](#project-structure)
- [Tests](#tests)
- [Design notes](#1-who-is-this-website-for)

## Features

| Visitor | What they can do |
| --- | --- |
| Customer (no account) | Search craftsmen by craft, city or keyword (with auto complete on the home page), open a craftsman profile, call or e-mail them, browse company pages, send a message with *Contact us* |
| Craftsman | Register / log in, fill a profile (craft, city, phone, bio, photo, cover), publish finished jobs with a picture (portfolio), follow the news feed, see profile views and sponsors |
| Company | Register / log in, fill the company page (logo, cover, description, website), add and remove products with prices and pictures, publish offers, **sponsor craftsmen** |

Also: "most requested crafts" ranked by searches, demo data, Arabic (UTF-8) everywhere, CSRF protection on every form, hashed passwords, image uploads checked by content type and size.

## Getting started

Requirements: PHP 8.1+ with the `pdo_sqlite` (default) or `pdo_mysql` extension. Composer dependencies are already in `vendor/`.

### Quickest: PHP built-in server + SQLite

```bash
php -S localhost:8080 -t public public/router.php
```

Open http://localhost:8080. The SQLite database `database/herafy.sqlite` is created on the first request and filled with demo data.

### XAMPP / Apache + MySQL

1. Put the project in `htdocs/HERAFY` (the root `.htaccess` sends visitors to `public/` and blocks `app/`, `database/`, `vendor/`). `mod_rewrite` must be enabled.
2. In phpMyAdmin open **Import** and choose `database/herafy.sql`. It creates the `herafy` database, its tables and the demo data (it drops existing HERAFY tables first). Then skip step 4.
3. Tell the app to use MySQL, e.g. in `htdocs/HERAFY/.htaccess`:
   ```apache
   SetEnv HERAFY_DB_DRIVER mysql
   SetEnv HERAFY_DB_PASSWORD your_password
   ```
4. (Without phpMyAdmin) create an empty `herafy` database, then the tables and demo data: `HERAFY_DB_DRIVER=mysql php database/setup.php`
5. Open http://localhost/HERAFY/

### Demo accounts

Every demo account uses the password **`herafy123`**.

| Type | E-mail |
| --- | --- |
| Craftsman (carpenter, Oran) | `houari@herafy.dz` |
| Craftsman (painter, Algiers) | `karima@herafy.dz` |
| Company | `info@outils.dz` |
| Company | `contact@materiaux.dz` |

`php database/setup.php --fresh` resets the SQLite database. Set `HERAFY_SEED_DEMO=0` to start without demo accounts (the list of crafts is always created).

## Configuration

Everything is in `app/core/config.php` and can be overridden with environment variables:

| Variable | Default | |
| --- | --- | --- |
| `HERAFY_DB_DRIVER` | `sqlite` | `sqlite` or `mysql` |
| `HERAFY_SQLITE_PATH` | `database/herafy.sqlite` | |
| `HERAFY_DB_HOST` / `HERAFY_DB_PORT` | `localhost` / `3306` | MySQL |
| `HERAFY_DB_NAME` | `herafy` | MySQL |
| `HERAFY_DB_USER` / `HERAFY_DB_PASSWORD` | `root` / empty | MySQL |
| `HERAFY_BASE_URL` | detected | URL of the `public/` folder, e.g. `/HERAFY/public/` |
| `HERAFY_SEED_DEMO` | `1` | Fill a new database with demo data |
| `HERAFY_DEBUG` | `0` | Show PHP errors in the browser |

Contact messages are stored in the `contact_messages` table (read them with phpMyAdmin or any SQLite browser).

## Project structure

```
app/
  core/         App (router), Controller, Database (connection + schema), Model (CRUD trait), config, helpers
  controllers/  One class per page: /Controller/method/param  (e.g. /Profile/3, /Company_Page/add_product)
  models/       Account_User (craftsman), Company_User, Post, Product, Service (craft), Sponsorship, Contact_Message
  views/        Pages (*.view.php) and shared parts (Header, Footer, Post_Card, ...)
database/       seed.php (crafts + demo data), setup.php (CLI installer)
public/         index.php (front controller), router.php (built-in server), assets/, uploads/
tests/          PHPUnit tests, run on an in-memory SQLite database
```

Routing: `/Search` calls `Search::index()`, `/Profile/3` calls `Profile::index('3')`, `/Profile/sponsor/3` calls `Profile::sponsor('3')`. Only public methods declared in the controller itself can be reached from a URL.

## Tests

```bash
php vendor/bin/phpunit
```

---

# 1. Who is this website for?

This website is for people who are looking for a craftsman to do a job for them. For example, a plumber, electrician, carpenter, etc.

This website is also for craftsmen who are looking for a job. They can register on the website and create a profile. They can also create a portfolio of their work. The websuite helps craftsmen to share their work with others. This way, they can show their abilities and skills to others.

It can also be used by companies to promote their products and services. They can create a profile and share their products and services with others. They can sponsor some craftsmen to promote their products and services.

## 1.1 Tergeted individuals:

The individuals that are targeted by this website are: customers and craftsmen.

### What is the age range of your target audience?

This website is mainly for adults people. The age range of the target audience is between 20 and 80 years old.

### Will your site appeal to more women or men? What is the mix?

This website may appeal more to men than women. Maybe a mix of 70% men and 30% women.

### Which country do your visitors live in?

This website is for people who live in the Algeria.

### Do they live in urban or rural areas?

People using this website are either from urban or rural areas. But most of them are from urban areas.

### What is the average income of visitors?

The average income of visitors is very large, but at least from middle class. It is for people who can afford to pay for the services of a craftsman.

### What level of education do they have?

No specific level of education is required to use this website.

### What is their occupation?

The occupation of visitors is very diverse. They can be unemployees, employees, craftsmen, etc.

### How many hours do they work per week?

### How often do they use the web?

For craftsmen, they use it everytime to look for potential jobs. However, ordinary people use it rarely, when they need a job to be done.

### What kind of device do they use to access the web?

They use a computer, a tablet or a smartphone. But most of them use a smartphone.

## 1.2 Tergeted companies:

The targeted companies are companies that sells products, tools and materials that are used by craftsmen. They can also be companies that offer services that are used by craftsmen.

### What is the size of the company or relevant department?

The size of the company is usually very large. It can be a small company or a large company.

### What is the position of people in the company who visit your site?

Usually, the people who visit this website are the managers of the company. The company can also chose any employee to be their representative for the website.

### Will visitors be using the site for themselves or for someone else?

Visitors will be using the site for themselves. It can not be used for someone else. For example, a company can not use this website for another company. This is what the wibesite is for.

### How large is the budget they control?

The budget they control is very large. Companies providing construction products and services have a very large budget.

# 2. Why people visit this website?

## 2.1 Key motivations:

People: find a craftsman for a specific task.
Craftsmen: show thier abilities to do things.
Companies: promote their products and services.

### Are they looking for general entertainment or do they need to achieve a specific goal?

This website is not for entertainment. Visitors are looking for a specific goal.

### If there is a specific goal, is it a personal or professional one?

It is both professional and personal goal. Visitors are looking for a craftsman to do a job for them. While, companies and craftsmen are looking for promoting their products or skills.

### Do they see spending time on this activity as essential or a luxury?

It may be both. Some visitors are looking for a specific goal to acheive. While others are there just for curiosity.

## 2.2 Specific goals:

### Do they want general information / research (such as background on a topic / company), or are they after something specific (such as a particular fact or information on a product)?

They are after something specific: a craftsman for a given craft in their city, or a product for their work.

### Are they already familiar with the service or product you offer or need to be introduced to it?

Everyone knows what a craftsman does; the website only needs to explain how to find one and how to join it (home page sections for craftsmen and companies).

### Are they looking for time sensitive information, such as the latest news or updates on a particular topic?

Partly: craftsmen and companies follow the news feed (latest jobs and offers).

### Do they want to discover information about a specific product or service to help them decide whether to buy it or not?

Yes. Customers decide with the portfolio of a craftsman, craftsmen decide with the products, prices and offers of companies.

### Do they need to contact you? If so, can they visit in person (which might require opening hours and a map)? Or might they need email or telephone contact details?

They contact the craftsmen and companies directly (phone and e-mail on every profile). The website team is reached with the Contact us form.

# 3. What visitors are trying to achieve?

## Key tasks and motivations:

- Customer: search a craft in a city, compare profiles and finished jobs, call the craftsman.
- Craftsman: create a profile, publish finished jobs, get sponsored by companies.
- Company: create a page, list products with prices, publish offers, sponsor craftsmen.

## List of reasons why people visit the HERAFY website:

1. Find a plumber, electrician, carpenter... near home.
2. Show their work to get new customers.
3. Promote products and services to craftsmen.
4. Follow the latest jobs and offers.

# 4. What information visitors need to acheive their goals?

### Will visitors be familiar with your subject area / brand or do you need to introduce yourself?

The subject is familiar, the brand is new: the home page shows the most requested crafts, successful projects and partner companies.

### Will they be familiar with the product / service / information you are covering or do they need background information on it?

No background is needed.

### What are the most important features of what you are offering?

Search by craft and city, craftsman profiles with portfolio and contact details, company pages with products.

### What is special about what you offer that differentiates you from other sites that offer something similar?

It is made for Algeria and in Arabic, and it links the three sides: customers, craftsmen and the companies that sponsor them.

### Once people have achieved the goal that sent them to your site, are there common questions people ask about this subject area?

Prices, availability and the quality of previous jobs: answered by the portfolio and by contacting the craftsman.

# 5. How often will people visit the website?

Craftsmen and companies: several times a week (feed, new jobs). Customers: when they need a job done.

# 6. Site maps:

## card sorting:

Placing each piece of information that a visitor might need to know on a separate piece of paper and then organizing the related information into groups. Each group relates to a page and, on larger sites the, pages can in turn can be grouped together to create different sections of the website.

![Site maps](/public/assets/IMAGES/Site_maps.png?raw=true "Site maps")
