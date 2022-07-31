<template>
    <!-- component -->
    <div>
        <div class="sticky top-0 z-50">
            <div>
                <div
                    class="w-full bg-indigo-600 opacity-90 h-20 flex justify-between"
                >
                    <div
                        class="w-full lg:w-30/6 xl:w-full h-full flex items-center px-4"
                    >
                        <h2
                            color="text-white"
                            style="color: white; font-size: 2rem"
                        >
                            VideEdu
                        </h2>
                    </div>

                    <div class="w-full h-full flex justify-end items-center">
                        <a href="#">
                            <button
                                class="relative w-7 h-7 mr-2 focus:outline-none hover:animate-pulse rounded-full flex items-center justify-center"
                            >
                                <svg
                                    fill="white"
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"
                                    />
                                </svg>
                            </button>
                        </a>
                        &nbsp;
                    </div>
                </div>
            </div>
        </div>

        <aside
            class="relative overflow-hidden text-black rounded-lg sm:mx-16 mx-2 sm:py-16"
        >
            <div
                class="relative z-10 max-w-screen-xl px-4 pb-20 pt-10 sm:py-24 mx-auto sm:px-6 lg:px-8"
            >
                <div
                    class="max-w-xl sm:mt-1 mt-80 space-y-8 text-center sm:text-right sm:ml-auto"
                >
                    <h2 class="text-4xl font-bold sm:text-5xl">
                        Start Now
                        <span class="hidden sm:block text-4xl">
                            Join videedu now
                        </span>
                    </h2>

                    <a
                        class="inline-flex text-white items-center px-4 py-3 mx-2 font-medium bg-indigo-600 rounded-lg hover:opacity-75"
                        href="http://localhost:8001/loginadmin"
                    >
                        Admin Login
                    </a>
                    <a
                        class="inline-flex text-white items-center px-4 py-3 mx-2 font-medium bg-indigo-600 rounded-lg hover:opacity-75"
                        href="http://localhost:8001/loginteacher"
                    >
                        Teacher Login
                    </a>
                    <a
                        class="inline-flex text-white items-center px-4 py-3 mx-2 font-medium bg-indigo-600 rounded-lg hover:opacity-75"
                        href="http://localhost:8001/loginstudentview"
                    >
                        Student Login
                    </a>
                </div>
            </div>

            <div class="absolute inset-0 w-full sm:my-20 sm:pt-1 pt-12 h-full">
                <img class="w-96" src="https://i.ibb.co/5BCcDYB/Remote2.png" />
            </div>
        </aside>

        <footer class="text-center">
            <hr />
            <p class="text-center py-5 font-black">VideEdu</p>
        </footer>
    </div>
</template>

<script>
export default {
    setup() {},
};
</script>
