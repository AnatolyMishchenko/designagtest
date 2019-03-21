<template>
<div>
    <h3>User details</h3>
    <div class="alert alert-danger" v-if="has_error">
        <p>Error, unable to retrieve the list of users.</p>
    </div>
    <table class="table">
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Balance</th>
            <th scope="col">Date register</th>
        </tr>
        <tr>
            <td>{{ options.name }}</td>
            <td>{{ options.email }}</td>
            <td>{{ options.balance }}</td>
            <td>{{ options.created_at}}</td>
        </tr>
    </table>
</div>
</template>
<script>
  export default {
    data() {
      return {
        has_error: false,
        options: null
      }
    },
    mounted() {
      this.getOptions()
    },
    methods: {
      getOptions() {
        this.$http({
          url: `options`,
          method: 'GET'
        })
            .then((res) => {
              this.options = res.data.options
            }, () => {
              this.has_error = true
            })
      }
    }
  }
</script>