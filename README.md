# URL Shortener

![alt tag](https://styleci.io/repos/88567656/shield?branch=master)

# Install

## Using docker-compose

The prefered way to test this Laravel project is to use docker-compose to make sure that the environment is exactly the same.

To do just change the working directory to use the project directory and run:

```shell
docker-compose up -d
```

If you don't have docker-compose please refer to the documentation [Here](https://www.google.com).

## Alternative method

If you don't prefer to use the docker environnement provided please refer to Laravel install documentation [Here](https://laravel.com/docs/5.4#installation) 

Since your environnment is up, if you use an alternative method make sure to update the .env file.

Next migrate the database:

```shell
php artisan migrate:refresh --seed
```

To install demo data including the demo accounts:

```shell
php artisan db:seed --class=DemoSeeder
```

Or simpler just run both for first time install:

```shell
php artisan migrate:refresh --seed && php artisan db:seed --class=DemoSeeder
```

In production, you need to add the cron entry to your server using crontab -e, this will make the schedule for cleaning process execute every hour (managed by the framework):

```
* * * * * php /path-to-your-project/artisan schedule:run >> /dev/null 2>&1
```

But for development to test the old urls cleaning command please run:

```shell
php artisan url:clear
```

## Demo accounts:

Note: To use the demo accounts, you should be already executed the demo seeder.

Administrator:

```
Email: admin@example.com
Password: demo
```

User:

```
Email: demo@example.com
Password: demo
```

### Important:

Please always verify the directories permission if you got running issues.

## Project progress visualization (in 35 seconds)

[![IMAGE ALT TEXT HERE](http://img.youtube.com/vi/4Lwuz0ttXUI/0.jpg)](http://www.youtube.com/watch?v=4Lwuz0ttXUI)


### Contact:

Yassine Khachlek <yassine.khachlek@gmail.com>
