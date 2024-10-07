import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import ScheduleListView from "@/views/ScheduleListView.vue";
import TrainersView from "@/views/TrainersView.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/schedule',
      name: 'schedule',
      component: ScheduleListView,
    },
    {
      path: '/trainers',
      name: 'Trainers',
      component: TrainersView,
    },
  ]
})

export default router
