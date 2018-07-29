<template>
    <section>
        <div class="columns is-centered">
            <div class="column is-half">
                <form class="box form max" @submit.prevent="formSubmit">
                    <div class="field">
                        <label class="label">Nombre</label>
                        <div class="control">
                            <input type="text" class="input" name="name" v-model="formdata.name">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Apellido</label>
                        <div class="control">
                            <input type="text" class="input" name="surname" v-model="formdata.surname">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Documento (DNI)</label>
                        <div class="control">
                            <input type="number" class="input" name="dni" v-model="formdata.dni">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Dirección completa</label>
                        <input type="text" class="input" name="address" v-model="formdata.address" placeholder="Alsina 997, Rosario">
                    </div>
                    <div class="field">
                        <label class="label">Piso / Dpto / Casa</label>
                        <input type="text" class="input" name="address_detail" v-model="formdata.address_detail">
                    </div>
                    <div class="field">
                        <label class="label">Celular</label>
                        <input type="text" class="input" name="phone" v-model="formdata.phone" placeholder="0341-">
                    </div>
                    <div class="field">
                        <label class="label">Teléfono alternativo</label>
                        <input type="text" class="input" name="phone2" v-model="formdata.phone2">
                    </div>
                    <div class="field">
                        <label class="label">Correo</label>
                        <input type="email" class="input" name="email" v-model="formdata.email" placeholder="example@lincon.com">
                    </div>
                    <div class="field">
                        <label class="label">Plan a contratar</label>
                        <div class="select is-fullwidth">
                            <select name="data_plan" v-model="formdata.data_plan">
                                <option v-for="plan in data_plans" v-bind:key="plan.name">{{plan.name}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="field" v-if="formdata.data_plan">
                        <div class="notification is-primary">
                            Costo de instalación: <strong>${{dataplan_setup_price}}</strong> -
                            Abono mensual: <strong>${{dataplan_price}}</strong>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Comentarios</label>
                        <textarea class="textarea" name="notes" v-model="formdata.notes"></textarea>
                    </div>
                    <div class="field">
                        <label class="checkbox">
                        <input type="checkbox" name="terms" v-model="formdata.terms">
                            He leido y acepto <a href="#">todos los terminos y condiciones</a>
                        </label>
                    </div>
                    <br>
                    <div class="buttons is-centered">
                        <button class="button is-primary">ENVIAR SOLICITUD</button>
                    </div>

                </form>
            </div>
        </div>
        <div class="notification notif-position" :class="[{ 'is-danger': notification.error }, 'is-success']" v-if="notification.show">
            <button class="delete" @click="notification.show = !notification.show"></button>
            {{notification.message}}
        </div>
    </section>
</template>

<script>
    export default {
        data() {
            return {
                formdata: {
                    name: '',
                    surname: '',
                    dni: '',
                    address: '',
                    address_detail: '',
                    phone: '',
                    phone2: '',
                    email: '',
                    data_plan: '',
                    notes: '',
                    terms: false,
                },
                data_plans: [],
                notification: {
                    message: '',
                    show: false,
                    error: false,
                }

            }
        }, 
        mounted() {
            axios.get('dataplans/basic').then(response => {
                this.data_plans = response.data;
            });
        },
        computed: {
            dataplan_setup_price() {
                let d = this.data_plans.find(p => {return p.name == this.formdata.data_plan});
                if (typeof(d) != "undefined") return d.setup_price
            },
            dataplan_price() {
                let d = this.data_plans.find(p => {return p.name == this.formdata.data_plan});
                if (typeof(d) != "undefined") return d.price
            }
        },
        methods: {
            formSubmit() {
                if(this.formdata.terms)
                {
                    axios.post('servicerequest/create', this.$data.formdata)
                    .then(response => {
                        this.notification.message = response.data.message;
                        this.notification.show = true;
                        this.notification.error = false;
                    })
                    .catch(error => {
                        this.notification.show = true;
                        this.notification.message = 'Ha ocurrido un error al intentar enviar su solicitud. Intente nuevamente.';
                        this.notification.error = true;
                    })
                }
                else 
                {
                    this.notification.show = true;
                    this.notification.message = 'Debe aceptar los terminos y condiciones.';
                    this.notification.error = true;
                }
            }
        }
    }
</script>

<style>
    .max {
        max-width: 600px;
        margin: auto auto;
    }
    .form {
        margin-top: -110px;
    }
    @media screen and (max-width: 769px), print {
        .form {
            margin-top: 38px;
        }
    }
    .notif-position {
        position: fixed;
        bottom: 15px;
        right: 15px;
        width: 275px;
    }
</style>