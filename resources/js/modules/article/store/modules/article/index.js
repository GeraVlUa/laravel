import { getField, updateField } from 'vuex-map-fields';
import storeHelper from 'App/store/helper';
import api from 'Modules/article/api';

const types = {
    CLIENT_LIST: storeHelper.createAsyncMutation('CLIENT_LIST'),
};

const state = {
    clients: [],
    [types.CLIENT_LIST.loadingKey]: false,
};

const actions = {
    clientList: storeHelper.createAction(types.CLIENT_LIST, async () => {
        return await api.article.getTest();
    }),
};

/**
 * Mutations
 * @type {{}}
 */
const mutations = {
    ...storeHelper.createMutation(types.CLIENT_LIST, {
        success(state, response) {
            state.clients = response;
        },
    }),

    /**
     * Update field helper
     */
    updateField,
};

/**
 * Getters
 * @type {{getField: getField}}
 */
const getters = {
    /**
     * Fields mapping.
     */
    getField,
};

export default {
    namespaced: true,
    state,
    actions,
    mutations,
    getters,
};
