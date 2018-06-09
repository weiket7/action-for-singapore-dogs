<template>
  <div>
    <div class="form-group m-form__group row">
      <label-component>Type</label-component>
      <div class="col-lg-3">
        <div class="m-radio-inline">
          <label class="m-radio">
            <input type="radio" :name="'source-'+type+'-'+index" checked value="E" @click="existingPerson()">
            Existing
            <span></span>
          </label>
          <label class="m-radio">
            <input type="radio" :name="'source-'+type+'-'+index" value="N" @click="newPerson()">
            New
            <span></span>
          </label>
        </div>
      </div>
      
      <label-component>Name</label-component>
      <select2-component :name="select2_name" :url="'api/person/search?type='+type" event_name="select-person"
                         :default_id="person.person_id" :default_text="person.name"
                         v-show="source == 'E'"
                         v-on:select-person="selectPerson"></select2-component>
      <textbox-component name="name" :value="person.name" v-show="source == 'N'"></textbox-component>
    </div>
    
    <div class="form-group m-form__group row">
      <label-component>Mobile</label-component>
      <static-text v-if="source == 'E'">{{ person.mobile }}</static-text>
      <textbox-component v-else></textbox-component>
      
      <label-component>Address</label-component>
      <static-text v-if="source == 'E'">{{ person.address }}</static-text>
      <textbox-component v-else></textbox-component>
    </div>
  </div>
</template>

<script>
  import axios from 'axios'

  export default {
    name: "person-component",
    props: ['person', "index", "type"],
    data() {
      return {
        source: "E",
        options: [{"E": "Existing", "N": "New"}]
      }
    },
    computed: {
      select2_name() {
        return 'select2-'+this.type+'-'+this.index;
      }
    },
    methods: {
      existingPerson() {
        $("#"+this.select2_name).next().show();
        this.source = "E";
        this.$emit('existing-person');
      },
      newPerson() {
        $("#"+this.select2_name).next().hide();
        this.source = "N";
        this.$emit('new-person');
      },
      selectPerson(person_id) {
        axios.get('api/person/get-single/' + person_id)
          .then(response => {
            this.$emit('update-person', response.data );
          })
          .catch(error => { console.log(error); });
      }
    }
  }
</script>

<style scoped>

</style>