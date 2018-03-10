
<!-- This whole .php file is served as a template for the Views -->
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
        
        {{-- 
            @yield indicates that this part of the .php file
            is going to be filled with the data that is used in
            the file who called it.
            If a page is going to be filling data into this @yield
            it's going to have to reference to the 'content' name
        --}}
        @yield('content')
    </body>
</html>
