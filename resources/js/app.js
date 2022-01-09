require('./bootstrap');

import Alpine from 'alpinejs';
import { createApp } from "vue";
import router from './router'
import OrdersIndex from './components/orders/OrdersIndex'

createApp({
    components: {
        OrdersIndex
    }
}).use(router).mount('#app')

// window.Alpine = Alpine;

// Alpine.start();
