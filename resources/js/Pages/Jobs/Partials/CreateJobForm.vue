<script setup>
import { ref } from 'vue';
import { Link, useForm, usePage } from '@inertiajs/inertia-vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import TextAreaInput from '@/Components/TextAreaInput.vue';
import Checkbox from '@/Components/Checkbox.vue';

// Props
const props = defineProps({
  mustVerifyEmail: Boolean,
  status: String,
});

// Using Inertia.js hooks to get page information
const page = usePage();
const user = ref(page.props.value.auth?.user || { name: '', email: '' });

// Reactive form state
const form = useForm({
  name: '',
  title: '',
  organization: '',
  user_represents_organization: '',
  url: '',
  description: '',
  location_address: '',
  skills: '',
  remaining_available: 1,
});

</script>

<template>
    <section>
        <form @submit.prevent="form.post(route('{{submitPath}}'))" class="mt-6 space-y-6">
            
            <!-- Job Name -->
            <div>
                <InputLabel for="name" value="Name for Your Listing" />

                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    autofocus
                    autocomplete="name"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <!-- Job Title -->
            <div>
                <InputLabel for="title" value="Job Title" />

                <TextInput
                    id="title"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.title"
                    required
                />

                <InputError class="mt-2" :message="form.errors.title" />
            </div>

            <!-- Organization -->
            <div>
                <InputLabel for="organization" value="Organizaiton" />

                <TextInput
                    id="organizaiton"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.organization"
                />

                <InputError class="mt-2" :message="form.errors.organization" />
            </div>

            <!-- represents organization -->
            <div>
                <div class="flex flex-row">
                    <Checkbox id="user_represents_organization" value="checked"></Checkbox>
                    <div class="flex flex-col ml-2">
                        <InputLabel for="user_represents_organization" value="I am posting this listing as a manager, owner or employee of this organization" />
                        <div>Leave this box unchecked if you are a recruiter or not part of this organization.</div>
                    </div>
                </div>
            </div>

            <!-- url -->
            <div>
                <InputLabel for="url" value="url" />

                <TextInput
                    id="url"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.url"
                />

                <InputError class="mt-2" :message="form.errors.url" />
            </div>

            <!-- description -->
            <div>
                <InputLabel for="description" value="Job Description" />

                <TextAreaInput
                    id="description"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.description"
                />

                <InputError class="mt-2" :message="form.errors.description" />
            </div>

            <!-- location_address -->
            <div>
                <InputLabel for="location_address" value="Location Address" />

                <TextInput
                    id="location_address"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.location_address"
                />

                <InputError class="mt-2" :message="form.errors.location_address" />
            </div>

            <!-- skills -->
            <div>
                <InputLabel for="skills" value="skills" />

                <TextAreaInput
                    id="skills"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.skills"
                />
                <InputError class="mt-2" :message="form.errors.skills" />
            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                <Transition
                    enter-active-class="transition ease-in-out"
                    enter-from-class="opacity-0"
                    leave-active-class="transition ease-in-out"
                    leave-to-class="opacity-0"
                >
                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                </Transition>
            </div>
        </form>
    </section>
</template>