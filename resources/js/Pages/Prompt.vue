<template>
    <Layout :user="user">
        <div class="w-100 flex items-center justify-center">
            <div class="flex flex-col w-full md:w-4/5 justify-center">
                <h1 class="hidden">Log In or Register</h1>
                <div class="w-full flex justify-center text-center">
                    <div class="flex w-11/12 md:w-5/6 p-auto">Job Posts are limited to users authenticated by logging into a Slack account associated with NEPA Tech.</div>
                </div>
                <div class="w-full">
                    <a :href="'/auth/redirect'" class="flex justify-center text-center" data-visit="true">
                        <div class="m-4 w-1/2 border-2 border-grey-800 rounded-lg bg-gray-200 text-lg font-bold">
                            Login With Slack
                        </div>
                    </a>
                </div>
                <div class="w-full flex flex-col justify-center items-center text-center">
                    <div class="flex w-11/12 md:w-5/6 p-auto">
                    If you are not a member of the NEPA Tech Slack Community, you can still register and create draft posts. However, they will not be displayed publicly.
                    </div>
                    <div class="w-full md:w-2/3 items-center justify-center flex">
                            <NavLinkDiv :href="'/login'" class="h-10 mx-4"><div>sign in </div></NavLinkDiv>
                            <NavLinkDiv :href="'/register'" class="h-10 mx-4"><div>sign up </div></NavLinkDiv>
                    </div>
                </div>
                <div class="w-full flex flex-col justify-center items-center text-center">
                    <div class="flex w-11/12 md:w-5/6 p-auto">
                    If you would like to post a job description to this board and are not a member of the NEPA Tech, you can join or contact a member to have your post listed.
                    </div>
                    <div class="w-full flex flex-col justify-center items-center text-center">
                        <div class="w-full md:w-3/4 items-center justify-center flex">
                            <Link :href="'#'" class="w-1/4 border-2 border-gray-800 rounded-md m-2">
                                <div class="text-sm">
                                    NEPA Tech on Meetup
                                </div>
                            </Link>
                            <Link :href="'#'" class="w-1/4 border-2 border-gray-800 rounded-md m-2">
                                <div class="text-sm">
                                    NEPA Tech on LinkedIn
                                </div>
                            </Link>
                            <Link :href="'#'" class="w-1/4 border-2 border-gray-800 rounded-md m-2">
                                <div class="text-sm">
                                    NEPA Tech Facebook
                                </div>
                            </Link>
                            <Link :href="'#'" class="w-1/4 border-2 border-gray-800 rounded-md m-2">
                                <div class="text-sm">
                                    Contact <br> Us
                                </div>
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>

<script>
    import { Link } from '@inertiajs/inertia-vue3';
    import Layout from '@/Shared/layout.vue';
    import NavLinkDiv from '@/Components/PrimaryNavLinkDiv.vue'

    export default {
        props: {
            user: Object,
        },
        components: {
            Link,
            Layout,
            NavLinkDiv,
        },
    }
</script>