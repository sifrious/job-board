<template>
    <PermanentInfoContainer>
    <div v-if="list_items.length > 0">
        Here's a list: {{ list_items }}
    </div>
    <div v-else>
        <InfoNone :plural="true" :per_user="false" :display_type="display_type">
        </InfoNone>
    </div>
</PermanentInfoContainer>
</template>

<script>
    import InfoNone from './InfoNone.vue';
    import PermanentInfoContainer from '@/Components/PermanentInfoContainer.vue';

    export default {
        props: {
            list_items: Object,
            display_type:String,
        },
        components: {
            InfoNone,
            PermanentInfoContainer,
        },
    }
</script>