<template>
    <article-details :article="article">
        <router-link
            :to="{ name: 'home' }"
            exact
            class="btn btn-primary"
        >
            Edit
        </router-link>
        <router-link
            :to="{ name: 'home' }"
            exact
            class="btn btn-primary"
        >
            Delete
        </router-link>

    </article-details>
</template>

<script>
import { mapActions, mapState } from "vuex";
import ArticleDetails from "Modules/article/components/article/ArticleDetails";

export default {
    /**
     * Component name
     */
    name: 'ArticlePage',

    /**
     * Components.
     */
    components: { ArticleDetails },

    /**
     * Computed props
     */
    computed: {
        /**
         * Map state
         */
        ...mapState('article', {
            article: state => state.article,
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
            'loadArticle',
            'loadArticlePending',
        ]),
    },

    /**
     * Created hook.
     */
    async mounted() {
        await this.loadArticle(
            this.$route.params.article
        );
    }
}
</script>
