<template>
    <div>
        <div class="navbar">
            <Header />
        </div>
        <div class="content">
            <div class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h1 class="text-3xl font-bold text-gray-900">
                        {{ classs.name }}
                    </h1>
                </div>
                <div
                    class="flex flex-wrap max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8"
                >
                    <a href="#">
                        <img
                            class="rounded-t-lg w-96 h-72"
                            :src="
                                'http://localhost:8001/storage/' + classs.image
                            "
                            alt=""
                        />
                    </a>
                    <div class="p-5">
                        <p
                            class="mb-3 font-normal text-gray-700 dark:text-gray-400"
                        >
                            <span><b>Bio:</b></span> {{ classs.bio }}
                        </p>
                        <p
                            class="mb-3 font-normal text-gray-700 dark:text-gray-400"
                        >
                            <span><b>Classes Link :</b></span>
                            {{ classs.link }}
                        </p>
                        <p
                            class="mb-3 font-normal text-gray-700 dark:text-gray-400"
                        >
                            <span><b>Classes Per Week :</b></span>
                            {{ classs.classesperweek }}
                        </p>
                        <p
                            class="mb-3 font-normal text-gray-700 dark:text-gray-400"
                        >
                            <span><b>Monthly Fees:</b></span>
                            {{ classs.monthlyfees }}
                        </p>
                        <p
                            class="mb-3 font-normal text-gray-700 dark:text-gray-400"
                        >
                            <span><b>Total Classes:</b></span>
                            {{ classs.totalclasses }}
                        </p>
                        <inertia-link
                            :href="
                                'http://localhost:8001/joinclass/' +
                                classs.id +
                                '/' +
                                student.id +
                                '/' +
                                teacher.id
                            "
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
                    <h1 class="text-3xl font-bold text-gray-900">
                        Teacher Details
                    </h1>
                </div>
                <div
                    class="flex flex-wrap max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8"
                >
                    <a href="#">
                        <img
                            class="rounded-t-lg w-96 h-72"
                            :src="
                                'http://localhost:8001/storage/' + teacher.image
                            "
                            alt=""
                        />
                    </a>
                    <div class="p-5">
                        <p
                            class="mb-3 font-normal text-gray-700 dark:text-gray-400"
                        >
                            <span><b>Name:</b></span> {{ teacher.name }}
                        </p>
                        <p
                            class="mb-3 font-normal text-gray-700 dark:text-gray-400"
                        >
                            <span><b>Email:</b></span> {{ teacher.email }}
                        </p>
                        <p
                            class="mb-3 font-normal text-gray-700 dark:text-gray-400"
                        >
                            <span><b>Bio:</b></span> {{ teacher.bio }}
                        </p>
                        <p
                            class="mb-3 font-normal text-gray-700 dark:text-gray-400"
                        >
                            <span><b>Phone :</b></span> {{ teacher.phone }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="max-w-md w-full space-y-8 mt-20">
                <div>
                    <h2
                        class="mt-6 text-center text-3xl font-extrabold text-gray-900"
                    >
                        Submit Review and rating
                    </h2>
                </div>
                <form
                    class="mt-8 space-y-6 myform"
                    @submit.prevent="submitrating"
                >
                    <input type="hidden" name="remember" value="true" />
                    <div class="rounded-md shadow-sm -space-y-px">
                        <div>
                            <label for="rating" class="sr-only">Rating</label>

                            <div class="flex justify-center">
                                <div class="mb-3 xl:w-96">
                                    <select
                                        name="rating"
                                        class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                        aria-label="Default select example"
                                    >
                                        <option selected>
                                            Select Rating out of 5
                                        </option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                        <option value="4">Four</option>
                                        <option value="5">Five</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label for="Review" class="sr-only">Review</label>
                            <div class="flex justify-center">
                                <div class="mb-3 xl:w-96">
                                    <input
                                        id="review"
                                        name="review"
                                        type="text"
                                        autocomplete=""
                                        required=""
                                        class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                        placeholder="Review"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-center">
                            <div class="mb-3 xl:w-96">
                                <button
                                    type="submit"
                                    class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                >
                                    Submit Payment
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
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
    props: ["classs", "teacher", "student"],
    components: {
        Header,
        Footer,
    },
    methods: {
        submitrating() {
            alert("Hello");
        },
    },
};
</script>
