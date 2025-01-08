<template>
    <div>
        <h2>{{ post.title }}</h2>
        <p>{{ post.body }}</p>
        <router-link to="/">Kembali ke Daftar Post</router-link>
    </div>
</template>

<script>
export default {
    data() {
        return {
            post: {}
        };
    },
    mounted() {
        this.fetchPost();
    },
    methods: {
        async fetchPost() {
            const postId = this.$route.params.id;
            try {
                const response = await fetch(`/api/posts/${postId}`);
                this.post = await response.json();
            } catch (error) {
                console.error('Error fetching post:', error);
            }
        }
    }
};
</script>

<style scoped>
/* Tambahkan gaya CSS sesuai kebutuhan */
</style>