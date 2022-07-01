<template>
    <div
        class="min-h-full flex flex-col items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
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
                    Add payment
                </h2>
            </div>
            <form class="mt-8 space-y-6 myform" @submit.prevent="submitpayment">
                <input type="hidden" name="remember" value="true" />
                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="amount" class="sr-only"
                            >Amount</label
                        >
                        <input
                            id="amount"
                            name="amount"
                            type="text"
                            autocomplete=""
                            required=""
                            class="rounded-t-md appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Enter amount"
                            v-model="payment.amount"
                        />
                    </div>
                    <div>
                        <label for="screenshot" class="sr-only">Screenshot</label>
                        <input
                            id="screenshot"
                            name="screenshot"
                            type="file"
                            autocomplete=""
                            required=""
                            class="rounded-b-md appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Screenshot"
                            ref="shot"
                        />
                    </div>
           
                </div>

                <div>
                    <button
                        type="submit"
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Submit Payment
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
  props: ["errors","successMessage", "classid","studentid","teacherid"],   
  data(){
    return{
      payment: {
        amount: '',
        screenshot: '',
        classid: '',
        studentid: '',
        teacherid: ''
      }
    }
  },
  methods:{
    submitpayment(){  
      this.payment.studentid = this.studentid
      this.payment.classid = this.classid  
      this.payment.teacherid = this.teacherid
      this.payment.screenshot = this.$refs.shot.files[0]
      Inertia.post("/submitpaymentstdfees",this.payment);
      document.querySelector(".myform").reset();
      this.payment.amount = '';
    //  this.successMessage="Your Fees has been submitted."
    }
  }
}
</script>