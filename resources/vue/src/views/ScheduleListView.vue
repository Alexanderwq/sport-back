<template>
  <main>
    <h2>Расписание</h2>
    <div class="row-create">
      <Select
        placeholder="Выберите тренера"
        optionLabel="name"
        :options="trainersList"
        v-model="selectedTrainer"
      />
      <Select
        placeholder="Тип тренировки"
        optionLabel="name"
        :options="typesTraining"
        v-model="selectedTypeTraining"
      />
      <DatePicker
        id="datepicker-24h"
        v-model="startTime"
        showTime
        hourFormat="24"
        fluid
      />
      <DatePicker
        id="datepicker-24h"
        v-model="endTime"
        showTime
        hourFormat="24"
        fluid
      />

      <Button @click="addTraining">
        Добавить тренировку
      </Button>
    </div>
    <DataTable
      :value="scheduleList"
      paginator
      :rows="10"
      showGridlines
      sortField="id"
      :sortOrder="-1"
    >
      <Column field="id" header="ID" :sortable="true"></Column>
      <Column field="trainerName" header="Тренер"></Column>
      <Column field="sportName" header="Вид спорта"></Column>
      <Column field="startTime" header="Начало"></Column>
      <Column field="endTime" header="Конец"></Column>
      <Column field="id" header="">
        <template #body="slotProps">
          <Button
            severity="danger"
            @click="removeSchedule(slotProps.data.id)"
          >
            Удалить
          </Button>
        </template>
      </Column>
    </DataTable>
  </main>
</template>

<script setup>
import Button from 'primevue/button';
import Select from "primevue/select";
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import {onMounted, ref} from "vue";
import api from '~/api'
import DatePicker from "primevue/datepicker";

const scheduleList = ref([])
const trainersList = ref([])
const typesTraining = ref([])
const startTime = ref();
const endTime = ref();
const selectedTrainer = ref()
const selectedTypeTraining = ref()

const addTraining = async () => {
  try {
    await api.createTraining(
      selectedTrainer.value.id,
      selectedTypeTraining.value.id,
      startTime.value,
      endTime.value,
    )
  } catch (e) {
    alert('Произошла ошибка')
  }
  scheduleList.value = await api.getScheduleList()
}

const removeSchedule = async (id) => {
  try {
    await api.removeSchedule(id)
    scheduleList.value = await api.getScheduleList()
  } catch (e) {
    alert('Произошла ошибка')
  }
}

onMounted(async () => {
  try {
    typesTraining.value = await api.getTypesTraining()
    trainersList.value = await api.getTrainersList()
    scheduleList.value = await api.getScheduleList()
  } catch (e) {
    alert('Произошла ошибка')
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
