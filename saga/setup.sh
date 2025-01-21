cd ./orchestrator || exit

ddev start && ddev composer install && cp .env.example .env && ddev artisan key:generate
ddev artisan migrate

cd ../hotel-reservations || exit

ddev start && ddev composer install && cp .env.example .env && ddev artisan key:generate
ddev artisan migrate

cd ../flight-reservations || exit

ddev start && ddev composer install && cp .env.example .env && ddev artisan key:generate
ddev artisan migrate
