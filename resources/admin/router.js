import Vue from 'vue'
import Router from 'vue-router'
import Dashboard from './pages/Dashboard'
import AdoptList from './pages/AdoptList'
import Adopt from './pages/Adopt'
import EventList from './pages/EventList'
import Event from './pages/Event'
import Person from './pages/Person'
import AdopterList from './pages/AdopterList'
import PersonList from './pages/PersonList'
import RescuerList from './pages/RescuerList'
import FosterList from './pages/FosterList'
import Volunteer from './pages/Volunteer'
import VolunteerList from './pages/VolunteerList'

Vue.use(Router)

export default new Router({
  routes: [
    { path: '/dashboard', name: 'Dashboard', component: Dashboard },
  
    { path: '/adopt', name: 'AdoptList', component: AdoptList },
    { path: '/adopt/save', name: 'Adopt', component: Adopt },
    { path: '/adopt/save/:adopt_id', name: 'Adopt', component: Adopt },
    
    { path: '/event', name: 'EventList', component: EventList },
    { path: '/event/:event_id', name: 'Event', component: Event },
  
    { path: '/person', name: 'PersonList', component: PersonList },
    { path: '/person/:person_id', name: 'Person', component: Person },
    { path: '/adopter', name: 'AdopterList', component: AdopterList },
    { path: '/rescuer', name: 'RescuerList', component: RescuerList },
    { path: '/foster', name: 'FosterList', component: FosterList },
    { path: '/volunteer', name: 'VolunteerList', component: VolunteerList },
    { path: '/volunteer/:volunteer_id', name: 'Volunteer', component: Volunteer },


  ]
})