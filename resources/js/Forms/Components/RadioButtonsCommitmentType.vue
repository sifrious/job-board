<template>
    <div>
        <RadioGroup v-model="position_level" class="flex flex-wrap py-1 w-full flex-row text-md">
            <div class="flex align-middle items-center w-36">
                <RadioGroupOption v-slot="{ checked }" value="full" class="flex w-full p-1 items-center align-middle text-center">
                    <div :class="`${'w-full h-12 pt-4 h- border-2  rounded-md text-center'} ${checked ? 'bg-gray-200 border-gray-100' : 'bg-gray-50  border-gray-50'}`">Full Time</div>
                </RadioGroupOption>
            </div>
            <div class="flex align-middle items-center w-36">
                <RadioGroupOption v-slot="{ checked }" value="contract" class="flex w-full p-1 items-center align-middle text-center">
                <span :class="`${'w-full h-12 pt-4 h- border-2  rounded-md text-center'} ${checked ? 'bg-gray-200 border-gray-100' : 'bg-gray-50  border-gray-50'}`">Part Time</span>
                </RadioGroupOption>
            </div>
            <div class="flex align-middle items-center w-36">
                <RadioGroupOption v-slot="{ checked }" value="part" class="flex w-full p-1 items-center align-middle text-center">
                <span :class="`${'w-full h-12 pt-4 h- border-2  rounded-md text-center'} ${checked ? 'bg-gray-200 border-gray-100' : 'bg-gray-50  border-gray-50'}`">Flex</span>
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
    import { ref, watch } from 'vue'
    import {
      RadioGroup,
      RadioGroupLabel,
      RadioGroupOption,
    } from '@headlessui/vue'
  
    const position_level = ref('none');

    watch(position_level, (newVal) => {
        emit('update:modelValue', newVal);
    });
  </script>