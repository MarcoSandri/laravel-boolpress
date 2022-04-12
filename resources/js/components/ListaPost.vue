<template>
    <div class="container">
        <h1>Tutti i post</h1>
        <div class="postContainer">
            <PostCard v-for="post in posts" :key="post.id" :title="post.title" :content="post.content"/>
        </div>

        <div class="paginationContainer">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item" :class="(page == 1)? 'disabled' : ''"><a class="page-link" href="#" @click="getPosts(page - 1)">Previous</a></li>
                    <li class="page-item" :class="(page == lastPage)? 'disabled' : ''"><a class="page-link" href="#" @click="getPosts(page + 1)">Next</a></li> 
                </ul>
            </nav>
        </div>
    </div>
</template>

<script>

import PostCard from './PostCard.vue';

export default {
    name: 'ListaPost',
    components: {
        PostCard
    },
    data() {
        return {
            posts : [],
            page : 1,
            lastPage: 0,
        }
    },
    methods: {
        getPosts(pagination) {
            axios.get('/api/posts', {
                'params': {
                    'page' :  pagination
                }
            }).then((response) =>{
                this.page = response.data.data.current_page;
                this.lastPage = response.data.data.last_page;
                this.posts = response.data.data.data;
            });
        }
    },
    created() {
        this.getPosts();
    }
}
</script>

<style>

    .postContainer {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }
    
    .paginationContainer {
        display: flex;
        justify-content: center;
    }

</style>