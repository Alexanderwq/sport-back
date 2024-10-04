<template>
  <header>
    <div class="wrapper">
      <nav>
        <RouterLink to="/">Home</RouterLink>
        <RouterLink to="/">Home</RouterLink>
        <RouterLink to="/">Home</RouterLink>
        <RouterLink to="/">Home</RouterLink>
      </nav>
    </div>
  </header>
  <Toast/>

  <RouterView/>
</template>

<script setup>
import {RouterLink, RouterView} from 'vue-router'
import Toast from 'primevue/toast';
</script>

<style scoped>
</style>
