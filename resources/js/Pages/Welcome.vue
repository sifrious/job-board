<script setup>
import { Head, Link } from "@inertiajs/vue3";
import NavigationTemplate from "@/Layouts/NavigationTemplate.vue";
import PrimaryButtonLg from "@/Components/PrimaryButtonLg.vue"


defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <NavigationTemplate :home="true" :user="-1"></NavigationTemplate>
    <div class="flex justify-center pt-10 text-center">
        <div class="w-full md:px md:w-4/5 lg:3/5 text-center">
            <div class="mx-14">
                <span class="text-4xl">
                    Find Work and Talent Through NEPA's Premiere Tech Community
                </span>
            </div>
            <div class="flex flex-row flex-wrap p-10 justify-center">
                <PrimaryButtonLg :href="'/jobs'" :active="false">
                    Browse Jobs
                </PrimaryButtonLg>
                <PrimaryButtonLg :href="'/login'" :active="false">
                    Post Job
                </PrimaryButtonLg>
            </div>
        </div>
    </div>
    <div class="">
    </div>
</template>