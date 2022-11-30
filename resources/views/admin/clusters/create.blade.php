@extends('layouts.index')

@push('head')
    <style>
        #map {
            height: 900px;
        }
    </style>
@endpush

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="">
                <div class="form-group">
                    <h6>Tipe Pohon</h6>
                    <select class="choices form-select">
                        <option value="">Pilih Tipe Pohon</option>
                        @forelse ($tree_types as $tree_type)
                            <option value="{{ $tree_type['id'] }}">{{ $tree_type['name'] }}</option>
                        @empty
                            <option value="">No Data</option>
                        @endforelse
                    </select>
                </div>
                <div class="form-group">
                    <h6>Lokasi</h6>
                    <select class="choices form-select">
                        <option value="square">Square</option>
                        <option value="rectangle">Rectangle</option>
                        <option value="rombo">Rombo</option>
                        <option value="romboid">Romboid</option>
                        <option value="trapeze">Trapeze</option>
                        <option value="traible">Triangle</option>
                        <option value="polygon">Polygon</option>
                    </select>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <h6>Donatur</h6>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                </div>
            </form>
            {{-- <div id="map"></div> --}}
        </div>
    </div>
@endsection

@section('script')
    <script>
        var map = L.map('map').setView([-7.956, 112.6159], 15);
        var latlngs = [];

        map.on('click', function(ev) {
            L.marker([ev.latlng.lat, ev.latlng.lng]).addTo(map);
            latlngs.push([ev.latlng.lat, ev.latlng.lng])
            console.log(latlngs)
            L.polyline(latlngs, {
                color: 'red'
            }).addTo(map);
        });

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
    </script>
@endsection
