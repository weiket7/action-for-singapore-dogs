<template>
  <div class="container content">
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
        <form @submit.prevent="onSubmit()" class="donator-form topmargin_30 form-horizontal" id="donatorform" method="post" action="">
          <div class="form-group">
            <label for="name" class="col-sm-3 control-label">Name</label>
            <div class="col-sm-9">
              <input type="text" v-model="volunteer.name" class="form-control" id="name" autofocus>
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-sm-3 control-label">Email</label>
            <div class="col-sm-9">
              <input type="email" v-model="volunteer.email" class="form-control" id="email">
            </div>
          </div>
          <div class="form-group">
            <label for="mobile" class="col-sm-3 control-label">Mobile</label>
            <div class="col-sm-9">
              <input type="text" v-model="volunteer.mobile" class="form-control" id="mobile">
            </div>
          </div>
          <div class="form-group">
            <label for="birthday" class="col-sm-3 control-label">Birthday</label>
            <div class="col-sm-9">
              <input type="text" class="form-control datepicker" id="birthday" readonly>
            </div>
          </div>
          <div class="form-group">
            <label for="gender" class="col-sm-3 control-label">Gender</label>
            <div class="col-sm-9">
              <label class="radio-inline">
                <input type="radio" v-model="volunteer.gender" name="gender" value="M"> Male
              </label>
              <label class="radio-inline">
                <input type="radio" v-model="volunteer.gender" name="gender" value="F"> Female
              </label>
            </div>
          </div>
          <div class="form-group">
            <label for="mobile" class="col-sm-3 control-label">I'm interested in</label>
            <div class="col-sm-9">
              <div class="checkbox">
                <label>
                  <input type="checkbox" v-model="volunteer.interests" value="Rescuing"> Rescuing
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" v-model="volunteer.interests" value="Rehoming"> Rehoming
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" v-model="volunteer.interests" value="Fostering"> Fostering
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" v-model="volunteer.interests" value="Volunteering"> Volunteer at Adoption & Rescue Centre (ARC)
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" v-model="volunteer.interests" value="Publicity"> Publicity
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" v-model="volunteer.interests" value="Fund Raising & Events"> Fund Raising & Events
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" v-model="volunteer.interests" value="Logistics"> Logistics
                </label>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-12 col-sm-offset-3">
              <button type="submit" name="submit" class="theme_button">Submit</button>

              <div class="alert alert-success mt-10" v-show="success">
                Thank you
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-6 text-center bottommargin_0">
        <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
          <panel title="Rescuing" id="rescuing">
            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
          </panel>
          <panel title="Rehoming" id="rehoming">
            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
          </panel>
          <panel title="Fostering" id="fostering">
            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
          </panel>
          <panel title="Volunteering at Adoption & Rescue Centre (ARC)" id="volunteering">
            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
          </panel>
          <panel title="Publicity" id="publicity">
            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
          </panel>
          <panel title="Fund Raising & Events" id="fund-raising-events">
            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
          </panel>
          <panel title="Logistics" id="logistics">
            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
          </panel>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import Panel from '../components/Panel';
  import axios from 'axios';
  import moment from 'moment';

  export default {
    name: "Volunteer",
    data() {
      return {
        volunteer: { name: "", mobile: "", email: "", interests: [] },
        success: false
      }
    },
    components: {
      Panel
    },
    mounted() {
      let vue = this
      this.$nextTick(function() {
        $( ".datepicker" ).datepicker({
          changeMonth: true,
          changeYear: true,
          dateFormat: 'd M yy',
          onSelect: function(value, date) {
            vue.updateBirthday(moment(value, 'DD MMM YYYY').format('YYYY-MM-DD'));
          }
        });
      });
    },
    methods: {
      updateBirthday(date) {
        this.volunteer.birthday = date;
      },
      onSubmit() {
        axios.post('api/volunteer/form', this.volunteer)
          .then(this.onSuccess)
          .catch(this.onError);
      },
      onSuccess(response) {
        this.success = true;
      },
      onError(error) {
        if (error.response.status == 500) {
          toastr.error("A system error occurred");
          return;
        }
        toastr.error("There were some errors, please check the form");
        this.errors.record(error.response.data.errors);
      },
    }
  }
</script>