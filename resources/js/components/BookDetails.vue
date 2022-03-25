<template>
  <div v-if="selectedBook?.value">
      <h2>{{ selectedBook.value.data.title }}</h2>
      <p> Author: {{ selectedBook.value.data.author }}</p>
      <p> Description: {{ selectedBook.value.data.description }}</p>
      <p> Publishing House: {{ selectedBook.value.data.publishing_house }}</p>
      <p> Date published: {{ selectedBook.value.data.publishing_date }}</p>
      <p> Entry created at: {{ selectedBook.value.data.created_at }}</p>
      <p> Entry last updated at: {{ selectedBook.value.data.updated_at }}</p>
      <!-- <p>{{ selectedBook }}</p> -->
  </div>
  <div v-else>
      <p> Loading ...</p>
  </div>
</template>

<script>

export default {
    props: [ 'selectedBook' ]
}

</script>

<style>

</style>