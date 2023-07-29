<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Team 1 - DIM-TK4</title>
    <meta name="description" content="TEAM1TK4DIM">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Style Implements --}}
    @include('includes.style')
   
</head>

<body>
    {{-- Sidebar --}}
    @include('includes.sidebar')

    <div id="right-panel" class="right-panel">
       {{-- Navbar --}}
        @include('includes.navbar')

        <div class="content">
            {{-- Content Dinamis --}}
            @yield('content')
            
        </div>

        <div class="clearfix"></div>
    </div>

    <!-- Scripts Implements -->
    @stack('before-script')
    @include('includes.script')
    @stack('after-script')
</body>
</html>
