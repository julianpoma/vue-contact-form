<template>
    <div class="columns">
        <div class="column is-8 is-offset-2">
            <div class="columns">
                <div class="column is-8">
                    <h1 class="title">Planes de datos</h1>
                </div>
                <div class="column is-4 has-text-right">
                    <router-link :to="{name: 'dataplans-create'}">
                        <button class="button is-primary is-rounded">Crear</button>
                    </router-link>
                </div>
            </div>

            <div class="box">
                <table class="table is-hoverable is-fullwidth data-table">
                    <thead>
                        <th v-for="col in columns" :key="col">{{col}}</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <tr v-for="row in model" :key="row.id">
                            <td>{{row.name}}</td>
                            <td>${{row.price}}</td>
                            <td>${{row.setup_price}}</td>
                            <td>
                                <router-link :to="{ name:'dataplans-edit', params:{ id: row.id }}">
                                    <span class="icon has-text-grey-lighter">
                                        <i class="fas fa-edit"></i>
                                    </span>
                                </router-link>
                                
                                <span class="icon has-text-grey-lighter cursor-pointer" @click="deletePlan(row.id)">
                                    <i class="fas fa-trash-alt"></i>
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
        </div>

        <notification color="is-danger" :show="shownotif" @close="shownotif = !shownotif">
            ¡Ha ocurrido un error!
        </notification>
    </div>
</template>

<script>
    import Notification from '../Shared/Notification.vue';

    export default {
        components: { Notification },
        data() {
            return {
                model: '',
                columns: '',
                shownotif: false,
            }
        },
        mounted() {
            this.fetchData();
        },
        methods: {
            fetchData() {
                axios.get('/api/dataplans')
                    .then(response => {
                        this.model = response.data.model;
                        this.columns = response.data.columns;
                    })
                    .catch(err => {
                        this.shownotif = true;
                    });
            },
            deletePlan(id) {
                if(confirm("Esta seguro?"))
                {
                    axios.delete('/api/dataplans/' + id)
                        .then(response => {
                            this.fetchData();
                        })
                        .catch(err => {
                            this.shownotif = true;
                        });
                }
            }
        }
    }
</script>

<style>
    .cursor-pointer {
        cursor: pointer;
    }
</style>