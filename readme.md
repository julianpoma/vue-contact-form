# Vue-contact-form

A contact form app made with Laravel 5 and VueJS. It serves as a boiler plate. Feel free to adapt it to your own needs.

![Alt text](public/images/sc_1.png?raw=true "Title")

It includes a dashboard using the default Laravel Web Auth, where you can see all the contacts you recived, mark them as read, and setup the dropdown menu options.

![Alt text](public/images/sc_2.png?raw=true "Title")

The credentials for the dashboard are: 
- email: `admin@admin.com`
- password: `secret`

## Created with
- Laravel 5.6
- VueJS 2
- Vue Router
- Axios
- Bulma CSS
- [Vue Google Autocomplete](https://github.com/olefirenko/vue-google-autocomplete)

## Try it out!

- `composer install`
- Set up your local database
- Configure the .env file. 
    - Remember to put your [Google API Key](https://console.developers.google.com/) in the .env file (GOOGLE_MAPS setting)!
- `php artisan migrate:fresh --seed`
- `php artisan serve`

If you want to customize the frontend, remember to compile:

- `npm install`
- `npm run watch`