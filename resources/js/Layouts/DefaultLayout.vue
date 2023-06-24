<template>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8" />
        </head>

        <body>

            <header>
                <Link :href="route('subjects.index')">Subjects</Link>
                <Link :href="route('topics.index')">Topics</Link>
                <Link :href="route('impulses.index')">Impulses</Link>
                <Link :href="route('link.show')">Link</Link>
            </header>
            <slot></slot>
        </body>
    </html>
</template>
<script setup>
    import { Link } from "@inertiajs/vue3";
</script>

<style scoped>
    *{margin: 0;}
    header{
        display: flex;
        justify-content: space-between;
        max-width: 40em;
        margin: auto;
        margin-top: 1em;
        margin-bottom: 1em;
    }
    header>*{
        padding: 1.5em;
        background: #a6a3a5;
        border-radius: 10px;
    }
</style>

