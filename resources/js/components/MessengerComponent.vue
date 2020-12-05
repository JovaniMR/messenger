<template>
  <div class="row justify-content-center">
    <div id="allContacts" class="col-10 col-md-4 col-lg-4 bg-light contacs p-0">
      <!-- {{--Search  --}} -->
      <div class="row pr-3 pl-3">
        <div class="input-group mt-3 mr-3 ml-3 mb-0">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">
              <svg
                width="1em"
                height="1em"
                viewBox="0 0 16 16"
                class="bi bi-search"
                fill="currentColor"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"
                />
                <path
                  fill-rule="evenodd"
                  d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"
                />
              </svg>
            </span>
          </div>
          <input
            type="text"
            class="form-control"
            placeholder="Buscar personas"
            aria-label="Username"
            aria-describedby="basic-addon1"
            v-model="querySearch"
          />
        </div>
      </div>

      <hr class="mr-3 ml-3" />

      <contact-list-component
        @conversationSelected="changeActiveConversation($event)"
        :conversations="conversationsFiltered"
      ></contact-list-component>
    </div>

    <conversation-component
      v-if="selectedConversation"
      :contactId="selectedConversation.contact_id"
      :contactName="selectedConversation.contactName"
      :contactImage="selectedConversation.contactImage"
      :stateOnline="stateOnline"
      :messages="messages"
      @messageCreated="addMessage($event)"
    ></conversation-component>

    <empty-conversation-component v-else></empty-conversation-component>
  </div>
</template>

<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
export default {
  props: {
    userId: Number,
  },
  data() {
    return {
      selectedConversation: "",
      stateOnline: false,
      messages: [],
      conversations: [],
      querySearch: "",
    };
  },
  mounted() {
    this.getConversations();
    
    // Canal de comunicación que actualiza los mensajes recibidos
    Echo.private(`users.${this.userId}`).listen("MessageSent", (data) => {
      const message = data.message;
      message.writtenByMe = false;
      if (
        this.selectedConversation.contact_id == message.from_id ||
        this.selectedConversation.contact_id == message.to_id
      ) {
        this.messages.push(message);
      }

      this.getConversations();
    });

    // Canal de comunicación que actualiza el estado de los usuarios (Online,Offline)
    Echo.join("messenger")
      .here((users) => {
        users.forEach((user) => this.changeStatus(user.id, true));
      })
      .joining((user) => this.changeStatus(user.id, true))
      .leaving((user) => this.changeStatus(user.id, false));
  },
  methods: {
    // Obtiene la información del contacto selecccionado
    changeActiveConversation(conversation) {
      this.selectedConversation = conversation;
      this.getMessages();
    },
    getMessages() {  //Obtiene los mensajes del contacto selecciondo
      axios
        .get(`/api/messages?contact_id=${this.selectedConversation.contact_id}`)
        .then((response) => {
          this.messages = response.data;
        });
    },
    addMessage(message) { //Agrega un nuevo mensaje a la vista cuando lo escribimos
      const conversation = this.conversations.find((conversation) => {
        return (
          conversation.contact_id == message.from_id ||
          conversation.contact_id == message.to_id
        );
      });

      const author =
        this.userId == message.from_id ? "Tu" : this.conversation.contact_name;
      conversation.last_message = `${author}: ${message.content}`;
      conversation.last_time = message.created_at;

      if (
        this.selectedConversation.contact_id == message.from_id ||
        this.selectedConversation.contact_id == message.to_id
      ) {
        this.messages.push(message);
      }
    },
    getConversations() { //Obtiene todas las conversaciones(contactos)
      axios.get("/api/conversations").then((response) => {
        this.conversations = response.data;
      });
    },//Cambia el estado del usuario (En linea)
    changeStatus(user, status) {
      if (this.selectedConversation.contact_id == user) {
        this.stateOnline = status;
      }
    },
  },
  computed: {
    conversationsFiltered() { //Filtra los contactos por su nombre
      return this.conversations.filter((conversation) =>
        conversation.contactName.toLowerCase().includes(this.querySearch.toLowerCase())
      );
    },
  },
};
</script>