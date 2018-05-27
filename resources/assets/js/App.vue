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
                  <a href="%23/adopt">Adopt</a>
                </li>

                <!-- blog -->
                <li>
                  <a href="blog-right.html">Volunteer</a>
                  <ul>
                    <li>
                      <a href="index.html">Donate</a>
                    </li>
                    <li>
                      <a href="index_singlepage.html">SinglePage</a>
                    </li>
                    <li>
                      <a href="admin_index.html">Admin Dashboard</a>
                    </li>
                  </ul>
                </li>
                <!-- eof blog -->

                <li>
                  <a href="#">Donate</a>
                  <ul>
                    <li>
                      <a href="index.html">MultiPage</a>
                    </li>
                    <li>
                      <a href="index_singlepage.html">SinglePage</a>
                    </li>
                    <li>
                      <a href="admin_index.html">Admin Dashboard</a>
                    </li>
                  </ul>
                </li>
                <!-- eof features -->
                <li>
                  <a href="about.html">Events</a>
                  <ul>
                    <li>
                      <a href="index.html">MultiPage</a>
                    </li>
                    <li>
                      <a href="index_singlepage.html">SinglePage</a>
                    </li>
                    <li>
                      <a href="admin_index.html">Admin Dashboard</a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a href="about.html">Contact</a>
                  <ul>
                    <li>
                      <a href="index.html">MultiPage</a>
                    </li>
                    <li>
                      <a href="index_singlepage.html">SinglePage</a>
                    </li>
                    <li>
                      <a href="admin_index.html">Admin Dashboard</a>
                    </li>
                  </ul>
                </li>
                <!-- eof pages -->

                <li>
                  <a href="#" class="search_modal_button">
                    <i class="fa fa-search" aria-hidden="true"></i>
                  </a>
                </li>
              </ul>
            </nav>
            <!-- eof main nav -->
          </div>
        </div>
      </div>
    </header>

    <section class="ls section_padding_100">
      <router-view></router-view>
    </section>
  </div>
</template>

<script>
  import router from './router'

  export default {
    name: "app"
  }
</script>