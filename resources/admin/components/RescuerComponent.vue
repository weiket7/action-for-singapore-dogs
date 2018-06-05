<template>
  <div>
    <div class="form-group m-form__group row">
      <label-component value="Type"></label-component>
      <div class="col-lg-3">
        <div class="m-radio-inline">
          <label class="m-radio">
            <input type="radio" checked :name="'rescuer-type-'+index" value="E" @click="existingRescuer()">
              Existing
            <span></span>
          </label>
          <label class="m-radio">
            <input type="radio" value="N" :name="'rescuer-type-'+index" @click="newRescuer()">
            New
            <span></span>
          </label>
        </div>
      </div>

      <label-component value="Name"></label-component>
      <div class="col-lg-3">
        <select :id="'select-name-'+index" v-show="type == 'E'" class="form-control m-input" @change="updateValue($event.target.value)"></select>
        <input type="text" v-model="rescuer.name" v-show="type == 'N'" class="form-control"></input>
      </div>

    </div>

    <div class="form-group m-form__group row">
      <label-component value="Mobile"></label-component>
      <static-text-component v-if="type == 'E'" :value="rescuer.mobile"></static-text-component>
      <textbox-component v-else></textbox-component>

      <label-component value="Address"></label-component>
      <static-text-component v-if="type == 'E'" :value="rescuer.address"></static-text-component>
      <textbox-component v-else></textbox-component>

      <div class="col-lg-2">
        <button type="button" @click="removeRescuer()" class="btn btn-metal btn-sm">Remove</button>
      </div>
    </div>

    <hr>

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
        rescuer: { },
        options: [{"E": "Existing", "N": "New"}]
      }
    },
    props: ['index'],
    methods: {
      getRescuer(rescuer_id) {
        axios.get('api/rescuer/get/' + rescuer_id)
          .then(response => {
            this.rescuer = response.data;
            this.$emit('update-rescuer', { index: this.index, rescuer: this.rescuer});
          })
          .catch(error => { console.log(error); });
      },
      removeRescuer() {
        console.log("remove index=" + this.index);
        this.$emit('remove-rescuer', this.index);
      },
      existingRescuer() {
        $("#select-name-"+this.index).next().show();
        this.type = "E";
      },
      newRescuer() {
        $("#select-name-"+this.index).next().hide();
        this.type = "N";
      }
    },
    mounted() {
      var vue = this
      $("#select-name-"+this.index).select2({
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
        //vue.$nextTick(function() {
          let rescuer_id = $(this).val();
          console.log('select = ' + rescuer_id);
          vue.getRescuer(rescuer_id);
        //});

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