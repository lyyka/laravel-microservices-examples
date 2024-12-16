Below is given the general flow, but setup all projects first!

- Inside `source` you can run `ddev artisan queue:work`
- Make API calls to interact with the service

> [!NOTE] 
> This pattern does **not** use RabbitMQ for simplicity. Event storage is the database, where the events are stored as they happened and from where they are read when rebuilding the database.
