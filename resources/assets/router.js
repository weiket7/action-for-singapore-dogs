import Vue from 'vue'
import Router from 'vue-router'
import Home from './pages/Home'
import Adopt from './pages/Adopt'
import AdoptView from './pages/AdoptView'
import Donate from './pages/Donate'
import Volunteer from './pages/Volunteer'
import Events from './pages/Events'
import EventView from './pages/EventView'
import Contact from './pages/Contact'
import HeartList from './pages/HeartList'
import ComingSoon from './pages/ComingSoon'

Vue.use(Router);

export default new Router({
  routes: [
    { path: '', name: 'Index', component: Home },
    { path: '/dogs-for-adoption', name: 'Adopt', component: Adopt },
    { path: '/i-want-to-adopt', name: 'HeartList', component: HeartList },
    { path: '/adopt/:slug', name: 'AdoptView', component: AdoptView },
    { path: '/donate', name: 'Donate', component: Donate },
    { path: '/volunteer', name: 'Volunteer', component: Volunteer },
    { path: '/events', name: 'Events', component: Events },
    { path: '/events/:slug', name: 'EventView', component: EventView },
    { path: '/contact', name: 'Contact', component: Contact },
    { path: '/coming-soon', name: 'ComingSoon', component: ComingSoon },
  ]
})