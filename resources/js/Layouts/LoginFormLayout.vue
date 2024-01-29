<script setup>
import LoginForm from '@/Forms/LoginForm.vue';
defineProps({
    canResetPassword: {
        type: Boolean,
    }
});
</script>

<template>
    <LoginForm :canResetPassword="canResetPassword"></LoginForm>
</template>