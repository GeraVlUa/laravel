import axios from 'axios';
import { route } from 'App/router/route';

const article = {
    /**
     * @return {Promise<AxiosResponse<any>>}
     */
    article(article) {
        return axios.get(route(`api/article/article/${ article }`));
    },

    /**
     * @return {Promise<AxiosResponse<any>>}
     */
    articles() {
        return axios.get(route('api/article/articles'));
    },
};

export default {
    article,
};
