<template>
    <layout>
        <div class=" bg-zinc-300">
        {{ typeof slack_data }}
        {{ slack_data }}
        </div>
        <div class="flex flex-row align-center w-full mb-10">
            <img v-if="slack_data.avatar" :src="slack_data.avatar" alt="your slack avatar" class="h-32 w-32 rounded-full mr-8">
            </img>
            <div class="flex flex-col h-32 justify-center">
                <div v-if="slack_data.name" class="text-xl">
                    Welcome back, {{ slack_data.name }}!
                </div>
                <div>Good to see you again.</div>
            </div>
        </div>
        <RegistrationForm :slack_data="slack_data"></RegistrationForm>
    </layout>
</template>

<script>
import LoginFormLayout from '@/Layouts/LoginFormLayout.vue';
import Status from '@/Components/Status.vue';
import layout from "@/Shared/layout.vue";
import RegistrationForm from '@/Forms/RegistrationForm.vue';

export default { 
    props: {
        canResetPassword: {
            type: Boolean,
        },
        status: {
            type: String,
        },
        slack_data: {
            type: Object,
        },
    },
    components: {
        LoginFormLayout,
        Status,
        layout,
        RegistrationForm,
    },
};
</script>