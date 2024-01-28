<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue'
import NavAuthenticated from "@/Components/NavAuthenticated.vue";
import NavGuest from "@/Components/NavGuest.vue";

defineProps({
  home: {
    type:Boolean
  },
  user: {
    type: [Number, null],
    required: true,
    default: null,
    validator: (value) => typeof value === 'number' || value === null,
  }
})
</script>

<template>
  <div class=" border-b-2 border-grey-50">
    <div class="flex flex-row align-baseline">
      <ApplicationLogo class="w-22 p-2"></ApplicationLogo>
      <div class="flex flex-col text-3xl justify-end justify-center">
          Jobs Board
      </div>
      <div class="hidden md:visible">
        <NavGuest v-if="user === 'null'" />
        <NavAuthenticated v-else />
      </div>
    </div>
  </div>
</template>

<!-- <script>
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
</script> -->
