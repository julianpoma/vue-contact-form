<template>
    <div class="modal" :class="{'is-active': show}">
        <div class="modal-background" @click="$emit('close')"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Terms and conditions.</p>
            </header>
            <section class="modal-card-body">
                <ol style="padding:20px 20px">
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel cumque, consequuntur amet officia, alias ab beatae reprehenderit modi ipsum iure soluta voluptate illum explicabo labore quibusdam rem. Ea, debitis perferendis.</li>
                    <li>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed nulla consequuntur blanditiis odio minus a, consequatur accusantium eos tempora, recusandae aut error, incidunt perspiciatis unde quisquam quae sequi doloremque illo!</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum vero dolores ipsum et ullam nostrum ab eaque accusantium cupiditate reprehenderit maxime minima sequi, ad laborum deleniti dolorum reiciendis error praesentium!</li>
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
