<script setup>
import OptionalInputLabel from '@/Forms/Components/OptionalInput.vue'
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import Checkbox from '@/Components/Checkbox.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import TextAreaInput from '@/Components/TextAreaInput.vue';
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
    <form @submit.prevent="submit" class="overscroll-contain overflow-scroll">

        <div id="basics-div" class="p-5 mt-5">
            <h2 class="text-2xl mb-4 border-b-2 border-gray-500">Basics</h2>

            <InputLabel for="title" value="Position Title" />
            <TextInput
                id="title"
                type="text"
                class="mt-1 block w-full"
                v-model="form.title"
                required
                autofocus
                autocomplete="title"
            />

            <InputLabel for="organization" value="Organization" />
            <TextInput
                id="organization"
                type="text"
                class="mt-1 block w-full"
                v-model="form.organization"
                autofocus
                autocomplete="title"
            />

            <div class="m-2 pb-4 flex flex-row">
                <div>
                    <Checkbox id="user_represents_organiaztion" name="user_represents_organization"></Checkbox>
                </div>
                <div class="text-xs flex flex-col mx-4">
                    <InputLabel for="user_represents_organization" value="I Am Currently Employed By Or Hold a Leadership Position In This Organization"></InputLabel>
                    <p class=" px-2 italic">Leave unchecked if you are posting on behalf of an organization as a recruiter, an agent, or an interested party.</p>
                </div>
            </div>

            <InputLabel for="url" value="Listing URL" />
            <TextInput
                id="url"
                type="text"
                class="mt-1 block w-full"
                v-model="form.url"
                autofocus
                autocomplete="title"
            />

            <OptionalInputLabel>
                <InputLabel for="description" value="Description" />
            </OptionalInputLabel>
            <TextAreaInput
                id="description"
                type="textarea"
                class="mt-1 h-30 block w-full"
                v-model="form.description"
                autofocus
                autocomplete="description"
        />
        </div> 
        <!-- end basics section -->

        <div id="canidate-div" class="p-5 mt-5">
            <h2 class="text-2xl mb-4 border-b-2 border-gray-500">
                The Perfect Canidate
            </h2>
        
            <InputLabel for="" value="Skills" />
            <InputLabel for="" value="Experience Level" />
        </div>
        <!-- end canidate section -->

        <div id="specifics-div" class="p-5 mt-5">
            <h2 class="text-2xl mb-4 border-b-2 border-gray-500">
                The Specifics
            </h2>
        
            <h3 class="text-2xl italic border-b-1 border-gray-400">Location</h3>
            <InputLabel for="" value="Type" />
            <OptionalInputLabel>
                <InputLabel for="" value="Address" />
            </OptionalInputLabel>

            <h3 class="text-2xl italic border-b-1 border-gray-400">Expectations</h3>
            <InputLabel for="" value="Commitment Type" />
            <InputLabel for="" value="Salary Range" />
        </div>
        <!-- end specifics section -->

        <!-- end basics section -->
        <div id="contact-div" class="p-5 mt-5">
            <h2 class="text-2xl mb-4 border-b-2 border-gray-500">
                Contact
            </h2>
        
            <InputLabel for="contact" value="General Contact Information" />
            <TextAreaInput
                id="contact"
                type="textarea"
                class="mt-1 h-30 block w-full"
                v-model="form.contact"
                autofocus
                autocomplete="contact"
            />
        </div>
        
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