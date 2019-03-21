<template>
    <div id="main">
        <header id="header">
            <h1 class="navbar-brand">
                <router-link :to="{name: 'home'}">
                    PW Application
                </router-link>
            </h1>
            <navigationMenu></navigationMenu>
        </header>
        <div id="content">
            <router-view></router-view>
        </div>
    </div>
</template>
<style>
    header {
        max-width: 1140px;
        position: relative;
        margin: 0 auto;
    }
    .table-component__table {
        width: 100%;
    }
    .table-component__table thead tr th{
        cursor: pointer;
        color: blue;
    }
</style>
<script>
  import navigationMenu from './components/Menu.vue'
  export default {
    data() {
      return {
        //
      }
    },
    components: {
      navigationMenu
    }
  }
</script>