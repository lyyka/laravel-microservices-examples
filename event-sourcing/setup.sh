cd ./source || exit

ddev start && ddev composer install && cp .env.example .env && ddev artisan key:generate
ddev artisan migrate
