

require('./bootstrap');

window.Vue = require('vue');

Vue.component('contact-component', require('./components/ContactComponent.vue').default);
Vue.component('contact-list-component', require('./components/ContactListComponent.vue').default);
Vue.component('conversation-component', require('./components/ConversationComponent.vue').default);
Vue.component('message-conversation-component', require('./components/MessageConversationComponent.vue').default);

const app = new Vue({
    el: '#app',
    methods:{
        logout(){
            document.getElementById("logout-form").submit();
        }
    }
});
