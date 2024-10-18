<template>
  <main>
    <h2>Цены</h2>
    <div class="row-create">
      <Select
        placeholder="Тип тренировки"
        optionLabel="name"
        :options="typesTraining"
        v-model="selectedTypeTraining"
      />
      <InputText
        v-model="oneVisit"
        type="number"
        placeholder="Цена за один визит"
      />
      <InputText
        v-model="monthVisit"
        type="number"
        placeholder="Цена за месяц"
      />

      <Button @click="addPrice">Добавить направление</Button>
    </div>
    <DataTable :value="priceList" showGridlines>
      <Column field="id" header="ID"></Column>
      <Column field="name" header="Название"></Column>
      <Column header="Инструкторы">
        <template #body="slotProps">
          <div v-for="trainer in slotProps.data.trainers">
            {{ trainer.name }} {{ trainer.last_name }}
          </div>
        </template>
      </Column>
      <Column field="one_visit" header="Цена за один визит"></Column>
      <Column field="month_visit" header="Цена за месяц"></Column>
      <Column field="id" header="">
        <template #body="slotProps">
          <Button
            severity="danger"
            @click="removePrice(slotProps.data.id)"
          >
            Удалить
          </Button>
        </template>
      </Column>
    </DataTable>
  </main>
</template>

<script setup>
import MultiSelect from "primevue/multiselect";
import Button from 'primevue/button'
import InputText from 'primevue/inputtext'
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import {onMounted, ref} from "vue";
import api from '~/api'
import Select from "primevue/select";

const priceList = ref([])
const typesTraining = ref([])
const oneVisit = ref()
const monthVisit = ref()
const selectedTypeTraining = ref()

const addPrice = async () => {
  try {
    await api.createPrice(
      selectedTypeTraining.value.id,
      oneVisit.value,
      monthVisit.value,
    )
    priceList.value = await api.priceList()
  } catch (e) {
    alert('Произошла ошибка')
  }
}

const removePrice = async (id) => {
  try {
    await api.removeTrainer(id)
  } catch (e) {
    alert('Произошла ошибка')
  }
}

onMounted(async () => {
  try {
    priceList.value = await api.priceList()
    typesTraining.value = await api.getTypesTraining()
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
