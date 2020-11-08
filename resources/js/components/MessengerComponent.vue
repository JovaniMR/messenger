<template>
  <div class="row justify-content-center" style="min-height: 80vh">
    <contact-list-component
      @conversationSelected="changeActiveConversation($event)"
    ></contact-list-component>

    <conversation-component
      v-if="selectedConversation"
      :contactId="selectedConversation.contact_id"
      :contactName="selectedConversation.contactName"
    ></conversation-component>
  </div>
</template>
<script>
export default {
  data() {
    return {
      selectedConversation: "",
    };
  },
  methods: {
    changeActiveConversation(conversation) {
      this.selectedConversation = conversation;
    },
  },
};
</script>