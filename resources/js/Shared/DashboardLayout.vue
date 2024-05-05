<template>
  <main>
    <DashboardSummary
      :active_listings_count="active_listings_count"
      :jobs_count="jobs_count"
      :drafts_count="drafts_count"
      :leads_count="all_leads"
      :listings_count="listings_count"
    ></DashboardSummary>
    <!-- Summary -->
    <div class="space-y-16 py-16 xl:space-y-20">
      <!-- Recent activity table -->
      <!-- <ListingsSummaryTable :jobs="jobs" :listings="listings"> </ListingsSummaryTable> -->
      Recent Activity Container
      <!-- <ListingsSummaryContainer :listings="listings"></ListingsSummaryContainer> -->

      <!-- Jobs Cards -->
      <!-- <JobsCardsContainer :jobs="jobs"></JobsCardsContainer> -->
    </div>
  </main>
</template>

<script setup>
  import { computed, ref, defineProps } from 'vue';
  import DashboardSummary from '@/Pages/Partials/DashboardSummary.vue';
  import ListingsSummaryTable from '@/Pages/Listings/Partials/ListingsSummaryTable.vue';
  import JobsCardsContainer from '@/Pages/Jobs/Components/JobsCardsContainer.vue';
  
  const props = defineProps({
      user: Object,
      jobs: Object,
      listings: Object,
  });

  const active_listings_count = computed(() => props.listings.active.all.length);
  const jobs_count = computed(() => props.jobs.all.length);
  const drafts_count = computed(() => props.listings.all.drafts.length);
  const all_leads = 0;
  const listings_count = computed(() => props.listings.all.all.length);
</script>