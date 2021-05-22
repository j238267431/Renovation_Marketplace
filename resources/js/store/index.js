import Vue from 'vue';
import Vuex from 'vuex';


Vue.use(Vuex);

export default new Vuex.Store({
    modules: {},
    state: {
        messages:[],
    },
    getters: {},
    actions: {
        addMessage({commit, state}, message) {
            this.messages.push(message);

            axios.post('/account/messages', message).then(response => {
                console.log(response.data);
            }).catch(err => {
                console.log(err)
            });
        }
    },
    mutations: {},
});
