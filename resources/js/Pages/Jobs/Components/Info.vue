<template>
    user is {{ user }}
    <PermanentInfoContainer>
        <div v-if="user">
            <div v-if="jobs.length > 0">
                <InfoCount :jobs="jobs"></InfoCount>
            </div>
            <div v-else>
                <InfoNone :plural="true" :per_user="true" display_type="Jobs"></InfoNone>
            </div>
        </div>
    </PermanentInfoContainer>
</template>

<script>
    import InfoCount from './InfoCount.vue';
    import InfoNone from './InfoNone.vue';
    import PermanentInfoContainer from '@/Components/PermanentInfoContainer.vue';

    export default {
        props: {
            jobs: String,
            user: Object,
        },
        components: {
            InfoCount,
            InfoNone,
            PermanentInfoContainer,
        },
    }
</script>