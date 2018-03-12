<!-- This whole .php file is served as a template for the Views -->
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        {{-- Adding Laravel's built-in CSS to the Layout --}}
        <link rel="stylesheet" href="{{asset('css/app.css')}}">

        {{-- Getting the application name from .env file, 'APP_NAME' attribute --}}
        <title>{{config('app.name'), 'LSAPP'}}</title>
    
    </head>
    <body>

        {{-- 
            @include() will include a portion of code from a different source
            In this case, it will include View 'navbar.blade.php' from Folder 'inc'
        --}}
        @include('inc.navbar')

        <div class="container">

            @include('inc.messages')

            {{-- 
                @yield indicates that this part of the .php file
                is going to be filled with the data that is used in
                the file who called it.
                If a page is going to be filling data into this @yield
                it's going to have to reference to the 'content' name
            --}}
            @yield('content')

        </div>

        {{-- 
            Adding the CKEditor plugin for the Text Area (error)
            In order to add this plugin, visit the Dev's Github
            for instruction on how to install this plugin
        --}}
        <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
        <script>
            
            // The 'id' to be used if you want to
            // use the CKEditor
            CKEDITOR.replace( 'article-ckeditor' );
        </script>

    </body>
</html>
