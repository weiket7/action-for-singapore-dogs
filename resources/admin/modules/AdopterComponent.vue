<template>
  <div>
    <div class="form-group m-form__group row no-pb">
      <label-component>Type</label-component>
      <div class="col-lg-3">
        <div class="m-radio-inline">
          <label class="m-radio">
            <input type="radio" checked :name="'adopter-type-'+index" value="E" @click="existingAdopter()">
              Existing
            <span></span>
          </label>
          <label class="m-radio">
            <input type="radio" value="N" :name="'adopter-type-'+index" @click="newAdopter()">
            New
            <span></span>
          </label>
        </div>
      </div>

      <label-component>Name</label-component>
      <div class="col-lg-3">
        <select :id="'adopter-name-'+index" v-show="type == 'E'" class="form-control m-input" @change="updateValue($event.target.value)"></select>
        <input type="text" v-model="adopter.name" v-show="type == 'N'" class="form-control"></input>
      </div>

    </div>

    <div class="form-group m-form__group row">
      <label-component>Mobile</label-component>
      <static-text v-if="type == 'E'" :value="adopter.mobile"></static-text>
      <textbox-component v-else></textbox-component>

      <label-component value="Address"></label-component>
      <static-text v-if="type == 'E'" :value="adopter.address"></static-text>
      <textbox-component v-else></textbox-component>
      
      <div class="col-lg-2">
        <button type="button" @click="removeAdopter()" class="btn btn-metal btn-sm">Remove</button>
      </div>
    </div>
    
    <div class="form-group m-form__group row">
      <label-component>Adopted On</label-component>
      <datepicker-component></datepicker-component>
  
      <label-component>Remarks</label-component>
      <textarea-component name="remark" :value="adopter.remark"></textarea-component>
    </div>
  
    <div class="form-group m-form__group row">
      <label-component>Returned</label-component>
      <radio-component name="returned" v-model="adopter.returned" :value="adopter.returned" :options="{'Y': 'Yes', 'N': 'No'}"></radio-component>
      
      <label-component v-if="adopter.returned == 'Y'">Returned On</label-component>
      <datepicker-component v-if="adopter.returned == 'Y'"></datepicker-component>
    </div>
  
    <div class="form-group m-form__group row" v-if="adopter.returned == 'Y'">
      <label-component>Reason</label-component>
      <textarea-component name="return_reason" :value="adopter.return_reason"></textarea-component>
    </div>
  
    <hr>
  </div>
</template>

<script>
  import axios from 'axios'

  export default {
    name: "adopter-component",
    data() {
      return {
        type: "E",
        adopter: { },
        options: [{"E": "Existing", "N": "New"}]
      }
    },
    props: ['index'],
    methods: {
      getAdopter(adopter_id) {
        axios.get('api/person/get/' + adopter_id)
          .then(response => {
            this.adopter = response.data;
            this.$emit('update-adopter', { index: this.index, adopter: this.adopter});
          })
          .catch(error => { console.log(error); });
      },
      removeAdopter() {
        //console.log("remove index=" + this.index);
        this.$emit('remove-adopter', this.index);
      },
      existingAdopter() {
        $("#adopter-name-"+this.index).next().show();
        this.type = "E";
      },
      newAdopter() {
        $("#adopter-name-"+this.index).next().hide();
        this.type = "N";
      }
    },
    mounted() {
      var vue = this
      $("#adopter-name-"+this.index).select2({
        width: '100%',
        minimumInputLength: 2,
        placeholder: "Search",
        ajax: {
          url: 'api/person/search?type=A',
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
          let adopter_id = $(this).val();
          console.log('select = ' + adopter_id);
          vue.getAdopter(adopter_id);
        //});

      });
    },
  }
</script>

<style scoped>
</style>