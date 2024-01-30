<script setup>
    import NavigationTemplate from '@/Layouts/NavigationTemplate.vue';
    import Status from '@/Components/Status.vue';
    import JobCreateLayout from '@/Layouts/JobCreateLayout.vue';

    const props = defineProps({
        user: {
            type: Object,
            required: true,
        },
        listings: {
            type: Array,
        }, 
        flash: {
            type: Object,
        },
    })
</script>

<template>
    {{ user }}
    {{ listings }}
</template>

