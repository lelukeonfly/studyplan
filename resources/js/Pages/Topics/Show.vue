<template>
  <div class="page-container">
    <h1><Link :href="route('subjects.show', subject.id)">subject: {{ subject.name }}</Link></h1>
    <div v-if="parent" class="subject">
        <h2><Link :href="route('topics.show', parent.id)">parent: {{ parent.name }}</Link></h2>
    </div>
    <div class="subject">
      <h1>Topic: {{ topic.name }}</h1>
    </div>
    <h1>Impulses</h1>
        <div class="topic-list">
            <Link :href="route('impulses.create', {topic:topic.id})" class="topic-item">Create Impulse</Link>
            <Link :href="route('impulses.show', impulse.id)" v-for="impulse in impulses" :key="impulse.id" class="impulse-item">
            {{ impulse.name }}
          </Link>
        </div>
    <h1>Topics</h1>
        <div class="topic-list">
            <Link :href="route('topics.create', {topic_id:topic.id})" class="topic-item">
            Create Topic
          </Link>
          <Link :href="route('topics.show', subtopic.id)" v-for="subtopic in topics" :key="subtopic.id" class="topic-item">
            {{ subtopic.name }}
          </Link>
        </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

const props = defineProps({
  parent: Object,
  topic: Object,
  topics: Object,
  subject: Object,
  impulses: Object,
});
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

.subject {
  margin-bottom: 20px;
}

h2 {
  font-size: 20px;
  font-weight: bold;
}

.impulse-list {
  margin-bottom: 20px;
}

h3 {
  font-size: 18px;
  font-weight: bold;
}

ul {
  list-style: none;
  padding: 0;
}

li {
  margin-bottom: 5px;
}

.impulse-link {
  display: inline-block;
  padding: 5px 10px;
  border-radius: 5px;
  background-color: #e0e0e0;
  color: #333;
  text-decoration: none;
}

.impulse-link:hover {
  background-color: #ccc;
}
.topic-list,
.impulse-list {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.topic-item,
.impulse-item {
  margin: 10px;
  padding: 10px;
  background-color: #eaeaea;
  border-radius: 10px;
  text-align: center;
  width: 100%;
}
</style>
