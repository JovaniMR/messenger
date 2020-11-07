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
    <div class="card-body">
      <p class="card-text">
        <slot></slot>
      </p>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    writtenByMe: Boolean,
  },
  data() {
    return {};
  },
};
</script>