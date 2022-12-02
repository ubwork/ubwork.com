<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    Xin Chào {{ $candidate->name }}
    {{-- Mã Kích Hoạt Của Bạn Là {{$res->token}} --}}
    <a href="{{ route('actived', ['candidate' => $candidate->id, 'token' => $candidate->token]) }}">kích hoạt</a>
</body>

</html>
