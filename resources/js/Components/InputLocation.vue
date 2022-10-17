<template>
  <div class="autocomplete position-relative">
    <input
      type="text"
      class="form-control"
      placeholder="Cari Lokasi..."
      v-model="inputLocation"
      @input="searchItem"
      @keydown="setItemActive"
    />
    <div
      v-if="openAutoComplete"
      id="autocomplete-list"
      class="autocomplete-items"
    >
      <div v-for="l in searchLocs" :key="l" @click="setValue(l)">
        {{ l }}
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from "@vue/reactivity";
import locations from "../data/locations.json";

const searchLocs = ref(locations);
const openAutoComplete = ref(false);
const inputLocation = ref("");
let currentFocus;

function setValue(val) {
  inputLocation.value = val;
}

function searchItem() {
  let r = [];

  if (!inputLocation.value) {
    openAutoComplete.value = false;
    return;
  }

  for (let i = 0; i < locations.length; i++) {
    if (locations[i].toLowerCase().includes(inputLocation.value.toLowerCase()) && r.length <= 5) {
      r.push(locations[i]);
    }
  }

  openAutoComplete.value = true;
  currentFocus = -1;
  searchLocs.value = r;
}

function setItemActive(e) {
  var x = document.getElementById("autocomplete-list");
  if (x) x = x.getElementsByTagName("div");
  if (e.keyCode == 40) {
    currentFocus++;
    addActive(x);
  } else if (e.keyCode == 38) {
    currentFocus--;
    addActive(x);
  } else if (e.keyCode == 13) {
    e.preventDefault();
    if (currentFocus > -1) {
      if (x) x[currentFocus].click();
    }
  }
}

function addActive(x) {
  if (!x) return false;
  removeActive(x);
  if (currentFocus >= x.length) currentFocus = 0;
  if (currentFocus < 0) currentFocus = x.length - 1;
  x[currentFocus].classList.add("autocomplete-active");
}

function removeActive(x) {
  for (var i = 0; i < x.length; i++) {
    x[i].classList.remove("autocomplete-active");
  }
}

document.addEventListener("click", () => {
  openAutoComplete.value = false;
});
</script>

<style scoped>
.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  top: 100%;
  left: 0;
  right: 0;
}
.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff;
  border-bottom: 1px solid #d4d4d4;
}
.autocomplete-items div:hover {
  background-color: #e9e9e9;
}
.autocomplete-active {
  background-color: DodgerBlue !important;
  color: #ffffff;
}
</style>