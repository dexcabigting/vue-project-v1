<template>
  <NavBar/>
  <router-view/>
</template>

<script>
import NavBar from '../js/components/NavBar.vue'
export default {
  components: { NavBar }
}
</script>

<style>
  body{
    margin: 0
  }
</style>