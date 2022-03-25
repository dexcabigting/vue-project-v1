<template>
  <div class="book-list">
    <h2 class="centered"> Books </h2>
    <BookList :books="books"/>
  </div>
</template>

<script>
import BookList from '../js/components/BookList.vue'
import getBooks from '../js/composables/BookList'

export default {
  components: { BookList },
  setup() {
    const { books, error, load } = getBooks()

    load()

    return { books, error }
  }
}
</script>

<style>
  .book-list{
      margin: auto;
      background: #eee;
      border-radius: 25px;
      display: flex;
      flex-direction: column;
  }
  .centered {
    margin: auto;
  }
</style>