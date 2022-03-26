<template>
  <div v-if="selectedBook?.value" class="book-view-wrapper">
      <h2 class="book-header">{{ selectedBook.value.data.title }}</h2>
      <p> Author: {{ selectedBook.value.data.author }}</p>
      <p> Category: {{ selectedBook.value.data.category }}</p>
      <p> Description: {{ selectedBook.value.data.description }}</p>
      <p> Publishing House: {{ selectedBook.value.data.publishing_house }}</p>
      <p> Date published: {{ selectedBook.value.data.publishing_date }}</p>
      <p> Entry created at: {{ selectedBook.value.data.created_at }}</p>
      <p> Entry last updated at: {{ selectedBook.value.data.updated_at }}</p>
      <div class="book-view-buttons">
        <button> Edit </button>
        <button @click="deleteBook(selectedBook.value.data.id)"> Delete</button>
      </div>
  </div>
  <div v-else class="book-view-wrapper">
      <h2 class="book-header"> Book Title </h2>
      No book selected...
  </div>
</template>

<script>

export default {
    props: [ 'selectedBook' ],
    emits: [ 'deleteClicked' ],
    setup(props, { emit }){
        
        const deleteBook = (id) => {
            emit('deleteClicked', id)
        }

        return { deleteBook }
    }
}

</script>

<style>
    .book-view-wrapper{
        margin: 0 auto;
        width: 500px;
    }
    .book-view-buttons{
        display: flex;
        justify-content: space-evenly;
    }
</style>