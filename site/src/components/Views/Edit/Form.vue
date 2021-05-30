<template>
  <section class="EditForm">
    <form v-if="!loadingInitial">
      <TextInput 
        name="name"
        label="Name*"
        type="text" 
        :value="form.name"
        @change-text="updateForm" />
      <TextInput 
        name="email"
        label="Email*"
        type="text" 
        :value="form.email"
        @change-text="updateForm" />
      <TextInput 
        name="password"
        label="Password*"
        type="password"
        @change-text="updateForm" />
      <TextInput 
        name="phone"
        label="Phone*"
        type="text"
        :value="form.phone"
        @change-text="updateForm" />
      <FileInput 
        name="image"
        label="Photo*" 
        @change-file="updateForm" />
      <div class="thumbnail-wrapper" v-if="form.image">
        <Thumbnail :src="form.image" />
      </div>
      <Button 
        label="Save" 
        @click="submitForm" />
      <FeedBackMessage 
        v-if="feedbackMessage.display"
        :success="feedbackMessage.success"
        :messages="feedbackMessage.content" />
      <Loading v-if="loading" />
    </form>
    <Loading v-if="loadingInitial" />
  </section>
</template>

<script>
import User from '../../../services/User'
import TextInput from '../../Generic/TextInput'
import FileInput from '../../Generic/FileInput'
import Button from '../../Generic/Button'
import Thumbnail from '../../Generic/Thumbnail'
import FeedBackMessage from '../../Generic/FeedBackMessage'
import Loading from '../../Generic/Loading'

export default {
  name: 'EditForm',
  components: {
    TextInput,
    FileInput,
    Button,
    Thumbnail,
    FeedBackMessage,
    Loading
  },
   data() {
    return {
      form: {
        name: '',
        email: '',
        password: '',
        phone: '',
        image: ''
      },
      feedbackMessage: {
        display: false,
        success: false,
        content: {}
      },
      loading: false,
      loadingInitial: false
    }
  },
  created() {
    this.getUser()
  },
  methods: {
    getUser: function() {
      this.loadingInitial = true
      let id = this.$route.params.id
      User.get(id, (response) => {
        this.form = response.data 
        this.loadingInitial = false
      })
    },
    updateForm: function(data) {
      this.form[data.name] = data.value
    },
    submitForm: function() {
      this.feedbackMessage.display = false
      this.loading = true
      let id = this.$route.params.id
      User.edit(this.form, id, (response) => {
        this.feedbackMessage.display = true
        this.loading = false
        if (response.success) {
          this.feedbackMessage.success = true
          this.feedbackMessage.content = 'User updated successfully!'
        } else {
          this.feedbackMessage.success = false
          this.feedbackMessage.content = response.errors.errors
        }
      })
    }
  }
}
</script>

<style lang="scss" scoped>
.thumbnail-wrapper {
  margin: 0 auto;
  display: block;
  max-width: 100px;
  margin-bottom: 20px;
}
</style>
