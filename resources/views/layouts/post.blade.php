<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    @include('sections/head')
    
    <body>
        @include('sections/nav')
        @include('sections/post_body')
    </body>

    @include('sections/footer')
    
</html>