<template>
  <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
    <li v-for="menu in menus" class="m-menu__item" aria-haspopup="true" >
    <router-link v-bind:to="'/'+menu.link" class="m-menu__link ">
      <i class="m-menu__link-icon fa" :class="'fa-'+menu.icon"></i>
      <span class="m-menu__link-title">
        <span class="m-menu__link-wrap">
          <span class="m-menu__link-text">
            {{ menu.name }}
          </span>
          <span v-if="menu.badge" class="m-menu__link-badge">
            <span class="m-badge m-badge--danger">
              {{ menu.badge }}
            </span>
          </span>
        </span>
      </span>
    </router-link>
  </li>
  </ul>
</template>

<script>
  export default {
    name: "menu-component",
    props: ["menus"]
  }
</script>