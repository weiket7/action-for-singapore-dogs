<template>
  <div id="app" class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
    <!-- BEGIN: Left Aside -->
    <button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
      <i class="la la-close"></i>
    </button>
    <div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
      <!-- BEGIN: Aside Menu -->
      <div
        id="m_ver_menu"
        class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark "
        data-menu-vertical="true"
        data-menu-scrollable="false" data-menu-dropdown-timeout="500"
      >
        <menu-component :menus="[{ 'name': 'Dashboard', 'link': 'dashboard', 'icon': 'dashboard' },
        { 'name': 'Dogs', 'link': 'adopt', 'icon': 'user' },
        { 'name': 'Events', 'link': 'event', 'icon': 'car' },
        { 'name': 'Volunteers', 'link': 'volunteers', 'icon': 'car' },
        { 'name': 'Donations', 'link': 'donations', 'icon': 'business' },
        { 'name': 'Sponsorships', 'link': 'sponsorships', 'icon': 'coins' },
        { 'name': 'Rescuers', 'link': 'sponsorships', 'icon': 'coins' },
        { 'name': 'Fosters', 'link': 'sponsorships', 'icon': 'coins' }
        ]"/>
      </div>
      <!-- END: Aside Menu -->
    </div>
    <!-- END: Left Aside -->
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
      <!-- BEGIN: Subheader -->
      <!--<div class="m-subheader ">
        <div class="d-flex align-items-center">
          <div class="mr-auto">
            <h3 class="m-subheader__title ">
              Dashboard
            </h3>
          </div>
          <div>
            <span class="m-subheader__daterange" id="m_dashboard_daterangepicker">
              <span class="m-subheader__daterange-label">
                <span class="m-subheader__daterange-title"></span>
                <span class="m-subheader__daterange-date m--font-brand"></span>
              </span>
              <a href="#" class="btn btn-sm btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                <i class="la la-angle-down"></i>
              </a>
            </span>
          </div>
        </div>
      </div>-->
      <!-- END: Subheader -->
      <div class="m-content">
          <router-view></router-view>
      </div>
    </div>
  </div>
</template>

<script>
  toastr.options.positionClass = "toast-top-center";
  
  import MenuComponent from './components/MenuComponent'

  export default {
    name: 'app',
    data () {
      return {
        msg: 'Welcome to Your Vue.js App'
      }
    },
    components: {
      'menu-component': MenuComponent
    }
  }
</script>