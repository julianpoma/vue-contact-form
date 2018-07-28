# Vue-internet-form

This is an small contact form to request an Internet data plan service.

It has an admin-panel with auth, where you can see all the request and setup the dataplans you offer.

The credentials are: 
- email: `admin@admin.com`
- password: `secret`

Created with Laravel 5.6 and VueJS 2, using Axios and Bulma.

# Try it out!

If you just wan to see it

- `composer install`
- Set up your local database
- `php artisan migrate:fresh --seed`
- `php artisan serve`

If you want to customize the fronten

- `npm install`
- `npm run watch`