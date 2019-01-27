import Vue from 'vue'
import Router from 'vue-router'
import Dashboard from './pages/Dashboard'
import AdoptList from './pages/AdoptList'
import Adopt from './pages/Adopt'
import EventList from './pages/EventList'
import Event from './pages/Event'
import BlogList from './pages/BlogList'
import Blog from './pages/Blog'
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
import Banner from './pages/Banner'
import BannerList from './pages/BannerList'
import AdoptionForm from './pages/AdoptionForm'
import AdoptionFormList from './pages/AdoptionFormList'
import Gift from './pages/Gift'
import GiftList from './pages/GiftList'
import Testimonial from './pages/Testimonial'
import TestimonialList from './pages/TestimonialList'
import User from './pages/User'
import UserList from './pages/UserList'
import Page from './pages/Page'
import PageList from './pages/PageList'
import PageHome from './pages/PageHome'

Vue.use(Router)

export default new Router({
  routes: [
    { path: '/dashboard', name: 'Dashboard', component: Dashboard },
  
    { path: '/adopt', name: 'AdoptList', component: AdoptList },
    { path: '/adopt/save', name: 'AddAdopt', component: Adopt },
    { path: '/adopt/save/:adopt_id', name: 'SaveAdopt', component: Adopt },
    
    { path: '/event', name: 'EventList', component: EventList },
    { path: '/event/save', name: 'AddEvent', component: Event },
    { path: '/event/save/:event_id', name: 'Event', component: Event },
  
    { path: '/blog', name: 'BlogList', component: BlogList },
    { path: '/blog/save', name: 'AddBlog', component: Blog },
    { path: '/blog/save/:blog_id', name: 'Blog', component: Blog },
  
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
    { path: '/volunteer/save/:volunteer_id', name: 'SaveVolunteer', component: Volunteer },
  
    { path: '/donation', name: 'DonationList', component: DonationList },
    { path: '/donation/save/:donation_id', name: 'SaveDonation', component: Donation },
  
    { path: '/banner', name: 'BannerList', component: BannerList },
    { path: '/banner/save', name: 'AddBanner', component: Banner },
    { path: '/banner/save/:banner_id', name: 'SaveBanner', component: Banner },
    
    { path: '/adoption-form', name: 'AdoptionFormList', component: AdoptionFormList },
    { path: '/adoption-form/save', name: 'AddAdoptionForm', component: AdoptionForm },
    { path: '/adoption-form/save/:adoption_form_id', name: 'SaveAdoptionForm', component: AdoptionForm },
  
    { path: '/gift', name: 'GiftList', component: GiftList },
    { path: '/gift/save', name: 'AddGift', component: Gift },
    { path: '/gift/save/:gift_id', name: 'SaveGift', component: Gift },
    
    { path: '/testimonial', name: 'TestimonialList', component: TestimonialList },
    { path: '/testimonial/save', name: 'AddTestimonial', component: Testimonial },
    { path: '/testimonial/save/:testimonial_id', name: 'SaveTestimonial', component: Testimonial },
  
    { path: '/user', name: 'UserList', component: UserList },
    { path: '/user/save', name: 'AddUser', component: User },
    { path: '/user/save/:user_id', name: 'SaveUser', component: User },
    
    { path: '/page', name: 'PageList', component: PageList },
    { path: '/page/home', name: 'SaveHome', component: PageHome },
    { path: '/page/save/:page_id', name: 'SavePage', component: Page },
  ]
})