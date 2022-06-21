<template>
    <div>
        <div class="navbar">
            <Header />
        </div>
        <div class="content">
            <div class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between mt-5">
                    <h1 class="text-3xl font-bold text-gray-900">
                        {{ teacher.name }}'s Account
                    </h1>
                    <div v-if="teacher.interviewlink != NULL">
                        <a :href="teacher.interviewlink" target="_blank">
                            <button
                                class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Join Interivew
                            </button>
                        </a>

                    </div>
                </div>
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-center">
                        <div class="flex flex-col md:flex-row md:max-w-xl rounded-lg bg-white shadow-lg">
                            <img class="w-full h-80  object-cover w-48 rounded-t-lg md:rounded-none md:rounded-l-lg"
                                :src="'http://localhost:8001/Storage/' + teacher.image" alt="" />
                            <div class="p-6 flex flex-col justify-start">
                                <h5 class="text-gray-900 text-xl font-medium mb-2">
                                    {{ teacher.name }}
                                </h5>
                                <p class="text-gray-700 text-base mb-4">
                                    <span><b>Bio: </b></span>{{ teacher.bio }}
                                </p>
                                <p class="text-gray-600 text-xs">
                                    <span><b>Email: </b></span>{{ teacher.email }}
                                </p>
                                <p class="text-gray-600 text-xs">
                                    <span><b>Hourly Rate: </b></span>{{ teacher.hourlyrate }}
                                </p>
                                <p class="text-gray-600 text-xs">
                                    <span><b>Phone: </b></span>{{ teacher.Phone }}
                                </p>
                                <p class="text-gray-600 text-xs">
                                    <span><b>Identity Verification: </b></span>{{ teacher.idstatus }}
                                </p>
                                <p class="text-gray-600 text-xs">
                                    <span><b>Test Status: </b></span>{{ teacher.teststatus }}
                                </p>
                                <p class="text-gray-600 text-xs">
                                    <span><b>Interview Status: </b></span>{{ teacher.interviewstatus }}
                                </p>
                                <p class="text-gray-600 text-xs" v-if="teacher.interviewstatus != 'accepted'">
                                    <span><b>Next Interview Date: </b></span>{{ teacher.interviewdate }}
                                </p>
                                <p class="text-gray-600 text-xs">
                                    <span><b>Balance: </b></span>{{ teacher.balance }}
                                </p>
                                <p class="text-gray-600 text-xs">
                                    <span><b>Interview Link: </b></span>{{ teacher.interviewlink }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div v-if="questions.length > 0">
                <div class="bg-white shadow" v-if="teacher.teststatus != 'accepted'">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <h1 class=" mt-10 text-3xl font-bold text-gray-900">
                            Attempt test
                        </h1>
                    </div>
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">

                        <form class="mt-8 space-y-6 myform" @submit.prevent="submitTest">

                            <div v-for="(question, itemObjKey) in questions" :key="question.id">
                                <div class="rounded-md shadow-sm -space-y-px">
                                    <div>
                                        <b class="text-lg">Q{{ itemObjKey + 1 }}: </b>
                                        <p class="text-base inline-block"><b>{{ question.question }}</b></p>
                                    </div>
                                    <div>
                                        <label for="question" class="sr-only">Password</label>
                                        <input :id="'question' + (itemObjKey + 1)" :name="'question' + (itemObjKey + 1)"
                                            type="text" required=""
                                            class="rounded-b-md appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                            placeholder="Write Your Answer" />
                                    </div>
                                </div>
                            </div>

                            <div>
                                <button type="submit"
                                    class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Submit Your Test
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div>
                <div class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <h1 class=" mt-10 text-3xl font-bold text-gray-900">
                            Submit Your Degrees
                        </h1>
                    </div>
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">


                        <form class="mt-8 space-y-6 myform max-w-2xl" @submit.prevent="submitDegree">
                            <div>
                                <label for="title" class="sr-only">title</label>
                                <input id="title" name="title" type="text" required=""
                                    class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    placeholder="title" v-model="title"/>
                            </div>
                            <div>
                                <label for="degree" class="sr-only">Degree</label>
                                <input ref="degree" id="degree" name="degree" type="file" required=""
                                    class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    placeholder="Degree File" />
                            </div>

                            <div>
                                <button type="submit"
                                    class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Submit Degree
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

           <div v-if="teacher.interviewstatus == 'accepted'">
                <div class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <h1 class=" mt-10 text-3xl font-bold text-gray-900">
                            Create Classroom
                        </h1>
                    </div>
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">


                        <form class="mt-8 space-y-6 myform max-w-2xl" @submit.prevent="createClass">
                            <div>
                                <label for="classname" class="sr-only">classname</label>
                                <input id="classname" name="classname" type="text" required=""
                                    class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    placeholder="class name" v-model="classdetail.name"/>
                            </div>
                            <div>
                                <label for="image" class="sr-only">image</label>
                                <input ref="image" id="image" name="image" type="file" required=""
                                    class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    placeholder="Classroom Cover Photo" />
                            </div>
                            <div>
                                <label for="classbio" class="sr-only">classbio</label>
                                <input id="classbio" name="classbio" type="text" required=""
                                    class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    placeholder="Class Bio" v-model="classdetail.bio"/>
                            </div>
                            <div>
                                <label for="classesperweek" class="sr-only">classesperweek</label>
                                <input id="classesperweek" name="classesperweek" type="text" required=""
                                    class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    placeholder="Classes Per Week" v-model="classdetail.classesperweek"/>
                            </div>
                            <div>
                                <label for="totalclasses" class="sr-only">totalclasses</label>
                                <input id="totalclasses" name="totalclasses" type="text" required=""
                                    class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    placeholder="Total Classes" v-model="classdetail.totalclasses"/>
                            </div>
                            <div>
                                <label for="monthlyfees" class="sr-only">monthlyfees</label>
                                <input id="monthlyfees" name="monthlyfees" type="text" required=""
                                    class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    placeholder="Monthly Fees" v-model="classdetail.monthlyfees"/>
                            </div>
                            <div>
                                <button type="submit"
                                    class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Create Class
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
      
      
      
      {{classrooms.length}}
    

      
         <div class="bg-white shadow" v-if="teacher.degreestatus != 'accepted'">
                <div class="max-w-7xl mt-10 mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between mt-10">
                        <h1 class="text-3xl font-bold text-gray-900 mb-10">
                            Accepted classrooms
                        </h1>
                    </div>

                    <div class="flex flex-wrap justify-between">
                        <div v-for="classroom in classrooms" :key="classroom.id">
                            <div v-if="classroom.status == 'accepted'" class="max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
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
import Header from '../General/Header.vue'
import Footer from '../General/Footer.vue'
import { Inertia } from "@inertiajs/inertia";

export default {
    props: ["teacher", "questions", "classrooms"],
    components: {
        Header,
        Footer
    },
    data(){
        return{
            title: '',
            degreefile: '',
            classdetail: {
                name: '',
                image: '',
                bio: '',
                classesperweek: '',
                totalclasses: '',
                monthlyfees: '',
                image: '',
                teacher_id: ''
            }
        }
    },
    methods: {
        submitTest() {
            let answers = []
            let count = this.questions.length
            for (let i = 1; i <= count; i++) {
                let temp = `#question${i}`
                let val = document.querySelector(temp).value
                answers.push(val)
            }
            let alldata = {
                "id": this.teacher.id,
                "answers": answers
            }
            Inertia.post('/submittest', alldata)
            alert("Test Submitted")
        },
        submitDegree() {
              this.degreefile = this.$refs.degree.files[0];
              let alldata = {
                  title : this.title,
                  degree : this.degreefile,
                    id: this.teacher.id
              }
              Inertia.post('/submitdegree', alldata);
              document.querySelector(".myform").reset();
              this.title = ''
              alert("Degree Submitted")
        },
        createClass() {
            this.classdetail.image = this.$refs.image.files[0]
            this.classdetail.teacher_id = this.teacher.id
            Inertia.post('createclass',this.classdetail)
        }
    }
}
</script>