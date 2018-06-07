<template>
  <div class="container mt-30">
    <div class="row">
      <div class="col-md-12 text-center">
        <h2 class="section_header bold">
          <span>LIKES</span></h2>
      </div>
    </div>
    
    <div class="row">
      <adopt-item v-for="adopt in adopts" :adopt="adopt" :key="adopt.adopt_id" col="3" highlight="true"></adopt-item>
    </div>
    
    <hr>
    
    <div class="row" v-show="!interested">
      <div class="col-md-12 text-center">
        <button type="button" class="" @click="interested = true">I'm interested in adopting</button>
      </div>
    </div>
  
    <div v-show="interested">
      <div class="row">
        <div class="col-md-12 text-center">
          <h3>Thank you for your interest in adopting</h3>
  
          <h5>
            Please fill in the form to share some information with us so that we can assist you in the adoption process.<br>
            Upon submission, our rehomers will get in touch with you via text and/or email
          </h5>
        </div>
      </div>
      
      <form>
        <h4 class="adoption-form-header">Personal Info</h4>
        
        <div class="row">
          <div class="col-md-6">
            <div class="form-group no-mb">
              <label class="control-label">Name</label>
              <input type="text" class="form-control" autofocus>
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="form-group no-mb">
              <label class="control-label">Mobile</label>
              <input type="text" class="form-control">
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-6">
            <div class="form-group no-mb">
              <label class="control-label">Email</label>
              <input type="text" class="form-control">
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="form-group no-mb">
              <label class="control-label">Address</label>
              <input type="text" class="form-control">
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-6">
            <div class="form-group no-mb">
              <label class="control-label">Occupation</label>
              <input type="text" class="form-control">
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="form-group no-mb">
              <label class="control-label">Working Hours</label>
              <input type="text" class="form-control">
            </div>
          </div>
        </div>
        
        <h4 class="adoption-form-header">Experience with Dogs</h4>
        
        <div class="row">
          <div class="col-md-6">
            <div class="form-group no-mb">
              <label class="control-label">Have you had dog(s) before?</label>
              <input type="text" class="form-control">
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="form-group no-mb">
              <label class="control-label">Do you currently have dog(s)?</label>
              <input type="text" class="form-control">
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-6">
            <div class="form-group no-mb">
              <label class="control-label">Why do you want to adopt a dog?</label>
              <textarea class="form-control" rows="3"></textarea>
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="form-group no-mb">
            </div>
          </div>
        </div>
        
        <h4 class="adoption-form-header">Family and Home</h4>
        
        <div class="row">
          <div class="col-md-6">
            <div class="form-group no-mb">
              <label class="control-label">What type of housing do you live in?</label>
              <input type="text" class="form-control">
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="form-group no-mb">
              <label class="control-label">Do you have a domestic helper?</label>
              <input type="text" class="form-control">
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-6">
            <div class="form-group no-mb">
              <label class="control-label">How many family member(s) stay with you?</label>
              <input type="text" class="form-control">
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="form-group no-mb">
              <label class="control-label">What age(s) are your family member(s)?</label>
              <input type="text" class="form-control">
            </div>
          </div>
        </div>
        
        <hr>
        
        <div class="row">
          <div class="col-md-12 text-center">
            <button type="submit">I want to adopt</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
  import axios from 'axios'
  import AdoptItem from '../components/AdoptItem'
  
  export default {
    name: "HeartList",
    data() {
      return {
        adopts: {},
        interested: false
      }
    },
    created() {
      axios.get("api/adopt/temp/4", ).then(
        response => {
          this.adopts = response.data;
        }
      ).catch(error =>{
      
      });
    },
    components: {
      AdoptItem
    }
  }
</script>

<style scoped>

</style>