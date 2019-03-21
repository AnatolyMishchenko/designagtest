<template>
  <div class="container">
     <div class="card card-default">
      <div class="card-header">Transaction</div>
      <div class="card-body">
        <table-component class="table" :data="data" sort-by="id" sort-order="desc">
             <table-column show="id" label="Id"></table-column>
             <table-column show="name" label="Name"></table-column>
             <table-column show="how" label="How"></table-column>
             <table-column label="Action" :sortable="false" :filterable="false">
                <template slot-scope="row">
                 <router-link :to="{name: 'edit', params: { id: row.id }}" class="btn btn-primary">Edit</router-link>
                 </template>
             </table-column>
         </table-component>
        </div>
        </div>
  </div>
</template>
<script>
  export default {
      data() {
        return {
          data: []
        }
      },
      created() {
      let uri = 'http://sharp/api/post';
      this.axios.get(uri).then(response => {
        this.data = response.data.data;
      });
    }
  }
</script>