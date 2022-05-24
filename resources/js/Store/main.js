
import Vuex from 'vuex';

export default new Vuex.Store({
    state:{
     some: 9
    },
    getters:{
     // Compute derived state based on the current state. More like computed property.
    },
    mutations:{
     // Mutate the current state
    },
    actions:{
     // Get data from server and send that to mutations to mutate the current state
    }
   })
