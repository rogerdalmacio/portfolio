import { debounce } from 'lodash';
import { defineStore } from 'pinia';
import { ref } from 'vue';

export const useToastStore = defineStore('toastStore', () => {
    const message = ref(null);
    const type = ref(null);
    
    const setParams = debounce((setMessage, setType) => {
        message.value = setMessage;
        type.value = setType;
        setTimeout(() => {
            message.value = null;
            type.value = null;
        }, 3000);
    }, 250);
  
    return { message, type, setParams }
});