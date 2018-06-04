<template>
  <div>
    <header class="page_header header_yellow bordered_items">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 text-center">
            <!-- main nav start -->
            <nav class="mainmenu_wrapper">
              <ul class="mainmenu nav sf-menu">
                <li class="active">
                  <router-link :to="'/about'" :data-target="'about'">About</router-link>
                  <ul>
                    <li>
                      <a href="index.html">Who We Are</a>
                    </li>
                    <li>
                      <a href="index.html">Adoption & Rescue Centre (ARC)</a>
                    </li>
                    <li>
                      <a href="index_singlepage.html">Media</a>
                    </li>
                  </ul>
                </li>

                <li>
                  <a href="#">Adopt</a>
                  <ul>
                    <li>
                      <router-link :to="'/adopt'" :data-target="'adopt'">Adoption Gallery</router-link>
                    </li>
                    <li>
                      <a href="index_singlepage.html">Why Adopt a Dog</a>
                    </li>
                    <li>
                      <a href="index_singlepage.html">Adoption Procedure</a>
                    </li>
                    <li>
                      <a href="index_singlepage.html">Project Adore</a>
                    </li>
                  </ul>
                </li>

                <li>
                  <router-link :to="'/volunteer'" :data-target="'volunteer'">Volunteer</router-link>
                </li>

                <li>
                  <router-link :to="'/donate'" :data-target="'donate'">Donate</router-link>
                </li>
                <li>
                  <router-link :to="'/events'" :data-target="'events'">Events</router-link>
                </li>
                <li>
                  <router-link :to="'/contact'" :data-target="'contact'">Contact</router-link>
                </li>
              </ul>
            </nav>
            <!-- eof main nav -->
          </div>
        </div>
      </div>
    </header>

    <section class="ls">
      <router-view></router-view>
    </section>
  </div>
</template>

<script>

  export default {
    name: "app"
  }
</script>