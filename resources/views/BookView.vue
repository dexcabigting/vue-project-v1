<template>
  <div class="book-view">
    <div class="book-window book-list sidemargin">
      <h2 class="book-header centered"> Books </h2>
      <BookList :books="books" @bookClick="setBookId" />
    </div>
    <div class="book-window book-details sidemargin">
      <BookDetails :selectedBook="selectedBook"/>
    </div>
    <div class="book-window book-form sidemargin">
      <BookForm @submitted="insert" />
    </div>
  </div>
</template>

<script>
import { ref } from 'vue'
import BookList from '../js/components/BookList.vue'
import BookDetails from '../js/components/BookDetails.vue'
import BookForm from '../js/components/BookForm.vue'
import getBooks from '../js/composables/BookList'
import getBook from '../js/composables/BookDetails'
import insertBook from '../js/composables/BookAdd'

export default {
  components: { BookList, BookDetails, BookForm },
  setup() {
    const { books, error, load } = getBooks()

    load()

    let selectedBook = ref(null)

    const setBookId = (id) => {
      const { book, error, load } = getBook(id)

      load()

      selectedBook.value = book
    }

    const insert = (formData) => {
      console.log(formData)
      for (let e of formData){
        console.log(e)
      }
      fetch("http://localhost:8000/api/books", {
        method: 'post',
        body: formData,
      })
      .then(res => res.json())
      .then(data => {
        formData.title = ''
      })
      // .catch(err => console.log(err))
    }

    return { books, error, selectedBook, setBookId, insert }
  }
}
</script>

<style>
  .book-window {
    background: #eee;
    border-radius: 25px;
    display: flex;
    flex-direction: column;
  }
  .book-view{
    display: flex;
    justify-content: space-between;
    flex: 0 0 50%;
    margin: 10px 5px;
  }
  .book-list{
      flex-grow: 1;
      padding: 20px;
  }
  .book-details{
    flex-grow: 3;
  }
  .book-form{
      flex-grow: 1;
      padding: 0 20px;
  }
  .centered {
    margin: auto;
  }
  .sidemargin {
    margin: 0 2.5px;
  }
</style>