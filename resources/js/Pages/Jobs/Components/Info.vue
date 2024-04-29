<template>
    <PermanentInfoContainer>
        <div v-if="user">
            <div v-if="list_items.length > 0">
                <InfoCount :list_items="jobs" :user="user"></InfoCount>
            </div>
            <div v-else>
                <InfoNone :plural="true" :per_user="true" display_type="Job Listings"></InfoNone>
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
            user: Object,
            list_items: Object || None,
            display_type: String,
        },
        components: {
            InfoCount,
            InfoNone,
            PermanentInfoContainer,
        },
    }
</script>