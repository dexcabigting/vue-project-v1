<template>
  <h2 class="book-header centered"> Books </h2>
  <div v-if="books.data" class="book-list-wrapper">
      <div @click="setBookId(book.id)" 
        v-for="book in books.data" 
        :key="book.id" class="book"
        :class="{ selected: book.id === selectedBook }">
          <h3> {{ book.title }} </h3>
          <p> By {{ book.author }} </p>
      </div>
  </div>
  <div v-else class="book-list-wrapper">
      Loading...
  </div>
</template>

<script>
import { ref, watch } from 'vue'

export default {
    props: ['books', 'bookAdded'],
    emits: ['bookClick'],
    setup(props, { emit }) {

        const selectedBook = ref(null);

        const setBookId = (id) => {
            selectedBook.value = id
            emit('bookClick', id)
        }

        watch(() => props.bookAdded, () => {
            selectedBook.value = props.bookAdded
        })

        return { setBookId, selectedBook }
    }
}
</script>

<style>
    h2, h3, p, label{
        text-align: center;
        font-family: Helvetica;
    }
    .book-list-wrapper{
        display: flex;
        flex-flow: column wrap;
        max-height: 680px;
        width: 260px;
    }
    .book-header{
        width: 100%;
        border-bottom: 2px solid black;
    }
        
    .book {
        display: flex;
        flex-direction: column;
        background: white;
        margin: 10px auto;
        padding: 10px;
        border-radius: 10px;
        width: 40%;
        height: 185px;
    }
    .book:hover{
        background: greenyellow;
    }
    .selected {
        outline: 3px solid black;
        background: greenyellow;
    }
</style>