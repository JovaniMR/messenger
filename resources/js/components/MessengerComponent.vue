<template>
  <div class="row justify-content-center">
    <contact-list-component
      @conversationSelected="changeActiveConversation($event)"
    ></contact-list-component>

    <conversation-component
      v-if="selectedConversation"
      :contactId="selectedConversation.contact_id"
      :contactName="selectedConversation.contactName"
      :messages="messages"
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
    };
  },
  mounted() {
    Echo.channel("example").listen("MessageSent", (data) => {
      const message = data.message;
      message.writtenByMe = (this.userId == message.from_id);
      this.messages.push(message);
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
  },
};
</script>