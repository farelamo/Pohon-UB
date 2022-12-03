@extends('layouts.index')

@push('head')
    <style>
        #map {
            height: 900px;
        }
    </style>
@endpush

@section('content')
    <form action="/admin/cluster" enctype="multipart/form-data" method="POST">
        @csrf

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group mb-3">
                            <div class="col-12">
                                <label class="form-label">Nama Cluster</label>
                                <input type="text" class="form-control" name="name" placeholder="Nama Cluster" required>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group mb-3">
                            <div class="col-12">
                                <label class="form-label">Donatur</label>
                                <input type="text" class="form-control" name="donatures" placeholder="Donatur" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <h6>Tipe Pohon</h6>
                            <select class="choices form-select" name="tree_type_id">
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
                            <select class="choices form-select" name="location_id">
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
                <div class="row">
                    <div class="form-group mb-3">
                        <div class="col-12">
                            <label class="form-label">Gambar Cluster</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>
                    <div class="visually-hidden">
                        <textarea name="polygon_data" id="polygon" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button class="btn btn-primary" type="button" id="mapButton" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            Tandai Lokasi
                        </button>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <button class="btn btn-success" type="submit">
                            Simpan
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="collapse" id="collapseExample">
            <div class="card">
                <div class="card-body">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('script')
    <script>
        var map = L.map('map').setView([-7.956, 112.6159], 15);

        $('#mapButton').on('click', function() {
            setTimeout(function() {
                map.invalidateSize();
            }, 10);
        });

        var latlngs = [];
        var myMap = L.layerGroup().addTo(map);

        map.on('click', function(ev) {
            var marker = L.marker([ev.latlng.lat, ev.latlng.lng]);
            latlngs.push([ev.latlng.lat, ev.latlng.lng])

            var polyline = L.polyline(latlngs, {
                color: 'red'
            }).addTo(myMap);

            myMap = L.layerGroup([marker, polyline]).addTo(map)
            $('#polygon').val(JSON.stringify(latlngs))
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
                    // console.log('woeee') // tidak bisa dipakein continue
                } else {
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

            // console.log(latlngs)
            $('#polygon').val(JSON.stringify(latlngs))
        })

        

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
    </script>
@endsection
