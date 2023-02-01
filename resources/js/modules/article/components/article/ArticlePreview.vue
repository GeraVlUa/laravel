<template>
    <div class="col d-flex align-items-start">
        <h2>{{ title }}</h2>
        <p>{{ description }}</p>
        <a href="#" class="btn btn-primary">
            Primary button
        </a>
    </div>
</template>

<script>
export default {
    /**
     * Component name
     */
    name: 'ArticlePreview',

    /**
     * Component properties.
     */
    props: {
        /**
         * Article
         */
        article: {
            type: Object,
            required: false,
        },
    },

    /**
     * Computed properties.
     */
    computed: {
        /**
         *
         * @return {string}
         */
        title() {
            return this.article.title || 'Featured title';
        },

        /**
         * @return {string}
         */
        description() {
            return this.article.description || 'Paragraph of text beneath';
        },

        /**
         * @return {string}
         */
        link() {
            return '';
        },
    }
}
</script>
