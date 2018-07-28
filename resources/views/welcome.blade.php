<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{asset('css/app.css')}}">

        <title>Laravel</title>
    </head>

    <body>
        <div id="app">
            <section class="hero is-medium has-background-white-ter">
                <div class="hero-body">
                    <div class="container has-text-centered">
                        <img src="{{asset('images/brand.png')}}" alt="" srcset="" width="200px">
                        <h2 class="subtitle">
                            Nueva solicitud de servicio
                        </h2>
                    </div>
                </div>
            </section>

            <section class="main-section">
                <request-form></request-form>
            </section>

            <footer class="footer">
                <div class="content has-text-centered">
                    <p class="has-text-white">
                        Created by <a href="http://www.github.com/julianpoma">neucoas</a>. Lincon es una marca registradas de Sociedad General de Comunicaciones S.A ® - 2018-2019
                    </p>
                </div>
            </footer>
        </div>

        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
