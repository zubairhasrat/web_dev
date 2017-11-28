
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('chat-message', require('./components/chat-message.vue'));
Vue.component('chat-log', require('./components/ChatLog.vue'));
Vue.component('chat-composer', require('./components/ChatComposer.vue'));
const app = new Vue({
    el: '#app'
    ,
    data(){
        return{
        messages:[
            {
                message:'hello by auther 1',
                auther:'auther 1'
            },
             {
                message:'hello by auther 2',
                auther:'auther 2'
            }
        ]
    }
    }
    ,
    methods:{
        addMessage(){
            //alert('message added');
            this.messages.push(message);
        }
    }
});
