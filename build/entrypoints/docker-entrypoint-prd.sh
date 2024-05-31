#!/bin/sh
sleep 10
php artisan key:generate
php artisan octane:start --host=0.0.0.0
