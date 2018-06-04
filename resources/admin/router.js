import Vue from 'vue'
import Router from 'vue-router'
import Dashboard from './modules/Dashboard'
import AdoptList from './modules/AdoptList'
import Adopt from './modules/Adopt'
import EventList from './modules/EventList'
import Event from './modules/Event'

Vue.use(Router)

export default new Router({
  routes: [
    { path: '/dashboard', name: 'Dashboard', component: Dashboard },
    { path: '/adopt', name: 'AdoptList', component: AdoptList },
    { path: '/adopt/:adopt_id', name: 'Adopt', component: Adopt },
    { path: '/event', name: 'EventList', component: EventList },
    { path: '/event/:event_id', name: 'Event', component: Event },
  ]
})