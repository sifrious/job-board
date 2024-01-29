<script setup>
import PrimaryNavLinkDiv from './PrimaryNavLinkDiv.vue';
</script>

<template>
    <PrimaryNavLinkDiv :href="'/welcome'" :failedSlackLogin="false">Post</PrimaryNavLinkDiv>
</template>


<!-- <div class="block w-1/5">
    <NavBarLink :href="'/loginPrompt'" :active="false">New Post</NavBarLink>
</div> -->