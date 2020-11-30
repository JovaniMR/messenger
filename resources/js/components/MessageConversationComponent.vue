<template>
  <!-- {{-- Messages --}} -->

  <div
    class="card mb-3"
    v-bind:class="{
      messageSent: writtenByMe,
      'ml-auto': writtenByMe,
      messageReceived: !writtenByMe,
    }"
  >
    <div class="card-body pl-2 pt-1 pb-0 pr-0">
      <p class="card-text mb-0">
        {{ message.content }}
      </p>
      <p class="mb-0 " style="font-size: .7em; color: #777; margin-left:88%">
        15:45
        <!-- {{ message.created_at }} -->
      </p>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    writtenByMe: Boolean,
    message: Array
  },
  data() {
    return {};
  },
};
</script>