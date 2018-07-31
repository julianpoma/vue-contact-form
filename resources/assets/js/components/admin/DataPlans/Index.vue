<template>
    <div class="columns">
        <div class="column is-8 is-offset-2">
            <h1 class="title">Planes de datos</h1>

            <div class="box">
                <table class="table is-hoverable is-fullwidth data-table">
                    <thead>

                    </thead>

                    <tbody>

                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {

}
        },
        mounted() {
            this.fetchData();
        },
        methods: {
            fetchData() {

            },
        }
    }
</script>

<style>
    .cursor-pointer {
        cursor: pointer;
    }
</style>