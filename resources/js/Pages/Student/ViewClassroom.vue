<template>
    <div>
    <div class="navbar">
            <Header />
        </div>
        <div class="content">
            <div class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h1 class="text-3xl font-bold text-gray-900">{{classs.name}}</h1>
                </div>
                <div class="flex flex-wrap max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <a href="#">
                        <img
                            class="rounded-t-lg w-96 h-72"
                            :src= "'http://localhost:8001/storage/' + classs.image" 
                            alt=""
                        />
                    </a>
                    <div class="p-5">
                        <p
                            class="mb-3 font-normal text-gray-700 dark:text-gray-400"
                        >
                          <span><b>Bio:</b></span>   {{classs.bio}}
                        </p>
                        <p
                            class="mb-3 font-normal text-gray-700 dark:text-gray-400"
                        >
                            <span><b>Classes Per Week :</b></span> {{classs.classesperweek}}
                        </p>
                        <p
                            class="mb-3 font-normal text-gray-700 dark:text-gray-400"
                        >
                            <span><b>Monthly Fees:</b></span> {{classs.monthlyfees}}
                        </p>
                           <p
                            class="mb-3 font-normal text-gray-700 dark:text-gray-400"
                        >
                            <span><b>Total Classes:</b></span>    {{classs.totalclasses}}
                        </p>
                        <inertia-link
                            :href="'http://localhost:8001/joinclass/' + classs.id + '/' + student.id  + '/' + teacher.id "
                            class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        >
                            Join
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
            <div class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h1 class="text-3xl font-bold text-gray-900">Teacher Details</h1>
                </div>
                <div class="flex flex-wrap max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <a href="#">
                        <img
                            class="rounded-t-lg w-96 h-72"
                            :src= "'http://localhost:8001/storage/' + teacher.image" 
                            alt=""
                        />
                    </a>
                    <div class="p-5">
                         <p
                            class="mb-3 font-normal text-gray-700 dark:text-gray-400"
                        >
                          <span><b>Name:</b></span>   {{teacher.name}}
                        </p>
                        <p
                            class="mb-3 font-normal text-gray-700 dark:text-gray-400"
                        >
                          <span><b>Email:</b></span>   {{teacher.email}}
                        </p>
                        <p
                            class="mb-3 font-normal text-gray-700 dark:text-gray-400"
                        >
                          <span><b>Bio:</b></span>   {{teacher.bio}}
                        </p>
                        <p
                            class="mb-3 font-normal text-gray-700 dark:text-gray-400"
                        >
                            <span><b>Phone :</b></span> {{teacher.phone}}
                        </p>
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
    props: ["classs","teacher","student"],
    components: {
        Header,
        Footer,
    },
};
</script>