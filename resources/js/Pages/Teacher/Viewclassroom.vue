<template>
    <div>
        <div class="navbar">
            <Header />
        </div>
        <div class="content">
            <div class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h1 class="mt-10 text-3xl font-bold text-gray-900">
                        Create Meeting
                    </h1>
                    <form
                        class="mt-8 space-y-6 myform max-w-2xl"
                        @submit.prevent="createMeeting"
                    >
                        <div>
                            <label for="email-address" class="sr-only"
                                >Meeting</label
                            >
                            <input
                                id="meeting"
                                name="meetinglink"
                                type="text"
                                required=""
                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                placeholder="Meeting Link"
                                v-model="meetingLink"
                            />
                        </div>
                        <div>
                            <button
                                type="submit"
                                class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            >
                                Create Meeting
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h1 class="mt-10 text-3xl font-bold text-gray-900">
                        Create Lecture
                    </h1>
                    <form
                        class="mt-8 space-y-6 myform max-w-2xl"
                        @submit.prevent="createLecture"
                    >
                        <div>
                            <label for="email-address" class="sr-only"
                                >Lecture</label
                            >
                            <input
                                id="title"
                                name="title"
                                type="text"
                                required=""
                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                placeholder="Lecture Title"
                                v-model="title"
                            />
                        </div>
                        <div>
                            <label for="email-address" class="sr-only"
                                >File</label
                            >
                            <input
                                id="file"
                                name="file"
                                type="file"
                                required=""
                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                placeholder="Lecture Title"
                                ref="lecturefile"
                            />
                        </div>

                        <div>
                            <button
                                type="submit"
                                class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            >
                                Create Lecture
                            </button>
                        </div>
                    </form>
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
import { Inertia } from "@inertiajs/inertia";

export default {
    props: ["classroom"],
    components: {
        Header,
        Footer,
    },
    data() {
        return {
            title: "",
            file: "",
            id: this.classroom.id,
        };
    },
    methods: {
        createMeeting() {
            let data = {
                meetingLink: this.meetingLink,
                id: this.id,
            };
            Inertia.post("/postMeetingLink", data);
        },
        createLecture() {
            let data = {
                title: this.title,
                id: this.id,
                lecturefile: this.$refs.lecturefile.files[0],
            };
            console.log("Data is:", data);
            Inertia.post("/postLecture", data);
        },
    },
};
</script>
