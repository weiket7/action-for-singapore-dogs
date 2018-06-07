<template>
  <div class="container mt-30">
    <!--<div class="row">
      <div class="progress">
        <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
             aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
          40% Complete (success)
        </div>
      </div>
    </div>-->

    <h2>Adoption Form</h2>

    <form>
      <div class="row">
        <div class="col-md-12 text-center">
          <h3 class="adoption-form-header">I wish to adopt</h3>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 text-right">
          <img src="assets/images/adopts/luckystrike.jpg" alt="" title="" class="attachment-shop_single wp-post-image" style="max-height:200px">
        </div>

        <div class="col-md-6">
          Kodomo
          <p data-v-07de00ee="">
            <i data-v-07de00ee="" class="fas fa-mars"></i> <span data-v-07de00ee="">Male</span> <br data-v-07de00ee="">
            <i data-v-07de00ee="" class="fas fa-birthday-cake"></i> 10 yrs
            <br data-v-07de00ee="">
            <i data-v-07de00ee="" class="fas fa-home"></i> <span data-v-07de00ee="">Not HDB Approved</span><br data-v-07de00ee=""></p>
        </div>
      </div>

      <h3 class="adoption-form-header">Personal Info</h3>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group no-mb">
            <label class="control-label">Name</label>
            <input type="text" class="form-control" autofocus>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group no-mb">
            <label class="control-label">Mobile</label>
            <input type="text" class="form-control">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group no-mb">
            <label class="control-label">Email</label>
            <input type="text" class="form-control">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group no-mb">
            <label class="control-label">Address</label>
            <input type="text" class="form-control">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group no-mb">
            <label class="control-label">Occupation</label>
            <input type="text" class="form-control">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group no-mb">
            <label class="control-label">Working Hours</label>
            <input type="text" class="form-control">
          </div>
        </div>
      </div>

      <h3 class="adoption-form-header">Experience with Dogs</h3>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group no-mb">
            <label class="control-label">Have you had dog(s) before?</label>
            <input type="text" class="form-control">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group no-mb">
            <label class="control-label">Do you currently have dog(s)?</label>
            <input type="text" class="form-control">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group no-mb">
            <label class="control-label">Why do you want a dog?</label>
            <textarea class="form-control" rows="3"></textarea>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group no-mb">
          </div>
        </div>
      </div>

      <h3 class="adoption-form-header">Family and Home</h3>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group no-mb">
            <label class="control-label">What type of housing do you live in?</label>
            <input type="text" class="form-control">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group no-mb">
            <label class="control-label">Do you have a domestic helper?</label>
            <input type="text" class="form-control">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group no-mb">
            <label class="control-label">How many family member(s) stay with you?</label>
            <input type="text" class="form-control">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group no-mb">
            <label class="control-label">What age(s) are your family member(s)?</label>
            <input type="text" class="form-control">
          </div>
        </div>
      </div>

      <hr>

      <div class="row">
        <div class="col-md-12 text-center">
          <button type="submit" class="btn btn-default">I wish to adopt</button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
  export default {
    name: "adoption-form"
  }
</script>