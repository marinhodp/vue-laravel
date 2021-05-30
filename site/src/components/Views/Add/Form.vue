<template>
  <section class="AddForm">
    <form>
      <TextInput 
        name="name"
        label="Name"
        type="text" 
        @change-text="updateForm" />
      <TextInput 
        name="email"
        label="Email"
        type="text" 
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
        @change-text="updateForm" />
      <FileInput 
        name="image"
        label="Photo" 
        @change-file="updateForm" />
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
  name: 'AddForm',
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
  methods: {
    updateForm: function(data) {
      this.form[data.name] = data.value
    },
    submitForm: function() {
      User.save(this.form, (response) => {
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
