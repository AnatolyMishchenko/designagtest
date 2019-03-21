<template>
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <ul class="navbar-nav mr-auto">
            <!--UNLOGGED-->
            <li  class="nav-item" v-if="!$auth.check()" v-for="(route, key) in routes.unlogged" v-bind:key="route.path">
                <router-link  :to="{ name : route.path }" :key="key" class="nav-link">
                    {{route.name}}
                </router-link>
            </li>
            <!--LOGGED USER-->
            <li class="nav-item" v-if="$auth.check(1)" v-for="(route, key) in routes.user" v-bind:key="route.path">
                <router-link  :to="{ name : route.path }" :key="key" class="nav-link">
                    {{route.name}}
                </router-link>
            </li>
            <!--LOGGED ADMIN-->
            <li class="nav-item" v-if="$auth.check(2)" v-for="(route, key) in routes.admin" v-bind:key="route.path">
                <router-link  :to="{ name : route.path }" :key="key" class="nav-link">
                    {{route.name}}
                </router-link>
            </li>
            <!--LOGOUT-->
            <li class="nav-item" v-if="$auth.check()">
                <a  class="nav-link" href="#" @click.prevent="$auth.logout()">Logout</a>
            </li>
        </ul>
    </nav>
</template>
<script>
  export default {
    data() {
      return {
        routes: {
          // UNLOGGED
          unlogged: [
            {
              name: 'Register',
              path: 'register'
            },
            {
              name: 'Log in',
              path: 'login'
            }
          ],
          // LOGGED USER
          user: [
            {
              name: 'Dashboard',
              path: 'dashboard'
            }
          ],
          // LOGGED ADMIN
          admin: [
            {
              name: 'Dashboard',
              path: 'admin.dashboard'
            },
            {
              name: 'Transactions',
              path: 'post'
            }
          ]
        }
      }
    },
    mounted() {
      //
    }
  }
</script>