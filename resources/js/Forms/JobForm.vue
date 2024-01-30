<script setup>

// 
import { ref } from 'vue'
import { useForm } from '@inertiajs/vue3';
import OptionalInputLabel from '@/Forms/Components/OptionalInput.vue'
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import TextAreaInput from '@/Components/TextAreaInput.vue';
// import RadioButtonsExperienceLevels from '@/Forms/Components/RadioButtonsExperienceLevels.vue';
// import RadioButtonsCommitmentType from '@/Forms/Components/RadioButtonsCommitmentType.vue';
// import RadioButtonsLocationType from '@/Forms/Components/RadioButtonsLocationType.vue';

const props = defineProps({
    user: {
        type: Number
    }
});

const form = useForm({
    title: '',
    organization: '',
    preferred_contact: '',
    // owner: '',
    // creator: '',
    // contact: '',
    // contact_preferences: '',
    // contact_instructions: '',
    // user_represents_organization: '',
    // is_active: '',
    // is_published: '',
    url: '',
    // url_secondary: '',
    // url_tertiary: '',
    // url_linkedin: '',
    description: '',
    // position_level: '',
    location_address: '',
    location_type: '',
    comitment_type: '',
    position_type: '',
    // salary_range_min: '',
    // salary_range_max: '',
    // salary_measure: '',
    // benefits: '',
    skills: '',
});

const presubmit = function() {
    console.log("hit presubmit");
}

const draft = function() {
    console.log("hit draft");
}

const submit = () => {
    form.post(route('jobs.create'), {
        onFinish: () => form.reset(),
    });
};
</script>

<template>
    <form @submit.prevent="submit" class="overscroll-contain overflow-scroll">

        <div id="basics-div" class="px-5 mt-5">

        <div class="w-full pb-4 flex flex-row justify-end sticky">
            <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing" @click="draft">
                Save Draft
            </PrimaryButton>

            <PrimaryButton v-if="user > 0" class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing" @click="presubmit">
                Post Listing
            </PrimaryButton>
        </div>

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
                    <!-- <RadioButtonsCommitmentType v-model="comitment_type"></RadioButtonsCommitmentType> -->
                </div>
            </div>
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

    </form>
</template>