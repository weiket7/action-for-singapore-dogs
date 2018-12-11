<template>
  <single-portlet title="Gift">
    <form @submit.prevent="onSubmit()" class="m-form m-form--fit m-form--label-align-right" >
      <form-row>
        <label-component required>Name</label-component>
        <textbox-component v-model="gift.name" :error="errors.get('name')"></textbox-component>

        <label-component required>Quantity</label-component>
        <textbox-component v-model="gift.quantity" :error="errors.get('quantity')"></textbox-component>
      </form-row>

      <form-row>
        <label-component required>Price</label-component>
        <textbox-component v-model="gift.price" :error="errors.get('price')"></textbox-component>

        <label-component required>Image<br>(820 x 340 px)</label-component>
        <image-component v-model="gift.image" name="image"
                         v-on:update-image="updateImage" folder="gifts"
                         :src="gift.image" :error="errors.get('image_new')"></image-component>
      </form-row>

      <form-footer>
        <button type="submit" class="btn btn-success">Save</button>
        <button type="button" class="btn btn-danger" data-toggle="confirmation" v-if="gift.gift_id != 1">Delete</button>
      </form-footer>
    </form>
  </single-portlet>
</template>

<script>
  import axios from 'axios';
  import Errors from '../../common/errors'
  import ImageComponent from "../components/ImageComponent";
  import FormMixin from '../form-mixin';

  export default {
    name: "gift",
    data() {
      return {
        gift: {},
        errors: new Errors(),
        image_new: null,
      }
    },
    methods: {
      updateImage(file) {
        this.image_new = file;
      },
      onSubmit() {
        let url = 'api/gift/save';
        if (!this.is_create) {
          url += '/'+ this.$route.params.gift_id
        }

        let form_data = this.gift;
        let config = {};
        if (this.image_new) {
          form_data = new FormData();
          this.appendObjectToFormData(this.gift, form_data);
          form_data.append("image_new", this.image_new);

          config = {
            headers: {
              'content-type': 'multipart/form-data'
            }
          };
        }

        axios.post(url, form_data, config)
          .then(this.onSuccess)
          .catch(this.onError);
      },
      onSuccess(response) {
        this.errors.clear();
        if (this.is_create) {
          toastr.success("Gift added");
          return;
        }
        toastr.success("Gift updated");
        let gift_id = response.data;
        this.$router.push('/gift/save/'+gift_id);
      },
      deleteGift() {
        axios.post('api/delete-record?table=gift&column=gift_id&id='+this.$route.params.gift_id)
          .then(response => {
            toastr.success("Gift deleted");
            this.$router.push('/gift');
          })
          .catch(this.onError);
      }
    },
    created() {
      let url = 'api/gift/get';
      if (!this.is_create) {
        url += '/'+ this.$route.params.gift_id
      }
      axios.get(url)
        .then(response => {
          this.gift = response.data.gift;
        }).catch(error => {
        console.log(error);
      })
    },
    mounted() {
      let vue = this
      $('[data-toggle=confirmation]').confirmation({
        rootSelector: '[data-toggle=confirmation]',
      }).on("confirmed.bs.confirmation", function() {
        vue.deleteGift();
      });
    },
    computed: {
      is_create() {
        return this.$route.path == "/gift/save";
      }
    },
    components: {
      ImageComponent
    },
    mixins: [FormMixin]
  }
</script>

<style scoped>

</style>