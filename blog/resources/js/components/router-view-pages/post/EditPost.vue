<template>

    <div class="row justify-content-around">
        <div class="col-8">
            <!-- Horizontal Form -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Add Post Form</h3>
                </div>
                <form @submit.prevent="updatePostInfo" role="form" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Post Title</label>
                            <input type="hidden" :value="form.id">
                            <input v-model="form.post_title" required type="text"
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
                            <select v-model="form.category_id"
                                    :class="{ 'is-invalid': form.errors.has('category_id') }"
                                    class="form-control select2" style="width: 100%;">
                                <option :value="category.id" v-for="(category, i) in getPost" :key="category.id">
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
                        <button type="submit" class="btn btn-primary">Save Post Info</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</template>

<script>
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
    import axios from 'axios'
    import Swal from 'sweetalert2'

    export default {
        name: "EditPost",
        data() {
            return {
                editor: ClassicEditor,
                form: new Form({
                    post_title: '',
                    post_description: '',
                    post_image: '',
                    category_id: '',
                    id: ''
                })
            }
        },
        mounted() {
            var self = this
            axios.get('/post/edit/' + this.$route.params.id).then(function (res) {
                self.form.fill(res.data.post)
            }).catch(function (err) {
                alert('Error Happened Just')
            })
        },
        computed: {
            getPost() {
                return this.$store.getters.getCategoryName
            }
        },
        created() {
            this.$store.dispatch('allCategory')

        },
        methods: {
            updatePostInfo() {
                var self = this
                this.form.post('/post/update').then(function (res) {
                    Swal.fire({
                        position: 'top-end',
                        type: 'success',
                        title: 'Your Posted Received!',
                        showConfirmButton: false,
                        timer: 1500
                    });


                    self.$router.push('/post/manage')
                }).catch(function (err) {
                    alert('Error')
                })
            },
            imageFileUpload(event) {

                let file = event.target.files[0];
                //console.log(file);

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
        }
    }
</script>

<style scoped>

</style>

