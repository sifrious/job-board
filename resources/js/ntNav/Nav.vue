<template>
    <header class="absolute inset-x-0 top-0 z-50 flex h-16 border-b border-gray-900/10">
        <NavLogo></NavLogo>
        <UserSection :user="user">
        </UserSection>
        <!-- Mobile menu, show/hide based on menu open state. -->
        <!-- <div class="lg:hidden" role="dialog" aria-modal="true"> -->
        <!-- Background backdrop, show/hide based on slide-over state. -->
        <!-- <div class="fixed inset-0 z-50"></div>
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
                <NavGroupMobile></NavGroupMobile>
            </div>
        </div>
        </div> -->
    </header>

</template>

<script>
import navGroup from './navGroup.vue';
import navGroupMobile from './navGroupMobile.vue';
import UserSection from './UserSection.vue';
import NavLogo from './NavLogo.vue';

export default {
    props: {
        user: Object,
    },
    components: {
        navGroup,
        navGroupMobile,
        NavLogo,
        UserSection,
    }
}
</script>