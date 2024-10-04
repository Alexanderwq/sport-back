<template>
  <main>
    <h2>Расписание</h2>
    <DataTable :value="scheduleList" showGridlines>
      <Column field="id" header="ID"></Column>
      <Column field="trainerName" header="Тренер"></Column>
      <Column field="sportName" header="Вид спорта"></Column>
      <Column field="startTime" header="Начало"></Column>
      <Column field="endTime" header="Конец"></Column>
    </DataTable>
  </main>
</template>

<script setup>
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import {onMounted, ref} from "vue";
import { useToast } from "primevue/usetoast";
import api from '@/api'

const toast = useToast();
const scheduleList = ref([])

onMounted(async () => {
  try {
    scheduleList.value = await api.getScheduleList()
  } catch (e) {
    toast.add({
      severity: 'error',
      summary: 'Error',
      detail: 'Произошла ошибка при получении списка',
      life: 5000,
    });
  }
})
</script>
