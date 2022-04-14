<template>
    <div class="card mb-3" style="width: 18rem;">
        <div class="card-body">
            <img class="card-img-top" :src="image" alt="Card image cap">
            <h5 class="card-title">{{title}}</h5>
            <p class="card-text">{{content}}</p>
            <router-link class="card-link" :to="{name: 'singlePost', params: {slug: slug}}">Vai a {{title}}</router-link>
        </div>
    </div>
</template>

<script>
export default {
    name: 'PostCard',
    props: {
        'title' : String,
        'content' : String,
        'slug' : String,
        'image' : String
    }
}
</script>

<style>
    .card-text {
        max-height: 90px;
        overflow: hidden;
    }
</style>