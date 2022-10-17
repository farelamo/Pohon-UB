<template>
  <div class="d-flex" id="wrapper">
    <div class="border-end bg-white" id="sidebar-wrapper">
      <div class="sidebar-heading border-bottom bg-light">Tree Mapping</div>
      <div class="list-group list-group-flush">
        <div class="list-group-item">
          <input-location />
        </div>
        <div class="accordion accordion-flush" id="accordionFlushExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
              <button
                class="accordion-button"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#flush-collapseOne"
                aria-expanded="true"
                aria-controls="flush-collapseOne"
              >
                Jenis Pohon
              </button>
            </h2>
            <div
              id="flush-collapseOne"
              class="accordion-collapse collapse show"
              aria-labelledby="flush-headingOne"
              data-bs-parent="#accordionFlushExample"
            >
              <div class="accordion-body p-0">
                <div class="list-group list-group-flush">
                  <a
                    v-for="t in treeTypes"
                    :key="t"
                    class="
                      list-group-item
                      list-group-item-action
                      list-group-item-light
                      p-3
                    "
                    href="#"
                  >
                    {{ t }}
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="page-content-wrapper">
      <div class="container-fluid">
        <button
          class="btn btn-dark navbar navbar-dark px-2 mt-2"
          @click="toggleSidebar"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="mt-4">Map</h1>
      </div>
    </div>
  </div>
</template>

<script setup>
import InputLocation from "../Components/InputLocation.vue";
import treeTypes from "../data/tree-types.json";

function toggleSidebar() {
  document.body.classList.toggle("sb-sidenav-toggled");
}
</script>

<style scoped>
#wrapper {
  overflow-x: hidden;
}

#sidebar-wrapper {
  min-height: 100vh;
  margin-left: -15rem;
  transition: margin 0.25s ease-out;
}

#sidebar-wrapper .sidebar-heading {
  padding: 0.875rem 1.25rem;
  font-size: 1.2rem;
}

#sidebar-wrapper .list-group {
  width: 15rem;
}

#page-content-wrapper {
  min-width: 100vw;
}

body.sb-sidenav-toggled #wrapper #sidebar-wrapper {
  margin-left: 0;
}

@media (min-width: 768px) {
  #sidebar-wrapper {
    margin-left: 0;
  }

  #page-content-wrapper {
    min-width: 0;
    width: 100%;
  }

  body.sb-sidenav-toggled #wrapper #sidebar-wrapper {
    margin-left: -15rem;
  }
}
</style>
