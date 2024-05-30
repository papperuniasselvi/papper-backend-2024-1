#!/bin/sh
php artisan key:generate
php artisan octane:start --server=swoole --host=0.0.0.0 --port=8080 --watch
