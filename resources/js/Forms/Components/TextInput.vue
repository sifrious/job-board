<script setup>
  import { ref, computed } from 'vue';

  const props = defineProps({
    name: String,
    label: String,
    placeholder: String,
    required: Boolean,
    type: {
      type: String,
      default: 'text'
    },
    modelValue: String //  This prop is used for v-model
  });

  const emit = defineEmits(["update:modelValue"]);

  const inputValue = computed({
    get: () => props.modelValue,
    set: (value) => emit("update:modelValue", value)
  }); 
</script>

<template>
  <div class="w-11/12 flex flex-col">
    <div class="flex flex-col align-end">
      <label :for="name" class="text-stone-900 text-lg">{{ label }}</label>
        <div class="text-stone-700 flex flex-row flex-nowrap">
          <slot /> 
          <span v-if="required" class="block ml-2 flex flex-col justify-center italic text-sm text-rose-700">Required</span>
        </div>
      </div>
    <input v-if="required"
      v-model="inputValue"
      :id="name"
      :type="type"
      :placeholder="placeholder"
      required
      :autofocus="required"
    />
    <input v-else
      v-model="inputValue"
      :id="name"
      :type="type"
      :placeholder="placeholder"
      required
      :autofocus="required"
    />
  </div>
</template>
