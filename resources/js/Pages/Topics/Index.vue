<template>
  <div class="topic-list">
    <Link :href="route('topics.create')" class="topic-item">Create Topic</Link>
  </div>
  <div class="topic-list">
    <Link :href="route('topics.show', topic.id)" v-for="topic in topics" :key="topic.id" class="topic-item">
      {{ topic.name }}
    </Link>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

const props = defineProps({
  topics: {
    type: Array,
    required: true
  }
});
</script>

<style scoped>
.topic-list {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  gap: 1em;
  justify-content: space-around;
  margin: 2em;
}

.topic-item {
  padding: 10px;
  border: none;
  background-color: #eaeaea;
  border-radius: 10px;
  text-align: center;
}
</style>
<script>
    import DefaultLayout from '@/Layouts/DefaultLayout.vue';

    export default{
        layout: DefaultLayout
    }
</script>
