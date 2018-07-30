<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <title>Solicitud de servicio | Lincon</title>
    </head>

    <body>
        <div id="app">
            <section class="hero is-medium has-background-nova">
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
        </div>

        @include('layouts.footer')

        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
