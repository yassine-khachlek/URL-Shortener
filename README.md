# URL Shortener

![alt tag](https://styleci.io/analyses/8A36ey#)

# Install

Migrate the database:

```shell
php artisan migrate:refresh --seed
```

To install demo data:

```shell
php artisan db:seed --class=DemoSeeder
```

Need to add the cron entry to your server using crontab -e, this will make the schedule for cleaning process execute every hour (managed by the framework):

```
* * * * * php /path-to-your-project/artisan schedule:run >> /dev/null 2>&1
```