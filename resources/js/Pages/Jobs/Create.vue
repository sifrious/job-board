<script setup>
    import NavigationTemplate from '@/Layouts/NavigationTemplate.vue';
    import Status from '@/Components/Status.vue';
    import JobCreateLayout from '@/Layouts/JobCreateLayout.vue';
</script>

<template>
    <NavigationTemplate :user=user :home="false">
        </NavigationTemplate>
    <Status :title="'New Job Listing'">
        </Status>
    <JobCreateLayout>
        </JobCreateLayout>
</template>
