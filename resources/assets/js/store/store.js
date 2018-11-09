import Vue from 'Vue';
import Vuex from 'vuex';

Vue.use(Vuex);


export const store = new Vuex.Store({
    state:{
        payment_type:'Some Val'
    },

    getters:{
        payment_type(state){
            return state.payment_type;
        },
    },
    
    mutations:{
        payment_type(state,payload){
            state.payment_type = payload;
        }
    }
    
});