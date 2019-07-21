import Vue from 'vue'
import Router from 'vue-router'
import ExampleComponent from '../components/ExampleComponent'
import StarterPage from '../components/router-view-pages/StarterPage'
import AddCategory from '../components/router-view-pages/category/AddCategory'
import ManageCategory from '../components/router-view-pages/category/ManageCategory'
import EditCategoryPage from '../components/router-view-pages/category/EditCategoryPage'

import AddPost from '../components/router-view-pages/post/AddPost'
import EditPost from '../components/router-view-pages/post/EditPost'
import ManagePost from '../components/router-view-pages/post/ManagePost'
import Home from '../components/front-end/Home'
import Blog from '../components/front-end/Blog'
import SinglePost from '../components/front-end/SinglePost'

Vue.use(Router);

export default new Router({
    routes: [
        {
            path: '/home',
            name: 'Starter Page',
            component: StarterPage
        },
        {
            path: '/cat',
            name: 'Starter Page',
            component: ExampleComponent
        },
        {
            path: '/add-category',
            name: 'Add Category',
            component: AddCategory
        }, {
            path: '/manage-category',
            name: 'Manage Category',
            component: ManageCategory
        },
        {
            path: '/category/edit/:id',
            name: 'Edit Category',
            component: EditCategoryPage
        },
        {
            path: '/post/edit/:id',
            name: 'Edit Post',
            component: EditPost
        },
        {
            path: '/post/manage',
            name: 'Manage Post',
            component: ManagePost
        },
        {
            path: '/post/add',
            name: 'Manage Post',
            component: AddPost
        },
        {
            path: '/',
            name: 'Home',
            component: Home
        },
        {
            path: '/blog',
            name: 'Blog',
            component: Blog
        },
        {
            path: '/single/post/:id',
            name: 'SinglePost',
            component: SinglePost
        },
        {
            path: '/category-post/:id',
            name: 'CategoryBlog',
            component: Blog
        },

    ],
    mode: 'hash'

});