<script setup>
    const props = defineProps({
        user: {
            type: Object,
            required: true,
        },
        listing: {
            type: Object,
        },
        flash: {
            type: Object,
        },
    })
</script>

<template>
    <div class="p-3">
        <h3 class="pb-2 flex flex-row text-xl">
            <div class="flex h-8 pr-1 place-self-center justify-self-center text-gray-800">{{ listing.title }}</div>
            <div v-if="listing.organization" class="flex ml-2 justify-self-center text-gray-400">@{{ listing.organization }}</div>
        </h3>
    </div>
</template>