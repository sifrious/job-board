<template>
    <LayoutUnaltered :user="user" class="h-screen mt-22 fixed">
        <div class="flex flex-row h-screen w-screen">
            <FormWrap :user="user" submitPath="listing.store" class="w-full">
            </FormWrap>
        </div>
    </LayoutUnaltered>
</template>

<script>
    import {ref} from 'vue';
    import FormWrap from '@/Forms/FormWrap.vue';
    import LayoutUnaltered from '@/Shared/LayoutUnaltered.vue';
    export default {
        props: {
            'user': Object,
        },
        components: {
            FormWrap,
            LayoutUnaltered,
        },
    }
</script>