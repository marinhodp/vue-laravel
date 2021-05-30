<template>
  <section class="ListTable">
    <table>
      <thead>
        <tr>
          <th>Photo</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="user in this.users" v-bind:key="user.id">
          <td><Thumbnail :src="user.image" /></td>
          <td>{{ user.name }}</td>
          <td>{{ user.email }}</td>
          <td>{{ user.phone }}</td>
          <td><Button label="Edit" :id="user.id" @click="editOne" /></td>
          <td><Button label="Delete" :id="user.id" @click="deleteOne" /></td>
        </tr>
      </tbody>
    </table> 
  </section>
</template>

<script>
import User from '../../../services/User'
import Button from '../../Generic/Button'
import router from '../../../router'
import Thumbnail from '../../Generic/Thumbnail'

export default {
  name: 'ListTable',
  components: {
    Button,
    Thumbnail
  },
   data() {
    return {
      users: []
    }
  },
  created() {
    this.getUsers()
  },
  methods: {
    editOne: function(id) {
      console.log('editOne')
      console.log(id)
      router.push(`/edit/${id}`)
    },
    deleteOne: function(id) {
      if (window.confirm('Do you really want to remove this user?')) {
        User.remove(id, (response) => {
          console.log(response)
          this.getUsers()
        })
      }
    },
    getUsers: function() {
      User.list((response) => {
        this.users = response.data 
        console.log(response)
      })
    }
  }
}
</script>

<style lang="scss" scoped>
</style>
