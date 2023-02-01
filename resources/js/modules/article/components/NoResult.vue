<template>
    <div>{{ text }}</div>
</template>

<script>

export default {
    /**
     * Component name
     */
    name: 'NoResult',

    /**
     * Component properties.
     */
    props: {
        /**
         * No result text
         */
        text: {
            type: String,
            required: false,
            default: 'No result'
        },
    },
}
</script>
