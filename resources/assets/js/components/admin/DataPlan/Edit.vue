<template>
    <div class="columns">
        <div class="column is-8 is-offset-2">
            <h1 class="title">Edit</h1>

            <div class="box">
                <form action="">
                    <div class="field">
                        <label class="label">Name</label>
                        <div class="control">
                            <input class="input" type="text" v-model="name" required>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Price</label>
                        <div class="field has-addons">
                            <p class="control"><a class="button is-static">$</a></p>
                            <p class="control is-expanded">
                                <input class="input" type="number" min=0 step=0.01 v-model="price" required>
                            </p>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Setup price</label>
                        <div class="field has-addons">
                            <p class="control"><a class="button is-static">$</a></p>
                            <p class="control is-expanded">
                                <input class="input" type="number" min=0 step=0.01 v-model="setup_price" required>
                            </p>
                        </div>
                    </div>


                    <br>
                    <div class="field is-grouped">
                        <p class="control">
                            <a class="button is-primary is-rounded" @click="editDataPlan">Edit</a>
                        </p>
                        <p class="control">
                            <a class="button is-light is-rounded" @click="goBack">Cancel</a>
                        </p>
                    </div>
                </form>
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
                id: '',
                name: '',
                price: '',
                setup_price: '',
                shownotif: false,
            }
        },
        mounted() {
            this.fetchData();
        },
        methods: {
            fetchData() {
                axios.get('/api/dataplan/' + this.$route.params.id)
                    .then(response => {
                        this.id = response.data.id;
                        this.name = response.data.name;
                        this.price = response.data.price;
                        this.setup_price = response.data.setup_price;
                    })
                    .catch(err => {
                        this.shownotif = true;
                    })
            },
            editDataPlan() {
                axios.patch('/api/dataplan/' + this.id + '/edit', this.$data)
                    .then(response => {
                        this.goBack();
                    })
                    .catch(err => {
                        this.shownotif = true;
                    })
            },
            goBack() {
                router.go(-1);
            }
        }
    }
</script>