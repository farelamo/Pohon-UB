@extends('layouts.index')

@push('head')
    <style>
        #map {
            height: 900px;
        }

        .error {
            color: red;
            font-weight: bold;
        }
    </style>
@endpush

@section('content')
    <form action="/admin/cluster/{{$cluster->id}}" method="POST">
        @csrf
        @method('PUT')

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group mb-3">
                            <div class="col-12">
                                <label class="form-label">Nama Cluster</label>
                                <input type="text" class="form-control" name="name" placeholder="Nama Cluster" value="{{ old('name') ?? $cluster->name }}" required>
                                @error('name')
                                    <div class="error">*{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group mb-3">
                            <div class="col-12">
                                <label class="form-label">Donatur</label>
                                <input type="text" class="form-control" name="donatures" placeholder="Donatur" value="{{ old('donatures') ?? $cluster->donatures }}" required>
                                @error('donatures')
                                    <div class="error">*{{ $message }}</div>
                                @enderror
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
                                    @if ((old('tree_type_id') ?? $cluster->tree_type_id) == $tree_type['id'])
                                        <option value="{{ $tree_type['id'] }}" selected>{{ $tree_type['name'] }}</option>
                                    @else
                                        <option value="{{ $tree_type['id'] }}">{{ $tree_type['name'] }}</option>
                                    @endif
                                @empty
                                    <option value="">No Data</option>
                                @endforelse
                            </select>
                            @error('tree_type_id')
                                <div class="error">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <h6>Lokasi</h6>
                            <select class="choices form-select" name="location_id">
                                <option value="">Pilih Lokasi</option>
                                @forelse ($locations as $location)
                                     @if ((old('location_id') ?? $cluster->location_id) == $location['id'])
                                        <option value="{{ $location['id'] }}" selected>{{ $location['name'] }}</option>
                                    @else
                                        <option value="{{ $location['id'] }}">{{ $location['name'] }}</option>
                                    @endif
                                @empty
                                    <option value="">No Data</option>
                                @endforelse
                            </select>
                            @error('location_id')
                                <div class="error">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="visually-hidden">
                        <textarea name="polygon_data" id="polygon" cols="30" rows="10">{{ $cluster->polygon_data }}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-primary" type="button" id="mapButton" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                    Tandai Lokasi
                                </button>
                                @error('polygon_data')
                                    <span class="error">*{{ $message }}</span>
                                @enderror
                                @if (count($errors) > 0)
                                @php $bag = $errors->getBag($__errorArgs[1] ?? 'default'); @endphp
                                    @if (!$bag->has('polygon_data'))
                                        <span class="error">*Silahkan tanda i lokasi lagi</span>
                                    @endif
                                @endif
                            </div>
                        </div>
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

        var latlngs = JSON.parse(<?php echo json_encode($cluster->polygon_data) ?>)
        var myMap   = L.layerGroup().addTo(map);

        latlngs.forEach((e, i)=> {
            var marker = L.marker(e)
            var polyline = L.polyline(latlngs, {
                color: 'red'
            }).addTo(myMap);

            myMap = L.layerGroup([marker, polyline]).addTo(map)
        });

        // console.log(map._layers, 'awal') //isi layer map /*** INI CEK MAP NYA ***/

        map.on('click', function(ev) {
            console.log(latlngs)
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

            // console.log(map._layers, 'akhir') //isi layer map /*** INI CEK MAP NYA ***/
            map.eachLayer(function(layer) {
                if (layer.options.attribution) {
                    /* 
                        karena map._layers di yang punya attribute di layer.options.attribution adalah gambar map nya,
                        kalo diremove nanti ilang gambar mapnya hehehe 

                        *** INI MAP NYA (pembedanya ada di options.attribution) ***
                        https://tile.openstreetmap.org/{z}/{x}/{y}.png
                        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                        }).addTo(map);
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

            $('#polygon').val(JSON.stringify(latlngs))
        })

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
    </script>
@endsection
