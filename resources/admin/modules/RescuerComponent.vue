<template>
  <div>
    <person-component :index="index" :person="rescuer"></person-component>
  
    <person-remark></person-remark>

    <form-row>
      <div class="col-lg-2"></div>
      <div class="col-lg-8">
        <button type="button" @click="removeRescuer()" class="btn btn-metal btn-sm">Remove Row</button>
      </div>
    </form-row>

    <hr>
  </div>
</template>

<script>
  import axios from 'axios'
  import PersonRemark from "./PersonRemark";
  import PersonComponent from "./PersonComponent";

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
      $("#rescuer-name-"+this.index).select2({
        width: '100%',
        minimumInputLength: 2,
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
          let rescuer_id = $(this).val();
          vue.getRescuer(rescuer_id);
      });
    },
    components: {
      PersonRemark,
      PersonComponent
    },
  
  }
</script>

<style scoped>
</style>