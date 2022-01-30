# symfony-sqs

```
$ docker-compose build
$ docker-compose up -d
$ make shell
$ php phars/phpunit.phar tests/Integration/Message/SmsNotificationHandlerTest.php
$ php bin/console messenger:consume async -vv
```
