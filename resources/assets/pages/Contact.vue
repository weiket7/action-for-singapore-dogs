<template>
  <div class="container content">
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
                    <a href="#">Donate</a>
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
                    <a href="#">Sponsor</a>
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
                    <a href="#">Volunteer</a>
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
          <div class="col-sm-6">
            <div class="contact-form-name">
              <label for="name">Name
                <span class="required">*</span>
              </label>
              <input type="text" v-model="contact.name" size="30" id="name" class="form-control" placeholder="Name" autofocus>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="contact-form-subject">
              <label for="subject">Subject
                <span class="required">*</span>
              </label>
              <input type="text" v-model="contact.subject" size="30" id="subject" class="form-control" placeholder="Subject">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="contact-form-phone">
              <label for="mobile">Mobile
                <span class="required">*</span>
              </label>
              <input type="text" v-model="contact.mobile" size="30" id="mobile" class="form-control" placeholder="Mobile">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="contact-form-email">
              <label for="email">Email address
                <span class="required">*</span>
              </label>
              <input type="email" v-model="contact.email" size="30" id="email" class="form-control" placeholder="Email">
            </div>
          </div>
          <div class="col-sm-12">

            <div class="contact-form-message">
              <label for="message">Message</label>
              <textarea rows="6" cols="45" v-model="contact.message" id="message" class="form-control" placeholder="Message"></textarea>
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
</template>

<script>
  import axios from 'axios'
  import Errors from '../../common/errors';

  export default {
    name: "contact",
    data() {
      return {
        contact: {},
        errors: new Errors(),
        success: false,
      }
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
  }
</script>

<style scoped>

</style>