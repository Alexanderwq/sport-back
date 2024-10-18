import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import ScheduleListView from "~/views/ScheduleListView.vue";
import TrainersView from "~/views/TrainersView.vue";
import SportView from "~/views/SportView.vue";
import PriceView from "~/views/PriceView.vue";

const router = createRouter({
  history: createWebHistory(),
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
    {
      path: '/sports',
      name: 'Sports',
      component: SportView,
    },
    {
      path: '/price',
      name: 'Price',
      component: PriceView,
    },
  ]
})

export default router
