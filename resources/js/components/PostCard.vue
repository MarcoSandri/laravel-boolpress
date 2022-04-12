<template>
    <div class="card mb-3" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{title}}</h5>
            <p class="card-text">{{content}}</p>
            <a href="#" class="card-link">Vai a {{title }}</a>
        </div>
    </div>
</template>

<script>
export default {
    name: 'PostCard',
    props: {
        'title' : String,
        'content' : String
    }
}
</script>

<style>
    .card-text {
        max-height: 90px;
        overflow: hidden;
    }
</style>