<template>
  <header>
    <div class="wrapper">
      <nav>
        <RouterLink to="/">Клиенты</RouterLink>
        <RouterLink to="/schedule">Расписание</RouterLink>
        <RouterLink to="/trainers">Тренера</RouterLink>
        <RouterLink to="/">Home</RouterLink>
      </nav>
    </div>
  </header>
  <Toast position="top-center" />

  <RouterView/>
</template>

<script setup>
import {RouterLink, RouterView} from 'vue-router'
import Toast from 'primevue/toast';
</script>

<style scoped>
</style>
