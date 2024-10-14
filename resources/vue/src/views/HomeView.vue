<template>
  <main>
      <h2>Список клиентов</h2>
      <DataTable :value="clientsList" showGridlines>
          <Column field="id" header="ID"></Column>
          <Column field="email" header="Email"></Column>
          <Column field="createdAt" header="Дата создания"></Column>
      </DataTable>
  </main>
</template>

<script setup>
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import {onMounted, ref} from "vue";
import api from '~/api'
const clientsList = ref([])

onMounted(async () => {
  try {
    clientsList.value = await api.getClientsList()
  } catch (e) {
    alert('Произошла ошибка при получении списка')
  }
})
</script>
