<template>
    <div>
        <div class="navbar">
            <Header />
        </div>
        <div class="content">
            
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h1 class="text-3xl font-bold text-gray-900">Content</h1>
                    </div>
                </header>
              
                


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