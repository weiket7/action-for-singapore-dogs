<template>
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1 text-center">
        <h2 class="section_header bold">Be A
          <span class="highlight">Volunteer</span>
        </h2>
        <p>
          Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
        </p>
      </div>
    </div>
    <div class="row mt-20">
      <div class="col-md-6">
        <!--<h2 class="black highlight">Donator</h2>-->
        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
        <form class="donator-form topmargin_30 form-horizontal" id="donatorform" method="post" action="">
          <div class="form-group">
            <label for="name" class="col-sm-3 control-label">Name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="name" autofocus>
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-sm-3 control-label">Email</label>
            <div class="col-sm-9">
              <input type="email" class="form-control" id="email">
            </div>
          </div>
          <div class="form-group">
            <label for="mobile" class="col-sm-3 control-label">Mobile</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="mobile">
            </div>
          </div>
          <div class="form-group">
            <label for="mobile" class="col-sm-3 control-label">I'm interested in</label>
            <div class="col-sm-9">
              <div class="checkbox">
                <label>
                  <input type="checkbox" value=""> Rescue
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" value=""> Rehoming
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" value=""> Fostering
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" value=""> Volunteer at Adoption & Rescue Centre (ARC)
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" value=""> Publicity
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" value=""> Fund Raising & Events
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" value=""> Logistics
                </label>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-12 col-sm-offset-3">
              <button type="submit" name="submit" class="theme_button">Submit</button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-6 text-center bottommargin_0">
        <img src="assets/images/volunteer.jpg" alt="" />
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: "Volunteer"
  }
</script>