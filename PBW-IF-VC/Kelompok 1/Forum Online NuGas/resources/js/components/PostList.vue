<template>
    <div>
        <h2>Daftar Post</h2>
        <ul>
            <li v-for="post in posts" :key="post.id">
                <h5>{{ post.title }}</h5>
                <p>{{ post.body }}</p>
                <router-link :to="'/posts/' + post.id">Lihat Selengkapnya</router-link>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            posts: []
        };
    },
    mounted() {
        this.fetchPosts();
    },
    methods: {
        async fetchPosts() {
            try {
                const response = await fetch('/api/posts');
                this.posts = await response.json();
            } catch (error) {
                console.error('Error fetching posts:', error);
            }
        }
    }
};
</script>

<style scoped>
/* Tambahkan gaya CSS sesuai kebutuhan */
</style>