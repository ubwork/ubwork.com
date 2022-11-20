<!DOCTYPE html>
<html>

<head>
    <title>Ubwork Xin Chào</title>
</head>

<body style="background-color: rgb(231, 231, 231);margin:auto">
    <center><h2 style="color: black">UbWork xin chào Công Ty @foreach ($job as $item)
                {{ $item->company->company_name }}
            @endforeach
    </h2></center>
    <center>
        <p style="color: black">Đã Có Người Dùng Tên {{ $name }} Ứng Tuyển Vào Job Speed Của Bạn</p>
    </center>
    <center><button type="button" class="btn btn-primary" style="background-color: rgb(255, 200, 97);border:none;width:120px;height:25px"><a href="{{route('job')}}" style="color:black">Xem Chi Tiết</a></button></center>
</body>

</html>
