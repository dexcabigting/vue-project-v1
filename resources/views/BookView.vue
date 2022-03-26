<template>
  <div class="book-view">
    <div class="book-window book-list sidemargin">
      <BookList :books="books" @bookClick="setBookId" />
    </div>
    <div class="book-window book-details sidemargin">
      <BookDetails :selectedBook="selectedBook" @deleteClicked="deleteBk" />
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
import deleteBook from '../js/composables/BookDelete'

export default {
  components: { BookList, BookDetails, BookForm },
  setup() {
    const { books, error, load } = getBooks()

    load()

    let selectedBook = ref(null)

    const setBks = () => {
      load()
    }

    const setBookId = (id) => {
      const { book, error, load } = getBook(id)

      load()

      selectedBook.value = book
    }


    const insert = (formData) => {
      fetch("http://localhost:8000/api/books", {
        method: 'post',
        body: formData,
      })
      .then(res => res.json())

      setBks()

      alert("Entry Added")
    }

    const deleteBk = (id) => {
      console.log(id)
      const { err, load } = deleteBook(id)

      load()

      setBks()

      alert("Entry Deleted")
    }

    return { books, error, selectedBook, setBookId, insert, deleteBk }
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