<template>
    <div class="h-full w-full">
        <Nav :home="true" :user="user">
        </Nav> 
        <div class="mt-28 w-full flex flex-col items-center justify-center">
            <div class="w-11/12 md:w-4/5 lg:w-3/4">
            <slot />
            </div>
        </div>
    </div>
</template>

<script>
import Nav from '@/ntNav/Nav.vue';

export default {
    components: {
        Nav,
    },
    props: {
        user: Object,
    }
}

</script>