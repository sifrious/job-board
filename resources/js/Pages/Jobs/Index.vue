<script setup>
    import NavigationTemplate from '@/Layouts/NavigationTemplate.vue';
    import {useForm, Head} from '@inertiajs/vue3';

    const props = defineProps({
        user: {
            type: Number,
            required: true,
        }
    })

    const form = useForm({
        message: '',
    });
</script>

<template>
    <Head title="Jobs" />

    <NavigationTemplate :user=user :home="false">
    </NavigationTemplate>

</template>
