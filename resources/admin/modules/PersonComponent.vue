<template>
  <div>
    <div class="form-group m-form__group row no-pb">
      <label-component>Type</label-component>
      <div class="col-lg-3">
        <div class="m-radio-inline">
          <label class="m-radio">
            <input type="radio" checked :name="'person-type-'+index" value="E" @click="existingPerson()">
            Existing
            <span></span>
          </label>
          <label class="m-radio">
            <input type="radio" value="N" :name="'person-type-'+index" @click="newPerson()">
            New
            <span></span>
          </label>
        </div>
      </div>
      
      <label-component>Name</label-component>
      <select2-component :name="'person-name-'+index" url="api/person/search?type=f" event_name="select-person"
                         v-show="type == 'E'"
                         v-on:select-person="selectPerson"></select2-component>
      <textbox-component name="name" :value="person.name" v-show="type == 'N'"></textbox-component>
    </div>
    
    <div class="form-group m-form__group row">
      <label-component>Mobile</label-component>
      <static-text v-if="type == 'E'" :value="person.mobile"></static-text>
      <textbox-component v-else></textbox-component>
      
      <label-component value="Address"></label-component>
      <static-text v-if="type == 'E'" :value="person.address"></static-text>
      <textbox-component v-else></textbox-component>
    </div>
  </div>
</template>

<script>
  import axios from 'axios'
  import Select2Component from "../components/Select2Component";
  import TextboxComponent from "../components/TextboxComponent";

  export default {
    name: "person-component",
    props: ['person', "index"],
    data() {
      return {
        type: "E",
        options: [{"E": "Existing", "N": "New"}]
      }
    },
    methods: {
      existingPerson() {
        $("#person-name-"+this.index).next().show();
        this.type = "E";
      },
      newPerson() {
        $("#person-name-"+this.index).next().hide();
        this.type = "N";
      },
      selectPerson(person_id) {
        axios.get('api/person/get/' + person_id)
          .then(response => {
            this.$emit('update-person', response.data );
          })
          .catch(error => { console.log(error); });
      }
    },
    components: {
      TextboxComponent,
      Select2Component
    }
  }
</script>

<style scoped>

</style>