# rabbitmq-microservices-laravel
This project implements a microservices architecture using Laravel, with two microservices communicating via RabbitMQ message broker. The project consists of two services: Users Service and Notifications Service.

Users Service: Provides an endpoint (POST /users) to create new users. Upon user creation, the service stores the user data and dispatches a UserCreated event via RabbitMQ.

Notifications Service: Listens for UserCreated events from the RabbitMQ message queue. Upon receiving an event, the service logs the user data.

Features:

Implementation of microservices architecture.
Communication between microservices via RabbitMQ message broker.
Storage of user data and event logging.
Unit, integration, and functional tests for both services.
Docker containerization for easy deployment and setup.
Technologies Used:

Laravel framework for building the microservices.
RabbitMQ as the message broker for inter-service communication.
PHPUnit for testing the services.
Docker for containerization and environment management.
Repository Structure:

users-service: Contains the Users Service codebase.
notifications-service: Contains the Notifications Service codebase.
docker-compose.yml: Docker Compose file for setting up the development environment.
README.md: Instructions on setting up and running the microservices locally.
Instructions:

Clone the repository.
Set up Docker environment using docker-compo se up.
Follow the instructions in README.md to run each microservice.