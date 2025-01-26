# Master Laravel 11 & PHP: From beginner to advanced

### This is the second project out of five projects from the udemy course - https://www.udemy.com/course/laravel-beginner-fundamentals/?couponCode=BFCPSALE24

## Project #2: Book Review

### Languages, frameworks, type of database & other tools that were used in this project can be located at the bottom of this read me file.

## Project setup

-   I began with making sure **PHP, Composer and the Laravel installer** is installed with the help of both the course & Laravel documentation. If the Laravel installer isn't installed I was able to with the help of the following command: `composer global require laravel/installer`.
-   The project was created using the following command after the above was installed: `laravel new book-review`.
-   Then changed directories with cd task-list.

-   Start the application with the following command `php artisan serve`.

-   The application ran into a problem when running the above command. While trying to start the local development server it failed to listen on port 8000. After some research I was able to discover I had to change a variable in the _php.ini_ configuration file at the location of where PHP is stored on my machine.
-   I had to locate the "variables_order" and assign a value of `GPCS` and made sure it was uncommented.
-   In additon to this, originally when setting up I had also downloaded Laravel Herd (but ended up not using herd the second time around setting up) which led to the development server still failing to listen on port 8000. At the time I had needed to change the "variables order" where Laravel Herd was located.

-   When setting up Docker desktop I had MySQL running as a service on my machine which resulted in local databases created instead of through docker. I had to ensure the service wasn't running in order for databases to be created and discovered through docker/adminer.

-   This allowed migrations to work successfully.

---

### Frameworks & languages included:

-   PHP & Laravel 11 framework
-   Docker
-   MySQL

### VS Code extensions:

-   PHP
-   PHP Intelephense
-   Tailwind CSS IntelliSense (suggestions for Tailwind CSS classes) - this only works if you have Tailwind installed using Vite, not when using CDN (we install & setup Tailwind in project #5)
-   Tailwind Fold (to hide Tailwind CSS classes)
-   SQLite Viewer (to browse SQLite databases)

### Laravel Extension Pack - will install most of the below suggested Laravel extensions + more. If you installed this one, skip the list below

If you want specific ones, here's the list:

### Laravel Extra Intellisense

-   Laravel goto view
-   Laravel Blade formatter
-   Laravel Blade Snippets
-   Laravel Blade Wrapper
