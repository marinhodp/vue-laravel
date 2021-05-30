<template>
  <section class="EditForm">
    <form>
      <TextInput 
        name="name"
        label="Name"
        type="text" 
        :value="form.name"
        @change-text="updateForm" />
      <TextInput 
        name="email"
        label="Email"
        type="text" 
        :value="form.email"
        @change-text="updateForm" />
      <TextInput 
        name="password"
        label="Password"
        type="password"
        @change-text="updateForm" />
      <TextInput 
        name="phone"
        label="Phone"
        type="text"
        :value="form.phone"
        @change-text="updateForm" />
      <FileInput 
        name="image"
        label="Photo" 
        @change-file="updateForm" />
      <img :src="form.image" />
      <br />
      <Button 
        label="Save" 
        @click="submitForm" />
    </form>
  </section>
</template>

<script>
import User from '../../../services/User'
import TextInput from '../../Generic/TextInput'
import FileInput from '../../Generic/FileInput'
import Button from '../../Generic/Button'

export default {
  name: 'EditForm',
  components: {
    TextInput,
    FileInput,
    Button
  },
   data() {
    return {
      form: {
        name: '',
        email: '',
        password: '',
        phone: '',
        image: ''
      }
    }
  },
  created() {
    this.getUser()
  },
  methods: {
    getUser: function() {
      let id = this.$route.params.id
      User.get(id, (response) => {
        this.form = response.data 
        console.log(response)
      })
    },
    updateForm: function(data) {
      this.form[data.name] = data.value
    },
    submitForm: function() {
      let id = this.$route.params.id
      User.edit(this.form, id, (response) => {
        if (response.success) {
          console.log('ok')
        } else {
          console.log(response.errors)
        }
      })
    }
  }
}
</script>

<style lang="scss" scoped>
</style>
