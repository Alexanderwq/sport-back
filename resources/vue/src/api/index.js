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
}
