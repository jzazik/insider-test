# Insider

### Requirements
* PHP 8
* Composer
* [Docker Desktop](https://www.docker.com/products/docker-desktop/)


### Local deploy process
* git clone https://github.com/jzazik/insider.git
* cd insider
* cp .env.example .env
* composer install
* ./vendor/bin/sail up
* ./vendor/bin/sail artisan migrate
* ./vendor/bin/sail artisan db:seed
* npm install