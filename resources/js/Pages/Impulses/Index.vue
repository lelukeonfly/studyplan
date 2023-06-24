<template>
  <div class="subject-list">
    <Link :href="route('impulses.create')" class="subject-item">Create Impulse</Link>
  </div>
  <div class="subject-list">
    <Link :href="route('impulses.show', impulse.id)" v-for="impulse in impulses" :key="impulse.id" class="subject-item">
      {{ impulse.name }}
    </Link>
  </div>
</template>

<script setup>
import { defineProps } from 'vue';
import { Link } from '@inertiajs/vue3'

const props = defineProps({
  impulses: Object
});
</script>

<style scoped>
.subject-list {
  display: flex;
  flex-wrap: wrap;
  flex-direction: row;
  align-items: center;
  margin: 2em;
  gap: 1em;
  justify-content: space-evenly;
}

.subject-item {
  padding: 10px;
  border: none;
  background-color: #eaeaea;
  border-radius: 10px;
  text-align: center;
}
.center{
    margin: auto;
}
</style>
