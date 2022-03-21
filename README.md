# laravel-blog-package
 Blog Package for Laravel 8/9

In order for this package to work you must have your Laravel login system in place since you can create blog posts only when you are logged into your application.

### How to install
1. Download packages and make sure it's in the root of your Laravel project
2. Add to root composer.json file under autoload > psr-4 "Jas\\\BlogWithComments\\\\": "packages/jas/blogwithcomments/src/" 
3. Run "php artisan dump-autoload" in your Terminal
4. Open "config > app.php" and add this App\Providers\TourApprovalProvider::class, to the providers array
5. Finaly run "php artisan migrate" to create blogs and comments tables in your database