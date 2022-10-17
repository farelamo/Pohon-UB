<template>
  <div id="app">
    <sidebar/>
    <div id="main">
      <header/>
      <div class="page-heading">
        <div class="page-title">
          <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
              <h3>Data Pohon</h3>
              <p class="text-subtitle text-muted">A sortable, searchable, paginated table without dependencies thanks to simple-datatables</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first d-flex justify-content-end ">
              <nav aria-label="breadcrumb" class="breadcrumb-header float-start mt-auto">
                <a href="#" class="btn btn-success me-2"><i class="bi bi-pencil"></i> Tambah Pohon</a>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <div class="page-content">
        <section class="section">
          <div class="card">
            <div class="card-body">
              <table class="table table-striped" id="table1">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Pohon</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Nariphon</td>
                    <td>1223</td>
                    <td>3456</td>
                    <td>
                      <a href="#" class="btn btn-sm btn-success me-2"><i class="bi bi-pencil"></i></a>
                      <a href="#" class="btn btn-sm btn-danger"><i class="bi bi-x"></i></a>
                    </td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Yggdrasil</td>
                    <td>1223</td>
                    <td>3456</td>
                    <td>
                      <a href="#" class="btn btn-sm btn-success me-2"><i class="bi bi-pencil"></i></a>
                      <a href="#" class="btn btn-sm btn-danger"><i class="bi bi-x"></i></a>
                    </td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Jubokko</td>
                    <td>1223</td>
                    <td>3456</td>
                    <td>
                      <a href="#" class="btn btn-sm btn-success me-2"><i class="bi bi-pencil"></i></a>
                      <a href="#" class="btn btn-sm btn-danger"><i class="bi bi-x"></i></a>
                    </td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Jinmenju</td>
                    <td>1223</td>
                    <td>3456</td>
                    <td>
                      <a href="#" class="btn btn-sm btn-success me-2"><i class="bi bi-pencil"></i></a>
                      <a href="#" class="btn btn-sm btn-danger"><i class="bi bi-x"></i></a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </section>
      </div>
      <footerx/>
    </div>
  </div>
</template>

<script setup>
import Footerx from "../../Components/Footer.vue";
import Header from "../../Components/Header.vue";
import Sidebar from "../../Components/Sidebar.vue";
</script>