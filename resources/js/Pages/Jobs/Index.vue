<script setup>
    import NavigationTemplate from '@/Layouts/NavigationTemplate.vue';
    import {useForm, Head} from '@inertiajs/vue3';

    const props = defineProps({
        user: {
            type: Number,
            required: true,
        },
        status: {
            type: String,
        }
    })
</script>

<template>
    <Head title="Jobs" />

    <NavigationTemplate :user=user :home="false">
    </NavigationTemplate>

</template>
