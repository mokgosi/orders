import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'

export default function useOrders() {
    const order = ref([])
    const orders = ref([])

    const errors = ref('')
    const router = useRouter()

    const token = localStorage.getItem('sanctum_token')

    window.axios.defaults.headers.common['Authorization'] = `Bearer ${token}`

    const getOrders = async () => {
        
        let response = await axios.get('/api/orders')

        orders.value = response.data.data.data
    }

    const getOrder = async (id) => {
        let response = await axios.get(`/api/orders/${id}`)
        order.value = response.data.data
    }

    const storeOrder = async (data) => {
        errors.value = ''
        try {
            
            await axios.post('/api/orders', data)
            await router.push({name: 'orders.index'})
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors
            }
        }
    }

    const updateOrder = async (id) => {
        errors.value = ''
        try {
            await axios.put('/api/orders/' + id, order.value)
            await router.push({name: 'orders.index'})
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors
            }
        }
    }

    const destroyOrder = async (id) => {
        await axios.delete('/api/orders/' + id)
    }

    return {
        errors,
        order,
        orders,
        getOrder,
        getOrders,
        storeOrder,
        updateOrder,
        destroyOrder,
    }
}