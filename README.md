<p align="center"><a href="https://david.in-staging.be/" target="_blank"><img src="https://www.webit.be/wp-content/themes/webit/images/beeldmerk.png" width="400" alt="Laravel Logo"></a></p>



## Features

- Login
- Database
- Queueing
- Task Schedular (Cron Job)
- Command
- Mail


- Auctions
  - Create
  - Show
- Products
  - Create
  - Show
  - Delete
  - Bid

## Installation
1. Clone the git respository:
````bash
git clone https://github.com/DavidBaekeland/Lector.git
````

2. Install dependencies:
````bash
composer install
npm install
````

3.  Make a new .env file from .env.example:
````bash
cp .env .env.development
````

3.  Run the migrations (and seeders):
````bash
php artisan migrate
````
or

````bash
php artisan migrate --seed
````

4. Run Laravel Storage Link
````bash
php artisan storage:link
````

5. Optional: create test images in public storage (only when the seeders were activated)

````bash
storage
  | app
    | public
      | auctions
        | autos
          | image.png

        | boot
          | image.png
          | ocean-sapphire
            | ocean-sapphire.jpg
          | palmer-johnson-150
            | palmer-johnson-150-1160x773.jpg
````
