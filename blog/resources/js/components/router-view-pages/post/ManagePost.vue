<template>
    <div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Manage Post Form</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered table-responsive">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Cat Name</th>
                        <th>User name</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr  v-for="(post,i) in allPosts" :key="post.id">
                        <td>{{++i}}</td>
                        <td v-if="post.category">{{post.category.category_name | shortLength(10,'...')}}</td>
                        <td v-if="post.user">{{post.user.name | shortLength(10,'...')}}</td>
                        <td>{{post.post_title | shortLength(10,'...')}}</td>
                        <td>{{post.post_description | shortLength(20,'...')}}</td>
                        <td>
                            <img :src="post.post_image" width="50px" height="50px">
                        </td>
                        <td>
                            <router-link :to="{path:'/post/edit/'+post.id}" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-edit">Edit</span>
                            </router-link>
                            <a href="" @click.prevent="deletePost(post.id)" class="btn btn-danger btn-xs">
                                <span class="glyphicon glyphicon-trash">Delete</span>
                            </a>
                        </td>
                    </tr>

                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Rendering engine</th>
                        <th>Browser</th>
                        <th>Platform(s)</th>
                        <th>Engine version</th>
                        <th>CSS grade</th>
                        <th>CSS grade</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</template>

<script>
    import axios from 'axios'
    import Swal from 'sweetalert2'

    export default {
        name: "ManagePost",
        mounted() {
            // var self = this
            // axios.get('/post/all').then(function (res) {
            //     console.log(res.data.posts);
            //     self.posts = res.data.posts
            // })
            this.$store.dispatch('getAllPost')
        },
        data() {
            return {
                //posts: []
            }
        },
        methods: {
            deletePost(id) {
                var self = this
                axios.get('/post/delete/' + id).then(function (res) {
                    //alert('Hi')
                    Swal.fire({
                        position: 'top-end',
                        type: 'success',
                        title: 'Post Deleted Successfully',
                        showConfirmButton: false,
                        timer: 1500
                    });

                    self.$store.dispatch('getAllPost')
                }).catch(function (err) {
                    alert('Error')
                })
            },
        },
        computed: {
            allPosts() {
                return this.$store.getters.posts
            }
        }
    }
</script>

<style scoped>

</style>