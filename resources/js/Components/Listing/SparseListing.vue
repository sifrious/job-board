<script setup>
    import ListingTitle from './ListingTitle.vue';
    
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
    <div class="">
        <ListingTitle :listing="listing"></ListingTitle>
    </div>
</template>