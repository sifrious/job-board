<template>
    <!-- JOB INFORMATION -->
  <div class="w-full flex flex-col p-3 hidden md:block">
    <FormPreviewDiv formKey="Name" :formValue="form.name"></FormPreviewDiv>
    <FormPreviewDiv formKey="Job Title" :formValue="form.title"></FormPreviewDiv>
    <FormPreviewDiv formKey="Organization" :formValue="form.organization"></FormPreviewDiv>
    <!--contact-->
    <div v-if="form.contact || form.contact_preferences || form.contact_instructions" 
      class="border-t-2 border-b-2 border-stone-100">
      <div class="text-center">Contact Information Preview</div>
      <FormPreviewDiv formKey="Information" :formValue="form.contact"></FormPreviewDiv>
      <FormPreviewDiv formKey="Preferences" :formValue="form.contact_preferences"></FormPreviewDiv>
      <FormPreviewDiv formKey="Instructions" :formValue="form.contact_instructions"></FormPreviewDiv>
    </div>
    <!--description-->
    <FormPreviewDiv formKey="Job Description" :formValue="form.description"></FormPreviewDiv>
    <!--position_level-->
    <FormPreviewDiv formKey="Level" :formValue="form.position_level"></FormPreviewDiv>
    <!--location_type-->
    <FormPreviewDiv formKey="Location" :formValue="form.location_address"></FormPreviewDiv>
    <FormPreviewDiv formKey="Location Type" :formValue="form.location_type"></FormPreviewDiv>
    <!--commitment_type-->
    <FormPreviewDiv formKey="Commitment Type" :formValue="form.commitment_type"></FormPreviewDiv>
    <!--salary_range_min-->
    <FormPreviewDiv formKey="Minimum Salary" :formValue="form.salary_range_min"></FormPreviewDiv>
    <FormPreviewDiv formKey="Maximum Salary" :formValue="form.salary_range_max"></FormPreviewDiv>
    <FormPreviewDiv formKey="Salary Time Unit" :formValue="form.salary_measure"></FormPreviewDiv>
    <FormPreviewDiv formKey="Salary Display Description" :formValue="form.display_salary_range"></FormPreviewDiv>
    <!--benefits-->
    <FormPreviewDiv formKey="Benefits" :formValue="form.benefits"></FormPreviewDiv>
    <!--skills-->
    <FormPreviewDiv formKey="Skills" :formValue="form.skills"></FormPreviewDiv>
    <!--url-->
    <FormPreviewLinkDiv formKey="Link" 
      :formUrlLabel="form.url_label"
      defaultLabel="Link 1." 
      :formUrlValue="form.url"
      ></FormPreviewLinkDiv>
    <FormPreviewLinkDiv formKey="Link" 
      :formUrlLabel="form.url_secondary_label"
      defaultLabel="Link 2."
      :formUrlValue="form.url_secondary"></FormPreviewLinkDiv>
    <FormPreviewLinkDiv formKey="Link" 
      :formUrlLabel="form.url_tertiary_label" 
      defaultLabel="Link 2."
      :formUrlValue="form.url_tertiary">
    </FormPreviewLinkDiv>
    <FormPreviewLinkDiv formKey="Linked In URL"
      :formUrlLabel="form.url_linkedin_label"
      defaultLabel="LinkedIn"
      :formUrlValue="form.url_linkedin">
    </FormPreviewLinkDiv>
  </div>
</template>

<script setup>
import { ref, watch, toRefs } from 'vue';
import FormPreviewDiv from '@/Forms/Components/FormPreviewDiv.vue';
import FormPreviewLinkDiv from '@/Forms/Components/FormPreviewLinkDiv.vue';

const props = defineProps({
  user: Object,
  form: Object,
});

</script>