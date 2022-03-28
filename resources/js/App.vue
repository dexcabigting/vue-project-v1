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
  :root {
    --process-button: rgb(45, 175, 45);
    --hot-button: red;
  }
  body{
    background: #bfb;
    margin: 0;
  }
  .rounded-input{
    border-radius: 10px;
  }
  form{
    display: flex;
        flex-direction: column;
        margin: 10px 0;
        margin-top: 0;
  }
  form :nth-child(odd){
    margin: 10px;
  }
  input[type="text"], input[type="date"], input[type="password"]{
    height: 1.5rem;
  }
  textarea{
    resize: none;
  }

</style>