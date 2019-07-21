<template>
    <div class="row justify-content-around">
        <div class="col-md-10">
            <!-- Horizontal Form -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Add category Form</h3>
                </div>

                <form @submit.prevent="addCategory" class="form-horizontal">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Category Name</label>

                            <div class="col-sm-10">
                                <input v-model="form.category_name"
                                       :class="{ 'is-invalid': form.errors.has('category_name') }" required type="text"
                                       class="form-control"
                                       placeholder="Place a New Category name">
                                <!--{{form.category_name}}-->
                                <has-error :form="form" field="category_name"></has-error>

                            </div>
                        </div>


                    </div>

                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button :disabled="form.busy" type="submit" class="btn btn-info">Save</button>
                    </div>
                    <!-- /.card-footer -->
                </form>
                <form class="form form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Product Price</label>

                        <div class="col-md-8">
                            <input v-model="form.product_price"
                                   :class="{ 'is-invalid': form.errors.has('product_price') }" required
                                   type="number"
                                   class="form-control" min="0">

                            <has-error :form="form" field="product_price"></has-error>

                        </div>
                        <div class="row">
                            <div class="col-sm-10">
                                <button @click="decrease" class="btn btn-success">+</button>
                                <input type="number" min="1" :value="form.quantity" class="btn">
                                <button @click="increase" class="btn btn-success">+</button>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <label class="col-sm-2 control-label">Total Price</label>

                            <input type="number" disabled class="form-control" :value="(form.product_price)*(form.quantity)"/>

                        </div>


                    </div>
                </form>

            </div>

        </div>
    </div>
</template>

<script>
    //import axios from 'axios'
    import Swal from 'sweetalert2'

    export default {
        name: "AddCategory",
        data() {
            return {
                form: new Form({
                    category_name: '',
                    product_price: null,
                    tot: null,
                    quantity: 1

                })
            }
        },
        methods: {
            addCategory() {
                // alert(this.category_name)
                // axios.post('/category/add', {category_name: this.category_name}).then(function (response) {
                //     alert('Saved')
                // })
                //     .catch(function (error) {
                //         alert('Something error')
                //     });
                var self = this;
                this.form.post('/category/add').then(function (res) {

                    Swal.fire({
                        position: 'top-end',
                        type: 'success',
                        title: 'Your work has been saved',
                        showConfirmButton: false,
                        timer: 1500
                    });

                    self.$router.push('/manage-category')


                }).catch(function (error) {
                    Swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Please Follow Naming Convention Category Name!',

                    })
                })
            },
            decrease() {
                if (this.form.quantity < 2) {
                    alert('Please')

                }else {
                    this.form.quantity -= 1
                }
            },
            increase() {
                if (this.form.quantity > 10) {
                    alert('Please')

                }else {
                    this.form.quantity += 1
                }
            }

        },
        computed: {}
    }
</script>

<style scoped>

</style>