<template>
  <div class="container">
     <div class="card card-default">
    <div class="card-header">Edit transaction</div>
    <div class="card-body">
    <form @submit.prevent="updateHistory">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Name:</label>
            <input id="name" type="text" class="form-control" v-model="history.name">
          </div>
        </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>How PW:</label>
              <input id="how" type="text" class="form-control" v-model="history.how">
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
            history: {}
          }
        },
     created() {
      let uri = `http://sharp/api/post/edit/${this.$route.params.id}`;
      this.axios.get(uri).then((response) => {
          this.history = response.data;
      });
    },
        methods: {
          updateHistory() {
            let uri = `http://sharp/api/post/update/${this.$route.params.id}`;
            this.axios.post(uri, this.history).then((response) => {
              this.$router.push({name: 'admin.dashboard'});
            });
          }
        }
    }
</script>