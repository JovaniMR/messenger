

require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);


const app = new Vue({
    el: '#app',
    methods:{
        logout(){
            document.getElementById("logout-form").submit();
        }
    }
});
