🏗 Architecture / Project Structure (DDD + CQRS)
Code
src/
 ├── Dashboard/
 │    ├── Domain/
 │    │    ├── Entity/
 │    │    │    └── Dashboard.php
 │    │    ├── Repository/
 │    │    │    └── DashboardRepositoryInterface.php
 │    │    └── Event/
 │    │         └── DashboardCreated.php
 │    ├── Application/
 │    │    ├── Command/
 │    │    │    └── CreateDashboardCommand.php
 │    │    ├── Handler/
 │    │    │    └── CreateDashboardHandler.php
 │    │    └── Query/
 │    │         └── GetDashboardQuery.php
 │    ├── Infrastructure/
 │    │    ├── Repository/
 │    │    │    └── DoctrineDashboardRepository.php
 │    │    ├── Projection/
 │    │    │    └── DashboardReadModel.php
 │    │    └── Messaging/
 │    │         └── AsyncMessageBus.php
 │    └── UI/
 │         └── Controller/
 │              └── DashboardController.php
tests/
 └── Dashboard/
      └── Unit/
           └── DashboardTest.php

Setup instructions
1. download or pull **main** branch from **symfony-ddd**
2. run composer install

How to run the project
1. symfony server:start or php -S localhost:8000 -t public
2. We can access the records using this url http://localhost:8000/dashboard/123

How to execute unit tests
1. run the command php bin/phpunit in cmd or gitbash

  
