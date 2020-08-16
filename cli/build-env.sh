#!/bin/bash

# This file builds package

docker-compose exec -u application package composer install
