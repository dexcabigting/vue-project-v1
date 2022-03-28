<template>
  <nav>
      <router-link :to="{ name:'home' }"> 
        <h1> VUE-PROJECT-V1</h1>
      </router-link>
      <ul>
          <li>
            <router-link :to="{ name: 'login' }"> Login </router-link>
          </li>
          <li>
            <router-link :to="{ name: 'register' }"> Register </router-link>
          </li>
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
    h1 {
      margin-left: 10px;
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
        text-transform: uppercase;
    }
</style>