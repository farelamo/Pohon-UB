@extends('layouts.index')

@section('content')
    <div class="page-heading">
        <h3>Profile Statistics</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-3">
                <div class="card">
                    <div class="card-body py-4 px-4">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                <img src="/assets/images/faces/1.jpg" alt="Face 1">
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold">Pohon</h5>
                                <h6 class="text-muted mb-0">{{ $countTree }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="card">
                    <div class="card-body py-4 px-4">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                <img src="/assets/images/faces/1.jpg" alt="Face 1">
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold">Tipe Pohon</h5>
                                <h6 class="text-muted mb-0">{{ $countType }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="card">
                    <div class="card-body py-4 px-4">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                <img src="/assets/images/faces/1.jpg" alt="Face 1">
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold">Lokasi</h5>
                                <h6 class="text-muted mb-0">{{ $countLocation }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="card">
                    <div class="card-body py-4 px-4">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                <img src="/assets/images/faces/1.jpg" alt="Face 1">
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold">Cluster</h5>
                                <h6 class="text-muted mb-0">{{ $countCluster }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="chart"></div>
        </section>
    </div>
@endsection

@section('script')
    <script>
        var options = {
            chart: {
                height: 280,
                type: "area"
            },
            dataLabels: {
                enabled: false
            },
            series: [{
                name: "Jumlah Pohon",
                data: <?php echo json_encode(array_values($grafikData))?>
            }],
            fill: {
                type: "gradient",
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.7,
                    opacityTo: 0.9,
                    stops: [0, 90, 100]
                }
            },
            xaxis: {
                categories: <?php echo json_encode(array_keys($grafikData))?>
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);

        chart.render();
    </script>
@endsection
