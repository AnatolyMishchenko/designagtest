<template>
  <div class="container">
     <div class="card card-default">
      <div class="card-header">Transaction</div>
        <table-component class="table" :data="transactions" sort-by="name" sort-order="asc">
             <table-column show="name" label="Name"></table-column>
             <table-column show="how" label="How"></table-column>
             <table-column show="created_at" label="Created"></table-column>
         </table-component>
        </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        has_error: false,
        transactions: null
      }
    },
    mounted() {
      this.getTransaction()
    },
    methods: {
      getTransaction() {
        this.$http({
          url: `transactions`,
          method: 'GET'
        })
            .then((res) => {
              this.transactions = res.data.transactions
            }, () => {
              this.has_error = true
            })
      }
    }
  }
</script>
