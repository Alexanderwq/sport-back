import axios from "axios";

const client = axios.create({
  baseURL: 'http://localhost:8000'
})

export default {
  async getClientsList() {
    return (await client.get('/api/admin/clients')).data
  },

  async getScheduleList() {
    return (await client.get('/api/admin/schedule')).data
  },

  async getTrainersList() {
    return [
      {
        id: 1,
        name: 'Юля'
      }
    ]
  },

  async getTypesTraining() {
    return [
      {
        id: 1,
        name: 'Футбол'
      }
    ]
  },

  async createTraining(trainerId, typeTraining, startTime, endTime) {
    return client.post('/api/admin/training/create', {
      trainerId,
      typeTraining,
      startTime,
      endTime,
    })
  },
}
