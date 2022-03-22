# Blog Package 
 Blog Package for Laravel 8/9

In order for this package to work properly you must have your Laravel login system in place since you can create blog posts only when you are logged into your application.

### How to install
1. Download packages folder into the root of your Laravel project.
2. Open your root composer.json, add <code>"Jas\\\BlogWithComments\\\\": "packages/jas/blogwithcomments/src/"</code> into autoload > psr-4 . 
3. Run <code>composer dump-autoload</code> command.
4. Open "config > app.php". Add <code>Jas\BlogWithComments\BlogServiceProvider::class,</code> into providers array.
5. Finally, run the <code>php artisan migrate</code> command to create blogs and comments tables in your database.

#### Done!
