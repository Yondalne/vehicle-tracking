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
            font-weight: 600;
            display: flex;
            padding: 20px 30px;
            gap: 30px;
            align-items: end;
            justify-content: center;
        }
        .input-group label {
            color: white;
        }
        .input-group {
            display: flex;
            flex-direction: column;
            row-gap: 5px;
        }
        .input-group select, .input-group input {
            width: 150px;
            height: 30px;
            padding: 0 15px;
            border: none;
            border: solid 0.5px lightblue;
            border-radius: 8px;
            outline: none;
        }

        input[type="submit"] {
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            border-color: black;
            transition: all .2s;
            cursor: pointer;
            font-weight: bold;
        }

        input[type="submit"]:hover {
            background-color: white;
            color: black;
        }
    </style>
</head>
<body style="margin: 0; padding:0; box-sizing:border-box; position: relative">
    <div style="position:absolute; top: 20px; left: 20px; background-color: rgba(76, 33, 42, 0.7); border-radius: 8px; z-index: 999">
        <form action="/map" method="GET">
            @csrf
            <div class="input-group">
                <label for="driver">Driver</label>
                {{-- @forelse ($drivers as $driver)
                    <option value="{{$driver->id}}" @if ($driver->id == $thedriver->id && $thedriver) selected @endif>{{ $driver->first_name." ".$driver->second_name }}</option>
                    @empty
                    <option value="">0 chauffeur </option>
                    @endforelse --}}
                <select required name="driver_id" id="driver">
                    <option value=""></option>
                    @forelse ($drivers as $driver)
                        <option value="{{$driver->id}}" @if ($thedriver && $driver->id == $thedriver->id) selected @endif >{{$driver->first_name." ".$driver->second_name}}</option>
                    @empty
                        <option value="" selected>Aucun Chauffeur</option>
                    @endforelse
                </select>
            </div>
            <div class="input-group">
                <label for="date">Date</label>
                <input type="date" required name="date" id="date" value="{{$date}}">
            </div>
            <div class="input-group">
                <input type="submit" value="Chercher">
            </div>
        </form>
    </div>

    @if (empty($localisations->toArray()))
        <div style="font-family: 'Jost'; text-align:center; font-weight: bold; position: absolute; top:50%; left:50%; z-index:999; background-color: rgba(255,255,255, 0.9); transform: translate(-50%, -50%); width: 300px; padding: 30px 50px">
            <p>Il n'y a pas de localisation pour ces parametres</p>
        </div>
    @endif

    <div id='map' style='width: 100vw; height: 100vh;'></div>
    <script>
    mapboxgl.accessToken = 'pk.eyJ1IjoieW9uZGFpbmUiLCJhIjoiY2xuYmhrYWlrMGUwYTJscWtzNTRrcDR1MiJ9.4arIoY8-wIwjDJOJ6zx9uQ';
    const map = new mapboxgl.Map({
        container: 'map', // container ID
        style: 'mapbox://styles/mapbox/streets-v12', // style URL
        center: [ {{$initial->longitude}}, {{$initial->latitude}} ], // starting position [lng, lat]
        zoom: 12, // starting zoom
    });

    map.on('load', () => {
        map.addSource('route', {
            'type': 'geojson',
            'data': {
                'type': 'Feature',
                'properties': {},
                'geometry': {
                    'type': 'LineString',
                    'coordinates': [
                        @forelse ($localisations as $local)
                            [{{$local->longitude}}, {{$local->latitude}}],
                        @empty
                        @endforelse
                    ]
                }
            }
        });
        map.addLayer({
            'id': 'route',
            'type': 'line',
            'source': 'route',
            'layout': {
                'line-join': 'round',
                'line-cap': 'round'
            },
            'paint': {
                'line-color': '#888',
                'line-width': 8
            }
        });
    });
    @forelse ($localisations as $local)
        let marker{{$loop->index}} = new mapboxgl.Marker()
            .setLngLat([ {{$local->longitude}}, {{$local->latitude}} ])
            .setPopup(new mapboxgl.Popup().setHTML("<h1>{{$local->created_at->format('H:i:s')}}</h1>"))
            .addTo(map);
    @empty
    @endforelse
    </script>
</body>
</html>
