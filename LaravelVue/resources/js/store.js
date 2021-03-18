import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
    //需要注意CORS 瀏覽器要在這網址用
    state: {
        // apiURL: 'http://127.0.0.1:8000/api',
        // serverPath: 'http://127.0.0.1:8000'
        apiURL: 'http://localhost:5000/api',
        serverPath: 'http://localhost:5000'

        // apiURL: 'http://192.168.112.112/api',
        // serverPath: 'http://192.168.112.112',


    },
    mutations: {},
    action: {}
})