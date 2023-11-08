<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src='https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css' rel='stylesheet' />

    <title>Maps</title>
    <style>
        form {
            font-family: "Jost";
            display: flex;
            padding: 15px 30px;
            gap: 30px;
            align-items: center;
            justify-content: center;
        }
        .input-group {
            display: flex;
            flex-direction: column;
            row-gap: 5px;
        }
        .input-group select, .input-group input {
            width: 100px;
            height: ;
        }
    </style>
</head>
<body style="margin: 0; padding:0; box-sizing:border-box; position: relative">
    <div style="position:absolute; top: 20px; left: 20px; background-color: rgba(255,255,255,0.7); border-radius: 8px; z-index: 999">
        <form action="">
            <div class="input-group">
                <label for="driver">Driver</label>
                <select name="driver_id" id="driver">
                    <option value="id">Driver 1</option>
                </select>
            </div>
            <div class="input-group">
                <label for="date">Date</label>
                <input type="date" name="date" id="date" value="2023-11-08">
            </div>
        </form>
    </div>

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
