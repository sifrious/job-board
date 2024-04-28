<template>
    <div v-if="jobs.length > 0">
        There are jobs
    </div>
    <div v-else>
        <InfoNone :plural="true" :per_user="false" display_type="Job Listings">
        </InfoNone>
    </div>
</template>

<script>
    import InfoNone from './InfoNone.vue';

    export default {
        props: {
            jobs: Object,
        },
        components: {
            InfoNone,
        },
    }
</script>