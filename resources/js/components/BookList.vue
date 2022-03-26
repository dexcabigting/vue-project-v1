<template>
  <div v-if="books.data" class="book-list-wrapper">
      <div @click="setBookId(book.id)" 
        v-for="book in books.data" 
        :key="book.id" class="book"
        :class="{ selected: book.id === selectedBook}">
          <h3> {{ book.title }} </h3>
          <p> By {{ book.author }} </p>
      </div>
  </div>
  <div v-else class="book-list-wrapper">
      Loading...
  </div>
</template>

<script>
import { watch, ref } from 'vue'

export default {
    props: ['books'],
    setup(props, { emit }) {

        const selectedBook = ref(null);

        function setBookId(id) {
            selectedBook.value = id
            emit('bookClick', id)
        }

        return { setBookId, selectedBook }
    }
}
</script>

<style>
    h2, h3, p{
        text-align: center;
    }
    .book-header{
        width: 100%;
        border-bottom: 2px solid black;
    }
        
    .book {
        display: flex;
        flex-direction: column;
        background: white;
        margin: 20px auto;
        padding: 10px;
        border-radius: 20px;
        width: 40%;
    }
    .book:hover{
        background: greenyellow;
    }
    .selected {
        outline: 3px solid black;
        background: greenyellow;
    }
</style>