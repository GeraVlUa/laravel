export default {
    state: {
        cafes: [],
        cafesLoadStatus: 0,
    },

    actions: {

        /**
         * Get CLIENT_DETAILS
         */
        /*getArticle: storeHelper.createAction(types.CLIENT_DETAILS, async (module, id) => {
            return await api.client.details(id);
        }),*/

        loadCafes({ commit, rootState, dispatch }) {
            commit('setCafesLoadStatus', 1);

            axios.get('api/test')
                .then(function (response) {
                    commit('setCafes', response.data);
                    dispatch('orderCafes', {
                        order: rootState.filters.orderBy,
                        direction: rootState.filters.orderDirection
                    });
                    commit('setCafesLoadStatus', 2);
                })
                .catch(function () {
                    commit('setCafes', []);
                    commit('setCafesLoadStatus', 3);
                });
        },
    },

    mutations: {

        setCafesLoadStatus(state, status) {
            state.cafesLoadStatus = status;
        },

        /*
          Sets the cafes
        */
        setCafes(state, cafes) {
            state.cafes = cafes;
        },
    },

    /*
      Defines the getters used by the module
    */
    getters: {
        /*
          Returns the cafes load status.
        */
        getCafesLoadStatus(state) {
            return state.cafesLoadStatus;
        },

        /*
          Returns the cafes.
        */
        getCafes(state) {
            return state.cafes;
        },
    }
}
