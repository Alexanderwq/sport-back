<template>
  <main>
    <h2>Список тренеров</h2>
    <div class="row-create">
      <InputText
        placeholder="Имя"
      />
      <Select
        placeholder="Тип тренировки"
        optionLabel="name"
        :options="typesTraining"
      />

      <Button @click="addTrainer">Добавить тренера</Button>
    </div>
    <DataTable :value="trainersList" showGridlines>
      <Column field="id" header="ID"></Column>
      <Column field="name" header="Тренер"></Column>
      <Column field="sportName" header="Вид спорта"></Column>
    </DataTable>
  </main>
</template>

<script setup>
import Button from 'primevue/button'
import InputText from 'primevue/inputtext'
import Select from "primevue/select";
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import {onMounted, ref} from "vue";
import { useToast } from "primevue/usetoast";
import api from '@/api'

const toast = useToast();
const trainersList = ref([])
const typesTraining = ref([])

const addTrainer = () => {

}

onMounted(async () => {
  try {
    typesTraining.value = await api.getTypesTraining()
    trainersList.value = await api.getTrainersList()
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
