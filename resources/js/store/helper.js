import camelCase from "lodash/camelCase";
import isObject from "lodash/isObject";
import mapKeys from "lodash/mapKeys";
import mapValues from "lodash/mapValues";

/**
 * Create async mutation helper
 * @param type
 * @returns {{loadingKey, SUCCESS: string, errorsKey, statusKey, PENDING: string, FAILURE: string}}
 */
const createAsyncMutation = (type) => ({
    SUCCESS: `${ type }_SUCCESS`,
    FAILURE: `${ type }_FAILURE`,
    PENDING: `${ type }_PENDING`,
    loadingKey: camelCase(`${ type }_PENDING`),
    abortKey: camelCase(`${ type }_ABORT`),
    ERROR: camelCase(`${ type }_ERROR`),
});

/**
 * Create async action helper.
 * @param type
 * @param callbacks
 * @param onlyOne
 * @returns {Function}
 */
const createAction = (type, callbacks, onlyOne = false) => (async (store, payload) => {
    store.commit(type.PENDING);
    try {
        let config = {};
        if (onlyOne) {
            store.state[type.abortKey] = new AbortController();
            config = { signal: store.state[type.abortKey].signal };
        }
        const response = await callbacks.call(this, store, payload, config).catch((error) => {
            if (error.constructor.name !== 'Cancel') {
                return Promise.reject(error);
            }
        });
        if (isObject(response)) {
            const data = response.data;
            store.commit(type.SUCCESS, data, payload);
            return Promise.resolve(response);
        }
    } catch (error) {
        console.log(error);
        store.commit(type.FAILURE, error && error.response);
        return Promise.reject(error);
    }
});

/**
 * Helper to create unified mutations and avoid copy pasted code.
 */

/**
 * Mapping for mutations and loading.
 * @type {{PENDING: boolean, SUCCESS: boolean, FAILURE: boolean}}
 */
const mutationLoadings = {
    'PENDING': true,
    'SUCCESS': false,
    'FAILURE': false,
};

/**
 * Create mutation helper.
 * @param type
 * @param callbacks
 * @returns {{}}
 */
const createMutation = (type, callbacks = {}) => ({
    ...mapKeys(mapValues(mutationLoadings, (loading, key) => {
        return (state, payload) => {
            const callback = callbacks[key.toLowerCase()];
            if (callback && callback instanceof Function) {
                callback(state, payload);
            }

            state[type.loadingKey] = loading;
        };
    }), (value, key) => (type[key])),
});

/**
 * Array to state
 * @param array
 * @param defaultValue
 * @returns {*}
 */
const arrayToState = (array, defaultValue = null) => {
    const initialValue = {};
    return array.reduce((obj, item) => {
        return {
            ...obj,
            [item]: defaultValue,
        };
    }, initialValue);
};

export default {
    createAction,
    createAsyncMutation,
    createMutation,
    arrayToState,
};
