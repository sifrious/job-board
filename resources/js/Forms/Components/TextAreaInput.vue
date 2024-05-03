<template>
    <div class="w-full flex flex-col">
      <div class="flex align-end">
        <label :for="name" class="text-stone-900 text-lg">{{ label }}</label>
        <span v-if="required" class="block ml-2 flex flex-col justify-center italic text-sm text-stone-700">Required</span>
      </div>
      <span class="text-stone-700">
        <slot />
      </span>
      <textarea v-if="required"
        :id="name"
        v-model="inputValue"
        :type="type"
        :placeholder="placeholder"
        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
        rows="5"
        columns="'40'"
        autofocus
      />
      <textarea v-else
        :id="name"
        v-model="inputValue"
        :type="type"
        :placeholder="placeholder"
        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
        rows="5"
        columns="'40'"
        autofocus
      />
    </div>
  </template>
  
  <script>
  import { ref, watch } from 'vue';
  
  export default {
    props: {
      modelValue: String,
      label: String,
      name: String,
      placeholder: String,
      type: {
        type: String,
        default: 'text'
      },
      required: Boolean,
    },
    setup(props, { emit }) {
      const inputValue = ref(props.modelValue);
      const placeholderValue = ref(props.placeholder);
  
      watch(inputValue, (newValue) => {
        emit('update:modelValue', newValue);
      });
  
      return { inputValue };
    }
  }
  </script>