# ChallengeApi

### ChallengeApi - PHP Web API (Developed with Laravel)

> The API must allow the search for Cat Breeds by name. The API should cache the results from the Cat API into a local MySQL database. If the cat breed is not found in the local MySQL database, it will query the cat API. The only endpoint that must be implemented is the GET to /breeds


## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. 

### Installion

1. Clone this repository in your cmoputer

2. Use Composer to add the package to your project's dependencies

  ```
composer install
```
3. Copi the **env.example** and rename to **.env** and run ```php artisan generate:key``` to generate APP_KEY.

4. Create an database (MYSQL) to your application and run ```php artisan generate:key``` for generate migrations.

**Installation complete. ChallengeApi is ready to be used**

### Flow Diagram

![alt text](https://github.com/V1n1c1us/challengeApi/blob/master/public/img/Flow%20Diagram.png "Flow Diagram")



Read the doc ChallengeApi : https://documenter.getpostman.com/view/4362475/S1a1Z81Q

Read the Cat Api : https://docs.thecatapi.com/
