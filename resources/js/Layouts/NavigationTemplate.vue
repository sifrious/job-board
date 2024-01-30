<script setup>
import { Link } from '@inertiajs/vue3';
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
  <div class="sticky bg-white z-20 border-b-2 border-grey-50">
    <div class="flex flex-row align-baseline">
      <Link :href="'/'" class="flex flex-row w-4/5 md:w-2/5">
        <ApplicationLogo class="w-22 p-2">

        </ApplicationLogo>
      <div class="flex flex-col text-3xl justify-center">
          Jobs Board
      </div>
      </Link>
      <div v-if="!home" class="flex-row justify-end hidden md:flex md:w-3/5">
        <div class="hidden md:flex items-center p-4">
          <!-- Display Login if user is not logged in -->
          <NavGuest v-if="(user < 0)"> </NavGuest>
          <!-- Display Info if user is logged in -->
          <NavAuthenticated v-else > </NavAuthenticated>
        </div>
      </div>
      <!-- Mobile Version -->
      <div v-if="!home" class="flex md:hidden w=1/5 bg-pink">
        <h2>Login</h2>
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
