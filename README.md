# RobinVC Laravel Project AIWorld

This project represent a Forum/News website for Artificial intelligence enthousiasts to discuss the latest AI trends. This github code does not have any actual data so dummy data can be created in through migration seeding. This dummy data does not have any relevance to AI topics so do not take it serious.

# Software

Versions:
* php: 8.0.10
* laravel 9
* laravel installer: 4.2.9
* mysql: 8.0.27 for Win64 on x86_64
* composer: 2.1.9 (dependency manager)
* node.js: 16.15.1 (older version like 12.x.x are also fine)
* Bootstrap: 5.1.3

# Setting up the project

Install the right version of the above software and enter the following code into your terminal of your project directory:

Logging into your local mysql database:

```
mysql -u root -p
```

* if you cannot connect to your mysql on Windows, make sure your MySQL80 service in windows services is running.

Starting the website by opening a terminal and going to the project directory (AIWorld) and enter:

```
php artisan serve
```
The local host IP will be displayed in the terminal and copy and paste this in your browser to see the website.

Vendor folder is not included in this Git so you will have to make or use your own. Can be created by making a new laravel project in your terminal:

```
laravel new projectName
```

To migrate the model datastructure into your mysql, open a terminal in the project directory and enter:
```
php artisan migrate
```

If you want to load dummy data into your mysql, open a terminal in the project directory and enter: 

```
php artisan migrate:fresh --seed
```
The seeder makes an admin account which can edit and delete all posts. Other users can only delete and edit their own posts.
```
Username: admin
Email: admin@ehb.be
Password: Password!321
```
If you want to change the admin account when seeding, you can edit it at AIWorld/database/seeders/AdminUserSeeder.php

If you changed something and it is not appearing on your website, try clearing your cache with the following command:
```
php artisan optimize
```

# Known bugs and issues

I don't know any crucial bugs as of yet, so please let me know if you find some. The website should work.

* There is no pagination in the project, this should still be implemented for use cases where the amount of news and posts get too big and the client takes too long to load the data.

# Disclaimer

* There is a dropdown top right of your screen if you are logged in to see your profile or add/revoke admins if you are an admin

* I purposely chose to not make 2 layouts for normal users and Admins, as it would be more work and harder to manage code to make an extra layout file and check if each page had an Auth for admin instead of checking authorization within that one layout. (Less code, less files, easier to manage code)

* I did not make a many-to-many relationship, although I could have. An idea I had was making posts have a category. This category model would have a many-to-many relationship as posts could have several categories and each category could be used by many posts.

* Currently I fill the news posts with the same image when seeding. There is an option for random images being seeded if you uncomment a line of code in newsFactory. But I actually use a website which generates random image links. This causes the news page to be cluttered with the same images and every refresh it generates new images. Although, if you upload your own images when creating a News post, it will persist and correctly store it. So the functionality works.

* The contact form opens your email application with the admin email adresses added. I could make a whole model and controller and an admin page to list and react to contact forms but it was pretty much the same concept as the forum page I made. So I kept it simple.


# References

Here you can find references I used to make this project:

* Complete Laravel tutorial: https://www.youtube.com/watch?v=376vZ1wNYPA
* Installing Bootstrap in laravel: https://www.positronx.io/how-to-properly-install-and-use-bootstrap-in-laravel/
* Installing Bootstrap in laravel: https://stackoverflow.com/questions/22329145/include-bootstrap-in-laravel
* Bootstrap 5 Documentation: https://getbootstrap.com/docs/5.0/utilities/spacing/
* Datetime formatting in models: https://stackoverflow.com/questions/37857479/laravel-how-to-set-date-format-on-model-attribute-casting
* Making an Admin Role: https://www.youtube.com/watch?v=k9yfGtk1ad4&t=57s
* Making Seeders: https://laravel.com/docs/9.x/seeding
* Getting User Id in Factory seeding: https://stackoverflow.com/questions/44102483/in-laravel-how-do-i-retrieve-a-random-user-id-from-the-users-table-for-model-fa
* Except rule in middleware: https://stackoverflow.com/questions/34711134/laravel-middleware-except-rule-not-working
* Laravel factory documentation: https://laravel.com/docs/9.x/eloquent-factories
* Fixing a bug not being able to access name of users through posts with a one to many relationship: https://stackoverflow.com/questions/66185760/attempt-to-read-property-name-on-null
* Authorization issue when making news posts through requests bug fix: https://stackoverflow.com/questions/47128903/errors-this-action-is-unauthorized-using-form-request-validations-in-laravel
* Making a contact form in Laravel: https://www.positronx.io/laravel-contact-form-example-tutorial/
* Deleting last char in php string: https://stackoverflow.com/questions/5592994/remove-trailing-delimiting-character-from-a-delimited-string
* Send email to multiple recipients: https://stackoverflow.com/questions/33382843/php-contact-form-sending-email-to-multiple-recipients
* Fixing a bug with image uploading using Requests: https://stackoverflow.com/questions/37161505/laravel-get-name-of-file
* Fixing a bug where files were stored as tmp files instead of jpg: https://programmierfrage.com/items/image-stored-as-tmp-in-laravel
* Random images seeding website: https://stackoverflow.com/questions/43791274/how-to-generate-dummy-images-in-php-laravel
* If a file exists in php: https://stackoverflow.com/questions/34028575/determining-if-a-file-exists-in-laravel-5
* Fixed a bug where wrong controller would be used because of wrong order of routes in web.php: https://laracasts.com/discuss/channels/eloquent/route-trying-to-get-wrong-method-from-controller
* Authorizing url based on admin role using Middleware and route groups: https://stackoverflow.com/questions/72796290/laravel-7-how-can-i-restrict-url-by-user
* Adding default value for longText: https://www.reddit.com/r/laravel/comments/i3qsoi/laravel_give_longtext_field_a_default_value/





