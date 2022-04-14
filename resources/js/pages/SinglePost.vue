<template>
  <div class="container">
      <h1>{{post.title}}</h1>
      <h3>{{post.category.name}}</h3>
      <img :src="post.cover" :alt="post.title">
      <p>{{post.content}}</p>
  </div>
</template>

<script>
export default {
    name: 'SinglePost',
    data() {
        return {
            post : null,
            slug : this.$route.params.slug
        }
    },
    methods: {

        getSinglePost() {
            axios.get(`/api/posts/${this.slug}`)
                .then((response) => { 
                    if(!response.data.success) {
                        this.$router.push({name: 'notFound'});
                    } else {
                        console.log(response.data.data);
                        this.post = response.data.data;
                    }
                });
        }
    },
    created() {
        this.getSinglePost();
    }
}
</script>

<style>

</style>