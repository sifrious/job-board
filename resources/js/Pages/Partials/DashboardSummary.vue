<template>

{{ listings_count }}
<div v-if="listings_count>0" class="relative isolate overflow-hidden pt-16 md:mx-12">
      <!-- Secondary navigation -->

      <!-- Stats -->
      <div class="border-b border-b-gray-900/10 lg:border-t lg:border-t-gray-900/5">
        <dl class="mx-auto grid max-w-7xl grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 lg:px-2 xl:px-0">
          <div class="flex items-baseline flex-wrap justify-between gap-y-2 gap-x-4 border-t border-gray-900/5 px-4 py-10 sm:px-6 lg:border-t-0 xl:px-8">
            <dt class="text-sm font-medium leading-6 text-gray-500">Active<br>Listings</dt>
            <!-- <dd class="text-xs font-medium text-gray-700">+4.75%</dd> -->
            <dd v-if="active_listings_count>0" class="w-full flex-none text-3xl font-medium leading-10 tracking-tight text-gray-900">
              {{ active_listings_count }}
            </dd>
            <dd v-else class="w-full flex-none text-3xl font-medium leading-10 tracking-tight text-gray-900">
              0
            </dd>
          </div>
          <div class="flex items-baseline flex-wrap justify-between gap-y-2 gap-x-4 border-t border-gray-900/5 px-4 py-10 sm:px-6 lg:border-t-0 xl:px-8 sm:border-l">
            <dt class="text-sm font-medium leading-6 text-gray-500">Drafts</dt>
            <!-- <dd class="text-xs font-medium text-rose-600">+54.02%</dd> -->
            <dd v-if="drafts_count>0" class="w-full flex-none text-3xl font-medium leading-10 tracking-tight text-gray-900"> 
              {{ drafts_count }}
            </dd>
            <dd v-else class="w-full flex-none text-3xl font-medium leading-10 tracking-tight text-gray-900">
              0
            </dd>
          </div>
          <div class="flex items-baseline flex-wrap justify-between gap-y-2 gap-x-4 border-t border-gray-900/5 px-4 py-10 sm:px-6 lg:border-t-0 xl:px-8 lg:border-l">
            <dt class="text-sm font-medium leading-6 text-gray-500">Leads</dt>
            <!-- <dd class="text-xs font-medium text-gray-700">-1.39%</dd> -->
            <dd v-if="all_leads>0" class="w-full flex-none text-3xl font-medium leading-10 tracking-tight text-gray-900"> 
              {{ all_leads }}
            </dd>
            <dd v-else class="w-full flex-none text-3xl font-medium leading-10 tracking-tight text-gray-900">
              0
            </dd>
          </div>
          <div class="flex items-baseline flex-wrap justify-between gap-y-2 gap-x-4 border-t border-gray-900/5 px-4 py-10 sm:px-6 lg:border-t-0 xl:px-8 sm:border-l">
            <dt class="text-sm font-medium leading-6 text-gray-500">Posted Jobs</dt>
            <!-- <dd class="text-xs font-medium text-rose-600">+10.18%</dd> -->
            <dd v-if="jobs_count>0" class="w-full flex-none text-3xl font-medium leading-10 tracking-tight text-gray-900"> 
              {{jobs_count }}
            </dd>
            <dd v-else class="w-full flex-none text-3xl font-medium leading-10 tracking-tight text-gray-900">
              0
            </dd>
          </div>
        </dl>
      </div>
    </div>

</template>

<script>
  export default {
    props: {
      listings_count: Number,
      active_listings_count: Number,
      jobs_count: Number, 
      drafts_count: Number,
      leads_count: Number,
  },}
</script>