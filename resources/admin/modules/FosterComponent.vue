<template>
  <div>
    <div class="form-group m-form__group row no-pb">
      <label-component>Type</label-component>
      <div class="col-lg-3">
        <div class="m-radio-inline">
          <label class="m-radio">
            <input type="radio" checked :name="'foster-type-'+index" value="E" @click="existingFoster()">
            Existing
            <span></span>
          </label>
          <label class="m-radio">
            <input type="radio" value="N" :name="'foster-type-'+index" @click="newFoster()">
            New
            <span></span>
          </label>
        </div>
      </div>
      
      <label-component>Name</label-component>
      <div class="col-lg-3">
        <select :id="'foster-name-'+index" v-show="type == 'E'" class="form-control m-input" @change="updateValue($event.target.value)"></select>
        <input type="text" v-model="foster.name" v-show="type == 'N'" class="form-control"></input>
      </div>
    
    </div>
    
    <div class="form-group m-form__group row">
      <label-component>Mobile</label-component>
      <static-text v-if="type == 'E'" :value="foster.mobile"></static-text>
      <textbox-component v-else></textbox-component>
      
      <label-component>Address</label-component>
      <static-text v-if="type == 'E'" :value="foster.address"></static-text>
      <textbox-component v-else></textbox-component>
    </div>
    
    <div class="form-group m-form__group row">
      <label-component>Start Date</label-component>
      <datepicker-component :name="'start_date-'+index"></datepicker-component>
    
      <label-component>End Date</label-component>
      <datepicker-component :name="'end_date-'+index"></datepicker-component>
    </div>

    <person-remark></person-remark>

    <form-row>
      <div class="col-lg-2"></div>
      <div class="col-lg-8">
        <button type="button" @click="removeFoster()" class="btn btn-metal btn-sm">Remove Row</button>
      </div>
    </form-row>

    <hr>
  </div>
</template>

<script>
  import axios from 'axios'
  import PersonRemark from "./PersonRemark";

  export default {
    name: "foster-component",
    data() {
      return {
        type: "E",
        foster: { },
        options: [{"E": "Existing", "N": "New"}]
      }
    },
    props: ['index'],
    methods: {
      getFoster(foster_id) {
        axios.get('api/person/get/' + foster_id)
          .then(response => {
            this.foster = response.data;
            this.$emit('update-foster', { index: this.index, foster: this.foster});
          })
          .catch(error => { console.log(error); });
      },
      removeFoster() {
        //console.log("remove index=" + this.index);
        this.$emit('remove-foster', this.index);
      },
      existingFoster() {
        $("#foster-name-"+this.index).next().show();
        this.type = "E";
      },
      newFoster() {
        $("#foster-name-"+this.index).next().hide();
        this.type = "N";
      },
      addRemarkRow() {
        this.remarks.push({});
      },
      removeRemarkRow(index) {
        this.remarks.splice(index, 1);
      },
    },
    mounted() {
      var vue = this
      $("#foster-name-"+this.index).select2({
        width: '100%',
        minimumInputLength: 2,
        placeholder: "Search",
        ajax: {
          url: 'api/person/search?type=f',
          dataType: 'json',
          data: function (term, page) {
            return {
              term: term.term
            };
          },
          processResults: function (data) {
            return { results: data };
          },
        }
      }).on("select2:select", function() {
        //vue.$nextTick(function() {
        let foster_id = $(this).val();
        console.log('select = ' + foster_id);
        vue.getFoster(foster_id);
        //});
        
      });
    },
    components: {
      PersonRemark
    }
  }
</script>

<style scoped>

</style>