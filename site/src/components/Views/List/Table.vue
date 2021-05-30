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
          <td><img :src="user.image" /></td>
          <td>{{ user.name }}</td>
          <td>{{ user.email }}</td>
          <td>{{ user.phone }}</td>
        </tr>
      </tbody>
    </table> 
  </section>
</template>

<script>
import User from '../../../services/User'

export default {
  name: 'ListTable',
  components: {},
   data() {
    return {
      users: []
    }
  },
  created() {
    User.list((response) => {
      this.users = response.data 
      console.log(response)
    })
  },
  methods: {
  }
}
</script>

<style lang="scss" scoped>
</style>
