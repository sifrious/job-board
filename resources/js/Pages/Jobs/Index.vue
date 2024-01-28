<script setup>
    import NavigationTemplate from '@/Layouts/NavigationTemplate.vue';
    import {useForm, Head} from '@inertiajs/vue3';

    const form = useForm({
        message: '',
    });
</script>

<template>
    <Head title="Jobs" />

    <NavigationTemplate :user=-1 :home="false">
    </NavigationTemplate>

</template>
