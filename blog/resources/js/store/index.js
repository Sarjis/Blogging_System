import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        category_name: [],
        posts: [],
        blogPosts: [],
        singlePost: []
    },
    getters: {
        getCategoryName(state) {
            return state.category_name
        },
        getCategoryNameFront(state) {
            return state.category_name
        },
        posts(state) {
            return state.posts
        },
        getAllBlogPost(state) {
            return state.blogPosts
        },
        getPostById(state) {
            return state.singlePost
        },
    },

    mutations: {
        categories(state, data) {
            return state.category_name = data
        },
        allCategoryFront(state, data) {
            return state.category_name = data
        },
        getAllPost(state, payload) {
            return state.posts = payload
        },
        callingToAllBlogPost(state, payload) {
            return state.blogPosts = payload
        },
        getPostById(state, data) {
            return state.singlePost = data
        },
        blogPostByCategory(state, data) {
            return state.blogPosts = data
        },


        search(state, data) {
            return state.blogPosts = data
        },
    },
    actions: {
        allCategory(context) {
            axios.get('/category').then(function (res) {
                //console.log(res.data)
                context.commit('categories', res.data.categories)
            })
        },
        allCategoryFront(context) {
            axios.get('/category/front').then(function (res) {
                //console.log(res.data)
                context.commit('categories', res.data.categories)
            })
        },

        getAllPost(context) {
            axios.get('/post/all').then(function (res) {
                //console.log(res.data.posts)
                context.commit('getAllPost', res.data.posts)
            })
        },
        callingToAllBlogPost(context) {
            axios.get('/blog/posts').then(function (res) {
                //console.log(res.data.blogPosts)
                context.commit('callingToAllBlogPost', res.data.blogPosts)
            })
        },
        getPostById(context, id) {
            axios.get('/single-post/' + id).then(function (res) {
                //console.log(res.data.blogPosts)
                context.commit('getPostById', res.data.post)
            })
        },
        blogPostByCategory(context, id) {
            axios.get('/category-post/' + id).then(function (res) {
                //console.log(res.data.blogPosts)
                context.commit('blogPostByCategory', res.data.posts)
            })
        },
        search(context, item) {
            axios.get('/search?s=' + item).then(function (res) {
                //console.log(res.data.blogPosts)
                context.commit('search', res.data.blogPosts)
            })
        },
    }
});

export default store;
