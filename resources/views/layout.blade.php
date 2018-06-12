
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Lietuviškas meno skelbimų portalas">
    <meta name="author" content="Linas Juodvalkis">
    <link rel="icon" href="../../favicon.ico">

    <title>Duokit meno</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/blog/">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <!-- Custom styles for this template -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/album.css" rel="stylesheet">
</head>

<body>


@include('layouts.nav')



<div class="container mb-1  ">
    <div class="row">

        @include('layouts.sidebar')

        @yield('content')


    </div>
</div>



@include('layouts.footer')



</body>
</html>
