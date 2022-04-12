<template>
  <div class="container">
      <h1>{{post.title}}</h1>
      <p>{{post.content}}</p>
  </div>
</template>

<script>
export default {
    name: 'SinglePost',
    data() {
        return {
            post : [],
            slug : this.$route.params.slug
        }
    },
    methods: {

        getSinglePost() {
            axios.get(`/api/posts/${this.slug}`)
                .then((response) =>{
                    console.log(response.data.data);
                    this.post = response.data.data;
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