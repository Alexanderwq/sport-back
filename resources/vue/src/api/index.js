import axios from "axios";

const client = axios.create({
  baseURL: '/'
})

export default {
  async getClientsList() {
    return (await client.get('/api/admin/clients')).data
  },

  async getScheduleList() {
    return (await client.get('/api/admin/schedule')).data
  },

  async getTrainersList() {
    return (await client.get('/api/admin/trainers')).data
  },

  async getTypesTraining() {
    return (await client.get('/api/admin/training_types')).data
  },

  async createTraining(trainerId, typeTraining, startTime, endTime) {
    return client.post('/api/admin/training/create', {
      trainerId,
      typeTraining,
      startTime,
      endTime,
    })
  },

  async createTrainer(name, lastName, jobTitle, photo, description) {
    return (await client.post('/api/admin/trainers', {
      name,
      lastName,
      jobTitle,
      photo,
      description,
    }, {
      headers: {
        "Content-Type": 'multipart/form-data',
      },
    })).data
  },

  async removeTrainer(id) {
    return (await client.delete(`/api/admin/trainers/${id}`))
  },

  async removeSchedule(id) {
    return (await client.delete(`/api/admin/schedule/${id}`))
  },

  async removeTrainingType(id) {
    return (await client.delete(`/api/admin/training_types/${id}`))
  },

  async createTrainingType(name, ids) {
    return (await client.post('/api/admin/training_types', {
      name,
      ids,
    })).data
  },

  async priceList() {
    return (await client.get('/api/prices')).data
  },

  async createPrice(typeTraining, trainersIds, oneVisit, monthVisit) {
    return (await client.post('/api/admin/prices', {
      typeTraining,
      trainersIds,
      oneVisit,
      monthVisit,
    }))
  },
}
