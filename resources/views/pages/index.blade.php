<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Getting the application name from .env file, 'APP_NAME' attribute -->
        <title>{{config('app.name'), 'LSAPP'}}</title>

    </head>
    <body>
        <h1>Welcome to Laravel</h1>
        <p>This is the Laravel application from the "Laravel from Scratch" YouTube series</p>
    </body>
</html>
