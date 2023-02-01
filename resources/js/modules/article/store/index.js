import { getField, updateField } from 'vuex-map-fields';
import storeHelper from 'App/store/helper';
import api from 'Modules/article/api';

const types = {
    LOAD_ARTICLE: storeHelper.createAsyncMutation('LOAD_ARTICLE'),
    LOAD_ARTICLES: storeHelper.createAsyncMutation('LOAD_ARTICLES'),
};

const state = {
    article: {},
    articles: [],
    [types.LOAD_ARTICLE.loadingKey]: false,
    [types.LOAD_ARTICLES.loadingKey]: false,
};

const actions = {
    loadArticle: storeHelper.createAction(types.LOAD_ARTICLE, async (module, id) => {
        return await api.article.article(id);
    }),

    loadArticles: storeHelper.createAction(types.LOAD_ARTICLES, async () => {
        return await api.article.articles();
    }),
};

/**
 * Mutations
 * @type {{}}
 */
const mutations = {
    ...storeHelper.createMutation(types.LOAD_ARTICLE, {
        success(state, response) {
            state.article = response.data;
        },
    }),

    ...storeHelper.createMutation(types.LOAD_ARTICLES, {
        success(state, response) {
            state.articles = response.data;
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
