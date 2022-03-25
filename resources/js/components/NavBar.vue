<template>
  <nav>
      <router-link :to="{ name:'home' }"> 
        <h1> Vue-Project-v1</h1>
      </router-link>
      <ul>
          <li>Login</li>
          <li>Register</li>
          <li>
            <router-link :to="{ name: 'books' }"> Books </router-link>
          </li>
      </ul>
  </nav>
</template>

<script>
export default {

}
</script>

<style>
    nav{
        display: flex;
        justify-content: space-between;
        align-content: center;
        background: rgb(23, 177, 23);
    }

    ul {
       display: flex;
       list-style-type: none;
       height: 100%;
       margin: auto 0;
    }
    li {
        padding: 5px 1.2rem;
        font-weight: bold;
        height: 100%;
    }
    a {  
        text-decoration: none;
        color: white;
    }
</style>