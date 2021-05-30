<template>
  <section class="ListTable">
    <table v-if="!loading" cellspacing="0" cellpadding="0">
      <thead>
        <tr>
          <th>Photo</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="user in this.users" v-bind:key="user.id">
          <td><div class="thumb-wrapper"><Thumbnail :src="user.image" /></div></td>
          <td>{{ user.name }}</td>
          <td>{{ user.email }}</td>
          <td>{{ user.phone }}</td>
          <td>
            <div class="button-wrapper">
              <Button icon="edit" bStyle="icon-only" :id="user.id" @click="editOne" />
            </div>
            <div class="button-wrapper">
              <Button icon="delete" bStyle="icon-only" :id="user.id" @click="deleteOne" />
            </div>
          </td>
        </tr>
      </tbody>
    </table>
    <Loading v-if="loading" /> 
  </section>
</template>

<script>
import User from '../../../services/User'
import Button from '../../Generic/Button'
import router from '../../../router'
import Thumbnail from '../../Generic/Thumbnail'
import Loading from '../../Generic/Loading'

export default {
  name: 'ListTable',
  components: {
    Button,
    Thumbnail,
    Loading
  },
   data() {
    return {
      users: [],
      loading: false
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
      this.loading = true
      User.list((response) => {
        this.users = response.data 
        this.loading = false
      })
    }
  }
}
</script>

<style lang="scss" scoped>
.ListTable{
  table {
    margin: 0 auto;
    box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14),0 3px 1px -2px rgba(0,0,0,0.12),0 1px 5px 0 rgba(0,0,0,0.2);
    thead {
      background-color: #42b983;
      color: #fff;
      border: none;
      th {
        padding: 15px;
      }
    }
    td {
      padding: 0 15px;
      border-top: 1px solid #dee2e6;
      .thumb-wrapper {
        padding: 5px 0;
      }
      .button-wrapper {
        margin: 0 2px;
        display: inline-block;
      }
    }
  }
  margin-bottom: 50px;
}
</style>
