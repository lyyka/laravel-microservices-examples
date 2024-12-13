Below is given the general flow, but setup all projects first!

- Go into `rabbitmq` and start the service.
- Run queue workers on all three services (explained in each readme)
- Start the saga by making an api call to the orchestrator service
- Watch how the queue workers handle events
- Do API call to each service to check the state (list sagas, list hotel res., list flight res.)
