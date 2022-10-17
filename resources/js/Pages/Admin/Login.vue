<template>
  <div id="auth">
    <link rel="stylesheet" href="admin/assets/css/pages/auth.css">
    <div class="row h-100">
      <div class="col-lg-5 col-12">
        <div id="auth-left">
          <div class="auth-logo">
            <a href="/" class="d-flex align-items-center">
              <img src="images/logo.png" alt="Logo">
              <span class="text-success fw-bold ms-2">Pohon UB</span>
            </a>
          </div>
          <h1 class="auth-title text-success">Log in.</h1>
          <form action="index.html">
            <div class="form-group position-relative has-icon-left mb-4">
              <input type="text" class="form-control form-control-xl" placeholder="Username">
              <div class="form-control-icon">
                <i class="bi bi-person"></i>
              </div>
            </div>
            <div class="form-group position-relative has-icon-left mb-4">
              <input type="password" class="form-control form-control-xl" placeholder="Password">
              <div class="form-control-icon">
                <i class="bi bi-shield-lock"></i>
              </div>
            </div>
            <button class="btn btn-success btn-block btn-lg shadow-lg mt-5">Log in</button>
          </form>
        </div>
      </div>
      <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right" style="background-image: url(/images/ub.jpg); background-position: center;">
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
// import Footerx from "../../Components/Footer.vue";
// import Header from "../../Components/Header.vue";
// import Sidebar from "../../Components/Sidebar.vue";
</script>