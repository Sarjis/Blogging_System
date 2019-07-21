<template>
    <div class="row justify-content-around">
        <div class="col-8">
            <!-- Horizontal Form -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Add Post Form</h3>
                </div>
                <form @submit.prevent="addPostInfo" role="form" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Post Title</label>
                            <input id="post_title" @blur="checker" v-model="form.post_title" required type="text"
                                   class="form-control" name="post_title"
                                   placeholder="Type a Title of Post"
                                   :class="{ 'is-invalid': form.errors.has('post_title') }">
                            {{form.post_title}}
                            <has-error :form="form" field="post_title"></has-error>

                        </div>

                        <div class="form-group">
                            <label for="">Post Description</label>


                            <ckeditor :editor="editor" v-model="form.post_description">
                            </ckeditor>

                            <!--<markdown-editor v-model="form.post_description"></markdown-editor>-->
                            <!--{{form.post_description}}-->
                            <!--<vue-ckeditor v-model="form.post_description" :config="config" @blur="onBlur($event)" @focus="onFocus($event)" ></vue-ckeditor>-->

                            {{form.post_description}}
                            <has-error :form="form" field="post_description"></has-error>
                        </div>

                        <div class="form-group">
                            <label>Category Name</label>
                            <select @blur="checkSelection" v-model="form.category_id"
                                    :class="{ 'is-invalid': form.errors.has('category_id') }"
                                    class="form-control select2" style="width: 100%;">
                                <option value="" disabled>--select--</option>
                                <option :value="category.id" v-for="(category, i) in categories" :key="category.id">
                                    {{category.category_name}}
                                </option>

                            </select>
                            {{form.category_id}}
                            <has-error :form="form" field="category_id"></has-error>
                        </div>

                        <div class="form-group">
                            <label for="">Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input @change="imageFileUpload($event)" type="file" class="custom-file-input"
                                           :class="{ 'is-invalid': form.errors.has('post_image') }">

                                    <label class="custom-file-label" for="">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="">Upload</span>
                                </div>

                                <img v-if="form.post_image" :src="form.post_image" width="50" height="50">

                            </div>
                            <has-error :form="form" field="post_image"></has-error>
                            <!--<has-error :form="form" field="post_image"></has-error>-->
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button id="postBtn" type="submit" class="btn btn-primary">Save Post Info</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    import Swal from 'sweetalert2'
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

    export default {
        name: "AddPost",
        data() {
            return {
                form: new Form({
                    category_id: '',
                    post_title: '',
                    post_description: '',
                    post_image: '',


                }),
                editor: ClassicEditor,
                btn: true

            }
        },
        computed: {
            categories() {
                return this.$store.getters.getCategoryName
            }
        },
        mounted() {

            this.$store.dispatch('allCategory')
        },

        methods: {
            checker() {
                var self = this
                if (this.form.post_title.length < 4) {
                    //self.form.error ='pos';
                    self.form.post('/post/store').then(function (res) {
                        alert(res.data)
                    })
                }

            },
            addPostInfo() {
                //this.$Progress.start();
                let self = this;

                this.form.post('/post/store').then(function (result) {


                    let responce2 = "Not a proper Image File";
                    if (result == responce2) {
                        Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'Please select a JPG or PNG file inside posting!',
                        })

                    } else {

                        Swal.fire({
                            position: 'top-end',
                            type: 'success',
                            title: 'Your Posted Received!',
                            showConfirmButton: false,
                            timer: 1500
                        });


                        self.$router.push('/post/manage')
                        //self.$Progress.finish();

                    }


                }).catch(function (err) {
                    Swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Please Complete the Requirements!',
                    })
                    alert(err)
                })


            },

            imageFileUpload(event) {

                let file = event.target.files[0];

                let fileExtensionInLowerCase = file.name.toLowerCase();
                //file.name()
                if (file.size > 10000000000000000) {
                    Swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Photo must be less than 2MB!',
                    })
                } else if (!(fileExtensionInLowerCase.includes('.jpg') || fileExtensionInLowerCase.includes('.jpeg') || fileExtensionInLowerCase.includes('.png') || fileExtensionInLowerCase.includes('.gif'))) {
                    Swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Please select a JPG or PNG file!',
                    })
                } else {
                    let reader = new FileReader();
                    let self = this;

                    reader.onload = function (event) {
                        self.form.post_image = event.target.result;
                        //console.log(event.target.result)
                    };

                    reader.readAsDataURL(file);
                }


            },
            checkSelection(){
                if (!this.form.category_id){
                    self.form.post('/post/store').then(function (res) {
                        alert(res.data)
                    }).catch(function (re) {
                        alert('bye')
                    })
                }
            }


        },

    }
</script>

<style scoped>

</style>