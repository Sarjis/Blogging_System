require('./bootstrap');
import router from './router'
//window.Vue = require('vue');
import Vue from 'vue'
import store from './store/index'
import {Form, HasError, AlertError} from 'vform'
Vue.component(HasError.name, HasError);
window.Form=Form;
import Swal from './my-files/sweat-alert/index'
import myTime from './my-files/moment/index'
import shortLength from './my-files/sweat-alert/length'
// text area editor
import 'v-markdown-editor/dist/index.css';
import Editor from 'v-markdown-editor'
Vue.use(Editor);
// text area editor
import VueProgressBar from 'vue-progressbar'
const options = {
    color: '#bffaf3',
    failedColor: '#FF0000',
    thickness: '5px',
    transition: {
        speed: '0.0002s',
        opacity: '0.06s',
        termination: 30
    },
    autoRevert: true,
    location: 'left',
    inverse: false
};

Vue.use(VueProgressBar, options);

import CKEditor from '@ckeditor/ckeditor5-vue';

Vue.use( CKEditor );

const app = new Vue({
    el: '#app',
    router,
    store,
    Swal,
    myTime,
    shortLength
});
