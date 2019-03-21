<template>
<div>
    <h3>List of users</h3>
    <div class="alert alert-danger" v-if="has_error">
        <p>Error, unable to retrieve the list of users.</p>
    </div>
    <table-component :data="users" sort-by="id" sort-order="asc" class="table">
         <table-column show="id" label="Id"></table-column>
         <table-column show="name" label="Name"></table-column>
         <table-column show="email" label="Email"></table-column>
         <table-column show="balance" label="Balance"></table-column>
         <table-column show="banned" label="Banned"></table-column>
         <table-column show="created_at" label="Date register"></table-column>
         <table-column label="Action" :sortable="false" :filterable="false">
            <template slot-scope="row">
             <router-link :to="{name: 'edituser', params: { id: row.id }}" class="btn btn-primary">Edit</router-link>
             </template>
         </table-column>
     </table-component>
</div>
</template>

<script>
  export default {
    data() {

      return {
        has_error: false,
        users: null
      }
    },
    mounted() {
      this.getUsers()
    },
    methods: {
      getUsers() {
        this.$http({
          url: `users`,
          method: 'GET'
        })
            .then((res) => {
              this.users = res.data.users
            }, () => {
              this.has_error = true
            })
      }
    }
  }
</script>