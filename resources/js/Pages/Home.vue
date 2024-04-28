<template>
    <Layout :user="user" class="h-screen">
        <div class="relative flex flex-col justify-center text-center w-full h-2/3">
            <span class="text-4xl">
                Find Work and Talent Through NEPA's <br> 
                <span class="font-bold text-5xl">Premiere Tech Community</span>
            </span>
            <div class="flex flex-row flex-wrap pt-12 justify-center">
                <PrimaryButtonLg :href="'/jobs'" :active="false">
                    Browse Jobs
                </PrimaryButtonLg>
                <PrimaryButtonLg :href="'/login-prompt'" :active="false">
                    Post Job
                </PrimaryButtonLg>
            </div>
        </div>
    </Layout>
</template>

<script>
import PrimaryButtonLg from "@/Components/PrimaryButtonLg.vue";
import Layout from '../Shared/layout.vue';

export default {
    props: {
        user: Object,
    },
    components: {
        Layout,
        PrimaryButtonLg,
    }
};
</script>