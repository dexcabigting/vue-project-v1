import { ref } from 'vue'

const getBook = (id) => {
    const book = ref()
    const error = ref(null)

    const load = async () => {
      try {
        let data = await fetch("http://localhost:8000/api/books/" + id)
        if (!data.ok){
          throw Error("No data available")
        }
        book.value = await data.json()

      }
      catch (err){
        error.value = err.message
        console.log(error.value)
      }
    }

    return { book, error, load }
}

export default getBook