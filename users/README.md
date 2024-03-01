# Microservices Setup and Run Guide

This guide provides instructions on setting up and running the Users and Notifications microservices locally.

## Prerequisites

Before you begin, make sure you have the following installed:

- PHP (>= 7.4)
- Composer
- Docker (optional, for containerized setup)
- RabbitMQ

## Users Service Setup and Run

1. Clone the Users service repository:

   ```bash
   git clone <users-service-repo-url>


   cd users-service


   composer install


   cp .env.example .env


   php artisan migrate

   php artisan serve





Running with Docker (Optional)

docker-compose up --build


Testing
php artisan test
