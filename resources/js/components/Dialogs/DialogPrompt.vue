<template>
  <div>
    <md-dialog-prompt
      :md-active.sync="active"
      :v-model="inputvalue"
      :md-title="title"
      :md-input-maxlength="length"
      :md-input-placeholder="placeholder"
      :md-confirm-text="confirm" />

    <md-button class="md-primary md-raised" @click="active = true">{{confirm}}</md-button>
    <span v-if="value">Value: {{ value }}</span>
  </div>
</template>

<script>
  export default {
    name: 'DialogPrompt',
    props: {
      inputvalue: {
        type: String,
        default: ""
      },title: {
        type: String,
        default: "Title Here"
      },
      length: {
        type: String,
        default: "100"
      },
      placeholder: {
        type: String,
        default: "Placeholder..."
      },
      confirm: {
        type: String,
        default: "Confirm"
      },
    },
    data: () => ({
      active: false,
      value: null
    })
  }
</script>