<template>
    <div>
        <h3 class="customer-product-heading">Customer Products</h3>
        <div class="row">
            <div class="col-12">
                <CustomerProductTableComponent :paginatedData="customers" :links="links" @page-change="loadData"></CustomerProductTableComponent>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import CustomerProductTableComponent from './CustomerProductTableComponent.vue';

export default {
    components: {
        CustomerProductTableComponent
    },
    data() {
        return {
            customers: [],
            current_page: 1,
            links: [],
        };
    },
    mounted() {
        this.loadData();
    },
    methods: {
        async loadData(page = 1) {
            try {
                const response = await axios.get(`/fetch-customer-products?page=${page}`);
                this.customers = response.data.data;
                this.links = response.data.meta.links;
            } catch (error) {
                console.error('Error loading data:', error);
            }
        },
    },
};
</script>

<style scoped>
.customer-product-heading {
    text-align: center;
    margin-top: 20px;
    margin-bottom: 20px;
}
</style>
