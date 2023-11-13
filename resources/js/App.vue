<template>
    <Header />
        <main>
            <div class="container">
                <CustomerProductComponent />
            </div>
        </main>
    <Footer />
</template>

<script>
import Header from "./components/layouts/Header.vue";
import Footer from "./components/layouts/Footer.vue";
import CustomerProductComponent from "./components/customer-product/CustomerProductComponent.vue";

export default {
    components: {
        Header,
        Footer,
        CustomerProductComponent,
    },
};
</script>
