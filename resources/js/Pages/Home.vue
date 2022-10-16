<template>
  <div class="d-flex h-100 text-center text-bg-dark bg-custom">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
      <header class="mb-auto">
        <div>
          <h3 class="float-md-start mb-0">Tree Mapping</h3>
          <nav class="nav nav-masthead justify-content-center float-md-end">
            <a
              class="nav-link fw-bold py-1 px-0 active"
              aria-current="page"
              href="#"
            >
              Home
            </a>
            <Link class="nav-link fw-bold py-1 px-0" href="map">
              Peta Pohon
            </Link>
          </nav>
        </div>
      </header>

      <main class="px-3">
        <h1>Tree Mapping</h1>
        <p class="lead">
          Debitis reprehenderit in veritatis. Voluptatibus amet pariatur
          voluptatem commodi. Magni dicta dolore qui est. Omnis ut quis totam
          quasi. Tempora et ducimus blanditiis eos blanditiis occaecati.
        </p>
        <p class="lead">
          <Link
            href="map"
            class="btn btn-lg btn-secondary fw-bold border-white bg-white"
          >
            Learn more
          </Link>
        </p>
      </main>

      <footer class="mt-auto text-white">
        <p>Copyright &copy; 2022 all rights reserved.</p>
      </footer>
    </div>
  </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
</script>

<style>
.btn-secondary,
.btn-secondary:hover,
.btn-secondary:focus {
  color: #333 !important;
  text-shadow: none;
}

html,
body,
#app {
  height: 100vh !important;
}

.cover-container {
  max-width: 42em;
  text-shadow: 0 0.05rem 0.1rem rgba(0, 0, 0, 0.5);
}

.bg-custom {
  background-image: url("/images/ub.jpg");
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
}

main {
  backdrop-filter: blur(10px);
  background-color: rgba(255, 255, 255, 0.5);
  padding: 1rem 2rem;
  border-radius: 1rem;
}

.nav-masthead .nav-link {
  color: rgba(255, 255, 255, 0.8) !important;
  border-bottom: 0.25rem solid transparent;
}

.nav-masthead .nav-link:hover,
.nav-masthead .nav-link:focus {
  border-bottom-color: rgba(255, 255, 255, 0.25);
}

.nav-masthead .nav-link + .nav-link {
  margin-left: 1rem;
}

.nav-masthead .active {
  color: #fff !important;
  border-bottom-color: #fff;
}
</style>