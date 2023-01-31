<template>
    <main>
        <navigation />
        <router-view></router-view>
    </main>
</template>

<script>
import Navigation from "App/Layout/Navigation";

export default {
    /**
     * Component name
     */
    name: 'Layout',

    /**
     * Components.
     */
    components: { Navigation }
}
</script>
