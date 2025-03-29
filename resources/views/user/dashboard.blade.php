@extends('layouts.user')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Dashboard</title>
</head>
<body>
    
    @section('content')
        <h1 class="text-3xl font-bold">User Dashboard</h1>
        <p>Selamat datang, {{ Auth::user()->name }}!</p>
    @endsection

</body>
</html>
