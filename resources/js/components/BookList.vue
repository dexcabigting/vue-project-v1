<template>
  <div v-if="books.data">
      <div @click="setBookId(book.id)" v-for="book in books.data" :key="book.id" class="book">
          <h2> {{ book.title }} </h2>
          <p> By {{ book.author }} </p>
      </div>
  </div>
  <div v-else>
      Loading...
  </div>
</template>

<script>
export default {
    props: ['books'],
    setup(props, { emit }) {

        function setBookId(id) {
            emit('bookClick', id)
        }

        return { setBookId }
    }
}
</script>

<style>
    h2, p{
        text-align: center;
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
</style>