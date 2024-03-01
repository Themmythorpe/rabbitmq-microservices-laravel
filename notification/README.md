git clone https://github.com/Themmythorpe/rabbitmq-microservices-laravel.git


cd notifications-service


composer install


cp .env.example .env


php artisan serve

Running with Docker (Optional)

docker-compose up --build


Testing
php artisan test



