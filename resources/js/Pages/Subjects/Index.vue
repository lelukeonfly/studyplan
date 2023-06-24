<template>
  <div class="subject-list">
    <Link :href="route('subjects.show', subject.id)" v-for="subject in subjects" :key="subject.id" class="subject-item">
      {{ subject.name }}
    </Link>
  </div>
</template>

<script setup>
import { defineProps } from 'vue';
import { Link } from '@inertiajs/vue3'

const props = defineProps({
  subjects: {
    type: Array,
    required: true
  }
});
</script>

<style scoped>
.subject-list {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.subject-item {
  margin: 10px;
  padding: 10px;
  border: none;
  background-color: #eaeaea;
  border-radius: 10px;
  width: 90%;
  text-align: center;
}
</style>
