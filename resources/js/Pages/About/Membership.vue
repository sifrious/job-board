<template>
    <!-- <Head>Membership</Head> -->
    <h1 class="hidden">Membership</h1>
    <layout>
        <div class="text-xl mb-4">
            So you want to join a demo?
        </div>
        <div class="mb-4">
            Yeah, well, I think that's awesome. You'll see a ton of links that prompt you to log into a specific slack user group, and if you'd like to do that I have a slack group set up just for testing. If you do join feel free to shoot me a message or whatever, I think you're great.
        </div>
        <div class="mb-4">
            I used this for testing and figured: why not invite people?
        </div>
        <div class="mb-4">
            I think it's more useful to see the modifications to socialite I made and check to see the login flow works than it is to test pricing, which is not available on the demo site (for obvious reasons and also because we haven't landed on a pricing model yet). The example posts you make won't be available for other demo users to see unless you have an account with this fake slack account or email me or something. But you can see a preview in drafts.
        </div>
        <div class="mb-4">
            If you want to join and make posts please be kind. Don't use any language in the post that is offensive or derogatory to any person or group of people. That's not the energy we need here, and I'll have to delete your post and ban you (which is a bummer).
        </div>
        <div class="text-xl mb-4">
            tl;dr: 
            <a href="https://join.slack.com/t/nepa-tech-jobs/shared_invite/zt-2i40v22w0-1BlqVXO7ycB0hzy4tBiSXw" class="underline font-bold bg-purple-50 hover:bg-purple-200">Here is the link</a>
        </div>
        <div>(Please
            <a href="mailto:hellosifrious@gmail.com" class="underline bg-purple-50 hover:bg-purple-200">let me know if it doesn't work</a>)
            </div>
    </layout>
</template>

<script>
    import layout from '@/Shared/layout.vue';
    import { Head } from '@inertiajs/inertia-vue3';
    export default {
        props: {},
        components: {
            layout,
            Head,
        }
    }
</script>