import Vue from 'vue'
import Router from 'vue-router'
import Dashboard from './modules/Dashboard'
import DogList from './modules/DogList'
import Dog from './modules/Dog'
import EventList from './modules/EventList'
import Event from './modules/Event'

Vue.use(Router)

export default new Router({
  routes: [
    { path: '/dashboard', name: 'Dashboard', component: Dashboard },
    { path: '/dogs', name: 'DogList', component: DogList },
    { path: '/dogs/:adopt_id', name: 'Dog', component: Dog },
    { path: '/events', name: 'EventList', component: EventList },
    { path: '/events/:event_id', name: 'Event', component: Event },
  ]
})