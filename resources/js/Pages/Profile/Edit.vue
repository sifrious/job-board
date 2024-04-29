<template>
    <Head title="Profile" />

    <layout :user="user">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Profile</h2>
        </template>

        <div class="py-12">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 flex flex-row w-full ">
                <div class=" sm:p-8 bg-white shadow sm:rounded-lg w-full mb-3 flex flex-row justify-around align-center">
                    <PrimaryButtonLink v-if="user && user.slack_id">Disconnect Slack Account</PrimaryButtonLink>
                    <PrimaryButtonLink v-else>Connect Slack Account</PrimaryButtonLink>
                    <WarnButton>
                        <Link href="/logout" method="post">
                            Log Out
                        </Link>
                    </WarnButton>
                </div>
            </div>

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <UpdateProfileInformationForm
                        :must-verify-email="mustVerifyEmail"
                        :status="status"
                        class="max-w-xl"
                    />
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <UpdatePasswordForm class="max-w-xl" />
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <DeleteUserForm class="max-w-xl" />
                </div>
            </div>
        </div>
    </layout>
</template>

<script>
import layout from '@/Shared/layout.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import PrimaryButtonLink from '@/Components/PrimaryButtonLink.vue';
import WarnButton from '@/Components/WarnButton.vue';
export default {
    props: {
        mustVerifyEmail: {
            type: Boolean,
        },
        status: {
            type: String,
        }, 
        user: {
            type: Object,
        },
    },
    components: {
        layout,
        DeleteUserForm,
        UpdatePasswordForm,
        UpdateProfileInformationForm,
        Head,
        PrimaryButtonLink,
        WarnButton,
        Link,
    }
};
</script>