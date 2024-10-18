<template>
  <header>
    <div class="wrapper">
      <nav>
        <RouterLink to="/">Клиенты</RouterLink>
        <RouterLink to="/schedule">Расписание</RouterLink>
        <RouterLink to="/trainers">Тренера</RouterLink>
        <RouterLink to="/sports">Виды спорта</RouterLink>
        <RouterLink to="/price">Цены</RouterLink>
      </nav>
    </div>
  </header>
  <RouterView/>
</template>

<script setup>
import {RouterLink, RouterView} from 'vue-router'
</script>

<style scoped>
</style>
