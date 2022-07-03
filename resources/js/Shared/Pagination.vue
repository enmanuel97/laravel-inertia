<template>
    <div class="mt-6">
        <Component
            v-for="link in links"
            :is="link.url ? 'Link' : 'span'"
            :href="link.url"
            v-html="link.label"
            class="px-1"
            :class="{'text-gray-400': !link.url, 'font-bold': link.active}"
        />
    </div>
</template>

<script setup>
    defineProps({
        links: Array
    })
</script>
