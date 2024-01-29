<script setup>
import LoginFormLayout from '@/Layouts/LoginFormLayout.vue';
import Status from '@/Components/Status.vue';

const props = defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});
</script>

<template>
    <Status :status="status" :title="'Log In'"></Status>
    <LoginFormLayout :canResetPassword="canResetPassword"></LoginFormLayout>
</template>
