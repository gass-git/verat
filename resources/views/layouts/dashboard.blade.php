<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    @include('sections/head')
    @include('sections/navbar')
    @include('sections/dashboard_body')
    @include('sections/footer')

</html>