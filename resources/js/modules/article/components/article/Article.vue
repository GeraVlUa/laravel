<template>
    <div>
        <h2>{{ title }}</h2>
        <p>{{ description }}</p>
        <slot />
    </div>
</template>

<script>
export default {
    /**
     * Component name
     */
    name: 'Test',

    /**
     * Component properties.
     */
    props: {
        /**
         * Article
         */
        article: {
            type: Object,
            required: true,
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
    }
}
</script>
