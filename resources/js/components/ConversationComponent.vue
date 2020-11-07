<template>
  <!-- {{-- General Messages  --}} -->
  <div class="col-lg-8 p-0">
    <div class="card w-100 h-100 conversation">
      <div class="card-header bg-ligth">
        <img
          src="http://lorempixel.com/g/500/500/people"
          alt="avatar"
          class="rounded"
          style="width: 30px"
        />
        <span>Juan Perez</span>
      </div>

      <!--Message -->
      <div class="card-body messages">
        <message-conversation-component
          v-for="message in messages"
          :key="message.id"
          :writtenByMe = message.writtenByMe
        >
          {{ message.content }}
        </message-conversation-component>
      </div>

      <div class="card-footer text-muted pt-2 pb-2">
        <form @submit.prevent="postMessage" autocomplete="off">
           <div class="input-group">
          <input
            type="text"
            class="form-control"
            placeholder="Escribe tu mensaje..."
            aria-describedby="basic-addon2"
            v-model="messageSent"
          />
          <div class="input-group-append">
            <span class="input-group-text pb-0" id="basic-addon2">
              <button class="btn btn-sm btn-ligth" type="submit">Enviar</button>
            </span>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      messages: [],
      messageSent:'',
      contact_id:2
    };
  },
  mounted() {
    this.getMessages();
  },
  methods: {
    getMessages(){
      axios.get(`/api/messages?contact_id=${this.contact_id}`).then((response) => {
        this.messages = response.data;
      });
    },
    postMessage(){
      axios.post("/api/messages",{
        to_id:2,
        content: this.messageSent
      }).then((response)=>{
         this.messageSent = '',
         this.getMessages();
      });
    }
  },
};
</script>