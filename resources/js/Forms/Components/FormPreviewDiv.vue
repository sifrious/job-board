<template>
  <!-- JOB INFORMATION -->
  <div v-if="props.formValue.length>0" :id="formKey" class="w-full flex flex-col p-1/2">
    <div class="flex flex-row">
        <div class="w-1/3 text-right pr-2 text-bold font-stone-700">{{formKey}}</div>
        <div class="font-stone-900">{{ formValue }}</div>
    </div>
  </div>
</template>

<script setup>
// Props declaration if you need to specify the props
const props = defineProps({
  formKey: String,
  formValue: String,
});

</script>

<!--  -->