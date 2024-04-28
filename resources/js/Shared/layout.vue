<template>
    <div class="h-full w-full">
        <Nav :home="true" :user="user">
        </Nav> 
        <div class="mt-28 h-full">
            <slot />
        </div>
    </div>
</template>

<script>
import Nav from '../ntNav/nav.vue';

export default {
    components: {
        Nav,
    },
    props: {
        user: Object,
    }
}

</script>