import { createRouter, createWebHashHistory } from 'vue-router'
import HomeView from '../../views/HomeView.vue'
import BookView from '../../views/BookView.vue'
import LoginView from '../../views/LoginView.vue'
import RegisterView from '../../views/RegisterView.vue'

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
  },
  {
    path: '/api/login',
    name: 'login',
    component: LoginView,
  },
  {
    path: '/api/register',
    name: 'register',
    component: RegisterView,
  }
]

const router = createRouter({
  history: createWebHashHistory(process.env.BASE_URL),
  routes
})

export default router
