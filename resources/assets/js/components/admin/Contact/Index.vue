<template>
    <div class="columns">
        <div class="column is-8 is-offset-2">
            <h1 class="title">Solicitudes de servicio</h1>

            <div class="dt-tools">
                <div class="columns">
                    <div class="column is-5">
                        <div class="field has-addons">
                            <div class="control is-expanded">
                                <input class="input is-rounded" type="text" placeholder="Buscar por nombre, dirección o teléfono" v-model="tableData.search" @keydown.enter="fetchData(this.source)">
                            </div>
                            <div class="control">
                                <button class="button is-primary is-rounded" :class="[ searching ? 'is-loading' : '']" @click="search()" >Buscar</button>
                            </div>
                        </div>
                        <label class="checkbox dt-filter">
                            <input type="checkbox" v-model="tableData.all"> Mostrar todas las solicitudes
                        </label>
                    </div>
                </div>               
            </div><br>

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
                            <td class="has-text-right" width="120px">
                                <span class="icon is-size-5 cursor-pointer" :class="[ row.is_read ? 'has-text-success': 'has-text-grey-lighter']" @click="togglIsRead(row.id)">
                                    <i class="fas fa-check-circle"></i>
                                </span>

                                <router-link :to="{name:'contact-show', params:{ id: row.id }}">
                                    <span class="icon has-text-grey-lighter is-size-5 cursor-pointer">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </router-link>

                                <span class="icon has-text-grey-lighter cursor-pointer" @click="deleteContact(row.id)">
                                    <i class="fas fa-trash-alt"></i>
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
    import Pagination from '../Shared/Pagination.vue'
    export default {
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
                source: '/api/contacts',
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
                this.fetchData();
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
            togglIsRead(id) {
                let url = '/api/contact/' + id + '/togglread';
                this.searching = 1;

                axios.post(url, {})
                    .then(resp => this.fetchData())
                    .catch(err => console.log(err));
            },
            deleteContact(id) {
                if(confirm("Esta seguro?"))
                {
                    axios.delete('/api/contact/' + id)
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