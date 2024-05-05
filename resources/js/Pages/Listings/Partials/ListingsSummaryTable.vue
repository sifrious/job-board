<template>
    <div class=" mx-auto max-w-7xl pt-1 sm:px-6 lg:px-8">
        <!-- <h2 class="mx-auto max-w-2xl text-base font-semibold leading-6 text-gray-900 lg:mx-0 lg:max-w-none">
            Your Listings
        </h2> -->
        <div class="mt-6 overflow-hidden border-t border-gray-100">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-none">
                    <table class="text-left flex flex-col">
                        <ListingTable
                            title="Active Listings"
                            :listingsData=active_listings
                        ></ListingTable>
                        <ListingTable
                            title="Drafts"
                            :listingsData="drafts"
                        ></ListingTable>
                        <ListingTable
                            title="Open Jobs"
                            :listingsData="all_jobs">
                        </ListingTable>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
    import { computed, ref, defineProps } from 'vue';
    import ListingTable from '@/Pages/Listings/Components/ListingTable.vue';
    import JobsTable from '@/Pages/Jobs/Components/JobsTable.vue';
    const props = defineProps({
        listings: Object,
        jobs: Object,
    });

    const active_listings = computed(() => props.listings.active);
    const drafts = computed(() => props.listings.all.drafts);
    const all_jobs = computed(() => props.jobs.all);
</script>