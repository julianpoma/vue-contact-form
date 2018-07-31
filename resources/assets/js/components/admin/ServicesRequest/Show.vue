<template>
    <div class="columns">
        <div class="column is-8 is-offset-2">
            <h1 class="title">Detalle</h1>
            <div class="box">
                <table class="table is-hoverable is-fullwidth">
                    <tr>
                        <th width="30%">Nombre</th>
                        <td>{{model.name}}</td>
                    </tr>
                    <tr>
                        <th>Visto</th>
                        <td>
                            <span class="icon is-size-4 cursor-pointer" :class="[ model.check ? 'has-text-success': 'has-text-light']" @click="togglCheckRow">
                                <i class="fas fa-check-circle"></i>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>DNI</th>
                        <td>{{model.dni}}</td>
                    </tr>
                    <tr>
                        <th>Dirección</th>
                        <td>{{model.address}}</td>
                    </tr>
                    <tr>
                        <th>Casa / Dpto</th>
                        <td>{{model.address_detail}}</td>
                    </tr>
                    <tr>
                        <th>Teléfono</th>
                        <td>{{model.phone}}</td>
                    </tr>
                    <tr>
                        <th>Teléfono alternativo</th>
                        <td>{{model.phone2}}</td>
                    </tr>
                    <tr>
                        <th>Correo electrónico</th>
                        <td>{{model.email}}</td>
                    </tr>
                    <tr>
                        <th>Plan de datos</th>
                        <td>{{model.data_plan}}</td>
                    </tr>
                    <tr>
                        <th>Comentarios</th>
                        <td>{{model.notes}}</td>
                    </tr>
                    <tr>
                        <th>Fecha de solicitud</th>
                        <td>{{model.created_at}}</td>
                    </tr>
                </table>
            <button class="button is-primary is-rounded" @click="goBack()">Volver atrás</button>
            </div>
        </div>

        <notification color="is-danger" :show="shownotif" @close="shownotif = !shownotif">
            ¡Ha ocurrido un error!
        </notification>

    </div>
</template>

<script>
    import router from '../../../routes';
    import Notification from '../Shared/Notification.vue';

    export default {
        components: { Notification },
        data() {
            return {
                model: '',
                url: '',
                shownotif: false,
            }
        },
        mounted() {
            this.url = '/api/servicerequests/' + this.$route.params.id;
            this.fetchData();  
        },
        methods: {
            fetchData() {
                axios.get(this.url).then(response => this.model = response.data);
            },
            togglCheckRow() {
                axios.post(this.url + '/toggl', {})
                    .then(resp => this.fetchData())
                    .catch(err => {
                        this.shownotif = true;
                    });
            },
            goBack() {
                router.go(-1);
            }
        }
    }
</script>

<style>
    .cursor-pointer {
        cursor: pointer;
    }
</style>