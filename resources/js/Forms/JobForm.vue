<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    slack_data : {
        type: Object,
        required: true,
    },
});

const form = useForm({
    title: '',
    organization: '',
    preferred_contact: '',
    owner: '',
    creator: '',
    contact: '',
    contact_preferences: '',
    contact_instructions: '',
    user_represents_organization: '',
    is_active: '',
    is_published: '',
    url: '',
    url_secondary: '',
    url_tertiary: '',
    url_linkedin: '',
    description: '',
    position_level: '',
    location_address: '',
    location_type: '',
    comitment_type: '',
    position_type: '',
    salary_range_min: '',
    salary_range_max: '',
    salary_measure: '',
    benefits: '',
    skills: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <form @submit.prevent="submit">
        <!-- <div>
            <InputLabel for="name" value="Name" />
            <TextInput
                id="name"
                type="text"
                class="mt-1 block w-full"
                v-model="form.name"
                required
                autofocus
                autocomplete="name"
            />
        </div> -->
        
        <!-- <div class="mt-4">
            <div class="flex flex-row align-baseline">
                <InputLabel for="nickname" value="Nickname" class="w-20"/>
                <div class="inline text-xs font-thin py-0.5 text-center"><span>(Optional)</span></div>
            </div>

            <TextInput
                id="nickname"
                type="text"
                class="mt-1 block w-full"
                v-model="form.nickname"
                autofocus
                autocomplete="nickname"
            />
        </div>

        <div class="mt-4">
            <InputLabel for="email" value="Email" />

            <TextInput
                id="email"
                type="email"
                class="mt-1 block w-full"
                v-model="form.email"
                required
                autocomplete="username"
            />

            <InputError class="mt-2" :message="form.errors.email" />
        </div>

        <div class="mt-4">
            <InputLabel for="password" value="Password" />

            <TextInput
                id="password"
                type="password"
                class="mt-1 block w-full"
                v-model="form.password"
                required
                autocomplete="new-password"
            />

            <InputError class="mt-2" :message="form.errors.password" />
        </div>

        <div class="mt-4">
            <InputLabel for="password_confirmation" value="Confirm Password" />

            <TextInput
                id="password_confirmation"
                type="password"
                class="mt-1 block w-full"
                v-model="form.password_confirmation"
                required
                autocomplete="new-password"
            />

            <InputError class="mt-2" :message="form.errors.password_confirmation" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <Link
                :href="route('login')"
                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            >
                Already registered?
            </Link>

            <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Register
            </PrimaryButton>
        </div> -->
    </form>
</template>