<template>
    <div class="mx-auto max-w-7xl pt-4 sm:px-6 lg:px-8">
        <h2 class="mx-auto max-w-2xl text-base font-semibold leading-6 text-gray-900 lg:mx-0 lg:max-w-none">Your Listings</h2>
    </div>
    <div class="mt-6 overflow-hidden border-t border-gray-100">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-none">
                <table class="w-full text-left">
                    <!-- sr head classes -->
                    <thead class="sr-only">
                        <tr>
                        <th>Amount</th>
                        <th class="hidden sm:table-cell">Client</th>
                        <th>More details</th>
                        </tr>
                    </thead>
                    <!--  -->
                    <tbody>
                        <tr class="text-sm leading-6 text-gray-900">
                            <th scope="colgroup" colspan="3" class="relative isolate py-2 font-semibold">
                                Active Listings
                                <div class="absolute inset-y-0 right-full -z-10 w-screen border-b border-gray-200 bg-gray-50"></div>
                                <div class="absolute inset-y-0 left-0 -z-10 w-screen border-b border-gray-200 bg-gray-50"></div>
                            </th>
                        </tr>
                        <!-- <ListingTable></ListingTable> -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script setup>
    import { computed, ref, defineProps } from 'vue';
    // import ListingTable from '@/Listings/Partials/ListingsSummaryTable.vue';
    const props = defineProps({
        listings: Object
    });
</script>