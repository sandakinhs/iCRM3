<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<form action="submitform" method="post">

    <h2>First Name</h2>
    <input name="fname" id="fname" type="test">
    <br>
    <h2>Last Name</h2>
    <input name="lname" id="lname" type="test">
    <input type="submit" name="submit" id="submit">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

</form>

{{ var_dump($errors) }}

@if ($errors->any())

    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
@endif

</body>
</html>