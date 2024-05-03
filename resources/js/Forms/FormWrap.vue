
<template>
    <form @submit.prevent="form.post(route(submitPath))" class="mt-6 space-y-6">
        <!-- panel for submit/save and desktop preview -->
        <div class="w-full h-16 md:w-1/3 md:h-full fixed top-0 left-0">
            <div class="mt-12 w-full h-12 flex align-center justify-center p-12">
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
                <div v-if="user.role === 'nepatech'" class="flex items-center gap-4 ml-4 pb-4">
                    <PrimaryButton :disabled="form.processing">Publish</PrimaryButton>

                    <Transition
                        enter-active-class="transition ease-in-out"
                        enter-from-class="opacity-0"
                        leave-active-class="transition ease-in-out"
                        leave-to-class="opacity-0"
                    >
                        <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Published.</p>
                    </Transition>
                </div>
            </div>
            <FormPreview :form="form"></FormPreview>
        </div>

        <div class="w-full h-screen overflow-scroll pl-4 md:pt-4 md:w-2/3 relative top-24 md:top-0 md:right-0 md:left-1/3">
            <slot />
            <CreateJobFormInputs v-model="form" :form="form"></CreateJobFormInputs>
            <div class="w-full m-3 flex items-center mt-12 pb-4">
                <div class="gap-4 mx-4">
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
                <div v-if="user.role === 'nepatech'" class="gap-4">
                    <PrimaryButton :disabled="form.processing">Publish</PrimaryButton>

                    <Transition
                        enter-active-class="transition ease-in-out"
                        enter-from-class="opacity-0"
                        leave-active-class="transition ease-in-out"
                        leave-to-class="opacity-0"
                    >
                        <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Published.</p>
                    </Transition>
                </div>
            </div>
            <div class="border-2 h-1/5 border-white text-white">
                This is a spacer div. idk what to tell you, web dev is hard
            </div>
        </div>

    </form>
</template>

<script setup>
    import { ref, watch, defineProps } from 'vue';
    import FormPreviewDiv from '@/Forms/Components/FormPreviewDiv.vue'
    import { useForm } from '@inertiajs/inertia-vue3';
    import CreateJobFormInputs from '@/Pages/Jobs/Partials/CreateJobFormInputs.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import FormPreview from '@/Forms/Components/FormPreview.vue';

    const props = defineProps({
            submitPath: {
                type: String,
                reqired: true,
            },
            user: Object,
        },
    );

    const form = useForm({
       // job description attributes
       name: '',
       title: '',
       organization: '',
       contact: '',
       contact_preferences: '',
       contact_instructions: '',
       url: '',
       url_secondary: '',
       url_tertiary: '',
       url_linkedin: '',
       url_label: '',
       url_secondary_label: '',
       url_tertiary_label: '',
       url_linkedin_label: '',
       description: '',
       position_level: '',
       location_type: '',
       location_address: '',
       commitment_type: '',
       salary_range_min: '',
       salary_range_max: '',
       display_salary_range: '',
       salary_measure: '',
       benefits: '',
       skills: ''
       // listing attributes
    });

    const submitPath = ref(props.submitPath);
    const formName = ref(form.name);

    function updateFormPreview() {
        console.log(form);
    };

    watch(form, (form) => {
        console.log(form);
        updateFormPreview();
    }, {deep:true});

    const submit = () => {
        this.$inertia.post(
            submitPath,
            { ...form.value}
        );
    };
</script>