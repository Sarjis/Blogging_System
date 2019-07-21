<template>
    <span>
        <aside class="right-sidebar">
              <div class="widget">
                <form class="form-search">
                  <input @keyup="searchMethod" v-model="search" placeholder="Type something" type="text"
                         class="input-medium search-query">
                  <button @click.prevent="searchMethod" type="submit" class="btn btn-square btn-theme">Search</button>
                </form>
              </div>
              <div class="widget">
                <h5 class="widgetheading">Categories</h5>
                <ul class="cat">
                  <li v-for="(category,i) in categories"><i class="icon-angle-right"></i><router-link
                          :to="{path:'/category-post/'+category.id}">{{category.category_name}}</router-link><span> (20)</span></li>
                </ul>
              </div>
              <div class="widget">
                <h5 class="widgetheading">Latest posts</h5>
                <ul class="recent">
                  <router-link v-for="(post,i) in receivedPosts" v-if="i<5" :to="{path:'/single/post/'+post.id}">
                      <li>
                    <h6><a href="#">{{post.post_title | shortLength(20,'...')}}</a></h6>
                    <p v-html="post.post_description">
                    </p>
                  </li>
                  </router-link>
                </ul>
              </div>
              <div class="widget">
                <h5 class="widgetheading">Popular tags</h5>
                <ul class="tags">
                  <li><a href="#">Web design</a></li>
                  <li><a href="#">Trends</a></li>
                  <li><a href="#">Technology</a></li>
                  <li><a href="#">Internet</a></li>
                  <li><a href="#">Tutorial</a></li>
                  <li><a href="#">Development</a></li>
                </ul>
              </div>
            </aside>
    </span>
</template>

<script>
    import _ from 'lodash'

    export default {
        name: "RightSideBar",
        data() {
            return {
                search: ''
            }
        },
        mounted() {
            this.$store.dispatch('callingToAllBlogPost');
            this.$store.dispatch('allCategoryFront')
        },
        computed: {
            categories() {

                return this.$store.getters.getCategoryNameFront
            },
            receivedPosts() {
                return this.$store.getters.getAllBlogPost
            }
        },
        methods: {
            searchMethod: _.debounce(function () {
                this.$store.dispatch('search', this.search)
            }, 1000)

        }
    }
</script>

<style scoped>

</style>