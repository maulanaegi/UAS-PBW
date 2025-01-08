import './bootstrap';
import { createApp } from 'vue';
import router from './router'; // Import router
import PostList from './components/PostList.vue';

const app = createApp({});

app.component('post-list', PostList);

app.use(router); // Gunakan router

app.mount('#app');