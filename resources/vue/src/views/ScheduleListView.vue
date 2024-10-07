<template>
  <main>
    <h2>Расписание</h2>
    <div class="row-create">
      <Select
        placeholder="Выберите тренера"
        optionLabel="name"
        :options="trainersList"
      />
      <Select
        placeholder="Тип тренировки"
        optionLabel="name"
        :options="typesTraining"
      />
      <DatePicker id="datepicker-24h" v-model="startTime" showTime hourFormat="24" fluid />
      <DatePicker id="datepicker-24h" v-model="endTime" showTime hourFormat="24" fluid />

      <Button @click="addTraining">Добавить тренировку</Button>
    </div>
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
import Button from 'primevue/button'
import Select from "primevue/select";
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import {onMounted, ref} from "vue";
import { useToast } from "primevue/usetoast";
import api from '@/api'
import DatePicker from "primevue/datepicker";

const toast = useToast();
const scheduleList = ref([])
const trainersList = ref([])
const typesTraining = ref([])
const startTime = ref();
const endTime = ref();

const addTraining = () => {

}

onMounted(async () => {
  try {
    typesTraining.value = await api.getTypesTraining()
    trainersList.value = await api.getTrainersList()
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

<style scoped>
.row-create {
  display: flex;
  gap: 15px;
  margin-bottom: 30px;
}
</style>
