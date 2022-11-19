<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <center><span>UbWork xin chào Công Ty @foreach ($job as $item)
        {{$item->company->company_name}}
    @endforeach</span></center>
   <center> <p>Đã Có Người Dùng Tên {{$name}} Ứng Tuyển Vào Job Speed Của Bạn</p></center>
   <center><button type="button" class="btn btn-primary"><a href="">Xem Chi Tiết</a></button></center>
</body>
</html>
