<template>
  <div class="feedback-message-wrapper">
    <div class="feedback-message">
      <ul>
        <div v-if="!success" class="error">
          <li v-for="(message, index) in messages" v-bind:key="index">{{ message[0] }}</li>
        </div>
        <div v-if="success" class="success">
          <li >{{ messages }}</li>
        </div>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  name: 'FeedBackMessage',
  props: {
    success: {
      type: Boolean,
      required: false
    },
    messages: {
      Type: Object,
      required: true
    }
  }
}
</script>

<style lang="scss" scoped>
.feedback-message-wrapper {
  .feedback-message {
    width: 100%;
    height: 100%;
    ul {
      list-style: none;
      .success {
        li {
          color: #42b983;
        }
      }
      .error {
        li {
          color: #db3030;
        }
      }
      
    }
  }
}
</style>
