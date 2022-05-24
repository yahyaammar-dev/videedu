<template>
    <!--
    <html class="h-full bg-gray-50">
    <body class="h-full">
  -->
    <div
        class="min-h-full flex flex-col items-center justify-center py-12 px-4 sm:px-6 lg:px-8"
    >





     <div v-if="Object.keys(this.errors).length > 0" class="bg-red-100 border mb-10 border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"> 
            {{ Object.values(errors)[0] }}
        </div>



     <div v-if="successMessage" class="bg-green-100 border border-green-400  mb-10 text-green-700 px-4 py-3 rounded relative" role="alert"> 
            {{successMessage}}
        </div>







        <div class="max-w-md w-full space-y-8">
            <div>
                <img
                    class="mx-auto h-12 w-auto"
                    src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"
                    alt="Workflow"
                />
                <h2
                    class="mt-6 text-center text-3xl font-extrabold text-gray-900"
                >
                    Create Your Account
                </h2>
            </div>
            <form class="mt-8 space-y-6 myform" @submit.prevent="createTeacher">
                <input type="hidden" name="remember" value="true" />
                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="name" class="sr-only">Name</label>
                        <input
                            id="name"
                            name="name"
                            type="text"
                            required=""
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Name"
                            v-model="teacher.name"
                        />
                    </div>
                    <div>
                        <label for="email-address" class="sr-only"
                            >Email address</label
                        >
                        <input
                            id="email-address"
                            name="email"
                            type="email"
                            autocomplete="email"
                            required=""
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Email address"
                            v-model="teacher.email"
                        />
                    </div>
                    <div>
                        <label for="password" class="sr-only">Password</label>
                        <input
                            id="password"
                            name="password"
                            type="password"
                            autocomplete="current-password"
                            required=""
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Password"
                            v-model="teacher.password"
                        />
                    </div>
                    <div>
                        <label for="phone" class="sr-only">Phone</label>
                        <input
                            id="phone"
                            name="phone"
                            type="text"
                            required=""
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Phone"
                            v-model="teacher.phone"
                        />
                    </div>
                    <div
                        class="p-3 w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                    >
                        <label for="image" class="sr-only"
                            >Upload Your Image</label
                        >
                        <p class="text-gray-500">Image</p>
                        <input
                            id="image"
                            name="image"
                            type="file"
                            required=""
                            class="appearance-none rounded-none relative block w-full px-3 py-2 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Upload your image"
                            ref="image"
                        />
                    </div>
                    <div
                        class="p-3 w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                    >
                        <label for="image" class="sr-only">Idcard Front</label>
                          <p class="text-gray-500">Idcard Front</p>
                        <input
                            id="idfront"
                            name="idfront"
                            type="file"
                            required=""
                            class="appearance-none rounded-none relative block w-full px-3 py-2 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Upload Idcard Front"
                            ref="idfront"
                        />
                    </div>
                    <div
                        class="p-3 w-full px-3 py-2 border rounded-b-md border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                    >
                        <label for="idcardback" class="sr-only"
                            >Idcard Back</label
                        >
                          <p class="text-gray-500">Idcard Back</p>
                       
                        <input
                            id="idback"
                            name="idback"
                            type="file"
                            required=""
                            class="appearance-none rounded-none relative block w-full px-3 py-2  placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Upload Idcard Back"
                            ref="idback"
                        />
                    </div>
                </div>

                <div>
                    <button
                        type="submit"
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        SignUp 
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import store from '../../Store/main.js'
import { Head } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";

export default {
  props: ["errors","successMessage"],  
  data(){
    return{
      teacher: {
        name : '',
        email: '',
        password: '',
        phone: '',
        image: '',
        idfront: '',
        idback: ''
      }
    }
  },
  methods:{
    createTeacher(){
      this.teacher.image = this.$refs.image.files[0];
      this.teacher.idfront = this.$refs.idfront.files[0];
      this.teacher.idback = this.$refs.idback.files[0];
      Inertia.post("/createteacher",this.teacher);
      document.querySelector(".myform").reset();
      this.teacher.name = null
      this.teacher.email = null
      this.teacher.password = null
      this.teacher.phone = null

    }
  }
}
</script>