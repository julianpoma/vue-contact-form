<template>

    <div class="notification position" :class="this.color" v-if="show">
        <button class="delete" @click="$emit('close')"></button>
        <slot></slot>
    </div>

</template>

<script>
    export default {
        props: ['color', 'show']
    }
</script>

<style>
    .position {
        position: fixed;
        bottom: 75px;
        right: 15px;
        width: 275px;
    }
</style>
