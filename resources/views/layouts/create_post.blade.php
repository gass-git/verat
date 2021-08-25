<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    @include('sections/head')
    @include('sections/navbar')
    @include('sections/post_form')
    @include('sections/footer')

</html>