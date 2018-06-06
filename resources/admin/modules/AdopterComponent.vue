<template>
  <div>
    <person-component :index="index" :person="adopter" v-on:update-person="updatePerson"></person-component>
    
    <div class="form-group m-form__group row">
      <label-component>Adopted On</label-component>
      <datepicker-component></datepicker-component>

      <label-component>Returned</label-component>
      <radio-component name="returned" v-model="adopter.returned" :value="adopter.returned" :options="{'Y': 'Yes', 'N': 'No'}"></radio-component>
    </div>
  
    <div class="form-group m-form__group row">
      <label-component v-if="adopter.returned == 'Y'">Returned On</label-component>
      <datepicker-component v-if="adopter.returned == 'Y'"></datepicker-component>

      <label-component v-if="adopter.returned == 'Y'">Reason</label-component>
      <textarea-component v-if="adopter.returned == 'Y'" name="return_reason" :value="adopter.return_reason"></textarea-component>
    </div>
  
    <div class="form-group m-form__group row" v-if="adopter.returned == 'Y'">

    </div>

    <person-remark></person-remark>

    <hr>
  </div>
</template>

<script>
  import axios from 'axios'
  import PersonRemark from "./PersonRemark";
  import PersonComponent from "./PersonComponent";

  export default {
    name: "adopter-component",
    data() {
      return {
        adopter: { },
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
      updatePerson(person) {
        this.adopter = person;
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
    components: {
      PersonComponent,
      PersonRemark
    }
  }
</script>

<style scoped>
</style>