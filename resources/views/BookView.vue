<template>
  <div class="book-view">
    <div class="book-list sidemargin">
      <h2 class="centered"> Books </h2>
      <BookList :books="books" @bookClick="setBookId" />
    </div>
    <div class="book-details sidemargin">
      <BookDetails :selectedBook="selectedBook"/>
    </div>
  </div>
</template>

<script>
import { ref } from 'vue'
import BookList from '../js/components/BookList.vue'
import BookDetails from '../js/components/BookDetails.vue'
import getBooks from '../js/composables/BookList'
import getBook from '../js/composables/BookDetails'

export default {
  components: { BookList, BookDetails },
  setup() {
    const { books, error, load } = getBooks()

    load()

    let selectedBook = ref(null)

    function setBookId(id){
      const { book, error, load } = getBook(id)

      load()

      selectedBook.value = book

    }
    

    return { books, error, selectedBook, setBookId }
  }
}
</script>

<style>
  .book-view{
    display: flex;
    justify-content: space-between;
    margin: 10px 5px;
  }
  .book-list{
      background: #eee;
      border-radius: 25px;
      display: flex;
      width: 48%;
      flex-direction: column;
      padding: 20px;
  }
  .book-details{
      background: #eee;
      border-radius: 25px;
      display: flex;
      width: 51%;
      flex-direction: column;
  }
  .centered {
    margin: auto;
  }
  .sidemargin {
    margin: 0 2.5px;
  }
</style>