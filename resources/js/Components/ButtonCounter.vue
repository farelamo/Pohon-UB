<template>
  <button @click="count++">
    Count: {{ count }}
  </button>
</template>

<script setup>
import { ref } from "@vue/reactivity"
const count = ref(0);
</script>