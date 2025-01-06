import { createRouter, createWebHistory } from 'vue-router';
import PostList from './components/PostList.vue';
import PostDetail from './components/PostDetail.vue';

const routes = [
    {
        path: '/',
        name: 'home',
        component: PostList
    },
    {
        path: '/posts/:id',
        name: 'post-detail',
        component: PostDetail
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;