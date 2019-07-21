<template>
    <div class="row justify-content-around">
        <div class="col-md-10">
            <!-- Horizontal Form -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Update category Form</h3>
                </div>

                <form @submit.prevent="updateCategory" class="form-horizontal">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Category Name</label>

                            <div class="col-sm-10">
                                <input v-model="form.category_name"
                                       :class="{ 'is-invalid': form.errors.has('category_name') }" required type="text"
                                       class="form-control"
                                       placeholder="Place a New Category name">
                                <input type="hidden" v-model="form.id">

                                <has-error :form="form" field="category_name"></has-error>

                            </div>
                        </div>

                    </div>

                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button :disabled="form.busy" type="submit" class="btn btn-block btn-info">Update category
                            Info
                        </button>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>

        </div>
    </div>
</template>

<script>
    import axios from 'axios'

    import Swal from 'sweetalert2'

    export default {
        name: "EditCategoryPage",
        data() {
            return {
                form: new Form({
                    category_name: '',
                    id: ''
                })
            }
        },
        methods: {
            updateCategory() {
                let self = this
                this.form.post('/category/update').then(function (res) {
                    Swal.fire({
                        position: 'top-end',
                        type: 'success',
                        title: 'Your work has been saved',
                        showConfirmButton: false,
                        timer: 1500
                    });

                    self.$router.push('/manage-category')
                }).catch(function (er) {
                    alert('Something wrong')
                })
            }
        },
        mounted() {
            var self = this
            //alert('ashtesi')
            axios.get('/category/fetch/' + this.$route.params.id).then(function (res) {
                //self.category_name = res.data.category
                //alert(self.category_name)
                // console.log(res.data.category)
                self.form.fill(res.data.category)
            })
        }
    }
</script>

<style scoped>

</style>