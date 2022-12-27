{{-- @extends('errors::layout')

@section('title', __('Ubwork'))
@section('code', '777')
@section('message', __('Chức năng đang được nâng cấp !!')) --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UBWORK NO 1</title>
    <style>
        body {
            margin: 0 auto;
            display: flex;
            justify-content: center;
        }
        video{
        width: 100vw;
        height: 100vh;
        object-fit: cover;
        position: fixed;
        top: 0;
        left: 0;
        }
    </style>
</head>
<body>
    <video  controls autoplay muted loop>
        <source src="{{asset('storage/video/IMG_7720.mp4')}}" type="video/mp4">
          {{-- <source src="movie.ogg" type="video/ogg"> --}}
            {{-- Your browser does not support the video tag. --}}
          </video>
    {{-- <iframe width="700" height="600" src="https://www.youtube.com/embed/HBmdw8o0o2U" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
</body>
</html>
