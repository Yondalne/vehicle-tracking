<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src='https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css' rel='stylesheet' />

    <title>Maps</title>
</head>
<body style="margin: 0; padding:0; box-sizing:border-box">
    <div id='map' style='width: 100vw; height: 100vh;'></div>
    <script>
    mapboxgl.accessToken = 'pk.eyJ1IjoieW9uZGFpbmUiLCJhIjoiY2xuYmhrYWlrMGUwYTJscWtzNTRrcDR1MiJ9.4arIoY8-wIwjDJOJ6zx9uQ';
    const map = new mapboxgl.Map({
        container: 'map', // container ID
        style: 'mapbox://styles/mapbox/streets-v12', // style URL
        center: [ {{$initial->longitude}}, {{$initial->latitude}} ], // starting position [lng, lat]
        zoom: 12, // starting zoom
    });

    @foreach ($localisations as $local)
        let marker{{$loop->index}} = new mapboxgl.Marker()
            .setLngLat([ {{$local->longitude}}, {{$local->latitude}} ])
            .addTo(map);
    @endforeach
    </script>
</body>
</html>
