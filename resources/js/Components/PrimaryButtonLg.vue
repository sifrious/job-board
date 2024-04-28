
<template>
    <Link :href="href" class="inline-flex justify-center w-full sm:w-full md:w-2/5 md:mx-4 m-2 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-2xl text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
        >
        <slot />
    </Link>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
    components: {Link},
    props: {
        href: {
            type: String,
            required: true,
        },
        active: {
            type: Boolean,
    },
}
};
</script>
