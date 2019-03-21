<template>
    <div class="container">
        <div class="card card-default">
            <div class="card-header">Dashboard</div>
            <div class="card-body">
                <userOption></userOption>
                <transaction></transaction>
                <givePW></givePW>
            </div>
        </div>
    </div>
</template>
<script>
  import userOption from '../../components/user-option.vue'
  import givePW from '../../components/givePW.vue'
  import transaction from '../../components/transaction.vue'
  export default {
    data() {
      return {
        //
      }
    },
    components: {
      userOption,
      transaction,
      givePW

    }
  }
</script>

