<!doctype html>
<html lang="{{ config('app.locale') }}">
    @include('partials._head')
    <body>
    @include('partials._nav')
        <div class="container">
           
            @yield('content')
    
            @yield('nav2')
            <div class="clearfix" style="margin-bottom: 0;">
                @include('partials._footer')
            </div><!-- 清除浮动 -->
        </div> <!--end of container -->

        @include('partials._javascript')

        @yield('script')
    </body>
</html>
