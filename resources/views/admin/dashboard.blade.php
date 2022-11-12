@extends('layouts.index')

@section('content')
<div class="page-heading">
  <h3>Profile Statistics</h3>
</div>
<div class="page-content">
  <section class="row">
    <div class="col-12 col-lg-9">
      <div class="row">
        <div class="col-6 col-lg-4 col-md-6">
          <div class="card">
            <div class="card-body px-4 py-4-5">
              <div class="row">
                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                  <div class="stats-icon purple mb-2">
                    <i class="iconly-boldShow"></i>
                  </div>
                </div>
                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                  <h6 class="text-muted font-semibold">Jumlah Admin</h6>
                  <h6 class="font-extrabold mb-0">3</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6 col-lg-4 col-md-6">
          <div class="card">
            <div class="card-body px-4 py-4-5">
              <div class="row">
                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                  <div class="stats-icon blue mb-2">
                    <i class="iconly-boldProfile"></i>
                  </div>
                </div>
                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                  <h6 class="text-muted font-semibold">Jumlah Pohon</h6>
                  <h6 class="font-extrabold mb-0">8</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6 col-lg-4 col-md-6">
          <div class="card">
            <div class="card-body px-4 py-4-5">
              <div class="row">
                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                  <div class="stats-icon green mb-2">
                    <i class="iconly-boldAdd-User"></i>
                  </div>
                </div>
                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                  <h6 class="text-muted font-semibold">Following</h6>
                  <h6 class="font-extrabold mb-0">80.000</h6>
                </div>
              </div>
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
              <h5 class="font-bold">John Duck</h5>
              <h6 class="text-muted mb-0">@johnducky</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection