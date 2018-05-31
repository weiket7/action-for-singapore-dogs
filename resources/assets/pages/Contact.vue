<template>
  <div class="container">
    <div class="row">

      <div class="col-md-8" data-animation="scaleAppear">
        <h2 class="section_header bold">Contact</h2>

        <form class="contact-form columns_padding_5" method="post" action="./">
          <div class="col-sm-6">
            <div class="contact-form-name">
              <label for="name">Name
                <span class="required">*</span>
              </label>
              <input type="text" aria-required="true" size="30" value="" name="name" id="name" class="form-control" placeholder="Name" autofocus>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="contact-form-subject">
              <label for="subject">Subject
                <span class="required">*</span>
              </label>
              <input type="text" aria-required="true" size="30" value="" name="subject" id="subject" class="form-control" placeholder="Subject">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="contact-form-phone">
              <label for="phone">Phone
                <span class="required">*</span>
              </label>
              <input type="text" aria-required="true" size="30" value="" name="Mobile" id="Mobile" class="form-control" placeholder="Mobile">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="contact-form-email">
              <label for="email">Email address
                <span class="required">*</span>
              </label>
              <input type="email" aria-required="true" size="30" value="" name="email" id="email" class="form-control" placeholder="Email">
            </div>
          </div>
          <div class="col-sm-12">

            <div class="contact-form-message">
              <label for="message">Message</label>
              <textarea aria-required="true" rows="6" cols="45" name="message" id="message" class="form-control" placeholder="Message"></textarea>
            </div>
          </div>

          <div class="col-sm-12">

            <div class="contact-form-submit topmargin_30">
              <button type="submit" id="contact_form_submit" name="contact_submit" class="theme_button wide_button color1">Send Message</button>
              <button type="reset" id="contact_form_reset" name="contact_reset" class="theme_button wide_button">Clear Form</button>
            </div>
          </div>


        </form>
      </div>

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

    </div>
  </div>
</template>

<script>
  export default {
    name: "ontact"
  }
</script>

<style scoped>

</style>