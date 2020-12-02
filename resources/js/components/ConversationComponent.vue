<template>
  <!-- {{-- General Messages  --}} -->
  <div id="allConversation" class="col-10 col-md-7 col-lg-8 p-0">
    <div class="card w-100 h-100 conversation">
      <div class="card-header bg-ligth">
         
        <button id="return" class="btn btn-sm btn-light" v-if="this.screen<576" @click="showContacts()">  
            <svg width="1.5em" height="1.4em" viewBox="0 0 16 16" class="bi bi-arrow-left-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
              <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
            </svg>
        </button> 

        <img
          src="https://picsum.photos/seed/picsum/500/500"
          alt="avatar"
          class="rounded-circle mr-3 ml-3" 
          style="width: 30px"
        />
        <h5 class="d-inline mb-0 mt-2">{{ contactName }}</h5>
      </div>

      <!--Message -->
      <div class="card-body messages ">
        <message-conversation-component
          v-for="message in messages"
          :key="message.id"
          :writtenByMe="message.writtenByMe"
          :message="message"
        >
        </message-conversation-component>
      </div>

      <div class="card-footer text-muted pt-2 pb-2 pl-0 ">
        <form @submit.prevent="postMessage" autocomplete="off">
          <div class="input-group">
            <div class="input-group-append emojis">
            <button type="button" class="btn btn-light " @click="toogleDialogEmoji">😃</button>
            </div>
            <VEmojiPicker
                v-show="showDialog"
                labelSearch="Search"
                lang="pt-BR"
                @select="onSelectEmoji"
            />
            <input
              type="text"
              class="form-control"
              placeholder="Escribe tu mensaje..."
              aria-describedby="basic-addon2"
              v-model="messageSent"
            />
            <div class="input-group-append">
              <span class="input-group-text pb-0" id="basic-addon2">
                <button class="btn btn-sm btn-ligth" type="submit">
                  Enviar
                </button>
              </span>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<style>
  .messages {
  overflow-y: auto;
  }

  #EmojiPicker{
    position: absolute;
    margin-top: -27.8rem;
  }
</style>

<script>

import { VEmojiPicker, emojisDefault, categoriesDefault } from "v-emoji-picker";

export default {
  components: {
    VEmojiPicker
  },
  props: {
    contactId: Number,
    contactName: String,
    messages: Array,
  },
  data() {
    return {
      messageSent: "",
      showDialog: false,
      // screen: screen.width
      screen: window.innerWidth
    };
  },
  updated() {
    this.scrollToEnd();
  },
  methods: {
    postMessage() {
      axios
        .post("/api/messages", {
          to_id: this.contactId,
          content: this.messageSent,
        })
        .then((response) => {
          this.messageSent = "";
          const message = response.data.message;
          message.writtenByMe = true;
          this.$emit('messageCreated',response.data.message);
        });
    },
    scrollToEnd() {
      const el = document.querySelector(".messages");
      el.scrollTop = el.scrollHeight;
    },
    showContacts(){
        document.getElementById('allContacts').style.display = 'block ';    

        document.getElementById('allConversation').style.display = 'none ';
    },
    toogleDialogEmoji() {
      this.showDialog = !this.showDialog;
    },
    onSelectEmoji(emoji) {
      this.messageSent += emoji.data;
    }
  },
};
</script>