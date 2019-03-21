1. Unpack archive in your foldrer
2. Create database and configure .env and config/database.php
3. Install composer and run composer update
4. Run migrate and seed
 - php artisan migrate --seed
5. Install jwt passport and generate key
 - composer require tymon/jwt-auth:dev-develop
 - php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
 - php artisan jwt:secret
6. For API testing, import json from folder "postman" in your postman
7. For authorisation administrator:
  - email: admin@test.com
  - password: admin
8. For authorisation user:
  - email: user@test.com
  - password: secret
  or register new user

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
