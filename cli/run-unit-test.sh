#!/bin/bash

#docker-compose exec -u application package ./vendor/bin/phpunit --verbose --coverage-clover phpunit_build/logs/clover.xml
docker-compose exec package sh -c 'XDEBUG_MODE=coverage ./vendor/bin/phpunit --verbose --coverage-clover phpunit_build/logs/clover.xml'
