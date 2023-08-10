<template>
    <div>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Bedrooms
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Bathrooms
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Storeys
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Garages
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" v-for="house in houses">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ house.name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ house.price }}
                    </td>
                    <td class="px-6 py-4">
                        {{ house.bedrooms }}
                    </td>
                    <td class="px-6 py-4">
                        {{ house.bathrooms }}
                    </td>
                    <td class="px-6 py-4">
                        {{ house.storeys }}
                    </td>
                    <td class="px-6 py-4">
                        {{ house.garages }}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="w-full max-w-xs float-left">
            <div class="px-6 py-2">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Name
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight
            focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="name" v-model="name">
            </div>
            <div class="px-6 py-2">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Storeys
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight
            focus:outline-none focus:shadow-outline" id="storeys" type="number" placeholder="Storeys" v-model="storeys">
            </div>
        </div>
        <div class="w-full max-w-xs float-left">
            <div class="px-6 py-2">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Bedrooms
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight
            focus:outline-none focus:shadow-outline" id="bedrooms" type="text" placeholder="bedrooms"
                       v-model="bedrooms">
            </div>
            <div class="px-6 py-2">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Bathroms
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight
            focus:outline-none focus:shadow-outline" id="bathrooms" type="number" placeholder="bathrooms"
                       v-model="bathrooms">
            </div>
        </div>
        <div class="w-full max-w-xs float-left">
            <div class="px-6 py-2">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Start price
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight
            focus:outline-none focus:shadow-outline" id="start_price" type="text" placeholder="Start price"
                       v-model="start_price">
            </div>
            <div class="px-6 py-2">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    End price
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight
            focus:outline-none focus:shadow-outline" id="end_price" type="number" placeholder="End price"
                       v-model="end_price">
            </div>
        </div>
        <div class="w-full max-w-xs float-left">
            <div class="px-6 py-2">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Garages
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight
            focus:outline-none focus:shadow-outline" id="garages" type="text" placeholder="Garages" v-model="garages">
            </div>
            <div class="px-6 py-2">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" @click="getData()">
                    Search
                </button>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            houses: null,
            name: '',
            bedrooms: 0,
            bathrooms: 0,
            storeys: 0,
            garages: 0,
            start_price: 0,
            end_price: 0,
        }
    },
    beforeMount() {
        this.getData();
    },
    methods: {
        async getData() {
            await axios.get('/api/search', {
                params: {
                    name: this.name,
                    bedrooms: this.bedrooms,
                    bathrooms: this.bathrooms,
                    storeys: this.storeys,
                    garages: this.garages,
                    start_price: this.start_price,
                    end_price: this.end_price,
                }
            }).then(response => {
                this.houses = response.data.houses;
            })
                .catch(error => {
                    this.error = error.response.data.message;
                })
        },
    }
}
</script>
<script setup>
</script>
