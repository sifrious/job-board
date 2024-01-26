<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import NavigationTemplate from "@/Layouts/NavigationTemplate.vue";
import { Link } from "@inertiajs/vue3";

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <NavigationTemplate>
        <slot></slot>
    </NavigationTemplate>
</template>

<script>

export default {
    name: "AppLayout",
    components: {
        NavigationTemplate,
    },
};
</script>
