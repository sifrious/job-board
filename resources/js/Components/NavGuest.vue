<script setup>
import NavBarLink from "@/Components/NavBarLink.vue"
</script>

<template>
    This is a template
    <div class="block w-1/5">
        <NavBarLink :href="'/login'" :active="false">New Post</NavBarLink>
    </div>
</template>