<template>
  <div class="page-container">
    <h1>Create Topic</h1>
    <form @submit.prevent="addTopic">
      <select v-model="form.subject_id">
          <option v-for="subject in subjects" :value="subject.id">{{ subject.name }}</option>
      </select>
        <label for="name">Name:</label>
        <input v-model="form.name" type="text" id="name" name="name" required>
      <div class="form-group">
        <label for="description">Description:</label>
        <textarea v-model="form.description" id="description" name="description"></textarea>
      </div>
      <select v-model="form.topic_id">
          <option v-for="topic in topics" :value="topic.id">{{ topic.name }}</option>
      </select>
      <button type="submit">create</button>
    </form>
    </div>
</template>

<script setup>
    import { useForm, router } from '@inertiajs/vue3'

    const props = defineProps({
        subject: String,
        subjects: Object,
        topics: Object,
        topic: Object
    });


    const form = useForm({
        subject_id: props.subject,// ?? props.topic.subject_id,
        name: '',
        topic_id: 0,//props.topic.id,
        description: ''
    })


if(props.topic != null){
    if(props.topic.id){
        form.topic_id = props.topic.id
    }

    if(props.topic.subject_id){
        form.subject_id = props.topic.subject_id
    }
}

    const addTopic = () =>{
        router.post(route('topics.store'), form)
    }
</script>

<style scoped>
.page-container {
  display: flex;
  flex-direction: column;
  align-items: center;
}

h1 {
  font-size: 24px;
  margin-bottom: 20px;
}

form {
  width: 300px;
}

.form-group {
  margin-bottom: 10px;
}

label {
  display: block;
  font-weight: bold;
}

input,
textarea {
  width: 100%;
  padding: 5px;
}

button {
  padding: 10px 20px;
  background-color: #eaeaea;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}
</style>
