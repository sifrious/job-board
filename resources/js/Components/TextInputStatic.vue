<script setup>
import { onMounted, ref } from 'vue';

const model = defineModel({
    type: String,
    required: true,
});

const input = ref(null);

const props = defineProps ([
    'stringValue']);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value = stringInput;
    }
});
</script>

<template>
    <input
        class="hidden border-gray-300 mb-3 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
        v-model="model"
        ref="input"
    />
    
    <div
        class="w-full border-gray-300 mb-3 rounded-md shadow-sm bg-stone-100 p-2 border-2 border-stone-100 my-2 font-bold"
    >
        {{ props.modelValue }}
    </div>
</template>
