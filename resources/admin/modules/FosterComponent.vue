<template>
  <div>
    <div class="form-group m-form__group row no-pb">
      <label-component value="Type"></label-component>
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
      
      <label-component value="Name"></label-component>
      <div class="col-lg-3">
        <select :id="'foster-name-'+index" v-show="type == 'E'" class="form-control m-input" @change="updateValue($event.target.value)"></select>
        <input type="text" v-model="foster.name" v-show="type == 'N'" class="form-control"></input>
      </div>
    
    </div>
    
    <div class="form-group m-form__group row">
      <label-component value="Mobile"></label-component>
      <static-text-component v-if="type == 'E'" :value="foster.mobile"></static-text-component>
      <textbox-component v-else></textbox-component>
      
      <label-component value="Address"></label-component>
      <static-text-component v-if="type == 'E'" :value="foster.address"></static-text-component>
      <textbox-component v-else></textbox-component>
      
      <div class="col-lg-2">
        <button type="button" @click="removeFoster()" class="btn btn-metal btn-sm">Remove</button>
      </div>
    </div>
  
  </div>
</template>

<script>
  import StaticTextComponent from "../components/StaticTextComponent";
  import LabelComponent from "../components/LabelComponent";
  import Select2Component from "../components/Select2Component";
  import RadioComponent from "../components/RadioComponent";
  import axios from 'axios'
  import TextboxComponent from "../components/TextboxComponent";
  
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
      }
    },
    mounted() {
      var vue = this
      $("#foster-name-"+this.index).select2({
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
      TextboxComponent,
      StaticTextComponent,
      LabelComponent,
      Select2Component,
      RadioComponent
    },
  }
</script>

<style scoped>
  .no-pb {
    padding-bottom: 3px;
  }
</style>