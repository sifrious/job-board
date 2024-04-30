<template>
    <LayoutUnaltered :user="user">
        <h1 class="hidden">Log In or Register</h1>
        <div class="relative isolate overflow-hidden py-16 sm:py-24 lg:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 lg:max-w-none lg:grid-cols-2">
                <div class="max-w-xl lg:max-w-lg">
                    <p class="mt-4 mb-2 text-lg leading-1 text-stone-600 text-bold">Already have a NEPA Tech slack account?<br></p>
                    <h2 class="text-3xl text-bold tracking-tight text-stone-900 sm:text-4xl">Link your account and post for free. Forever.</h2>
                    <p class="mt-4 text-md leading-2 text-stone-600">If you are not a member of the NEPA Tech Slack Community, you can still register now and create draft posts. 
                        <a>Contact us</a> for
                        <Link>more information</Link>.
                    </p>
                    <div class="mt-6 flex flex-row justify-around max-w-md gap-x-4">
                    <Link href="/register" class="flex-none border-2 border-stone-600 rounded-md bg-white px-3.5 py-2.5 text-md text-center font-semibold shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500 w-1/4 ">Register</Link>
                    <Link href="/login" class="flex-none border-2 border-stone-600 rounded-md bg-white px-3.5 py-2.5 text-md text-center font-semibold shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500 w-1/4">Log In</Link>
                    <a href="/auth/redirect" class="flex-none rounded-md bg-stone-700 px-3.5 py-2.5 text-md text-center font-semibold text-stone-100 hover:text-stone-800 shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500 border-stone-100 w-1/3">Slack Login</a>
                    </div>
                </div>
                <dl class="grid grid-cols-1 gap-x-8 gap-y-10 sm:grid-cols-2 lg:pt-2">
                    <div class="flex flex-col items-start">
                    <dt class="mt-4 font-semibold text-stone-900">Built for Our Members</dt>
                    <dd class="mt-2 leading-7 text-stone-700"> Northeastern Pennsylvania is home to incredible talent and entrepreneurship. You've already taking steps to connect with us; 
                        <Link href="/about/membership" class="underline text-bold bg-indigo-50 hover:bg-indigo-200">we want to meet you</Link>
                    in the middle.</dd>
                    </div>
                    <div class="flex flex-col items-start">
                    <dt class="mt-4 font-semibold text-stone-900">A Vibrant Community</dt>
                    <dd class="mt-2 leading-7 text-stone-700">Connect with us to see for yourself how cool we are.
                    Find our next meetup on
                        <a class="underline text-bold bg-indigo-50 hover:bg-indigo-200">Meetup.com</a>,
                    Follow us on 
                        <a class="underline text-bold bg-indigo-50 hover:bg-indigo-200">LinkedIn</a>
                    for news and information and visit
                        <a class="underline text-bold bg-indigo-50 hover:bg-indigo-200">our website</a>
                    </dd>
                    </div>
                </dl>
                </div>
            </div>
        </div>
    </LayoutUnaltered>
</template>

<script>
    import { Link } from '@inertiajs/inertia-vue3';
    import LayoutUnaltered from '@/Shared/LayoutUnaltered.vue';
    import NavLinkDiv from '@/Components/PrimaryNavLinkDiv.vue'

    export default {
        props: {
            user: Object,
        },
        components: {
            Link,
            LayoutUnaltered,
            NavLinkDiv,
        },
    }
</script>