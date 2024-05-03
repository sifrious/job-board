<script setup>
    import { ref, defineProps, defineEmits, watch } from 'vue';
    import { Link, useForm, usePage } from '@inertiajs/inertia-vue3';
    import InputError from '@/Components/InputError.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import TextInput from '@/Forms/Components/TextInput.vue';
    import TextAreaInput from '@/Forms/Components/TextAreaInput.vue';
    import Checkbox from '@/Forms/Components/Checkbox.vue';

    // Props
    const props = defineProps({
        form: Object,
    });

    const emits = defineEmits(['update:form']);

    const page = usePage();
    const user = ref(page.props.value.auth?.user || { name: '', email: '' });
    const form = props.form;
</script>

<template>
    <section class="w-full mt-16 md:pr-4">
        <form @submit.prevent="form.post(route('listing.store'))" class="mt-6 space-y-6 md:w-3/5">
            
            <TextInput 
                label="Name" 
                id="name"
                v-model="form.name"
                placeholder=""
                :required=false
                :message="form.errors.name"
            >
            Choose a name for this listing.
            </TextInput>

            <TextInput 
                label="Job Title" 
                id="title"
                v-model="form.title"
                placeholder=""
                :required=true
                :message="form.errors.title"
            >What role are you looking to fill?
            </TextInput>

            <!-- organization -->
            <TextInput 
                label="Business or Organization" 
                id="Organization"
                v-model="form.organization"
                placeholder=""
                :required=false
                :message="form.errors.organization"
            >
            </TextInput>

            <!-- user_represents_organizaiton -->
            <div>
                <div class="flex flex-row">
                    <Checkbox id="user_represents_organization" value="checked" :checked="true"></Checkbox>
                    <div class="flex flex-col ml-2">
                        <InputLabel for="user_represents_organization" value="I am posting this listing as a manager, owner or employee of this organization" />
                        <div>Leave this box unchecked if you are a recruiter or not part of this organization.</div>
                    </div>
                </div>
            </div>

            <!-- contact TEXTAREA -->
            <div class="bg-stone-50 p-2">

                <div class="text-2xl font-bold text-stone-600 py-2">Contact</div>
                <TextAreaInput
                    id="contact"
                    label="Contact"
                    v-model="form.contact"
                    placeholder=""
                    :required=false
                    :message="form.errors.contact"
                >
                </TextAreaInput>
                
                <!-- contact_preferences -->
                <TextInput 
                    id="contact_preferences" 
                    label="Contact Preferences"
                    v-model="form.contact_preferences"
                    placeholder=""
                    :required=false
                    :message="form.errors.contact_preferences"
                >
                What is the easiest way to get in touch? Include this field if you provided multiple urls and/or means of contact.
                </TextInput>
                
                <!-- contact_instructions -->
                <TextInput 
                    id="contact_instructions" 
                    label="Contact Instructions"
                    v-model="form.contact_instructions"
                    placeholder=""
                    :required=false
                    :message="form.errors.contact_instructions"
                >
                Add more specific contact instructions here if they're needed.
                </TextInput>
            </div> 
            <div>
                <div class="text-2xl font-bold text-stone-600 py-2">Links</div>
                Be sure to include the entire link url in the url field to ensure they work correctly. Links without a protocol
                (<span class="bg-indigo-50">https://</span> or 
                <span class="bg-indigo-50">http://</span>) will not work in the preview and may behave unpredictably on listing pages.
                <!-- urls -->
                <div class="p-3 bg-stone-50 w-full">
                    <!-- url -->
                    <TextInput 
                        label="URL" 
                        id="url"
                        v-model="form.url"
                        placeholder=""
                        :required=false
                        :message="form.errors.url"
                    >
                    </TextInput>           
                    
                    <!-- url_label -->
                    <TextInput 
                        label="Label" 
                        id="url_label"
                        v-model="form.url_label"
                        placeholder=""
                        :required=false
                        :message="form.errors.url_label"
                    >
                    </TextInput>
                </div>        
                
                <!-- secondary urls -->
                <div class="p-3 bg-stone-50 w-full hidden">
                    <!-- url_secondary -->
                    <TextInput 
                        id="url_secondary" 
                        label="Url - Secondary"
                        v-model="form.url_secondary"
                        placeholder=""
                        :required=false
                        :message="form.errors.url_secondary"
                    >
                    </TextInput>           
                    
                    <!-- url_secondary_label -->
                    <TextInput 
                        id="url_secondary_label" 
                        label="Url Label - Secondary"
                        v-model="form.url_secondary_label"
                        placeholder=""
                        :required=false
                        :message="form.errors.url_secondary_label"
                    >
                    </TextInput>
                </div>  
                
                <!-- tertiary urls -->
                <div class="p-3 bg-stone-50 w-full hidden">
                    <!-- url_tertiary -->
                    <TextInput 
                        id="url_tertiary " 
                        label="URL - Tertiary"
                        v-model="form.url_tertiary "
                        placeholder=""
                        :required=false
                        :message="form.errors.url_tertiary "
                    >
                    </TextInput>           
                    
                    <!-- url_tertiary_label -->
                    <TextInput 
                        id="url_tertiary_label" 
                        label="URL Label - Tertiary"
                        v-model="form.url_tertiary_label"
                        placeholder=""
                        :required=false
                        :message="form.errors.url_tertiary_label"
                    >
                    </TextInput>
                </div>
                
                <!--linkedin_urls -->
                <div class="p-3 bg-stone-50 w-full">
                    <!-- url_tertiary -->
                    <TextInput 
                        id="linkedin_url" 
                        label="LinkedIn Url"
                        v-model="form.url_tertiary "
                        placeholder=""
                        :required=false
                        :message="form.errors.url_tertiary "
                    >
                    </TextInput>           
                    
                    <!-- url_linkedin_label -->
                    <TextInput 
                        id="linkedin_url_label" 
                        label="LinkedIn Url Label"
                        v-model="form.url_tertiary_label"
                        placeholder=""
                        :required=false
                        :message="form.errors.url_tertiary_label"
                        class="py-3"
                    >
                    <div class="w-3/4"> 
                    If you are including a LinkedIn link, please take a moment to specify what the page describes.
                    Is it the company's site? A listing? Your profile? Something else?

                    </div>
                    </TextInput>
                </div>

            </div>

            <!-- description TEXT AREA -->
            <TextAreaInput
                id="description"
                label="Description"
                v-model="form.description"
                placeholder=""
                :required=false
                :message="form.errors.description"
            >
            </TextAreaInput>
 
            <!-- position_label RADIO GROUP -->

            <div id="location-container">
                <div class="text-2xl font-bold text-stone-600 py-2">Location</div>
                <!-- location_type RADIO GROUP -->

                <!-- location_address TEXT AREA --> 
                <TextAreaInput
                    id="location_address"
                    label="Where's the job?"
                    v-model="form.location_address"
                    placeholder=""
                    :required=false
                    :message="form.errors.location_address"
                    class="py-2"
                >
                This field could be an address, a description of travel requirements, more information about a hybrid or remote enviornment. Anything that clarifies 
                </TextAreaInput>
            </div>

            <div class="">

                <div class="text-2xl font-bold text-stone-600 py-2">Salary & Benefits</div>
                <!-- salary_range_min -->
                <div class="w-screen flex flex-row flex-wrap align-center justify-center">
                    <TextInput 
                        label="Minimum"
                        id="salary_range_min" 
                        v-model="form.salary_range_min"
                        placeholder="$"
                        :required=false
                        :message="form.errors.salary_range_min"
                        class="w-1/3 p-2"
                    ></TextInput>

                    <!-- salary_range_max -->
                    <TextInput 
                        label="Maximum" 
                        id="salary_range_max"
                        v-model="form.salary_range_max"
                        placeholder="$"
                        :required=false
                        :message="form.errors.salary_range_max"
                        class="w-1/3 p-2"
                    ></TextInput>

                    <!-- salary_measure -->
                    <TextInput 
                        label="Measurement" 
                        id="salary_measure"
                        v-model="form.salary_measure"
                        placeholder="per year"
                        :required=false
                        :message="form.errors.salary_measure"
                        class="w-1/3 p-2"
                    ></TextInput>
                </div>

                <!-- display_salary_range -->
                <TextInput 
                    label="Salary Range" 
                    id="display_salary_range"
                    v-model="form.display_salary_range"
                    placeholder=""
                    :required=false
                    :message="form.errors.display_salary_range"
                    class="p-2 w-full"
                >
                Add contextual information or choose to use other language to describe salary information here.
                </TextInput>

                <!-- benefits -->
                <TextAreaInput
                    id="benefits"
                    label="Benefits"
                    v-model="form.benefits"
                    placeholder=""
                    :required=false
                    :message="form.errors.benefits"
                    class="p-2"
                >
                This is a place to brag. What's so great about this job? 
                Don't limit yourself to medical and dental. We'll feature your listing if this section stands out.
                </TextAreaInput>
            </div>

            <!-- skills TEXT AREA  -->
            <TextAreaInput
                id="skills"
                label="Relevant Skills"
                v-model="form.skills"
                placeholder=""
                :required=false
                :message="form.errors.skills"
            >
            Seperate skills with commas.
            </TextAreaInput>
        </form>
    </section>
</template>