<template>
  <div>
    <div class="form-group m-form__group row">
      <label-component value="Type"></label-component>
      <div class="col-lg-3">
        <div class="m-radio-inline">
          <label class="m-radio">
            <input type="radio" checked name="type" value="E" @click="existingRescuer()">
              Existing
            <span></span>
          </label>
          <label class="m-radio">
            <input type="radio" value="N" name="type" @click="newRescuer()">
            New
            <span></span>
          </label>
        </div>
      </div>

      <label-component value="Name"></label-component>
      <div class="col-lg-3">
        <select id="abc"  v-show="type == 'E'" class="form-control m-input" @change="updateValue($event.target.value)"></select>
        <textbox-component v-show="type == 'N'"></textbox-component>
      </div>


    </div>

    <div class="form-group m-form__group row">
      <label-component value="Mobile"></label-component>
      <static-text-component v-if="type == 'E'" :value="rescuer.mobile"></static-text-component>
      <textbox-component v-else></textbox-component>

      <label-component value="Address"></label-component>
      <static-text-component v-if="type == 'E'" :value="rescuer.address"></static-text-component>
      <textbox-component v-else></textbox-component>
    </div>

  </div>
</template>

<script>
  import StaticTextComponent from "./StaticTextComponent";
  import LabelComponent from "./LabelComponent";
  import Select2Component from "./Select2Component";
  import RadioComponent from "./RadioComponent";
  import axios from 'axios'
  import TextboxComponent from "./TextboxComponent";

  export default {
    name: "rescuer-component",
    data() {
      return {
        type: "E",
        rescuer: { name: "bc" },
        options: [{"E": "Existing", "N": "New"}]
      }
    },
    methods: {
      getRescuer(rescuer_id) {
        axios.get('api/rescuer/get/' + rescuer_id)
          .then(response => {
            this.rescuer = response.data
          })
          .catch(error => { console.log(error); })
      },
      existingRescuer() {
        $("#abc").next().show();
        this.type = "E";
      },
      newRescuer() {
        $("#abc").next().hide();
        this.type = "N";
      }
    },
    mounted() {
      var vue = this
      $('#abc').select2({
        placeholder: "Search",
        ajax: {
          url: 'api/rescuer/search',
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
        let rescuer_id = $('#abc').val();
        vue.getRescuer(rescuer_id);
      });
    },
    components: {
      TextboxComponent,
      StaticTextComponent,
      LabelComponent,
      Select2Component,
      RadioComponent
    },
  }
</script>

<style scoped>

</style>