<template>
    <div>
        <RadioGroup v-model="location_type" class="flex flex-wrap py-1 w-full flex-row text-md">
            <div class="flex align-middle items-center w-36">
                <RadioGroupOption v-slot="{ checked }" value="inperson" class="flex w-full p-1 items-center align-middle text-center">
                    <div :class="`${'w-full h-12 pt-4 h- border-2  rounded-md text-center'} ${checked ? 'bg-gray-200 border-gray-100' : 'bg-gray-50  border-gray-50'}`">In Person</div>
                </RadioGroupOption>
            </div>
            <div class="flex align-middle items-center w-36">
                <RadioGroupOption v-slot="{ checked }" value="remote" class="flex w-full p-1 items-center align-middle text-center">
                <span :class="`${'w-full h-12 pt-4 h- border-2  rounded-md text-center'} ${checked ? 'bg-gray-200 border-gray-100' : 'bg-gray-50  border-gray-50'}`">Remote</span>
                </RadioGroupOption>
            </div>
            <div class="flex align-middle items-center w-36">
                <RadioGroupOption v-slot="{ checked }" value="hybrid" class="flex w-full p-1 items-center align-middle text-center">
                <span :class="`${'w-full h-12 pt-4 h- border-2  rounded-md text-center'} ${checked ? 'bg-gray-200 border-gray-100' : 'bg-gray-50  border-gray-50'}`">Hybrid</span>
                </RadioGroupOption>
            </div>
            <div class="flex align-middle items-center w-28">
                <RadioGroupOption v-slot="{ checked }" value="none" class="flex w-full p-1 items-center align-middle text-center">
                <span class="w-full h-12 pt-4 border-2 border-gray-50 rounded-md text-center">Reset</span>
                </RadioGroupOption>
            </div>
        </RadioGroup>
    </div>
</template>

<script setup>
    import { ref } from 'vue'
    import {
    RadioGroup,
    RadioGroupLabel,
    RadioGroupOption,
    } from '@headlessui/vue'

    const location_type = ref('none')

</script>