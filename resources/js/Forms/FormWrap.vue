
<template>
    <form @submit.prevent="form.post(route(submitPath))" class="mt-6 space-y-6">

        <slot />

        <div class="flex items-center gap-4">
            <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

            <Transition
                enter-active-class="transition ease-in-out"
                enter-from-class="opacity-0"
                leave-active-class="transition ease-in-out"
                leave-to-class="opacity-0"
            >
                <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
            </Transition>
        </div>

    </form>
</template>

<script>
import { ref } from 'vue';

export default {
    components: {},
    props: {
        // Define expected types of props if known for better maintainability
        initialForm: {
            type: Object,
            default: () => ({
                title: '',
                organization: '',
                address: ''
            })
        },
        initialListing: {
            type: Object,
            default: () => ({
                openPositions: '',
                startDate: ''
            })
        },
        submitPath: {
            type: String,
            reqired: true,
        }
    },
    setup(props) {
        const form = ref(props.initialForm);
        const listing = ref(props.initialListing);
        const submitPath = ref(props.submitPath);

        const submit = () => {
            this.$inertia.post(
                submitPath,
                { ...form.value, ...listing.value }
            );
        };

        return { form, listing, submit };
    },
}
</script>
