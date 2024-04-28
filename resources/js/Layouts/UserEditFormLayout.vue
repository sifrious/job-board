<script setup>
import LoginForm from '@/Forms/LoginForm.vue';
import { Head } from '@inertiajs/inertia-vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
});
</script>

<template>
    <LoginForm :canResetPassword="canResetPassword"></LoginForm>
</template>