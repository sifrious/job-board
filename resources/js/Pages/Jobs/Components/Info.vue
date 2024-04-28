<template>
    <div v-if="user">
        <div v-if="jobs.length > 0">
            <InfoCount :jobs="jobs"></InfoCount>
        </div>
        <div v-else>
            <InfoNone :plural="true" :per-user="true" display_type="Jobs"></InfoNone>
        </div>
    </div>
    <div v-else class="text-center p-30">
        You should never see this text. It's in ./resources/js/Pages/Jobs/Components/Info.vue and is used only for testing.
    </div>
</template>

<script>
    import InfoCount from './InfoCount.vue';
    import InfoNone from './InfoNone.vue';

    export default {
        props: {
            jobs: String,
        },
        components: {},
    }
</script>