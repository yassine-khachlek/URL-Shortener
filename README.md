# URL Shortener

![alt tag](https://styleci.io/repos/88567656/shield?branch=master)

# Install

Migrate the database:

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

## Demo accounts:

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

Need to add the cron entry to your server using crontab -e, this will make the schedule for cleaning process execute every hour (managed by the framework):

```
* * * * * php /path-to-your-project/artisan schedule:run >> /dev/null 2>&1
```