Project is using [DDEV](https://ddev.com/) for local development environment.

To start the project:

1. `ddev start`
2. `ddev composer install`
3. `cp .env.example .env`
4. `ddev artisan key:generate`

_(If for some reason you didn't use DDEV, update `APP_URL` inside `.env` file to match the correct URL where the app is served)_

## Queue

This service is used as an orchestrator in a saga.

You should run `ddev artisan queue:work rabbitmq --queue=saga-response-queue` in this service to listen for responses.
