<template>
  <form class="reg-form">
    <h2> Register Account </h2>
    <label> Username </label>
    <input type="text">
    <label> Password </label>
    <input type="password">
    <label> Confirm Password </label>
    <input type="password">
    <input type="submit" value="Register">
  </form>
</template>

<script>
export default {

}
</script>

<style>
  .reg-form{
    background: #eee;
    border-radius: 10px;
    margin: 20px auto;
    padding: 20px;
    width: 60%;
  }
  .reg-form > input{
    border-radius: 10px;
  }

  .reg-form > input[type="submit"]{
    background-color: var(--process-button);
    font-weight: bold;
    margin: 10px auto; 
    height: 2.5rem;
    width: 100%;
  }
</style>