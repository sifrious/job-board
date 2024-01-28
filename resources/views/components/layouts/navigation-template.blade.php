<script setup></script>

<template>
    <h2> This is a navigation template <h2>
</template>

<script>
    export default {
        data() {
            return {
                isLargeViewport: window.innerWidth > 1000,
            };
        },
        created() {
            window.addEventListener("resize", this.updateViewport);
        },
        beforeDestroy() {
            window.removeEventListener("resize", this.updateViewport);
        },
        methods: {
            updateViewport() {
                this.isLargeViewport = window.innerWidth > 1000;
                console.log(document.getElementById("button-div").classList);
            },
        },
    };
</script>
