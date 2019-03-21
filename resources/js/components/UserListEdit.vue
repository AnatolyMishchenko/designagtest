<template>
  <div class="container">
     <div class="card card-default">
    <div class="card-header">Edit Profile</div>
    <div class="card-body">
    <form @submit.prevent="updateUser">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Name:</label>
            <input type="text" class="form-control" v-model="user.name">
          </div>
        </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Balance:</label>
              <input type="text" class="form-control" v-model="user.balance">
            </div>
          </div>
        </div><br />
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Email:</label>
              <input type="text" class="form-control" v-model="user.email">
            </div>
          </div>
        </div><br />
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Banned:</label>
              <select class="form-control" v-model="user.banned">
              <option value="0">0</option>
              <option value="1">1</option>
              </select>
            </div>
          </div>
        </div><br />
        <div class="form-group">
          <button class="btn btn-primary">Update</button>
        </div>
    </form>
    </div>
  </div>
  </div>
</template>

<script>
    export default {

      data() {
          return {
            user: {
            }
          }
        },
     created() {
      let uri = `/users/edit/${this.$route.params.id}`;
      this.axios.get(uri).then((response) => {
          this.user = response.data;
      });
    },
        methods: {
          updateUser() {
            let uri = `/users/update/${this.$route.params.id}`;
            this.axios.post(uri, this.user).then((response) => {
              this.$router.push({name: 'admin.dashboard'});
            });
          }
        }
    }
</script>