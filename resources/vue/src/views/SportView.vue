<template>
  <main>
    <h2>Виды спорта</h2>
    <div class="row-create">
      <InputText
        v-model="name"
        placeholder="Название"
      />
      <Button @click="addSport">Добавить вид спорта</Button>
    </div>
    <DataTable :value="typesTraining" showGridlines>
      <Column field="id" header="ID"></Column>
      <Column field="name" header="Название"></Column>
      <Column field="id" header="">
        <template #body="slotProps">
          <Button
            severity="danger"
            @click="removeSport(slotProps.data.id)"
          >
            Удалить
          </Button>
        </template>
      </Column>
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
const typesTraining = ref([])
const name = ref('')

const addSport = async () => {
  try {
    typesTraining.value = await api.createTrainingType(name.value)
  } catch (e) {
    toast.add({
      severity: 'error',
      summary: 'Error',
      detail: 'Произошла ошибка',
      life: 5000,
    });
  }
}

const removeSport = async (id) => {
  try {
    await api.removeTrainingType(id)
    typesTraining.value = typesTraining.value.filter(type => type.id !== id)
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
