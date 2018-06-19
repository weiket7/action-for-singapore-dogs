import Vue from 'vue'
import Router from 'vue-router'
import Dashboard from './pages/Dashboard'
import AdoptList from './pages/AdoptList'
import Adopt from './pages/Adopt'
import EventList from './pages/EventList'
import Event from './pages/Event'
import Person from './pages/Person'
import Adopter from './pages/Adopter'
import AdopterList from './pages/AdopterList'
import PersonList from './pages/PersonList'
import Rescuer from './pages/Rescuer'
import RescuerList from './pages/RescuerList'
import Foster from './pages/Foster'
import FosterList from './pages/FosterList'
import Volunteer from './pages/Volunteer'
import VolunteerList from './pages/VolunteerList'
import Donation from './pages/Donation'
import DonationList from './pages/DonationList'

Vue.use(Router)

export default new Router({
  routes: [
    { path: '/dashboard', name: 'Dashboard', component: Dashboard },
  
    { path: '/adopt', name: 'AdoptList', component: AdoptList },
    { path: '/adopt/save', name: 'AddAdopt', component: Adopt },
    { path: '/adopt/save/:adopt_id', name: 'SaveAdopt', component: Adopt },
    
    { path: '/event', name: 'EventList', component: EventList },
    { path: '/event/save/:event_id', name: 'Event', component: Event },
  
    { path: '/person', name: 'PersonList', component: PersonList },
    { path: '/person/save', name: 'AddPerson', component: Person },
    { path: '/person/save/:person_id', name: 'SavePerson', component: Person },
    
    { path: '/adopter', name: 'AdopterList', component: AdopterList },
    { path: '/adopter/save', name: 'AddAdopter', component: Adopter },
    { path: '/adopter/save/:adopter_id', name: 'SaveAdopter', component: Adopter },
  
    { path: '/foster', name: 'FosterList', component: FosterList },
    { path: '/foster/save', name: 'AddFoster', component: Foster },
    { path: '/foster/save/:foster_id', name: 'SaveFoster', component: Foster },
    
    { path: '/rescuer', name: 'RescuerList', component: RescuerList },
    { path: '/rescuer/save', name: 'AddRescuer', component: Rescuer },
    { path: '/rescuer/save/:rescuer_id', name: 'SaveRescuer', component: Rescuer },
  
    { path: '/volunteer', name: 'VolunteerList', component: VolunteerList },
    { path: '/volunteer/save', name: 'AddVolunteer', component: Rescuer },
    { path: '/volunteer/:volunteer_id', name: 'SaveVolunteer', component: Volunteer },
  
    { path: '/donation', name: 'DonationList', component: DonationList },
    { path: '/donation/:donation_id', name: 'SaveDonation', component: Donation },
  ]
})