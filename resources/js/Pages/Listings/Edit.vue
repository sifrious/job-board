<template>
    <layout :user="user">
    </layout>
</template>

<script>
import layout from '@/Shared/layout.vue';

export default {
    props: {
        user: Object,
    },
    components: {
        layout,
    }
}
</script>