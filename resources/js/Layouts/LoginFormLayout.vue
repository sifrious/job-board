<script setup>
import LoginForm from '@/Forms/LoginForm.vue';
import LoginFormKnown from '@/Forms/LoginFormKnown.vue';
defineProps({
    canResetPassword: {
        type: Boolean,
    },
    email: {
        type: String,
    }
});
</script>

<template>
    <LoginFormKnown v-if="email" :canResetPassword="canResetPassword" :email="email">
        <slot />
    </LoginFormKnown>
    <LoginForm v-else :canResetPassword="canResetPassword">
        <slot />
    </LoginForm>
</template>