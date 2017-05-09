<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    @include('partials._head') 
</head>

    <body>
    @include('partials._nav')
        <div class="container">

           
                @yield('content')
    
                @yield('nav2')

            @include('partials._footer')

        </div> <!--end of container -->

        @include('partials._javascript')

        @yield('script')
    </body>
</html>
