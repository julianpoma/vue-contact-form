<template>
    <div class="columns">
        <div class="column is-8 is-offset-2">
            <h1 class="title">Contact detail</h1>
            <div class="box">
                <table class="table is-hoverable is-fullwidth">
                    <tr>
                        <th width="30%">Name</th>
                        <td>{{model.name}}</td>
                    </tr>
                    <tr>
                        <th>Read</th>
                        <td>
                            <span class="icon is-size-4 cursor-pointer" :class="[ model.is_read ? 'has-text-success': 'has-text-grey-lighter']" @click="togglIsRead">
                                <i class="fas fa-check-circle"></i>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>Personal ID</th>
                        <td>{{model.dni}}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>{{model.address}}</td>
                    </tr>
                    <tr>
                        <th>Address detail</th>
                        <td>{{model.address_detail}}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>{{model.phone}}</td>
                    </tr>
                    <tr>
                        <th>Alternative phone</th>
                        <td>{{model.phone2}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{model.email}}</td>
                    </tr>
                    <tr>
                        <th>Selected data plan</th>
                        <td>{{model.data_plan}}</td>
                    </tr>
                    <tr>
                        <th>Aditional information</th>
                        <td>{{model.notes}}</td>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <td>{{model.created_at}}</td>
                    </tr>
                </table>
                <button class="button is-primary is-rounded" @click="goBack()">Go back</button>
            </div>
        </div>

        <notification color="is-danger" :show="shownotif" @close="shownotif = !shownotif">
            Oops. Something went wrong!
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
            this.url = '/api/contact/' + this.$route.params.id;
            this.fetchData();  
        },
        methods: {
            fetchData() {
                axios.get(this.url).then(response => this.model = response.data);
            },
            togglIsRead() {
                axios.post(this.url + '/togglread', {})
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