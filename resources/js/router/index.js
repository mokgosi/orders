import { createRouter, createWebHistory } from 'vue-router'

import OrdersIndex from '../components/orders/OrdersIndex.vue'
import OrdersCreate from '../components/orders/OrdersCreate.vue'
import OrdersEdit from '../components/orders/OrdersEdit.vue'

const routes = [
    {
        path: '/dashboard',
        name: 'orders.index',
        component: OrdersIndex
    },{
        path: '/orders/create',
        name: 'orders.create',
        component: OrdersCreate
    },{
        path: '/orders/:id/edit',
        name: 'orders.edit',
        component: OrdersEdit,
        props: true
    }
];

export default createRouter({
    history: createWebHistory(),
    routes
})