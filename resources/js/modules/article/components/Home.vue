<template>
    <div class="container px-4 py-5" id="hanging-icons">
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
            <div class="col d-flex align-items-start">
                <article :article="article">
                    <a href="#" class="btn btn-primary" @click="onClick">
                        Primary button
                    </a>
                </article>
            </div>
            <div class="col d-flex align-items-start">
                <div>
                    <h2>Featured title</h2>
                    <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another
                        sentence and probably just keep going until we run out of words.</p>
                    <a href="#" class="btn btn-primary">
                        Primary button
                    </a>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <div>
                    <h2>Featured title</h2>
                    <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another
                        sentence and probably just keep going until we run out of words.</p>
                    <a href="#" class="btn btn-primary">
                        Primary button
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Article from "Modules//article/components/article/Article";
import { mapActions, mapState } from "vuex";

export default {
    /**
     * Component name
     */
    name: 'Home',

    /**
     * Components.
     */
    components: { Article },
    /**
     * Computed props
     */
    computed: {
        /**
         * Map state
         */
        ...mapState('article', [
            'clients',
        ]),
    },

    /**
     * Methods.
     */
    methods: {
        /**
         * Impersonate user
         */
        ...mapActions('article', [
            'clientList',
        ]),

        /*
       Logs the user out.
     */
        article() {
            const testData = this.clientList();
            console.log(testData);
            //window.location = '/logout';
        },

        onClick(){
            this.clientList();

            console.log(this.clients)
        }
    },
}
</script>
