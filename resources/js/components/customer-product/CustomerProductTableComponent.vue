<template>
    <table class="table table-striped">
        <!-- Table Header -->
        <thead>
            <tr>
                <th>Name (First & Last name)</th>
                <th>Email Address</th>
                <th>Product Amount</th>
            </tr>
        </thead>
        <tbody>
            <!-- Loop through paginatedData -->
            <template v-if="paginatedData.length > 0">
                <tr v-for="item in paginatedData" :key="item.id">
                    <td>{{ `${item.first_name} ${item.last_name}` }}</td>
                    <td>{{ item.email_address }}</td>
                    <td>{{ item.products_count }}</td>
                </tr>
            </template>
            <template v-else>
                <tr>
                    <td colspan="3" class="text-center">No data available.</td>
                </tr>
            </template>
        </tbody>
    </table>

    <!-- Pagination -->
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-end">
            <li v-for="link in links" :key="link.id" class="page-item" :class="{ active: link.active, disabled: !link.url }">
                <a class="page-link" @click.prevent="changePage(link.url)" v-if="link.url" v-html="link.label" href="#"></a>
                <span class="page-link" v-else v-html="link.label"></span>
            </li>
        </ul>
    </nav>
</template>

<script>
export default {
    props: {
        paginatedData: Array, // Data for the current page
        links: Array // Pagination links from the API response
    },
    emits: ['page-change'],
    methods: {
        changePage(url) {
            // Extract the page number from the URL
            const page = url ? parseInt(url.split('page=')[1]) : null;
            this.$emit('page-change', page);
        }
    }
};
</script>
