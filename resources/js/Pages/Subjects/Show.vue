<template>
  <div class="page-container">
    <Link :href="route('subjects.index')" class="back-link">Subjects</Link>
    <h1 class="subject-title">{{ subject.name }}</h1>
    <div class="flex-container">
      <div class="topics-container">
          <div class="section-heading"><Link :href="route('topics.index')">Topics</Link></div>
        <div class="topic-list">
            <Link :href="route('topics.create', {subject:subject.id})" class="topic-item">
            Create Topic
          </Link>
          <Link :href="route('topics.show', topic.id)" v-for="topic in topics" :key="topic.id" class="topic-item">
            {{ topic.name }}
          </Link>
        </div>
      </div>
      <div class="impulses-container">
          <div class="section-heading"><Link :href="route('impulses.index')">Impulses</Link></div>
        <div class="impulse-list">
          <Link :href="route('impulses.show', impulse.id)" v-for="impulse in impulses" :key="impulse.id" class="impulse-item">
            {{ impulse.name }}
          </Link>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { defineProps } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
  subject: Object,
  topics: Object,
  impulses: Object,
});
</script>

<style scoped>
.page-container {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.back-link {
  margin-bottom: 20px;
  color: #000;
  text-decoration: none;
  font-size: 18px;
  font-weight: bold;
}

.subject-title {
  font-size: 32px;
  font-weight: bold;
  margin-bottom: 20px;
  text-align: center;
}

.flex-container {
  display: flex;
  justify-content: space-between;
  width: 100%;
  max-width: 800px;
}

.topics-container,
.impulses-container {
  flex-basis: 48%;
}

.section-heading {
  margin-bottom: 10px;
  font-weight: bold;
  text-align: center;
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
<script>
    import DefaultLayout from '@/Layouts/DefaultLayout.vue';

    export default{
        layout: DefaultLayout
    }
</script>
