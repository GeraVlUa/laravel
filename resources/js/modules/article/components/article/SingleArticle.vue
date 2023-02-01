<template>
    <article-preview :article="article" />
</template>

<script>
import { mapActions, mapState } from "vuex";
import ArticlePreview from "Modules/article/components/article/ArticlePreview";

export default {
    /**
     * Component name
     */
    name: 'SingleArticle',

    /**
     * Components.
     */
    components: { ArticlePreview },

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
            this.$route.params.id
        );
    }
}
</script>
