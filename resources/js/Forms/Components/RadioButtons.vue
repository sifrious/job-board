<!-- <template>
    <RadioGroup v-model="plan">
      <RadioGroupLabel>Plan</RadioGroupLabel>
      <RadioGroupOption v-slot="{ checked }" value="startup">
        <span :class="checked ? 'bg-blue-200' : ''">Startup</span>
      </RadioGroupOption>
      <RadioGroupOption v-slot="{ checked }" value="business">
        <span :class="checked ? 'bg-blue-200' : ''">Business</span>
      </RadioGroupOption>
      <RadioGroupOption v-slot="{ checked }" value="enterprise">
        <span :class="checked ? 'bg-blue-200' : ''">Enterprise</span>
      </RadioGroupOption>
    </RadioGroup>
  </template>
  
  <script>
    import { ref, watch } from 'vue';
    import {
      RadioGroup,
      RadioGroupLabel,
      RadioGroupOption,
    } from '@headlessui/vue';

    export default {
      props: {
        "this is not done and should throw an error",
      }
    }
  
    const plan = ref('startup')
  </script> -->