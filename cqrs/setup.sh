cd ./handler || exit

ddev start && ddev composer install && cp .env.example .env && ddev artisan key:generate
ddev artisan migrate

cd ../orders || exit

ddev start && ddev composer install && cp .env.example .env && ddev artisan key:generate

cd ../users || exit

ddev start && ddev composer install && cp .env.example .env && ddev artisan key:generate
