<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <script type="text/javascript" src="{{ asset("assets/js/external/jquery/jquery.js") }}"></script>
    <script type="text/javascript" src="{{ asset("assets/js/jquery-ui.js") }}"></script>
    <script type="text/javascript" src="{{ asset("assets/js/bootstrap.min.js") }}"></script>
    <link rel="stylesheet" href="{{ asset("assets/css/bootstrap.min.css") }}" />
    <link href="{{ asset("assets/css/jquery-ui.css") }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("assets/css/custom-style.css") }}" />



    <!--<link rel="stylesheet" href="jAlert-master/src/jAlert-v3.css" />-->
    <!--<script src="jAlert-master/src/jAlert-v3.js"></script>-->
    <!--<script src="jAlert-master/src/jAlert-functions.js"> //optional!!</script>-->


</head>
<body>
    <div class="container">
        @yield('content')
    </div>

</body>
</html>