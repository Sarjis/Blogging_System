<template>
    <div class="row justify-content-around">
        <div class="col-md-12 col-lg-12">
            <!-- Horizontal Form -->
            <div class="well">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Manage category Form</h3>
                        <router-link :to="{path:'/add-category'}" class="btn btn-success">Add Category</router-link>
                    </div>
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Date</th>
                            <th scope="col">Actions</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(category,i) in categories" :key="category.id">
                            <th scope="row">{{++i}}</th>
                            <td>{{category.category_name}}</td>
                            <td>{{category.created_at | timeFormattedFromAppJs}}</td>
                            <td>
                                <a href="" @click.prevent="publishCategory(category.id)" class="btn btn-info btn-xs"
                                   title="Published">
                                    <span class="glyphicon glyphicon-arrow-up">Publish</span>
                                </a>

                                <a href="" @click.prevent="unPublishCategory" class="btn btn-warning btn-xs"
                                   title="Un-Published">
                                    <span class="glyphicon glyphicon-arrow-down">Unpublish</span>
                                </a>

                                <router-link :to="{path:'/category/edit/'+category.id}" class="btn btn-success btn-xs">
                                    <span class="glyphicon glyphicon-edit">Edit</span>
                                </router-link>
                                <a href="" @click.prevent="deleteCategory(category.id)" class="btn btn-danger btn-xs" >
                                    <span  class="glyphicon glyphicon-trash">Delete</span>
                                </a>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    import Swal from 'sweetalert2'
    export default {
        name: "ManageCategory",
        data() {
            return {
                //posts: []
            }
        },
        mounted() {
            this.$store.dispatch('allCategory')
        },
        computed: {
            categories() {
                return this.$store.getters.getCategoryName
            }
        },
        methods: {
            publishCategory(id) {
                // axios.get('/category/delete/' + id).then(function (res) {
                //     alert(res.data)
                //})
                //
                alert('Not developed yet')
            },
            unPublishCategory() {
                alert('Not developed yet')
            },
            deleteCategory(id) {
                var self = this
                axios.get('/category/delete/' + id).then(function (res) {
                    //alert(res.data)
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });

                    Toast.fire({
                        type: 'success',
                        title: 'Category Deleted Successfully'
                    });
                    self.$store.dispatch('allCategory')
                })
            }
        }
    }
</script>

<style scoped>

</style>