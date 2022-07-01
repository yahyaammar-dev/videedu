<template>
    <div>
        <div class="navbar">
            <Header />
        </div>
        <div class="content">
            <div class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h1 class="text-3xl font-bold text-gray-900">Classrooms</h1>
                </div>

                <div class="flex flex-wrap max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <div
                    v-for="classroom in classrooms"
                    :key="classroom.id"
                    class="mb-5 mr-5 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700"
                >
                    <a href="#">
                        <img
                            class="rounded-t-lg w-96 h-72"
                            :src= "'http://localhost:8001/storage/' + classroom.image" 
                            alt=""
                        />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5
                                class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"
                            >
                             <span><b>Name:</b></span>   {{classroom.name}}
                            </h5>
                        </a>
                        <p
                            class="mb-3 font-normal text-gray-700 dark:text-gray-400"
                        >
                          <span><b>Bio:</b></span>   {{classroom.bio}}
                        </p>
                        <p
                            class="mb-3 font-normal text-gray-700 dark:text-gray-400"
                        >
                            <span><b>Classes per week:</b></span> {{classroom.classesperweek}}
                        </p>
                        <p
                            class="mb-3 font-normal text-gray-700 dark:text-gray-400"
                        >
                            <span><b>Mobthly fees:</b></span> {{classroom.monthlyfees}}
                        </p>
                           <p
                            class="mb-3 font-normal text-gray-700 dark:text-gray-400"
                        >
                            <span><b>Total classes:</b></span>    {{classroom.totalclasses}}
                        </p>
                        <inertia-link
                            :href="'http://localhost:8001/viewclassroom/' + classroom.id"
                            class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        >
                            View Classroom
                            <svg
                                class="ml-2 -mr-1 w-4 h-4"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                        </inertia-link>
                    </div>
                </div>
                </div>


            </div>
        </div>
        <div class="footer">
            <Footer />
        </div>
    </div>
</template>

<script>
import Header from "../General/Header.vue";
import Footer from "../General/Footer.vue";
export default {
    props: ["classrooms"],
    components: {
        Header,
        Footer,
    },
};
</script>
