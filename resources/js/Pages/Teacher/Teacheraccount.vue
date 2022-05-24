<template>
    <div>
        <div class="navbar">
            <Header />
        </div>
        <div class="content">
            content
        </div>
        <div class="footer">
            <Footer />
        </div>
    </div>
</template>

<script>
import Header from '../General/Header.vue'
import Footer from '../General/Footer.vue'
export default {
    components: {
        Header,
        Footer
    }
}
</script>