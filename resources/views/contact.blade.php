@extends('template')

@section('content')
  <div id="app" class="container content">
    <div class="row">
      
      <div class="col-md-4" data-animation="scaleAppear">
        
        <div class="with_border with_padding_small">
          <ul class="list1 no-bullets no-top-border no-bottom-border">
            
            <li>
              <div class="media">
                <div class="media-left">
                  <i class="fas fa-donate highlight"></i>
                </div>
                <div class="media-body">
                  <h5 class="media-heading grey">
                    <router-link to="donate">Donate</router-link>
                  </h5>
                </div>
              </div>
            </li>
            <li>
              <div class="media">
                <div class="media-left">
                  <i class="fas fa-hand-holding-heart highlight"></i>
                </div>
                <div class="media-body">
                  <h5 class="media-heading grey">
                    <router-link to="pages/sponsor">Sponsor</router-link>
                  </h5>
                </div>
              </div>
            </li>
            <li>
              <div class="media">
                <div class="media-left">
                  <i class="fas fa-hands highlight fontsize_18"></i>
                </div>
                <div class="media-body">
                  <h5 class="media-heading grey">
                    <router-link to="volunteer">Volunteer</router-link>
                  </h5>
                </div>
              </div>
            </li>
          </ul>
        </div>
      
      </div>
      
      <div class="col-md-8" data-animation="scaleAppear">
        <h3 class="entry-title black">Contact</h3>
        
        <form @submit.prevent="onSubmit()" class="contact-form columns_padding_5" method="post" action="">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group no-mb">
                <label class="control-label">Name <span class="required">*</span></label>
                <input type="text" name="name" v-model="contact.name" class="form-control" autofocus>
                <span class="help-block error" v-if="errors.get('name')">
                  @{{ errors.get('name') }}
                </span>
              </div>
            </div>
            
            <div class="col-md-6">
              <div class="form-group no-mb">
                <label class="control-label">Email <span class="required">*</span></label>
                <input type="email" name="email" v-model="contact.email" class="form-control">
                <span class="help-block error" v-if="errors.get('email')">
                  @{{ errors.get('email') }}
                </span>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-6">
              <div class="form-group no-mb">
                <label class="control-label">Mobile <span class="required">*</span></label>
                <input type="text" name="mobile" v-model="contact.mobile" class="form-control">
                <span class="help-block error" v-if="errors.get('mobile')">
                  @{{ errors.get('mobile') }}
                </span>
              </div>
            </div>
            
            <div class="col-md-6">
              <div class="form-group no-mb">
                <label class="control-label">Subject <span class="required">*</span></label>
                <input type="text" name="subject" v-model="contact.subject" class="form-control">
                <span class="help-block error" v-if="errors.get('subject')">
                  @{{ errors.get('subject') }}
                </span>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-12">
              <div class="form-group no-mb">
                <label class="control-label">Message <span class="required">*</span></label>
                <textarea class="form-control" v-model="contact.message" rows="5"></textarea>
                <span class="help-block error" v-if="errors.get('message')">
                  @{{ errors.get('message') }}
                </span>
              </div>
            </div>
          </div>
          
          <div class="col-sm-12">
            
            <div class="contact-form-submit topmargin_30">
              <button type="submit" id="contact_form_submit" name="contact_submit" class="theme_button wide_button color1">Send Message</button>
              <button type="reset" id="contact_form_reset" name="contact_reset" class="theme_button wide_button">Clear Form</button>
            </div>
            
            <div class="alert alert-success mt-10" v-show="success">
              Thank you, we will get back to you when we can
            </div>
            <div class="alert alert-danger mt-10" v-show="errors.any()">
              There were some errors, please check the form
            </div>
          </div>
        
        </form>
      </div>
    
    </div>
  </div>
@endsection

@section('script')
  <script>
    var vm = new Vue({
      name: "contact",
      el: "#app",
      data: {
        contact: {},
        errors: new Errors(),
        success: false,
      },
      methods: {
        onSubmit() {
          axios.post("api/contact/form", this.contact)
            .then(this.onSuccess)
            .catch(this.onError)
        },
        onSuccess(response) {
          this.success = true;
          this.errors = new Errors();
        },
        onError(error) {
          if (error.response.status == 500) {
            alert("A system error occurred");
            return;
          }
          this.success = false;
          this.errors.record(error.response.data.errors);
        },
      },
    })
  </script>
@endsection