<template>
    <div class="columns">
        <div class="column is-10 is-offset-1">
            <h1 class="title">Solicitudes de servicio</h1>

            <div class="dt-tools">
                <div class="columns">
                    <div class="column is-4">
                        <div class="field has-addons">
                            <div class="control is-expanded">
                                <input class="input" type="text" placeholder="Buscar por nombre, dirección o telefono" v-model="tableData.search" @keydown.enter="fetchData(this.source)">
                            </div>
                            <div class="control">
                                <button class="button is-primary" :class="[ searching ? 'is-loading' : '']" @click="search()" >Buscar</button>
                            </div>
                        </div>
                        <label class="checkbox dt-filter">
                            <input type="checkbox" v-model="tableData.all"> Mostrar todas las solicitudes
                        </label>
                    </div>
                </div>               
            </div>
            <br>
            <div class="box">
                <table class="table is-hoverable is-fullwidth data-table">
                    <thead>
                        <th v-for="col in columns" :key="col">{{col}}</th>
                        <th></th>
                    </thead>

                    <tbody>
                        <tr v-for="row in model.data" :key="row.id">
                            <td>{{row.name}}</td>
                            <td>{{row.address}}</td>
                            <td>{{row.phone}}</td>
                            <td>{{row.data_plan}}</td>
                            <td width="120px">{{row.created_at}}</td>
                            <td class="has-text-right" width="100px">
                                <span class="icon is-size-4" :class="[ row.check ? 'has-text-success': 'has-text-light']">
                                    <i class="fas fa-check-circle"></i>
                                </span>

                                <span class="icon has-text-primary is-size-5">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <pagination :pagination="pagination"
                    @prev="fetchData(pagination.prevPageUrl)"
                    @next="fetchData(pagination.nextPageUrl)">
                </pagination>
            </div>
            
        </div>
    </div>
</template>

<script>
    import Pagination from '../Datatables/Pagination.vue'
    export default {
        props: ['source'],
        components: { pagination: Pagination },
        data() {
            return {
                model: '',
                columns: '',
                searching: 1,
                tableData: {
                    all: false,
                    search: '', 
                },
                pagination: {
                    lastPage: '',
                    currentPage: '',
                    total: '',
                    lastPageUrl: '',
                    nextPageUrl: '',
                    prevPageUrl: '',
                    from: '',
                    to: ''
                },
            }
        },
        mounted() {
            this.fetchData();
        },
        methods: {
            fetchData(url = this.source) {
                axios.get(url, {params: this.tableData})
                    .then(response => {
                        this.model = response.data.model;
                        this.columns = response.data.columns;
                        this.configPagination(response.data.model);
                        this.searching = 0;
                    })
                    .catch(err => console.log(err));
            },
            search() {
                this.searching = 1;
                this.fetchData(this.source);
            },
            configPagination(data) {
                this.pagination.lastPage = data.last_page;
                this.pagination.currentPage = data.current_page;
                this.pagination.total = data.total;
                this.pagination.lastPageUrl = data.last_page_url;
                this.pagination.nextPageUrl = data.next_page_url;
                this.pagination.prevPageUrl = data.prev_page_url;
                this.pagination.from = data.from;
                this.pagination.to = data.to;
            },
        }
    }
</script>

<style>

</style>