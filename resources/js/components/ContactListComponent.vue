<template>
  <!-- {{-- Contacs general--}} -->

    <!-- {{-- List contacs  --}} -->
    <div class="list-group list">
      <contact-component
        v-for="conversation in conversations"
        :key="conversation.id"
        :conversation= "conversation"
        :selected="selectedConversationId === conversation.id "
        @click.native="selectConversation(conversation)"
      >
      </contact-component>
    </div>

</template>

<script>

export default {
  props:{
    conversations: Array
  },
  data(){
    return{
      selectedConversationId:''
    }
  },
  mounted() {
    document.getElementById('allConversation').style.display = 'none';
  },
  methods: {
    selectConversation(conversation){
      this.selectedConversationId=conversation.id;
      this.$emit('conversationSelected',conversation);
      // if(screen.width < 576){
      //   this.hide();
      // }
      if(window.innerWidth < 576){
         this.hide();
      }

    },
    hide(){
      document.getElementById('allContacts').style.display = 'none';
      document.getElementById('allConversation').style.display = 'block';
    }

    

  },
};
</script>