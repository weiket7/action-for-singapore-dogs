import Vue from 'vue'
import Router from 'vue-router'
import Home from './pages/Home'
import Adopt from './pages/Adopt'

Vue.use(Router);

export default new Router({
  routes: [
    { path: '', name: 'Index', component: Home },
    { path: '/adopt', name: 'Adopt', component: Adopt },
  
  ]
})