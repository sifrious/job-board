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
  <!-- START -->
      <header class="absolute inset-x-0 top-0 z-50 flex h-16 border-b border-gray-900/10">
  <div class="mx-auto flex w-full max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">
    <div class="flex flex-1 items-center gap-x-6">
      <button type="button" class="-m-3 p-3 md:hidden">
        <span class="sr-only">Open main menu</span>
        <svg class="h-5 w-5 text-gray-900" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
          <path fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10zm0 5.25a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75a.75.75 0 01-.75-.75z" clip-rule="evenodd" />
        </svg>
      </button>
      <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
    </div>
    <nav class="hidden md:flex md:gap-x-11 md:text-sm md:font-semibold md:leading-6 md:text-gray-700">
      <a href="#">Home</a>
      <a href="#">Invoices</a>
      <a href="#">Clients</a>
      <a href="#">Expenses</a>
    </nav>
    <div class="flex flex-1 items-center justify-end gap-x-8">
      <button type="button" class="-m-2.5 p-2.5 text-gray-400 hover:text-gray-500">
        <span class="sr-only">View notifications</span>
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
        </svg>
      </button>
      <a href="#" class="-m-1.5 p-1.5">
        <span class="sr-only">Your profile</span>
        <img class="h-8 w-8 rounded-full bg-gray-800" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
      </a>
    </div>
  </div>
  <!-- Mobile menu, show/hide based on menu open state. -->
  <div class="lg:hidden" role="dialog" aria-modal="true">
    <!-- Background backdrop, show/hide based on slide-over state. -->
    <div class="fixed inset-0 z-50"></div>
    <div class="fixed inset-y-0 left-0 z-50 w-full overflow-y-auto bg-white px-4 pb-6 sm:max-w-sm sm:px-6 sm:ring-1 sm:ring-gray-900/10">
      <div class="-ml-0.5 flex h-16 items-center gap-x-6">
        <button type="button" class="-m-2.5 p-2.5 text-gray-700">
          <span class="sr-only">Close menu</span>
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
        <div class="-ml-0.5">
          <a href="#" class="-m-1.5 block p-1.5">
            <span class="sr-only">Your Company</span>
            <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="">
          </a>
        </div>
      </div>
      <div class="mt-2 space-y-2">
        <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Home</a>
        <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Invoices</a>
        <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Clients</a>
        <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Expenses</a>
      </div>
    </div>
  </div>
</header>
</template>

<script>


import { Link } from '@inertiajs/inertia-vue3';

import ApplicationLogo from '@/Components/ApplicationLogo.vue'
// import NavAuthenticated from "@/Components/NavAuthenticated.vue";
// import NavGuest from "@/Components/NavGuest.vue";

  export default {
    props: {
      home: {
        type:Boolean
      },
      user: {
        type: [Number, null],
        required: true,
        default: null,
        validator: (value) => typeof value === 'number' || value === null,
      }
    },
      // data() {
      //     return {
      //         isLargeViewport: window.innerWidth > 1000,
      //     };
      // },
      // created() {
      //     window.addEventListener("resize", this.updateViewport);
      // },
      // beforeDestroy() {
      //     window.removeEventListener("resize", this.updateViewport);
      // },
      // methods: {
      //     updateViewport() {
      //         this.isLargeViewport = window.innerWidth > 1000;
      //         console.log(document.getElementById("button-div").classList);
      //     },
      // },
    };
</script>
