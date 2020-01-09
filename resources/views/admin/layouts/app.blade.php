<!DOCTYPE html>
<html lang="en">
    <head>
        @include('admin.layouts.head')
    </head>
    <body class="hold-transition sidebar-mini layout-fixed skin-blue"> 
        <div class="wrapper">
        @include('admin.layouts.header')
        @include('admin.layouts.sidebar')
        @section('main-content')
            @show
        @include('admin.layouts.footer')    
        </div>
    </body>
    
</html>