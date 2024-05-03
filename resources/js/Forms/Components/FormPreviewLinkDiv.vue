<template>
  <!-- JOB INFORMATION -->
  <div :id="formKey" class="flex flex-col pb-2">
    <div v-if="formUrlValue.length>0 || formUrlLabel.length>0"  class="text-center p-2 w-3/4 pl-1/5">
      {{ defaultLabel }}
      <span v-if="formUrlValue.length>0 && formUrlLabel.length>0" class="bg-purple-50 hover:bg-purple-200 underline">
        <a :href='formUrlValue'>{{ formUrlLabel }}</a>
      </span>
    </div>
    <div v-if="formUrlValue.length>0" class="flex flex-row">
        <div v-if="formUrlLabel.length>0" class="w-1/3 text-right pr-2 text-bold">plain url</div>
        <div v-else class="w-1/3 text-right pr-2 text-bold">{{defaultLabel}} url</div>
        <div>{{ formUrlValue }}</div>
    </div> 
    <div v-if="formUrlLabel.length>0" class="flex flex-row">
        <div class="w-1/3 text-right pr-2 text-bold">Url label</div>
        <div>{{ formUrlLabel }}</div>
    </div>
  </div>
</template>

<script setup>
  import {ref, watch, watchEffect} from 'vue';
  
  const props = defineProps({
    formKey: String,
    formUrlLabel: String | null,
    formUrlValue: String | null,
    defaultLabel: String,
  });

</script>

<!--  -->