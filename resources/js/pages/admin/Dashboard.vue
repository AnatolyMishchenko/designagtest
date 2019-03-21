<template>
    <div class="container">
        <div class="card card-default">
            <div class="card-header">Admin Dashboard</div>
        </div>
        <div class="card card-default">
            <div class="card-body">
                <userList></userList>
            </div>
        </div>
    </div>
</template>
<script>
  import userList from '../../components/user-list.vue'
  import updateUser from '../../components/UserListEdit.vue'
  export default {
    mounted() {
      //
    },
    components: {
      userList,
      updateUser
    }
  }
</script>