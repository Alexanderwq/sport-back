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
      <InputText
        v-model="description"
        placeholder="Описание"
      />
      <InputText
        v-model="jobTitle"
        placeholder="Заголовок вида спорта"
      />
      <FileUpload
        ref="photoUpload"
        mode="basic"
        accept="image/*"
        :maxFileSize="1000000"
        @select="onSelectPhoto"
      />

      <Button @click="addTrainer">Добавить тренера</Button>
    </div>
    <DataTable :value="trainersList" showGridlines>
      <Column field="id" header="ID"></Column>
      <Column field="name" header="Имя"></Column>
      <Column field="last_name" header="Фамилия"></Column>
      <Column field="job_title" header="Заголовок"></Column>
      <Column field="photo" header="Фото"></Column>
      <Column field="id" header="">
        <template #body="slotProps">
          <Button
            severity="danger"
            @click="removeTrainer(slotProps.data.id)"
          >
            Удалить
          </Button>
        </template>
      </Column>
    </DataTable>
  </main>
</template>

<script setup>
import FileUpload from "primevue/fileupload";
import Button from 'primevue/button'
import InputText from 'primevue/inputtext'
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import {onMounted, ref} from "vue";
import api from '~/api'

const trainersList = ref([])
const typesTraining = ref([])
const name = ref('')
const lastName = ref('')
const jobTitle = ref('')
const description = ref('')
const photoUpload = ref();

const onSelectPhoto = (event) => {
  photoUpload.value = event.files[0]
}

const addTrainer = async () => {
  if (name.value.length === 0 || lastName.value.length === 0) return

  try {
    trainersList.value = await api.createTrainer(
      name.value,
      lastName.value,
      jobTitle.value,
      photoUpload.value,
      description.value,
    )
  } catch (e) {
    alert('Произошла ошибка')
  }
}

const removeTrainer = async (id) => {
  try {
    await api.removeTrainer(id)
    trainersList.value = trainersList.value.filter(trainer => trainer.id !== id)
  } catch (e) {
    alert('Произошла ошибка')
  }
}

onMounted(async () => {
  try {
    typesTraining.value = await api.getTypesTraining()
    trainersList.value = await api.getTrainersList()
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
