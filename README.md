# Tickr Carbon Offsetting Challenge.

## Installation
There are two methods to run & test the script
1. Using Docker
2. Using Composer
Requirements and commands to run in either are given below.

## Using Docker
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

**To create ````.env``` file**
```bash
docker run --rm --interactive --tty --volume {%cd%|$PWD}/api:/app composer run-script post-root-package-install
```

**To generate key file**
```bash
docker run --rm --interactive --tty --volume {%cd%|$PWD}/api:/app composer run-script post-create-project-cmd
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
docker-compose exec php-fpm ./vendor/bin/phpunit

```
## Using Composer
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
