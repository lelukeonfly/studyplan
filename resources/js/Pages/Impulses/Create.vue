<template>
  <div class="page-container">
    <h1>Create Impulse</h1>
    <form @submit.prevent="addTopic">
      <label for="name">Name:</label>
      <input v-model="form.name" type="text" id="name" name="name" required>
        <h1>Topics</h1>
      <div v-for="subject in subjectsWithTopics" :key="subject.id" class="container" >
          <div>{{ subject.name }}</div>
          <div class="topic-container">
          <div v-for="topic in subject.topics" :key="topic.id" class="" :class="{ 'selected': form.topic_ids.includes(topic.id) }">
           <label :for="'topic-' + topic.id">{{ topic.name }}</label>
        <input
          type="checkbox"
          :id="'topic-' + topic.id"
          :value="topic.id"
          v-model="form.topic_ids"
          class="custom-checkbox"
          @click="toggleSelection(topic.id)"
        >
      </div>
      </div>
      </div>
      <button type="submit" class="topic-container">Create</button>
    </form>
  </div>
  {{ form }}
</template>


<script setup>
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
  subjectsWithTopics: Object,
  ofTopic: String
})

console.log(props.subjectsWithTopics);

const form = useForm({
  topic_ids: [],
  name: '',
})

if(props.ofTopic != null){
  form.topic_ids = [props.ofTopic];
}

const addTopic = () => {
  form.post(route('impulses.store'));
}

const toggleSelection = (topicId) => {
  if (form.topic_ids.includes(topicId)) {
    form.topic_ids = form.topic_ids.filter(id => id !== topicId);
  } else {
    form.topic_ids.push(topicId);
  }
}
</script>

<style scoped>
label{
    width:100%;
}
.page-container {
    margin: 2em;
}

.topic-container {
  display: flex;
  flex-wrap: wrap;
  gap: 1em;
  align-items: center;
  border-radius: 10px;
  background-color: #ddd;
  padding: 10px;
  margin-top: 10px;
  width: 100%;
}

.container {
  display: flex;
  flex-direction: column;
  border-radius: 10px;
  background-color: #ccc;
  padding: 10px;
  margin-top: 10px;
  width: 100%;
}

.topic-container > *{
  border-radius: 10px;
  background-color: #eee;
  padding: 10px;
  margin-top: 10px;
}

.selected {
  background-color: #a091d2; /* Change the background color for selected containers */
}

input[type="checkbox"]{
    display: none;
}
</style>
<script>
    import DefaultLayout from '@/Layouts/DefaultLayout.vue';

    export default{
        layout: DefaultLayout
    }
</script>
