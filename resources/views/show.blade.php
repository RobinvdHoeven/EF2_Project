<!DOCTYPE html>
<html lang="en">
<head>
    <title>EF2_PROJECT</title>
</head>
<body>
<a href="/images"><h1>Terug naar foto's</h1></a>
<br><br>
ID: {{ $image->id }}<br>
Naam: {{ $image->name }}<br>
Upload datum: {{ $image->created_at }}<br><br>
<img src="{{ asset('storage/' . $image->file_path) }}"
     alt="picture">

<form action="{{ route('image.delete', ['id' => $image->id]) }}" method="post">
    <input type="submit" value="Verwijder foto">
    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
</form>
</body>


<style>
    body {
        padding: 20px;
        font-family: Arial;
    }

    img {
        width: 30%;
    }
</style>
</html>
