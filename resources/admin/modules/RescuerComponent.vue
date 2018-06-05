<template>
  <div>
    <div class="form-group m-form__group row no-pb">
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
        <select :id="'rescuer-name-'+index" v-show="type == 'E'" class="form-control m-input" @change="updateValue($event.target.value)"></select>
        <input type="text" v-model="rescuer.name" v-show="type == 'N'" class="form-control"></input>
      </div>

    </div>

    <div class="form-group m-form__group row">
      <label-component value="Mobile"></label-component>
      <static-text v-if="type == 'E'" :value="rescuer.mobile"></static-text>
      <textbox-component v-else></textbox-component>

      <label-component value="Address"></label-component>
      <static-text v-if="type == 'E'" :value="rescuer.address"></static-text>
      <textbox-component v-else></textbox-component>

      <div class="col-lg-2">
        <button type="button" @click="removeRescuer()" class="btn btn-metal btn-sm">Remove</button>
      </div>
    </div>
  
    <div class="form-group m-form__group row">
      <label-component value="Remarks"></label-component>
      <textarea-component name="remark" :value="rescuer.remark"></textarea-component>
    </div>
  
    <hr>
  </div>
</template>

<script>
  import axios from 'axios'

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
        axios.get('api/person/get/' + rescuer_id)
          .then(response => {
            this.rescuer = response.data;
            this.$emit('update-rescuer', { index: this.index, rescuer: this.rescuer});
          })
          .catch(error => { console.log(error); });
      },
      removeRescuer() {
        //console.log("remove index=" + this.index);
        this.$emit('remove-rescuer', this.index);
      },
      existingRescuer() {
        $("#rescuer-name-"+this.index).next().show();
        this.type = "E";
      },
      newRescuer() {
        $("#rescuer-name-"+this.index).next().hide();
        this.type = "N";
      }
    },
    mounted() {
      var vue = this
      $("#rescuer-name-"+this.index).select2({
        placeholder: "Search",
        ajax: {
          url: 'api/person/search?type=r',
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
  }
</script>

<style scoped>
</style>