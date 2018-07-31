<template>
    <div class="modal" :class="{'is-active': show}">
        <div class="modal-background" @click="$emit('close')"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Terminos y condiciones del servicio.</p>
            </header>
            <section class="modal-card-body">
                <ol style="padding:20px 20px">
                    <li>El servicio está sujeto a disponibilidad técnica y geográfica, determinado al momento de la instalación. Para más información por favor contáctenos en nuestras oficinas.</li>
                    <li>El contrato de suscripción al servicio tiene un periodo mínimo de vigencia de 6 meses.</li>
                    <li>Los equipos para la prestación del servicio son entregados a modo de comodato – excluye Router WiFi. El abonado es responsable del cuidado y devolución del mismo en perfecto estado a la finalización del contrato. En caso de robo, perdida, destrucción o cualquier otra causa, será responsabilidad del abonado la restitución del equipo o su equivalente económico.</li>
                    <li>Nuestro personal no realiza soporte técnico sobre los routers, computadoras o cualquier dispositivo del abonado, en caso de desconfiguración, mal uso o cualquier inconveniente. Sin embargo, están a disposición del abonado guías de configuración.</li>
                    <li>El costo definido para la instalación es estándar y puede variar según la complejidad de la misma.</li>
                    <li>Una vez enviado los datos, se presume el compromiso de contratación de servicio.</li>
                    <li>Nuestros asistentes se contactaran con usted dentro de los próximos 5 días hábiles, desde el envío de la solicitud.</li>
                </ol>
            </section>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['show'],
        
    }
</script>
