<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @foreach ($Liste as $client)
        <h6>{{$client->nom}}</h6>
        <h6>{{$client->email}}</h6>
        <h6>{{$client->telephone}}</h6>
        <h6>{{$client->addresse}}</h6>
    @endforeach
</body>
</html>