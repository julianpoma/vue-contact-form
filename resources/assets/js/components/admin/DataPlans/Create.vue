<template>
    <div class="columns">
        <div class="column is-8 is-offset-2">
            <h1 class="title">Crear</h1>

            <div class="box">
                <form action="">
                    <div class="field">
                        <label class="label">Nombre</label>
                        <div class="control">
                            <input class="input" type="text" v-model="name" required>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Precio</label>
                        <div class="field has-addons">
                            <p class="control"><a class="button is-static">$</a></p>
                            <p class="control is-expanded">
                                <input class="input" type="number" min=0 step=0.01 v-model="price" required>
                            </p>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Costo de instalación</label>
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
                            <a class="button is-primary is-rounded" @click="createDataPlan">Cargar</a>
                        </p>
                        <p class="control">
                            <a class="button is-light is-rounded" @click="goBack">Calcelar</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import router from '../../../routes';
    export default {
        data() {
            return {
                name: '',
                price: '',
                setup_price: '',
            }
        },
        methods: {
            createDataPlan() {
                axios.post('/api/dataplans/create', this.$data)
                    .then(response => {
                        this.goBack();
                    })
                    .catch(err => console.log(err));
            },
            goBack() {
                router.go(-1);
            }
        }
    }
</script>