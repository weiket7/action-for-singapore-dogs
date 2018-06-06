import Vue from 'vue'
import App from './App.vue'
import router from './router'

import FormRow from './components/FormRow'
import TextboxComponent from './components/TextboxComponent'
import TextareaComponent from './components/TextareaComponent'
import Select2Component from './components/Select2Component'
import SinglePortlet from './components/SinglePortlet'
import LabelComponent from './components/LabelComponent'
import TabsComponent from './components/TabsComponent'
import TabComponent from './components/TabComponent'
import FormFooter from './components/FormFooter'
import SelectComponent from './components/SelectComponent'
import RadioComponent from './components/RadioComponent'
import DatepickerComponent from "./components/DatepickerComponent";
import StaticTextComponent from "./components/StaticTextComponent";

Vue.component('form-row', FormRow);
Vue.component('textbox-component', TextboxComponent);
Vue.component('textarea-component', TextareaComponent);
Vue.component('select-component', Select2Component);
Vue.component('single-portlet', SinglePortlet);
Vue.component('label-component', LabelComponent);
Vue.component('tabs', TabsComponent);
Vue.component('tab', TabComponent);
Vue.component('form-footer', FormFooter);
Vue.component('select-component', SelectComponent);
Vue.component('radio-component', RadioComponent);
Vue.component('datepicker-component', DatepickerComponent);
Vue.component('static-text', StaticTextComponent);

new Vue({
  el: '#app',
  router,
  render: h => h(App)
})