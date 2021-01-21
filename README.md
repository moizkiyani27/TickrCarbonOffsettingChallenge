# Tickr Carbon Offsetting Challenge.

## Installation

#### Using Docker

###### Requirements
1. Docker version 20.10.2
2. docker-compose version 1.27.4, build 40524192

###### How to run & test
```bash
# Pull and Build all images and run the containers
docker-compose up -d
```
_Wait for composer service to finish install and exit_

**URI Format to test in Browser**
```http request
http://localhost/api/carbon-offset-schedule?subscriptionStartDate={YYYY-MM-DD}&scheduleInMonths={0<=X<=36}
```

**Unit-Testing**
***goto php-fpm container sh***
```bash
docker-compose exec php-fpm sh
```

***To Run UnitTests***
```bash
/application # cd api
/application/api # ./vendor/bin/phpunit
```

#### Using Composer
###### Requirements
1. php version 7.3|8.0
2. composer version 2.0.8

###### How to run & test
Go to directory ```api``` and run following commands

***Install all dependencies***
```bash
composer install
```

***Run the script***
```bash
php artisan serve
```
**URI Format to test in Browser**
```http request
http://localhost:8000/api/carbon-offset-schedule?subscriptionStartDate={YYYY-MM-DD}&scheduleInMonths={0<=X<=36}
```

**Unit-Testing**
```bash
./vendor/bin/phpunit

```
