<template>
  <div class="row justify-content-center">
    <contact-list-component
      @conversationSelected="changeActiveConversation($event)"
      :conversations="conversations"
    ></contact-list-component>

    <conversation-component
      v-if="selectedConversation"
      :contactId="selectedConversation.contact_id"
      :contactName="selectedConversation.contactName"
      :messages="messages"
      @messageCreated="addMessage($event)"
    ></conversation-component>

    <empty-conversation-component v-else></empty-conversation-component>
  </div>
</template>

<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
export default {
  props:{
    userId: Number
  },
  data() {
    return {
      selectedConversation: "",
      messages: [],
      conversations: []
    };
  },
  mounted() {
    this.getConversations();

    Echo.private(`users.${this.userId}`)
    .listen("MessageSent", (data) => {
      const message = data.message;
      message.writtenByMe = false;
      if(this.selectedConversation.contact_id == message.from_id ||
         this.selectedConversation.contact_id == message.to_id){  
        this.messages.push(message);
     }

     this.getConversations();
    });
  },
  methods: {
    changeActiveConversation(conversation) {
      this.selectedConversation = conversation;
      this.getMessages();
    },
    getMessages() {
      axios
        .get(`/api/messages?contact_id=${this.selectedConversation.contact_id}`)
        .then((response) => {
          this.messages = response.data;
        });
    },
    addMessage(message){
      const conversation = this.conversations.find((conversation)=>{
         return conversation.contact_id == message.from_id ||
                conversation.contact_id == message.to_id;
      });

      const author =  this.userId == message.from_id ? 'Tu' : this.conversation.contact_name;
      conversation.last_message = `${author}: ${message.content}`;
      conversation.last_time = message.created_at;

      if(this.selectedConversation.contact_id == message.from_id ||
         this.selectedConversation.contact_id == message.to_id){  
        this.messages.push(message);
     }
    },
    getConversations() {
      axios.get("/api/conversations").then((response) => {
        this.conversations = response.data;
      });
    }
  },
};
</script>