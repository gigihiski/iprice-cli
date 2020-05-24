# iPrice Hello World CLI App

This app uses PHP language and PHPUnit 9 for unit testing library.

## Installation

Please make sure the [PHP](https://www.php.net/downloads.php) has been installed in local device.

Use [composer](https://getcomposer.org/) dependency manager to install all the required libraries.

```bash
$ composer install
```
Run PHP CLI.
```bash
$ php index.php "hello world"
```

## Docker Usage
Build the image and attach to the container.
```bash
$ docker-compose up -d
```
Access container's terminal using bash command.
```bash
$ docker container exec -it iprice_cli-container bash
```
Run PHP CLI.
```bash
root@d78ce38ea437:/app# php index.php "hello world"
```

## Unit Test
This code using PHPUnit 9 library. Please make sure to run `composer install` before running the `phpunit` command, because `phpunit` library has to be downloaded into local folder inside `vendor` directory.

To run the test, please use command below. Please make sure you are in the `ROOT` directory.

```bash
$ ./vendor/bin/phpunit --testdox tests
```