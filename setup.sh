cd ./rabbitmq || exit

docker compose up -d

source ./api-gateway/setup.sh

source ./cqrs/setup.sh

source ./event-sourcing/setup.sh

source ./saga/setup.sh
