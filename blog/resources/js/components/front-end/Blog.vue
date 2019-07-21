<template>
    <span>

      <section id="content">
      <div class="container">
        <div class="row">
          <div class="span8">

            <article v-for="post in receivedPosts">
              <div class="row">
                <div class="span8">
                  <div class="post-image">
                    <div class="post-heading">
                      <h3><a href="#">{{post.post_title}}  </a></h3>
                    </div>
                    <img :src="post.post_image" alt=""/>
                  </div>
                  <p v-html="post.post_description">
                  </p>
                  <div class="bottom-article">
                    <ul class="meta-post">
                      <li><i class="icon-calendar"></i><a href="#"> {{post.created_at}}</a></li>
                      <li v-if="post.user"><i class="icon-user"></i><a href="#"> {{post.user.name}}</a></li>
                      <li v-if="post.category"><i class="icon-folder-open"></i><a href="#"> {{post.category.category_name}}</a></li>
                      <li><i class="icon-comments"></i><a href="#">4 Comments</a></li>
                    </ul>
                    <router-link :to="{path:'/single/post/'+post.id}" class="pull-right">Continue reading <i
                            class="icon-angle-right"></i></router-link>
                  </div>
                </div>
              </div>
            </article>

            <div id="pagination">
              <span class="all">Page 1 of 3</span>
              <span class="current">1</span>
              <a href="#" class="inactive">2</a>
              <a href="#" class="inactive">3</a>
            </div>
          </div>
          <div class="span4">
            <RightSideBar></RightSideBar>
          </div>
        </div>
      </div>
    </section>
    </span>
</template>

<script>
    import RightSideBar from './RightSideBar'

    export default {
        name: "Blog",
        components: {RightSideBar},

        mounted() {
            this.$store.dispatch('callingToAllBlogPost')
          //this.getCategoryPost()
        },

        computed: {
            receivedPosts() {
                return this.$store.getters.getAllBlogPost
            }
        },
        methods: {
            getCategoryPost() {
                if (this.$route.params.id == null) {
                    this.$store.dispatch('callingToAllBlogPost')
                } else
                    this.$store.dispatch('blogPostByCategory', this.$route.params.id)
            }
        },
        watch: {
            $route(to, from) {
                this.getCategoryPost()
            }
        }
        // created() {
        //   this.$store.dispatch('blogPostByCategory',this.$route.params.id)
        // }
    }
</script>

<style scoped>

</style>