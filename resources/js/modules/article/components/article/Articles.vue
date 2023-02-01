<template>
    <div id="hanging-icons" class="container px-4 py-5">
        <div
            v-if="!loadArticlesPending"
            class="row g-4 py-5 row-cols-1 row-cols-lg-3"
        >
            <article-preview
                v-for="article in articles"
                :key="article.id"
                :article="article"
            />
        </div>
        <div v-else>
            <no-result />
        </div>
    </div>
</template>

<script>
import { mapActions, mapState } from "vuex";
import NoResult from "Modules/article/components/NoResult";
import ArticlePreview from "Modules/article/components/article/ArticlePreview";

export default {
    /**
     * Component name
     */
    name: 'Articles',

    /**
     * Components.
     */
    components: { ArticlePreview, NoResult },

    /**
     * Computed props
     */
    computed: {
        /**
         * Map state
         */
        ...mapState('article', {
            //article: state => state.article,
            articles: state => state.articles,
            loadArticlesPending: state => state.loadArticlesPending,
        }),
    },

    /**
     * Methods.
     */
    methods: {
        /**
         * Impersonate user
         */
        ...mapActions('article', [
            //'loadArticle',
            'loadArticles',
        ]),
    },

    /**
     * Created hook.
     */
    async mounted() {
        await this.loadArticles();
    }
}
</script>
