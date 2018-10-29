#!/bin/bash

function failure {
    echo -e "\n[PROVISIONING] Failure\n" && exit 1;
}

echo -e "\n[PROVISIONING] In progress...\n"

docker exec -it web composer install || failure

docker exec -it web npm install || failure

docker exec -it db-mysql mysql -proot -uroot -e "CREATE DATABASE IF NOT EXISTS test;" || failure

docker exec -it web php artisan migrate || failure
docker exec -it web php artisan db:seed || failure

docker exec -it web node_modules/.bin/gulp

echo -e "\n[PROVISIONING] Success \n"
