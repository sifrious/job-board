<template>
    <div class="h-full w-full">
        <Nav :home="true" :user="user">
        </Nav> 
            <slot />
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