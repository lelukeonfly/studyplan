<script setup>
    import { useForm } from '@inertiajs/vue3'
    const props = defineProps({
        impulses: Object,
        topics: Object
    });

    const form = useForm({
        impulse_id: 0,
        topic_id: 0,
    });

    const link = () => {
        form.post(route('link.store'));
    }
</script>
<template>
    <form @submit.prevent="link">
        <div id="lex">
            <div>
            <label>impulse</label>
            <select v-model="form.impulse_id">
                <option v-for="impulse in impulses" :value="impulse.id">{{ impulse.name }}</option>
            </select>
            </div>
            <div>
            <label>topic</label>
            <select v-model="form.topic_id">
                <option v-for="topic in topics" :value="topic.id">{{ topic.name }}</option>
            </select>
            </div>
            <button type="submit">Link</button>
        </div>
    </form>
</template>
<style scoped>
div#lex{
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        gap: 1em;
        justify-content: space-between;
        max-width: 40em;
        margin: auto;
    }
</style>
