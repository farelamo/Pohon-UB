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
                <div class="row">
                    <div class="col">
                        <div class="form-group row">
                            <div class="col-12">
                                <h6>Nama Cluster</h6>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <div class="col-12">
                                <h6>Donatur</h6>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
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
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <h6>Lokasi</h6>
                            <select class="choices form-select">
                                <option value="">Pilih Lokasi</option>
                                @forelse ($locations as $location)
                                    <option value="{{ $location['id'] }}">{{ $location['name'] }}</option>
                                @empty
                                    <option value="">No Data</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div id="map"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        var map     = L.map('map').setView([-7.956, 112.6159], 15);
        var latlngs = [];
        var myMap   = L.layerGroup().addTo(map);

        map.on('click', function(ev) {
            var marker = L.marker([ev.latlng.lat, ev.latlng.lng]);
            latlngs.push([ev.latlng.lat, ev.latlng.lng])

            var polyline = L.polyline(latlngs, {
                color: 'red'
            }).addTo(myMap);

            myMap = L.layerGroup([marker, polyline]).addTo(map)
        });

        map.on('contextmenu', (e) => {
            const remove = latlngs.pop()

            // console.log(map._layers) //isi layer map
            map.eachLayer(function(layer) {
                if (layer._leaflet_id == '26') { 
                    /* 
                        karena map._layers di e == 26 gambar map nya 
                        kalo diremove nanti ilang gambar mapnya hehehe 
                    */
                    console.log('woeee') // tidak bisa dipakein continue
                }else {
                    map.removeLayer(layer);
                }
            });

            var polyline = L.polyline(latlngs, {
                color: 'red'
            }).addTo(myMap);

            latlngs.forEach(e => {
                var marker = L.marker(e);
                myMap = L.layerGroup([marker, polyline]).addTo(map)
            });

            console.log(latlngs)
        })

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
    </script>
@endsection
