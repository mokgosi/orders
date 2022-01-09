<template>
    <div v-if="errors">
      <div v-for="(v, k) in errors" :key="k" class="bg-red-500 text-white rounded font-bold mb-4 shadow-lg py-2 px-4 pr-0">
        <p v-for="error in v" :key="error" class="text-sm">
          {{ error }}
        </p>
      </div>
    </div>
    <form class="space-y-6" v-on:submit.prevent="saveOrder">
        <div class="space-y-4 rounded-md shadow-sm">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Description</label>
                <div class="mt-1">
                    <input type="text" name="description" id="description"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="order.description">
                </div>
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <div class="mt-1">
                        <select v-model="order.status" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"  
                                name="status" 
                                id="status">
                            <option disabled="disabled" value>Select...</option>
                            <option value="new">New</option>
                            <option value="processing">Processing</option>
                            <option value="completed">Completed</option>
                            <option value="declined">Declined</option>
                        </select>       
                </div>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Quantity</label>
                <div class="mt-1">
                    <input type="text" name="quantity" id="quantity"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="order.quantity">
                </div>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Tracking Code</label>
                <div class="mt-1">
                    <input type="text" name="tracking_code" id="tracking_code"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="order.tracking_code" disabled />
                </div>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Contact Number</label>
                <div class="mt-1">
                    <input type="text" name="contact_number" id="contact_number"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="order.contact_number">
                </div>
            </div>

            <div>
                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                <div class="mt-1">
                    <input type="text" name="address" id="address"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="order.address">
                </div>
            </div>

        </div>

        <button type="submit"
                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-gray-800 rounded-md border border-transparent ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25">
            Save
        </button>
    </form>
</template>

<script>
import useOrders from "../../composables/Orders";
import {onMounted} from "vue";

export default {
    props: {
        id: {
            required: true,
            type: String
        }
    },

    setup(props) {
        const { errors, order, getOrder, updateOrder } = useOrders()

        onMounted(getOrder(props.id))

        const saveOrder = async () => {
            await updateOrder(props.id)
        }

        return {
            errors,
            order,
            saveOrder
        }
    }
}
</script>