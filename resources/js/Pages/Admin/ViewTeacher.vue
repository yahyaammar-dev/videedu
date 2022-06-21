<template>
    <div>
        <div class="navbar">
            <Header />
        </div>
        <div class="content">
            <div class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h1 class="mt-10 text-3xl font-bold text-gray-900">
                        {{ teacher.name }}'s Account
                    </h1>
                </div>
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-center">
                        <div
                            class="flex flex-col md:flex-row md:max-w-xl rounded-lg bg-white shadow-lg"
                        >
                            <img
                                class="w-full h-60 object-cover w-48 rounded-t-lg md:rounded-none md:rounded-l-lg"
                                :src="
                                    'http://localhost:8001/Storage/' +
                                    teacher.image
                                "
                                alt=""
                            />
                            <div class="p-6 flex flex-col justify-start">
                                <h5
                                    class="text-gray-900 text-xl font-medium mb-2"
                                >
                                    {{ teacher.name }}
                                </h5>
                                <p class="text-gray-700 text-base mb-4">
                                    <span><b>Bio: </b></span>{{ teacher.bio }}
                                </p>
                                <p class="text-gray-600 text-xs">
                                    <span><b>Email: </b></span
                                    >{{ teacher.email }}
                                </p>
                                <p class="text-gray-600 text-xs">
                                    <span><b>Hourly Rate: </b></span
                                    >{{ teacher.hourlyrate }}
                                </p>
                                <p class="text-gray-600 text-xs">
                                    <span><b>Phone: </b></span
                                    >{{ teacher.Phone }}
                                </p>
                                <p class="text-gray-600 text-xs">
                                    <span><b>Identity Verification: </b></span
                                    >{{ teacher.idstatus }}
                                </p>
                                <p class="text-gray-600 text-xs">
                                    <span><b>Test Status: </b></span
                                    >{{ teacher.teststatus }}
                                </p>
                                <p class="text-gray-600 text-xs">
                                    <span><b>Interview Status: </b></span
                                    >{{ teacher.interviewstatus }}
                                </p>
                                <p class="text-gray-600 text-xs">
                                    <span><b>Next Interview Date: </b></span
                                    >{{ teacher.interviewdate }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white shadow">
                <div
                    class="mt-10 max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between"
                >
                    <h1 class="text-3xl font-bold text-gray-900">
                        Identity Verification
                    </h1>
                    <button
                        @click="verify"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                    >
                        Verify Account
                    </button>
                </div>
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <div class="flex">
                        <div
                            class="flex flex-col md:flex-row md:max-w-xl rounded-lg bg-white shadow-lg mr-10"
                        >
                            <img
                                class="w-full h-60 object-cover w-96 rounded-t-lg md:rounded-none md:rounded-l-lg"
                                :src="
                                    'http://localhost:8001/Storage/' +
                                    teacher.idfront
                                "
                                alt=""
                            />
                        </div>
                        <div
                            class="flex flex-col md:flex-row md:max-w-xl rounded-lg bg-white shadow-lg"
                        >
                            <img
                                class="w-full h-60 object-cover w-96 rounded-t-lg md:rounded-none md:rounded-l-lg"
                                :src="
                                    'http://localhost:8001/Storage/' +
                                    teacher.idback
                                "
                                alt=""
                            />
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h1 class="mt-10 text-3xl font-bold text-gray-900">
                        Create Test
                    </h1>

                    <form
                        class="mt-8 space-y-6 myform max-w-2xl"
                        @submit.prevent="createQuestion"
                    >
                        <div>
                            <label for="email-address" class="sr-only"
                                >Question</label
                            >
                            <input
                                id="question"
                                name="question"
                                type="text"
                                required=""
                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                placeholder="Write Question"
                                v-model="question"
                            />
                        </div>

                        <div>
                            <button
                                type="submit"
                                class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            >
                                Create Question
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="bg-white shadow">
                <div class="max-w-7xl mt-10 mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between">
                        <h1 class="text-3xl font-bold text-gray-900">
                            Test Submission
                        </h1>
                        <div class="flex justify-end">
                            <button
                                @click="accept"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-5"
                            >
                                Accept
                            </button>
                            <button
                                @click="reject"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                            >
                                Reject
                            </button>
                        </div>
                    </div>
                    <div
                        v-for="(question, itemObjKey) in questions"
                        :key="question.id"
                    >
                        <div class="rounded-md shadow-sm -space-y-px mt-10">
                            <div>
                                <b class="text-lg">Q{{ itemObjKey + 1 }}: </b>
                                <p class="text-base inline-block">
                                    <b>{{ question.question }}</b>
                                </p>
                            </div>
                            <div>
                                <p class="text-base inline-block ml-10">
                                    {{ question.answer }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white shadow">
                <div class="max-w-7xl mt-10 mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between">
                        <h1 class="text-3xl font-bold text-gray-900">
                            Interview Date
                        </h1>
                    </div>
                    <div>
                        <form
                            class="mt-8 space-y-6 myform max-w-2xl"
                            @submit.prevent="setInterviewDate"
                        >
                            <div>
                                <label for="interviewdate" class="sr-only"
                                    >Interview Date</label
                                >
                                <input
                                    id="interviewdate"
                                    name="interviewdate"
                                    type="date"
                                    required=""
                                    class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    placeholder="Interview Date"
                                    v-model="interviewdate"
                                />
                            </div>

                            <div>
                                <button
                                    type="submit"
                                    class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                >
                                    Set Date
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



            <div class="bg-white shadow" v-if="teacher.interviewstatus != 'accepted'">
                <div class="max-w-7xl mt-10 mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between">
                        <h1 class="text-3xl font-bold text-gray-900">
                            Interview Status
                        </h1>
                    </div>
                    <div class="flex justify-start mt-10">    
                        <div @click="takeInterview" class="flex justify-center items-center bg-amber-200 w-36 h-36 mr-10">
                            <button>
                                Take Interview
                            </button>
                        </div>
                        <div @click="acceptInterview" class="flex justify-center items-center bg-amber-200 w-36 h-36 mr-10">
                            <button>
                                Accept Interview
                            </button>
                        </div>
                        <div @click="rejectInterview" class="flex justify-center items-center bg-amber-200 w-36 h-36 mr-10">
                            <button>
                                Reject Interview
                            </button>
                        </div>
                         <div class="w-96">
                        <form
                            class="mt-8 space-y-6 myform max-w-2xl"
                            @submit.prevent="submitInterviewLink"
                        >
                            <div>
                                <label for="interviewdate" class="sr-only"
                                    >Interview Link</label
                                >
                                <input
                                    id="interviewlink"
                                    name="interviewlink"
                                    type="text"
                                    required=""
                                    class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    placeholder="Interview Link"
                                    v-model="interviewlink"
                                />
                            </div>

                            <div>
                                <button
                                    type="submit"
                                    class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                >
                                    Set Interview Link
                                </button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>





            <div class="bg-white shadow" v-if="teacher.degreestatus != 'accepted'">
                <div class="max-w-7xl mt-10 mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between">
                        <h1 class="text-3xl font-bold text-gray-900">
                            Submitted Degrees
                        </h1>
                    </div>


                    <div class="flex justify-end">
                            <button
                                @click="acceptdegrees"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-5"
                            >
                                Accept
                            </button>
                            <button
                                @click="rejectdegrees"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                            >
                                Reject
                            </button>
                        </div>

                    <div class="flex flex-wrap">
                        <div v-for="degree in degrees" :key="degree.id">
                            <img :src="'http://localhost:8001/storage/' + degree.url "  class="w-52 h-64"/>
                        </div>
                    </div>
                </div>
            </div>
        
        
        
        
        
        
            <div class="bg-white shadow" v-if="teacher.degreestatus != 'accepted'">
                <div class="max-w-7xl mt-10 mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between mt-10">
                        <h1 class="text-3xl font-bold text-gray-900 mb-10">
                            Pending classrooms
                        </h1>
                    </div>

                    <div class="flex flex-wrap justify-between">
                        <div v-for="classroom in classrooms" :key="classroom.id">
                            <div v-if="classroom.status != 'accepted'" class="max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                                <a href="#">
                                     <img :src="'http://localhost:8001/storage/' + classroom.image "  class="rounded-t-lg w-52 h-64"/>
                                </a>
                                <div class="p-5">
                                    <a href="#">
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Name: {{classroom.name}}</h5>
                                    </a>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Bio: {{classroom.bio}}</p>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">classes per week: {{classroom.classesperweek}}</p>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Monthly Fees: {{classroom.monthlyfees}}</p>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Total Classes: {{classroom.totalclasses}}</p>
                                    <div class="flex">    
                                        <a @click="approveclass(classroom.id)"  class="mr-5 inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 cursor-pointer dark:focus:ring-blue-800">
                                            Approve
                                            <svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        </a>
                                        <a  @click="deleteclass(classroom.id)" class="cursor-pointer inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Reject
                                            <svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        </a>
                                    </div>
                                </div>
                            </div>                       
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
import { Inertia } from "@inertiajs/inertia";
export default {
    props: ["teacher", "admin", "questions","degrees","classrooms"],
    data() {
        return {
            question: "",
            interviewdate: "",
            interviewlink: ""
        };
    },
    components: {
        Header,
        Footer,
    },
    methods: {
        createQuestion() {
            let questionData = {
                question: this.question,
                teacher: this.teacher.id,
                admin: this.admin.id,
            };
            Inertia.post("/addquestion", questionData);
            alert("Question added");
            this.question = null;
        },
        accept() {
            Inertia.post("/accepttest", { id: this.teacher.id });
        },
        reject() {
            Inertia.post("/rejecttest", { id: this.teacher.id });
        },
        setInterviewDate() {
            let alldata = {
                id: this.teacher.id,
                interviewdate: this.interviewdate,
            };
            Inertia.post("/setinterviewdate", alldata);
            alert("Date Set");
        },
        acceptInterview(){
            let alldata = {
                id: this.teacher.id,
                interviewsat: "accepted"
            }
            Inertia.post("/acceptinterview",alldata)
            alert("Interview Accepted")
        },
        rejectInterview(){
              let alldata = {
                id: this.teacher.id,
                interviewsat: "rejected"
            }
            Inertia.post("/rejectinterview",alldata)
            alert("Reject Interview")
        },
        takeInterview(){
            //Inertia.post("/takeinterview", alldata)
            window.open("http://localhost:3035", '_blank').focus();
        },
        submitInterviewLink(){
              let alldata = {
                id : this.teacher.id,
                interviewlink : this.interviewlink
            }
            Inertia.post("/interviewlink", alldata)
        },
        acceptdegrees(){
            Inertia.post('/acceptdegrees',this.teacher);
        },
        rejectdegrees(){
            Inertia.post('/rejectdegrees', this.teacher)
        },
        approveclass(id){
          let data = {
              c_id : id,
              t_id : this.teacher.id
          }
          Inertia.post('/approveclass', data)
        },
        deleteclass(id){
            let data = {
              c_id : id,
              t_id : this.teacher.id
            }
            Inertia.post('/deleteclass',data)
        }       
    },
};
</script>