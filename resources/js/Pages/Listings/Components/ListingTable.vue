<template>
    <div class="w-full">
        <th scope="colgroup" colspan="3" class="relative isolate py-2 font-semibold">
            {{title}}
            <div class="absolute inset-y-0 right-full -z-10 w-screen border-b border-gray-200 bg-gray-50"></div>
            <div class="absolute inset-y-0 left-0 -z-10 w-screen border-b border-gray-200 bg-gray-50"></div>
        </th>
        <div v-if="listingsData && listingsData.length > 0">
            <div v-for="listing of listingsData" class="my-2">
                {{ listing }}
            </div>
        </div>
        <div v-else>
            <tr class="w-screen">
            No {{ title }}.</tr>
        </div>
    </div>
</template>

<script>
    import ListingDetail from '@/Pages/Listings/Components/ListingDetail.vue';
    export default {
        props: {
            title: String,
            listingsData: Object,
            createPath: String,
        },
        components: {
            ListingDetail,
        }
    }
</script>