# Blog Package 
 Blog Package for Laravel 8/9

In order for this package to work properly you must have your Laravel login system in place since you can create blog posts only when you are logged into your application.

### How to install
1. Download packages folder into the root of your Laravel project
2. Open the root composer.json, add "Jas\\\BlogWithComments\\\\": "packages/jas/blogwithcomments/src/" inside of autoload > psr-4 . 
3. Run composer dump-autoload command.
4. Open "config > app.php". Add Jas\BlogWithComments\BlogServiceProvider::class, into providers array.
5. Finaly run php artisan migrate to create blogs and comments tables in your database.

#### Done!
