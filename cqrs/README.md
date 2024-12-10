Below is given the general flow, but setup all projects first!

- Go into `rabbitmq` and start the service.
- Do any number of API calls to users or orders services, those will just push the jobs to rabbitmq
- run `ddev artisan queue:work` inside `handler` to handle the jobs
