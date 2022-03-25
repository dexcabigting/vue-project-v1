<template>
  <div v-if="books.data">
      <div v-for="book in books.data" :key="book.id" class="centered">
          <h2> {{ book.title }} </h2>
          <p> By {{ book.author }} </p>
      </div>
  </div>
  <div v-else>
      Loading data...
  </div>
</template>

<script>
export default {
    props: ['books'],
}
</script>

<style>
    h2, p{
        text-align: center;
    }
</style>