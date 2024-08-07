# Cbswei

<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

CMS and other features. Created with laravel and livewire. 

![screenshot](dashboard-screenshot-1.png)

## Features

- Admin panel
- Many pre-built modules

## Installation

Note: It is just another laravel application. So do as you would do while setting
up a typical laravel application. Please ensure that all the dependencies for
a laravel application is met.

After that run below bash script. (Please check the
script if you want to perform all the steps manually.)

`bash app-install.sh`

## Creating first user

To use the dashboard, you need a username and password.
Use below seeder file to create first user. This will create
an admin user. After that you can create other users from
dashboard.

`php artisan db:seed --class=UserSeeder`
 

## Running the app

`php artisan serve`

Now open your web browser and visit 
- 127.0.0.1 to see the website
- 127.0.0.1/dashboard to see the dashboard

## Contributing

__Please contribute to this project.__ Contributions are welcome.

## Issues

If you find any issue in this application, you can help by raising an issue
here in our github repo.

## License

[MIT license](https://opensource.org/licenses/MIT).
