<template>
    <div class="container">
        <header class="d-flex justify-content-center py-3">
            <ul class="nav nav-pills">
                <li
                    v-for="item in items"
                    class="nav-item"
                >
                    <router-link
                        :to="item"
                        exact
                        class="nav-link"
                        active-class="active"
                    >
                        {{ item.text }}
                    </router-link>
                </li>
            </ul>
        </header>
    </div>
</template>

<script>
export default {
    /**
     * Component name
     */
    name: 'Navigation',

    /**
     * Components.
     */
    components: {},

    /**
     * Computed properties.
     */
    computed: {
        /**
         * @return {[{name: string, text: string}]}
         */
        items() {
            return [
                {
                    name: 'home',
                    text: 'Home',
                },
                {
                    name: 'test',
                    text: 'Test',
                },
            ];
        }
    },
}
</script>
