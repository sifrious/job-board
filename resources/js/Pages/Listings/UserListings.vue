<script setup>
    import NavigationTemplate from '@/Layouts/NavigationTemplate.vue';
    import SparseListing from '@/Components/Listing/SparseListing.vue';
    
    
    const props = defineProps({
        user: {
            type: Object,
            required: true,
        },
        listings: {
            type: Array ,
        }, 
        flash: {
            type: Object,
        },
    })
</script>

<template>
    <div>
        <NavigationTemplate :user="user.id">
        </NavigationTemplate>
        <div v-if="listings">
            <div v-for="(listing, index) in listings" :key="index">
                <SparseListing :listing="listing"></SparseListing>
            </div>
        </div>
        <div v-else>
        </div>
    </div>
</template>

