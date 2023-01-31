import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);

import article from 'Modules/article/store';

export default new Vuex.Store({
    modules: {
        article,
    }
});
