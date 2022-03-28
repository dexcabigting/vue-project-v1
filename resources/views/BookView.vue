<template>
  <div class="book-view">
    <div class="book-window book-list sidemargin">
      <BookList :books="books" @bookClick="setBookId" />
    </div>
    <div class="book-window book-details sidemargin">
      <BookDetails :selectedBook="selectedBook" @updateClicked="updateBk" @deleteClicked="deleteBk"> 
        <p> {{ defaultBookDetailMessage }}</p>
      </BookDetails>
    </div>
    <div class="book-window book-form sidemargin">
      <BookForm @submitted="insertBk"/>
    </div>
  </div>
</template>

<script>
import { ref, watch } from 'vue'
import BookList from '../js/components/BookList.vue'
import BookDetails from '../js/components/BookDetails.vue'
import BookForm from '../js/components/BookForm.vue'
import getBooks from '../js/composables/BookList'
import getBook from '../js/composables/BookDetails'
import updateBook from '../js/composables/BookUpdate'
import deleteBook from '../js/composables/BookDelete'

export default {
  components: { BookList, BookDetails, BookForm },
  setup() {
    const { books, error, load } = getBooks()

    load()

    let selectedBook = ref(null)

    let defaultBookDetailMessage = ref("No book selected")

    watch(selectedBook, () => defaultBookDetailMessage.value = "Loading...")

    const setBks = () => {
      load()
    }

    const setBookId = (id) => {
      const { book, error, load } = getBook(id)

      load()

      selectedBook.value = book
    }


    const insertBk = async (formData) => {
      try{
        await fetch("/api/books", {
          method: 'post',
          body: formData,
        })
      }
      catch(err){
        console.log(err.message)
      }

      setBks()

      alert("Entry Added")
    }

    const updateBk = (id, fd) => {
      const { error, load } = updateBook(id, fd)

      load()

      if (error.value){
        console.log(error.value)
        return
      }

      alert("Book updated")

      setBks()
    }

    const deleteBk = (id) => {
      const { err, load } = deleteBook(id)

      load()

      setBks()

      alert("Entry Deleted")
    }

    return { defaultBookDetailMessage , books, error, selectedBook, setBookId, insertBk, updateBk, deleteBk }
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
    flex-grow: 2;
    padding: 0 20px;
  }
  .book-form{
      flex-grow: 1;
      padding: 0 20px;
  }
  .centered {
    margin: 0 auto;
  }
  .sidemargin {
    margin: 0 2.5px;
  }
</style>