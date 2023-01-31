import axios from 'axios';

const article = {
    /**
     * @return {Promise<AxiosResponse<any>>}
     */
    getTest() {
        return axios.get('api/article/test');
    },
};

export default {
    article,
};
