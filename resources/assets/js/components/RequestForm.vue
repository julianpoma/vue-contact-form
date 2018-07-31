<template>

    <section>
        <div class="columns is-centered">
            <div class="column is-half">
                <form class="box form max" @submit.prevent="formSubmit" @keydown="errors.clear($event.target.name)">
                    <div class="field">
                        <label class="label">Nombre</label>
                        <input type="text" class="input" name="name" v-model="formdata.name">
                        <span class="help is-danger" v-text="errors.get('name')" v-if="errors.has('name')"></span>
                    </div>

                    <div class="field">
                        <label class="label">Apellido</label>
                        <input type="text" class="input" name="surname" v-model="formdata.surname">
                        <span class="help is-danger" v-text="errors.get('surname')" v-if="errors.has('surname')"></span>
                    </div>

                    <div class="field">
                        <label class="label">Documento (DNI)</label>
                        <input type="number" class="input" name="dni" v-model="formdata.dni">
                        <span class="help is-danger" v-text="errors.get('dni')" v-if="errors.has('dni')"></span>
                    </div>

                    <div class="field">
                        <label class="label">Dirección completa</label>
                        <input type="text" class="input" name="address" v-model="formdata.address" placeholder="Alsina 997, Rosario">
                        <span class="help is-danger" v-text="errors.get('address')" v-if="errors.has('address')"></span>
                    </div>

                    <div class="field">
                        <label class="label">Piso / Dpto / Casa</label>
                        <input type="text" class="input" name="address_detail" v-model="formdata.address_detail">
                        <span class="help is-danger" v-text="errors.get('address_detail')" v-if="errors.has('address_detail')"></span>
                    </div>

                    <div class="field">
                        <label class="label">Celular</label>
                        <input type="text" class="input" name="phone" v-model="formdata.phone" placeholder="0341-">
                        <span class="help is-danger" v-text="errors.get('phone')" v-if="errors.has('phone')"></span>
                    </div>
                    
                    <div class="field">
                        <label class="label">Teléfono alternativo</label>
                        <input type="text" class="input" name="phone2" v-model="formdata.phone2">
                        <span class="help is-danger" v-text="errors.get('phone2')" v-if="errors.has('phone2')"></span>
                    </div>

                    <div class="field">
                        <label class="label">Correo</label>
                        <input type="email" class="input" name="email" v-model="formdata.email" placeholder="example@lincon.com">
                        <span class="help is-danger" v-text="errors.get('email')" v-if="errors.has('email')"></span>
                    </div>

                    <div class="field">
                        <label class="label">Plan a contratar</label>
                        <div class="select is-fullwidth">
                            <select name="data_plan" v-model="formdata.data_plan" @click="errors.clear('data_plan')">
                                <option v-for="plan in data_plans" v-bind:key="plan.name">{{plan.name}}</option>
                            </select>
                        </div>
                        <span class="help is-danger" v-text="errors.get('data_plan')" v-if="errors.has('data_plan')"></span>
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
                        <span class="help is-danger" v-text="errors.get('notes')" v-if="errors.has('notes')"></span>
                    </div>

                    <div class="field">
                        <label class="checkbox">
                            <input type="checkbox" name="terms" v-model="formdata.terms" @click="errors.clear('terms')">
                            He leido y acepto <a @click="modalshow = !modalshow">todos los terminos y condiciones</a>
                        </label>
                        <span class="help is-danger" v-text="errors.get('terms')" v-if="errors.has('terms')"></span>
                    </div>

                    <br>
                    <div class="buttons is-centered">
                        <button class="button is-primary" :disabled="errors.any()">ENVIAR SOLICITUD</button>
                    </div>

                </form>
            </div>
        </div>
        
        <div class="notification position" :class="[{ 'is-danger': notification.err }, 'is-success']" v-if="notification.show">
            <button class="delete" @click="notification.show = !notification.show"></button>
            {{notification.message}}
        </div>

        <modal :show="modalshow" @close="modalshow = false"></modal>

    </section>

</template>

<script>
    import Errors from '../classes/Errors.js';
    import Modal from './Modal.vue';

    export default {
        components: { Modal },
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

                errors: new Errors(),

                modalshow: false,

                data_plans: [],

                notification: {
                    message: '',
                    show: false,
                    err: false,
                }
            }
        }, 

        mounted() {
            axios.get('/api/form/getdataplans').then(response => {
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
                axios.post('/api/form/create', this.$data.formdata)
                .then(response => {
                    this.notification.message = response.data.message;
                    this.notification.show = true;
                    this.notification.err = false;
                    this.clearForm();
                })
                .catch(err => {
                    this.errors.record(err.response.data.errors);
                    this.notification.message = 'Ha ocurrido un error al intentar enviar su solicitud';
                    this.notification.show = true;
                    this.notification.err = true;
                });
            },
            clearForm() {
                this.formdata.name = '';
                this.formdata.surname = '';
                this.formdata.dni = '';
                this.formdata.address = '';
                this.formdata.address_detail = '';
                this.formdata.phone = '';
                this.formdata.phone2 = '';
                this.formdata.email = '';
                this.formdata.data_plan = '';
                this.formdata.notes = '';
                this.formdata.terms = false;
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
    .position {
        position: fixed;
        bottom: 15px;
        right: 15px;
        width: 275px;
    }
</style>