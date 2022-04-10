# Packt App

This is a simple application in Laravel 9 which allows a user to -

1. View/Create/Update/Delete Users
2. View/Create/Update/Delete Posts
3. Generate API token to make Fetch API requests to users & posts

#### Open your terminal & run the following commands

##### 1. Clone the project

Make a directory on your system & clone the project using github url

```bash
    mkdir packt-app
    git clone https://github.com/ani17/packt-app.git packt-app
```

##### 2. Install dependencies

Install all packages & dependencies for this project using composer

```bash
    composer install
```

##### 3. Configure environment variables

Create a .env file using .env.example file

```bash
    cp .env.example .env
```

Configure the mysql conection variables according to your requirements
Note: Make sure DB_DATABASE exists !

-   DB_HOST, DB_PORT, DB_DATABASE

##### 4. Create Tables by running migrations & populate them with data

```bash
    php artisan migrate
    php artisan db:seed
```

##### 5. Test your Application

You can also test your application by running the following commands

-   Run all tests

    ```bash
        php artisan test
    ```

-   Run a specific test

    ```bash
        php artisan test --filter UserTest
    ```

##### 6. Run/Serve the application

```bash
    php artisan serve
```

##### 7. Visit your application by opening the url given below in the browser

[http://localhost:8000/](http://localhost:8000/)
