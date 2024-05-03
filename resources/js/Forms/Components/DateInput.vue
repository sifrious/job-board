<!-- JIC -->
<!-- <template>
    <div>
      <label :for="name">{{ label }}</label>
      <input type="date" :id="name" v-model="inputValue">
    </div>
  </template>
  
  <script>
  import { ref, watch } from 'vue';
  
  export default {
    props: {
      modelValue: String,
      label: String,
      name: String
    },
    setup(props, { emit }) {
      const inputValue = ref(props.modelValue);
  
      watch(inputValue, (newValue) => {
        emit('update:modelValue', newValue);
      });
  
      return { inputValue };
    }
  }
  </script> -->