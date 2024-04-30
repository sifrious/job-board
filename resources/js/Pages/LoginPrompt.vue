<script setup>
    import { Link } from '@inertiajs/inertia-vue3';
    import NavigationTemplate from '@/Layouts/NavigationTemplate.vue';
    import NavLinkDiv from '@/Components/PrimaryNavLinkDiv.vue'
</script>

<template>
    <NavigationTemplate :user="-1" :home="true"></NavigationTemplate>
    <div class="w-100 flex items-center justify-center">
        <div class="flex flex-col w-full md:w-4/5 justify-center">
            <h1 class="hidden">Log In or Register</h1>
            <div class="w-full flex justify-center text-center">
                <div class="flex w-11/12 md:w-5/6 p-auto">Job Posts are limited to users authenticated by logging into a Slack account associated with NEPA Tech.</div>
            </div>
            <div class="w-full">
                <a href="'/auth/redirect'" class="flex justify-center text-center" data-visit="true">
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

    <div class="relative isolate overflow-hidden bg-gray-900 py-16 sm:py-24 lg:py-32">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 lg:max-w-none lg:grid-cols-2">
      <div class="max-w-xl lg:max-w-lg">
        <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Subscribe to our newsletter.</h2>
        <p class="mt-4 text-lg leading-8 text-gray-300">Nostrud amet eu ullamco nisi aute in ad minim nostrud adipisicing velit quis. Duis tempor incididunt dolore.</p>
        <div class="mt-6 flex max-w-md gap-x-4">
          <label for="email-address" class="sr-only">Email address</label>
          <input id="email-address" name="email" type="email" autocomplete="email" required class="min-w-0 flex-auto rounded-md border-0 bg-white/5 px-3.5 py-2 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6" placeholder="Enter your email">
          <button type="submit" class="flex-none rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Subscribe</button>
        </div>
      </div>
      <dl class="grid grid-cols-1 gap-x-8 gap-y-10 sm:grid-cols-2 lg:pt-2">
        <div class="flex flex-col items-start">
          <div class="rounded-md bg-white/5 p-2 ring-1 ring-white/10">
          </div>
          <dt class="mt-4 font-semibold text-white">Weekly articles</dt>
          <dd class="mt-2 leading-7 text-gray-400">Non laboris consequat cupidatat laborum magna. Eiusmod non irure cupidatat duis commodo amet.</dd>
        </div>
        <div class="flex flex-col items-start">
          <div class="rounded-md bg-white/5 p-2 ring-1 ring-white/10">
          </div>
          <dt class="mt-4 font-semibold text-white">No spam</dt>
          <dd class="mt-2 leading-7 text-gray-400">Officia excepteur ullamco ut sint duis proident non adipisicing. Voluptate incididunt anim.</dd>
        </div>
      </dl>
    </div>
  </div>
  <div class="absolute left-1/2 top-0 -z-10 -translate-x-1/2 blur-3xl xl:-top-6" aria-hidden="true">
    <div class="aspect-[1155/678] w-[72.1875rem] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
  </div>
</div>

</template>