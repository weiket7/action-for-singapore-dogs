import Vue from 'vue'
import Router from 'vue-router'
import Home from './pages/Home'
import Adopt from './pages/Adopt'
import AdoptView from './pages/AdoptView'
import Donate from './pages/Donate'
import Volunteer from './pages/Volunteer'
import Events from './pages/Events'
import Contact from './pages/Contact'

Vue.use(Router);

export default new Router({
  routes: [
    { path: '', name: 'Index', component: Home },
    { path: '/adopt', name: 'Adopt', component: Adopt },
    { path: '/adopt/:adopt_id', name: 'AdoptView', component: AdoptView },
    { path: '/donate', name: 'Donate', component: Donate },
    { path: '/volunteer', name: 'Volunteer', component: Volunteer },
    { path: '/events', name: 'Events', component: Events },
    { path: '/contact', name: 'Contact', component: Contact },
  ]
})