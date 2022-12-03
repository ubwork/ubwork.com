<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <span>Vui Lòng Không Chia sẽ mã này cho bất cứ ai</span>
    Xin Chào {{ $candidate->name }}

    mã xác nhận <span style="color: red">{{ $candidate->token }}</span>

    <a href="{{ route('getPass', ['candidate' => $candidate->id, 'token' => $candidate->token]) }}">Đặt Lại Mật Khẩu</a>
</body>

</html>
