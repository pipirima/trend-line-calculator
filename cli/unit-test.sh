#!/bin/bash

docker-compose exec -u application package ./vendor/bin/phpunit --verbose --coverage-clover phpunit_build/logs/clover.xml
