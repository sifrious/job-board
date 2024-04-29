<template>
    <div class="border bg-stone-50 text-center p-3">
        Looks like 
        <span v-if="per_user==true">
            <span v-if="plural==true">you haven't created any</span>
            <span v-else>you don't have a</span>
        </span>
        <span v-else>
            <span v-if="plural==true">there aren't any</span>
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