<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        .fcf-body {
            margin: auto;
            font-family: -apple-system, Arial, sans-serif;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: left;
            background-color: #f8f8f8f9;
            padding: 30px;
            padding-bottom: 10px;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            max-width: 600px;
        }

        .fcf-form-group {
            margin-top: 25px;
            margin-bottom: 1rem;
            text-align: center;
        }

        .fcf-btn {
            display: inline-block;
            font-weight: 400;
            color: #212529;
            text-align: center;
            vertical-align: middle;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-color: transparent;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            transition: color 0.15s ease-in-out,
                background-color 0.15s ease-in-out,
                border-color 0.15s ease-in-out,
                box-shadow 0.15s ease-in-out;
        }

        .fcf-btn-primary {
            color: #fff;
            background-color: #C46F01;
            border-color: #C46F01;
        }

        .fcf-btn-block {
            width: 40%;
        }
    </style>
</head>

<body>

    <link href="contact-form.css" rel="stylesheet">
    <div class="fcf-body">
        {{-- <img src="{{$message}}" alt=""> --}}
        <div id="fcf-form">
            <h2 class="fcf-h3">Ubwork gửi lời chào đến công ty {{$company_name}}</h2>
            <span>Hiện đang có người dùng tên {{$name}} ứng tuyển vào công việc tốc độ của bạn</span>
            <div class="fcf-form-group">
                <button type="submit" id="fcf-button" class="fcf-btn fcf-btn-primary fcf-btn-lg fcf-btn-block"><a href="" style="color: #fff">Xem Chi Tiết</a></button>
            </div>
        </div>

    </div>

</body>

</html>
