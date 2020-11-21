<!DOCTYPE html>
<html lang="en">
<head>
    <title>EF2_PROJECT</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('image.store') }}" enctype="multipart/form-data" method="post">
    <input type="file" name="image" id="image" accept="image/*">
    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
    <button type="submit">Upload image</button>
</form>

<br>

<?php
$imageid = 1;
$leftrotateid = 1;
$rightrotateid = 1;
?>

@foreach($images as $image)
    <div id="container">
        ID: {{$image->id }}<br>
        Naam: {{ $image->name }}<br><br>

        <a href="#" onclick="rotateLeft('{{$leftrotateid++}}');"><i class="fa fa-arrow-left" aria-hidden="true"></i>
            Roteren naar links </a>
        <a class="right" href="#" onclick="rotateRight('{{$rightrotateid++}}');"> Roteren
            naar rechts <i class="fa fa-arrow-right" aria-hidden="true"></i></a><br>


        <a href="{{ route('image.show', ['id' => $image->id]) }}"><img src="{{ asset('storage/' . $image->file_path) }}"

                                                                       alt="picture" id="image{{$imageid++}}"></a>
    </div>
    <br><br>
    @endforeach


    </body>

    <script>
        function rotateLeft(imgid) {
            var img = document.getElementById('image' + imgid);
            var currentAngle = img.style.transform;
            var angleNumber = currentAngle.replace(/[^\d.-]/g, '');
            var updatedAngle = (Number(angleNumber) + 90);

            img.style.transform = 'rotate(' + updatedAngle + 'deg)';
        }
    </script>

    <script>
        function rotateRight(imgid) {
            var img = document.getElementById('image' + imgid);
            var currentAngle = img.style.transform;
            var angleNumber = currentAngle.replace(/[^\d.-]/g, '');
            var updatedAngle = (Number(angleNumber) - 90);

            console.log(angleNumber);
            img.style.transform = 'rotate(' + updatedAngle + 'deg)';
        }
    </script>

    <style>
        body {
            padding: 20px;
            font-family: Arial;
        }

        #container {
            width: 400px;
            border-bottom: 1px solid black;

        }

        img {
            margin: 100px 0;
            max-width: 400px;
            max-height: 400px;
            border-bottom: 1px solid black;
        }

        a {
            text-decoration: none;
            display: inline-block;
        }

        a.right {
            float: right;
        }

    </style>
</html>
