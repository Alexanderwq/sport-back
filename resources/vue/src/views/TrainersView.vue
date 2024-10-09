<template>
  <main>
    <h2>Список тренеров</h2>
    <div class="row-create">
      <InputText
        v-model="name"
        placeholder="Имя"
      />
      <InputText
        v-model="lastName"
        placeholder="Фамилия"
      />

      <Button @click="addTrainer">Добавить тренера</Button>
    </div>
    <DataTable :value="trainersList" showGridlines>
      <Column field="id" header="ID"></Column>
      <Column field="name" header="Имя"></Column>
      <Column field="last_name" header="Фамилия"></Column>
    </DataTable>
  </main>
</template>

<script setup>
import Button from 'primevue/button'
import InputText from 'primevue/inputtext'
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import {onMounted, ref} from "vue";
import { useToast } from "primevue/usetoast";
import api from '@/api'

const toast = useToast();
const trainersList = ref([])
const typesTraining = ref([])
const name = ref('')
const lastName = ref('')

const addTrainer = async () => {
  if (name.value.length === 0 || lastName.value.length === 0) return

  try {
    trainersList.value = await api.createTrainer(name.value, lastName.value)
  } catch (e) {
    toast.add({
      severity: 'error',
      summary: 'Error',
      detail: 'Произошла ошибка',
      life: 5000,
    });
  }
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
