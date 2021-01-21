# Tickr Carbon Offsetting Challenge.

## Installation
#### Using Docker
###### Requirements
1. Docker version 20.10.2
2. docker-compose version 1.27.4, build 40524192
###### How to run & test

```bash
# Install all api dependencies using Windows terminal
docker run --rm --interactive --tty --volume %cd%/api:/app composer install
```
OR
```bash
# Install all api dependencies using Bash terminal
docker run --rm --interactive --tty --volume $PWD/api:/app composer install
```

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
```bash
# goto php-fpm container sh
docker-compose exec php-fpm sh
/application # cd api
# To Run UnitTests
/application/api # ./vendor/bin/phpunit

```
#### Using Composer
###### Requirements
1. php version 7.3|8.0
2. composer version 2.0.8

###### How to run & test
Go to directory ```api``` and run following commands
```bash
# Install all api dependencies
composer install

# Run the script
php artisan serve
```
**URI Format to test in Browser**
```http request
http://localhost:8000/api/carbon-offset-schedule?subscriptionStartDate={YYYY-MM-DD}&scheduleInMonths={0<=X<=36}
```

**Unit-Testing**
```bash
# To Run UnitTests
./vendor/bin/phpunit

```
