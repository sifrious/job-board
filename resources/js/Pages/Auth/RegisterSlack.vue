<script setup>
import RegistrationForm from '@/Forms/RegistrationForm.vue';

const props = defineProps({
    slack_data : {
        type: Object,
        required: true,
    },
})
</script>

<template>
    <div class=" bg-zinc-300">
    {{ typeof slack_data }}
    {{ slack_data }}
    </div>
    <RegistrationForm :slack_data="slack_data"></RegistrationForm>
</template>