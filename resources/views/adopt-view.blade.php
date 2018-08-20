<?php
  $meta_desc = $adopt->name. ' is a '.($adopt->gender=='M'?'male':'female')
    .' '.($adopt->hdb?'hdb approved':'non hdb approved').' dog available for adoption from Action for Singapore Dogs.'
?>

@extends('template', [
  'title'=>'ASD - Adopt '.$adopt->name,
  'meta_desc'=>$meta_desc,
  'og_image'=>url("/") . '/assets/images/adopts/' . $adopt->image
])

@section('content')
  <div id="app" class="container content">
    <div class="row">
      <div class="col-sm-12">
        <div itemscope="" class="product type-product row columns_padding_25">
          
          <div class="col-sm-6">
            <div class="images">
              <img src="{{ url('assets/images/adopts/'.$adopt->image) }}" class="attachment-shop_single wp-post-image" alt="" title="">
            </div>
          </div>
          
          <div class="summary entry-summary col-sm-6">
            <h1 itemprop="name" class="product_title entry-title black">@{{ adopt.name }}</h1>
            
            <p>
              <i v-if="adopt.gender == 'M'" class="fas fa-mars"></i>
              <i v-else class="fas fa-venus"></i>
              <span v-if="adopt.gender == 'M'">Male</span>
              <span v-else>Female</span>
              <br>
              
              <i class="fas fa-birthday-cake"></i> @{{ adopt.age }}
              <br>
              
              <i class="fas fa-home"></i>
              <span v-if="adopt.hdb">HDB Approved</span>
              <span v-else>Not HDB Approved</span><br>
            </p>
            
            <div itemprop="description">
              <p v-html="adopt.desc">
              </p>
            </div>
            
            <ul class="nav nav-tabs mt-20" role="tablist">
              <li class="active"><a href="#tab1" role="tab" data-toggle="tab">Adopt</a></li>
              <li><a href="#tab2" role="tab" data-toggle="tab">Sponsor</a></li>
            </ul>
            
            <div class="tab-content">
              <div class="tab-pane fade in active" id="tab1">
                <form class="form-horizontal" method="post">
                  
                  <span v-if="!has_heart">
                    Are you interested in adopting @{{ adopt.name }}? Click this <i @click="heartAdopt" class="fa fa-heart fa-2x adopt-heart"></i> to add @{{ adopt.gender == 'M' ? "him" : "her"}} to your Likes.
                  </span>
                  
                  <span v-else>
                    @{{ adopt.name }} is in your Likes. Click this <i @click="heartAdopt" class="fa fa-heart fa-2x adopt-heart highlight"></i> to remove @{{ adopt.gender == 'M' ? "him" : "her"}}
                  </span>
                  
                  <br><br>
                  
                  When you are ready, please go to your <a href="{{ url('i-want-to-adopt') }}">Likes</a>
                  to fill in the adoption form.
                </form>
              </div>
              <div class="tab-pane fade" id="tab2">
                <p>
                  You can sponsor @{{ adopt.name }} by making a one-time donation using cheque or giro.
                  <br><br>
                  Please download and fill in this <a href="asd-sponsorship-form" target="_blank">sponsorship form</a>.
                  <br><br>
                  Following, please mail it to:<br>
                  3 Jambol Place<br>
                  Singapore 119330
                </p>
              
              </div>
            </div>
            
            <p class="topmargin_20">
              <span class="rightpadding_20 fontsize_18 grey">Share:</span>
              <span class="small-icons">
					<a href="#" class="social-icon color-icon bg-icon rounded-icon soc-facebook"></a>
					<a href="#" class="social-icon color-icon bg-icon rounded-icon soc-twitter"></a>
				</span>
            </p>
          
          </div>
        </div>
        <!-- .product.row -->
      </div>
    </div>
  </div>

@endsection

@section('script')
  <script>
    var vm = new Vue({
      el: "#app",
      data: {
        adopt: {!! json_encode($adopt) !!},
        has_heart: false
      },
      methods: {
        heartAdopt() {
          this.has_heart = !this.has_heart;
          window.heartAdopt(this.adopt.adopt_id);
        }
      },
      created() {
        let hearts = getHearts();
        this.has_heart = hearts.indexOf(this.adopt.adopt_id) >= 0;
      }
    })
  </script>
@endsection