<template>
    <nav class="pagination is-rounded is-centered" role="navigation" aria-label="pagination">
        <a class="pagination-previous" @click="$emit('prev')">Previous</a>
        <a class="pagination-next" @click="$emit('next')">Next</a>
        <p class="pagination-list">Showing {{pagination.from}} - {{pagination.to}} rows of {{pagination.total}}</p>
    </nav>
</template>

<script>
    export default {
        props: ['pagination']
    }
</script>