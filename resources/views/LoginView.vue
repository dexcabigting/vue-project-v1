<template>
  <form class="login-form">
    <h2> Login </h2>
    <label> Username </label>
    <input type="text">
    <label> Password </label>
    <input type="password">
    <input type="submit" value="Login">
  </form>
</template>

<script>
export default {

}
</script>

<style>
  .login-form{
    background: #eee;
    border-radius: 10px;
    margin: 20px auto;
    padding: 20px;
    width: 60%;
  }
  .login-form > input{
    border-radius: 10px;
  }

  .login-form > input[type="submit"]{
    background-color: var(--process-button);
    font-weight: bold;
    margin: 10px auto; 
    height: 2.5rem;
    width: 100%;
  }
</style>