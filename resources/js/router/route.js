import { forEach } from 'lodash';

const addParams = (url, params = '') => {
    return url.replace(/\{([^}]+)\}/gi, tag => {
        let key = tag.replace(/\{|\}/gi, '');

        if (typeof params[key] === 'undefined') {
            // For optional routes parameters.
            if (key.indexOf('?') !== -1) {
                key = key.replace('?', '');
            } else {
                window.console.error(`Error: ${ key } key is required for route ${ name }`);
            }
        }

        if (params[key] === undefined) {
            return '';
        }

        const param = encodeURI(params[key]);
        delete params[key];

        return param;
    }).replace(/\/$/g, '');
};

const addGetParams = (params = {}) => {
    // No GET params.
    if (!Object.keys(params).length) {
        return '';
    }

    const parts = [];

    forEach(params, (value, name) => {
        if (value === null || value === undefined) {
            return;
        }

        parts.push(`${ name }=${ value }`);
    });

    return '?' + parts.join('&');
};

const route = (route, params = {}, absolute = false) => {
    return toRoute(route, params, absolute);
};

const toRoute = (route, params = {}, absolute = false) => {
    const domain = `${ window.location.origin }/`;
    const url = (absolute ? domain : '/') + route;

    return addParams(url, params) + addGetParams(params);
};

export {
    route,
    // toRoute
};
