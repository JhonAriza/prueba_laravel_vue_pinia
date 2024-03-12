import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import LoginView from '../views/LoginView.vue'
import RegisterView from '../views/RegisterView.vue'
import CreateView from '../views/CreateView.vue'
import UpdateView from '../views/UpdateView.vue' // Cambié el nombre de la ruta UpdateView

const routes = [
  {
    path: '/',
    name: 'login',
    component: LoginView
  },
  {
    path: '/register',
    name: 'register',
    component: RegisterView
  },
  {
    path: '/home',
    name: 'home',
    component: HomeView
  },
  {
    path: '/create',
    name: 'createView',
    component: CreateView
  },
  {
    path: '/update/:id',
    name: 'updateView', // Cambié el nombre de la ruta a 'updateView'
    component: UpdateView
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
