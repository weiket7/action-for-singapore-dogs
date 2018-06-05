import Vue from 'vue'
import Router from 'vue-router'
import Dashboard from './pages/Dashboard'
import AdoptList from './pages/AdoptList'
import Adopt from './pages/Adopt'
import EventList from './pages/EventList'
import Event from './pages/Event'
import RescuerList from './pages/RescuerList'
import FosterList from './pages/FosterList'

Vue.use(Router)

export default new Router({
  routes: [
    { path: '/dashboard', name: 'Dashboard', component: Dashboard },
    { path: '/adopt', name: 'AdoptList', component: AdoptList },
    { path: '/adopt/:adopt_id', name: 'Adopt', component: Adopt },
    { path: '/event', name: 'EventList', component: EventList },
    { path: '/event/:event_id', name: 'Event', component: Event },
    { path: '/rescuer', name: 'RescuerList', component: RescuerList },
    { path: '/foster', name: 'FosterList', component: FosterList },


  ]
})