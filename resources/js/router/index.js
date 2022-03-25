import { createRouter, createWebHashHistory } from 'vue-router'
import HomeView from '../../views/HomeView.vue'
import BookView from '../../views/BookView.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/api/books',
    name: 'books',
    component: BookView,
  }
]

const router = createRouter({
  history: createWebHashHistory(process.env.BASE_URL),
  routes
})

export default router
