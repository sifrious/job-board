<template>
    <LayoutUnaltered class="h-screen mt-22 fixed">
        <div class="flex flex-row h-screen w-screen border-2 border-rose-300">
            <FormWrap submitPath="listing.create">
                <div class="w-full h-1/6 md:w-1/3 md:h-full bg-blue-50 fixed h-full top-0 left-0 bg-stone-50">
                    <div id="preview-box" class="border-2 mt-16 hidden md:block">
                        <div class="hidden md:block">New Job Listing</div>
                    </div>
                </div>
                <div class="w-2/3 bg-blue-200 relative top-0 right-0 left-1/3 overflow-scroll">
                </div>
            </FormWrap>
        </div>
    </LayoutUnaltered>
</template>

<script>
    import {ref} from 'vue';
    import FormWrap from '@/Forms/FormWrap.vue';
    import LayoutUnaltered from '@/Shared/LayoutUnaltered.vue';
    export default {
        components: {
            FormWrap,
            LayoutUnaltered,
        }
    }
</script>