<template>
    <div class="col-md-4">
        <h3>Transfer PW to other user</h3>
        <form @submit.prevent="givePW">
              <div class="form-group">
                  <label for="price">name :</label>
                  <input type="text"  class="form-control name" v-model="name"/>
              </div>
              <div class="form-group">
                  <label for="quantity">how much PW:</label>
                  <input type="text" class="form-control how" v-model="balance"/>
              </div>
              <button type="submit" class="btn btn-primary">Transfer</button>
        </form>
    </div>
</template>
<script>
export default {
    data() {
        return {
            id: '',
            name: '',
            balance: ''
        }
    },
    methods: {
        givePW() {
            axios.post('/givepw', {id: this.id,
            name: this.name, balance: this.balance}).then(res => {
                this.$router.push({name: 'home'});
            }).catch(e => {
                console.log(e);
            });

        }
    }
}
</script>