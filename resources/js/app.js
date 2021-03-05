/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

  require('./bootstrap');

// window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// // });
 
 
import tinymce from 'tinymce/tinymce'
import 'tinymce/themes/silver/theme'
import 'tinymce/icons/default/icons'

import 'tinymce/skins/ui/oxide/skin.css'
import 'tinymce/skins/ui/oxide/content.inline.css'

// Plugins
import 'tinymce/plugins/paste/plugin'
import 'tinymce/plugins/link/plugin'
import 'tinymce/plugins/autoresize/plugin'
import 'tinymce/plugins/image'
import 'tinymce/plugins/code'
import Axios from 'axios';
// Initialize
tinymce.init({
  selector: '.tinymce-editor',
  skin: false,
  plugins: ['paste', 'link', 'autoresize','code','image'],
  relative_urls: false,
 
  images_upload_handler: function (blobInfo, success, failure) {
    var formData=new FormData();
    formData.append('file',blobInfo.blob());
    Axios.post('/admin/upload',formData)
    .then(function(res){
       success(res.data.location);
    });



    // setTimeout(function () {
    //   /* no matter what you upload, we will turn it into TinyMCE logo :)*/
    //   success('http://moxiecode.cachefly.net/tinymce/v9/images/logo.png');
    // }, 2000);
  },

})