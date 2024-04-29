<script setup>
import RegistrationForm from '@/Forms/RegistrationForm.vue';
import layout from '@/Shared/layout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
</script>

<template>
    <Head title="Register" />
    <layout>
        <div class="mb-4 font-medium text-sm border-b-2 border-gray-200">
            <h1 class="hidden">Register</h1>
            <span class="font-bold text-xl">Welcome! We're So Glad You're Here!</span>
            <br><br> If you're a member of the NEPA tech slack group and NEPA slack, you can 
            <Link href="'/auth/redirect'" class="underline bg-purple-50 hover:bg-purple-200 font-bold p-1">register or login using the slack account</Link>
            you use to with NEPA tech and post your listing for free.<br><br>If you already have an account without slack membership, 
            <Link href="/register" class="underline bg-purple-50 hover:bg-purple-200 font-bold p-1">Login here</Link>.
            <br><br>
        </div> 
        <div class="mb-6">
            <span class="text-xl font-bold">Create an account</span>
        </div>
        <RegistrationForm :slack_data="{}"></RegistrationForm>
    </layout>
</template>
