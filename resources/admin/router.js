import Vue from 'vue'
import Router from 'vue-router'
import Dashboard from './modules/Dashboard'
import DogList from './modules/DogList'
import Dog from './modules/Dog'

Vue.use(Router)

export default new Router({
  routes: [
    { path: '/dashboard', name: 'Dashboard', component: Dashboard },
    { path: '/dogs', name: 'DogList', component: DogList },
    { path: '/dogs/:adopt_id', name: 'Dog', component: Dog },
  ]
})