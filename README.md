# Rays Micro-Finance Test Project

## About Project

##### A simple CRUD API for managing cities information without database connection

| **Routes**           | **Actions** |
|-------------------|----------|
| `POST /api/cities` | adds a new city |
| `GET /api/cities` | returns all cities |
| `GET /api/cities?id=123` | returns city 123 |
| `PUT /api/cities?id=123` | edit city 123 |
| `DELETE /api/cities?id=123` | delete city 123 |

### Usage 

- For create city use body like this:

```json
{
    "id": "101",
	"name": "Frankfurt",
    "region": "Hesse",
    "country": "Germany",
    "postal_code": "3000",
    "lati": "50.1109",
    "long": "8.6821",
    "time_zone": "Europe/London",
    "currency_code": "EUR",
    "population": 100000,
    "languages_spoken": ["Dutch"],
    "current_gdp_contribution": 32.66
}
```

## Installation

- Make sure to setup **php8** and **composer** on your machine before proceeding to the next steps.

- Clone the repo

```bash
git clone https://github.com/BekaMan95/Rays-Micro-Finance-Test.git && cd Rays-Micro-Finance-Test
```

- Copy `ENV` variables
```bash
cat .env.example > .env
```

- Install dependencies
```bash
composer install
```

- Run the artisan server
```bash
php artisan serve
```

- Visit Base URL `localhost:8000/api` for the endpoints
```bash
curl -X POST http://localhost:8000/api/cities \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -d '{"id": "101","name": "Frankfurt","region": "Hesse","country": "Germany","postal_code": "3000","lati": "50.1109","long": "8.6821","time_zone": "Europe/London","currency_code": "EUR","population": 100000,"languages_spoken": ["Dutch"],"current_gdp_contribution": 32.66}'
```

#### All Set!
---

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

---
