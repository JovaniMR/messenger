<template>
  <!-- {{-- Contacs general--}} -->
  <div class="col-md-5 col-lg-4 bg-light contacs p-0">
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
        />
      </div>
    </div>
    <hr class="mr-3 ml-3" />

    <!-- {{-- List contacs  --}} -->
    <div class="list-group list">
      <contact-component
        v-for="conversation in conversations"
        :key="conversation.id"
        :conversation= "conversation"
        @click.native="selectConversation(conversation)"
      >
      </contact-component>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      conversations: [],
    };
  },
  mounted() {
    this.getConversations();
  },
  methods: {
    getConversations() {
      axios.get("/api/conversations").then((response) => {
        this.conversations = response.data;
      });
    },
    selectConversation(conversation){
        console.log("event click");
    }
  },
};
</script>