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
    background: #bfb;
    margin: 0;
  }
</style>