<script setup>
    import JobForm from '@/Forms/JobForm.vue';

    const props = defineProps({
        user: {
            type: Object,
            required: true,
        },
    })
</script>

<template>
    <div class="flex flex-row">
        <div class="hidden md:block md:w-1/3 lg:w-2/5">
            <!-- <div class="w-full p-4 flex flex-row justify-end sticky">
                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing" @click="draft">
                    Save Draft
                </PrimaryButton>

                <PrimaryButton v-if="user > 0" class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing" @click="presubmit">
                    Post Listing
                </PrimaryButton>
            </div> -->
        </div>
        <div class="w-full md:w-2/3 lg:3/5">
            <JobForm :user="user"></JobForm>
        </div>
    </div>
</template>