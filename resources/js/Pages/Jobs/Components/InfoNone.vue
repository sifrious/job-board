<template>
    <div class="border-2 border-rose-200 text-center">
        Looks like 
        <span v-if="per_user">
            <span v-if="plural">you haven't made any</span>
            <span v-else>you don't have a</span>
        </span>
        <span v-else>
            <span v-if="plural">there aren't any</span>
            <span v-else>there isn't a</span>
        </span>
        {{ display_type }} yet.
    </div>
    <div>
        <slot />
    </div>
</template>

<script>
    export default {
        props: {
            plural: Boolean,
            per_user: Boolean,
            display_type: String,
        },
        components: {},
    };
</script>