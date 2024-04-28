<script setup>

// 
import { ref } from 'vue'
import { useForm } from '@inertiajs/inertia-vue3';
import OptionalInputLabel from '@/Forms/Components/OptionalInput.vue'
import InputError from '@/Components/InputError.vue'; 
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import TextAreaInput from '@/Components/TextAreaInput.vue';

const props = defineProps({
    user: {
        type: Object
    }
});

const is_slack_user = props.user.slack_id !== '';

const form = useForm({
    title: '',
    organization: '',
    preferred_contact: '',
    url: '',
    description: '',
    location_address: '',
    skills: '',
    is_active: false,
    is_published: null,
    published_date: null,
});

const presubmit = function() {
    form.is_published = true;
    form.is_active = true;
    console.log("hit presubmit");
    form.published_date = Date.now();
    console.log(`published on ${form.published_date}`);
}

const draft = function() {
    form.is_published = false;
    console.log("hit draft");
}

const submit = () => {
    form.post(route('jobs.create'), {
        onFinish: () => form.reset(),
    });
};
</script>

<template>
    <form @submit.prevent="submit" class="relative">
        <div class="fixed bg-white pb-3 md:pb-0 md:bg-transparent z-50 top-20 md:top-24 w-full flex flex-row items-center justify-center border-b-2 border-gray-700 md:border-b-0">
                <PrimaryButton class="ms-4 mr-6" :class="{ 'opacity-25': form.processing }" :disabled="form.processing" @click="draft">
                    Save Draft
                </PrimaryButton>

                <PrimaryButton v-if="is_slack_user" class="" :class="{ 'opacity-25': form.processing }" :disabled="form.processing" @click="presubmit">
                    Post Listing
                </PrimaryButton>

                <div class="w-16 hidden md:block bg-white border-2 border-white">
                </div>
        </div>

        <div class="flex flex-col overscroll-contain pt-16 md:pt-12">
            <div id="basics-div" class="px-5 mt-5">
                <div id="positionTitleContainer">
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
                </div>

                <div id="organizationContainer">
                    <InputLabel for="organization" value="Organization" />
                    <TextInput
                        id="organization"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.organization"
                        autofocus
                        autocomplete="title"
                    />
                </div>

                <div id="urlContainer">
                    <InputLabel for="url" value="Listing URL" />
                    <TextInput
                        id="url"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.url"
                        autofocus
                        autocomplete="title"
                    />
                </div>

                <div id="optionalInputContainer">
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
            </div> <!-- end basics section -->
            

            <div id="canidate-div" class="p-5 mt-5">
                <h2 class="text-2xl mb-4 border-b-2 border-gray-500">
                    The Perfect Canidate
                </h2>

                <div id="skillsContainer">
                    <div class="text-xs flex flex-col">
                        <OptionalInputLabel>
                            <InputLabel for="" value="Skills" />
                        </OptionalInputLabel>
                        <p class="italic">Enter required skills in a comma seperated list.</p>
                    </div>
                    <TextInput
                        id="skills"
                        type="text"
                        class="mt-1 h-30 block w-full"
                        v-model="form.skills"
                        autofocus
                        autocomplete="skills"
                    />
                </div>

                <div id="experienceLevelsContainer" class="hidden">
                    <div class="text-xs flex flex-col md:flex-row w-full">
                        <div class="flex flex-col w-full md:w-36 pt-3">
                            <InputLabel for="" class="w-full" value="Experience Level" />
                        </div>
                        <!-- <RadioButtonsExperienceLevels v-model="position_level"></RadioButtonsExperienceLevels> -->
                    </div>
                </div>
            </div>
            <!-- end canidate section -->

            <div id="specifics-div" class="p-5 mt-5">
                <h2 class="text-2xl mb-4 border-b-2 border-gray-500">
                    The Specifics
                </h2>

                <div id="LocationTypeContainer" class="hidden">
                    <div class="text-xs flex flex-col md:flex-row w-full">
                        <div class="flex flex-col w-full md:w-36 pt-3">
                            <InputLabel for="" class="w-full" value="Location Type" />
                        </div>
                        <!-- <RadioButtonsLocationType v-model="form.location_type"></RadioButtonsLocationType> -->
                    </div>
                </div>

                <div id="addressCardContainter">
                    <OptionalInputLabel>
                        <InputLabel for="address" value="Address" />
                    </OptionalInputLabel>
                    <TextInput
                        id="address"
                        type="text"
                        class="mt-1 h-30 block w-full"
                        v-model="form.address"
                        autofocus
                        autocomplete="address"
                    />
                </div>

                <div id="CommitmentTypeContainer" class="hidden">
                    <div class="text-xs flex flex-col md:flex-row w-full">
                        <div class="flex flex-col w-full md:w-36 pt-3">
                            <InputLabel for="" class="w-full" value="Commitment" />
                        </div>
                        <!-- <RadioButtonsCommitmentType v-model="commitment_type"></RadioButtonsCommitmentType> -->
                    </div>
                </div>
            </div>
            <!-- end specifics section -->

            <!-- end basics section -->
            <div id="contact-div" class="p-5 mt-5">
                <h2 class="text-2xl mb-4 border-b-2 border-gray-500">
                    Contact
                </h2>
            
                <div id="contactContainer">
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
            </div>
        </div>
    </form>
</template>