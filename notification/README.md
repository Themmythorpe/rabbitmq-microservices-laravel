git clone <notifications-service-repo-url>


cd notifications-service


composer install


cp .env.example .env


php artisan serve

Running with Docker (Optional)

docker-compose up --build


Testing
php artisan test



This README provides step-by-step instructions on how to set up and run each microservice locally, as well as optional instructions for running them using Docker Compose. It also includes basic guidance on running tests for both services. Adjust the instructions and configurations based on your specific project requirements.
