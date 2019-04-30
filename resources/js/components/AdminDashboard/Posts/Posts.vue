<template>
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">All Posts</h4>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Library</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex no-block justify-content-end align-items-center">
                        <div class="m-r-10">
                            <div class="lastmonth"></div>
                        </div>
                        <div class="">
                            <small>LAST MONTH</small>
                            <h4 class="text-info m-b-0 font-medium">3,552</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <!-- Column  Users Table -->
                <div class="col-lg-12 col-xl-9 col-md-12 UsersTableClass">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex no-block align-items-center m-b-30">
                                <h4 class="card-title">All Posts</h4>
                                <div class="ml-auto">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-dark" data-toggle="modal"
                                                data-target="#createmodel">
                                            Create New Post
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <b-row>
                                <b-col md="6" class="my-1">
                                    <b-form-group label-cols-sm="3" label="Filter" class="mb-0">
                                        <b-input-group>
                                            <b-form-input v-model="filter" placeholder="Type to Search"></b-form-input>
                                            <b-input-group-append>
                                                <b-button :disabled="!filter" @click="filter = ''">Clear</b-button>
                                            </b-input-group-append>
                                        </b-input-group>
                                    </b-form-group>
                                </b-col>
                                <b-col md="6" class="my-1">
                                    <b-form-group label-cols-sm="3" label="Per page" class="mb-0">
                                        <b-form-select v-model="perPage" :options="pageOptions"></b-form-select>
                                    </b-form-group>
                                </b-col>
                            </b-row>
                            <div class="table-responsive">
                                <!-- Main table element -->
                                <b-table
                                    show-empty
                                    class="table table-bordered nowrap display dataTable no-footer"
                                    stacked="md"
                                    :items="posts"
                                    :fields="fields"
                                    :current-page="currentPage"
                                    :per-page="perPage"
                                    :filter="filter"
                                    :sort-by.sync="sortBy"
                                    :sort-desc.sync="sortDesc"
                                    :sort-direction="sortDirection"
                                    @filtered="onFiltered"
                                >
                                    <template slot="index" slot-scope="row">
                                        {{ row.index+1 }}
                                    </template>
                                    <template slot="title" slot-scope="row">
                                        <a href="../"><strong>{{ row.value }}</strong></a>
                                    </template>

                                    <template slot="image" slot-scope="row">
                                        <img :src="path(row.value)" alt="" width="80px" height="80px" class="img img-circle">
                                    </template>
                                    <template slot="category" slot-scope="row">
                                        <strong v-for="value in row.value">{{value.name}}</strong>
                                    </template>
                                    <template slot="user" slot-scope="row">
                                        {{ row.value.name }}
                                    </template>
                                    <template slot="status" slot-scope="row">
                                        <span v-if="row.value === 0" class="label label-danger"> Banned</span>
                                        <span v-if="row.value === 1" class="label label-success"> Active </span>
                                        <span v-if="row.value === 2" class="label label-warning"> Pending </span>
                                    </template>
                                    <template slot="likes" slot-scope="row">
                                        1564
                                    </template>
                                    <template slot="comments" slot-scope="row">
                                        101
                                    </template>
                                    <template slot="created" slot-scope="row">
                                        {{ row.value }}
                                    </template>
                                    <template slot="actions" slot-scope="row">
                                        <b-button type="button"
                                                  class="btn btn-sm btn-icon btn-pure btn-outline deleteUserButton"
                                                  v-on:click="destroyPost(row.item.id, row.index)"
                                                  data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i>
                                        </b-button>
                                        <b-button type="button"
                                                  class="btn btn-sm btn-icon btn-pure btn-outline edit-row-btn"
                                                  data-toggle="modal" data-original-title="Edit" data-target="#updatemodel" v-on:click="EditPost(row.item.id)">
                                            <i class="ti-pencil" aria-hidden="true"></i></b-button>
                                    </template>
                                </b-table>
                                <!--           Pagination         -->
                                <b-row>
                                    <b-col md="6" class="my-1">
                                        <b-pagination
                                            v-model="currentPage"
                                            :total-rows="totalRows"
                                            :per-page="perPage"
                                            class="my-0"
                                        ></b-pagination>
                                    </b-col>
                                </b-row>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
            </div>
            <!-- ============================================================== -->
            <!-- End page Content -->
            <!-- ============================================================== -->
        </div>
        <!-- Create User Modal -->
        <div class="modal fade" id="createmodel" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="post" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title"><i class="ti-marker-alt m-r-10"></i>Create new Post</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Post Title</label>
                                                <b-form-input type="text" v-model="newPost.title" class="form-control" minlength="10" maxlength="50" required></b-form-input>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Sub title</label>
                                                <b-form-input type="text" v-model="newPost.subtitle"  class="form-control" required></b-form-input>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Category</label>
                                                <select class="selectpicker" v-model="newPost.categoriesIds" multiple data-selected-text-format="count" data-width="100%" data-max-options="3">
                                                    <option v-for="category in categories" :value="category.id">{{ category.name }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <br/>
                                                <b-form-group>
                                                    <b-form-radio-group
                                                        v-model="newPost.status"
                                                        :options="options"
                                                        name="radio-inline"
                                                    ></b-form-radio-group>
                                                </b-form-group>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Meta Title</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" ><i class="ti-image"></i></span>
                                                    </div>
                                                    <b-form-input v-model="newPost.meta_title" type="text" aria-describedby="basic-addon1"></b-form-input>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Meta Keyword</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" ><i class="ti-image"></i></span>
                                                    </div>
                                                    <b-form-input v-model="newPost.meta_keyword" type="text" aria-describedby="basic-addon1"></b-form-input>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <h5 class="card-title m-t-40">Post Description</h5>
                                    <div class="row">
                                        <div class="col-md-12 ">
                                            <div class="form-group">
                                                <b-textarea class="form-control" v-model="newPost.description" rows="4"></b-textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Image Upload</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" ><i class="ti-image"></i></span>
                                                    </div>
                                                    <input type="file" v-on:change="onImageChange" class="upload" accept=".jpg, .png, .jpeg">
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Video Upload</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" ><i class="ti-image"></i></span>
                                                    </div>
                                                    <input type="file" :onchange="imageChanged" class="upload" accept="video/*">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5 class="card-title m-t-40">GENERAL INFO</h5>
                                            <div class="table-responsive">
                                                <table class="table table-bordered td-padding">
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <label for="" class="form-control"> About</label>
                                                        </td>
                                                        <td>
                                                            <b-form-input type="text" v-model="newPost.about"></b-form-input>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label for="" class="form-control"> Color </label>
                                                        </td>
                                                        <td>
                                                            <b-form-input type="text" v-model="newPost.color"></b-form-input>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <label for="" class="form-control"> Type</label>
                                                        </td>
                                                        <td>
                                                            <b-form-input type="text" v-model="newPost.type"></b-form-input>
                                                        </td>
                                                    </tr>
                                                    <input type="text" v-model="newPost.users_id" hidden>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <div class="form-actions m-t-40">
                                    <button type="button" class="btn btn-success" v-show="newPost.title && newPost.categoriesIds"
                                            @click="storePost"><i class="fa fa-check"></i> Save
                                    </button>
                                    <button type="button" class="btn btn-dark" data-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Edit Post Modal -->
        <div class="modal fade" id="updatemodel" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form>
                        <div class="modal-header">
                            <h5 class="modal-title" id=""><i class="ti-marker-alt m-r-10"></i>
                                Edit Post</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form enctype="multipart/form-data">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Post Title</label>
                                                <b-form-input type="text" v-model="post.title" class="form-control" minlength="10" maxlength="50" required></b-form-input>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Sub title</label>
                                                <b-form-input type="text" v-model="post.subtitle"  class="form-control" required></b-form-input>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Category</label>
                                                <select class="selectpicker" v-model="categoriesIds" multiple data-selected-text-format="count" data-width="100%" data-max-options="3">
                                                    <option v-for="category in categories" :value="category.id">{{ category.name }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <br/>
                                                <b-form-group>
                                                    <b-form-radio-group
                                                        v-model="post.status"
                                                        :options="options"
                                                        name="radio-inline"
                                                    ></b-form-radio-group>
                                                </b-form-group>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>User</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" ><i class="ti-user"></i></span>
                                                    </div>
                                                    <b-form-input type="text" v-model="user.name" aria-describedby="basic-addon1" disabled></b-form-input>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>User Type</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" ><i class="ti-user"></i></span>
                                                    </div>
                                                    <b-form-input type="text" v-model="user.type" aria-describedby="basic-addon1" disabled></b-form-input>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <h5 class="card-title m-t-40">Post Description</h5>
                                    <div class="row">
                                        <div class="col-md-12 ">
                                            <div class="form-group">
                                                <b-textarea class="form-control" v-model="post.description" rows="4"></b-textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Meta Title</label>
                                                <b-form-input v-model="post.meta_title" type="text" class="form-control"></b-form-input></div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Meta Keyword</label>
                                                <b-form-input v-model="post.meta_keyword" type="text" class="form-control"></b-form-input></div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-3">
                                            <h5 class="card-title m-t-20">Upload Image</h5>
                                            <div class="el-element-overlay">
                                                <div class="el-card-item">
                                                    <div class="el-card-avatar el-overlay-1"><img :src="path('chair.jpg')" alt="postImage"/>
                                                        <div class="el-overlay">
                                                            <ul class="list-style-none el-info">
                                                                <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link"
                                                                                       href="images/gallery/chair3.jpg"><i class="icon-magnifier"></i></a></li>
                                                                <li class="el-item"><a class="btn default btn-outline el-link" href="javascript:void(0);"><i
                                                                    class="icon-link"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btn btn-info waves-effect waves-light"><span>Upload another Image</span>
                                                <input v-on:change="onFileChange" type="file" class="upload">
                                            </div>
                                            <div class="btn btn-info waves-effect waves-light"><span>Upload an Video</span>
                                                <input v-on:change="onFileChange" type="file" class="upload">
                                            </div>
                                        </div>
                                        <div class="col-md-3 offset-md-3">
                                            <h5 class="card-title m-t-20">Upload Video</h5>
                                            <div class="el-element-overlay">
                                                <div class="el-card-item">
                                                    <div class="el-card-avatar el-overlay-1"><img :src="path('chair.jpg')" alt="postImage"/>
                                                        <div class="el-overlay">
                                                            <ul class="list-style-none el-info">
                                                                <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link"
                                                                                       href="images/gallery/chair3.jpg"><i class="icon-magnifier"></i></a></li>
                                                                <li class="el-item"><a class="btn default btn-outline el-link" href="javascript:void(0);"><i
                                                                    class="icon-link"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btn btn-info waves-effect waves-light"><span>Upload another Image</span>
                                                <input v-on:change="onFileChange" type="file" class="upload">
                                            </div>
                                            <div class="btn btn-info waves-effect waves-light"><span>Upload an Video</span>
                                                <input v-on:change="onFileChange" type="file" class="upload">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5 class="card-title m-t-40">GENERAL INFO</h5>
                                            <div class="table-responsive">
                                                <table class="table table-bordered td-padding">
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <label for="" class="form-control"> Has Video</label>
                                                        </td>
                                                        <td>
                                                            <b-form-input type="text" v-show="post.has_video === 1" disabled placeholder="YES"></b-form-input>
                                                            <b-form-input type="text" v-show="post.has_video === 0" disabled placeholder="NO"></b-form-input>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label for="" class="form-control"> About</label>
                                                        </td>
                                                        <td>
                                                            <b-form-input type="text" v-model="post.about"></b-form-input>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label for="" class="form-control"> Color </label>
                                                        </td>
                                                        <td>
                                                            <b-form-input type="text" v-model="post.color"></b-form-input>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <label for="" class="form-control"> Type</label>
                                                        </td>
                                                        <td>
                                                            <b-form-input type="text" v-model="post.type"></b-form-input>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    <tr>
                                                        <td>
                                                            <label for="" class="form-control"> Likes Count</label>
                                                        </td>
                                                        <td>
                                                            <b-form-input type="text" v-model="post.like_count"></b-form-input>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label for="" class="form-control">Comments Count</label>
                                                        </td>
                                                        <td>
                                                            <b-form-input type="text" v-model="post.comment_count"></b-form-input>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label for="" class="form-control">Image Url</label>
                                                        </td>
                                                        <td>
                                                            <b-form-input type="url" v-model="post.image_url" disabled></b-form-input>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label for="" class="form-control">Posted at</label>
                                                        </td>
                                                        <td>
                                                            <b-form-input type="text" v-model="post.created_at" disabled></b-form-input>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <div class="form-actions m-t-40">
                                    <button type="button" class="btn btn-success"><i class="fa fa-check"
                                                                                     v-show="newPost.name && newPost.email && newPost.password && newPost.type"></i> Save
                                    </button>
                                    <button type="button" class="btn btn-dark" data-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                            <button type="button" class="btn btn-success updatePostButtonAlert"
                                    v-show="post.name && post.email && post.type"
                                    v-on:click="updatePost(post.id, post)">
                                <i class="ti-save"></i> Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center">
            All Rights Reserved by Ahmed R. Mohamed.
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</template>

<script>
    import Multiselect from 'vue-multiselect';
    export default {
        props: ['auth_user_id'],
        data() {
            return {
                items: [],
                fields: [
                    {key: 'index', label: '#', sortable: true, sortDirection: 'desc'},
                    {key: 'title', label: 'Title', sortable: true, sortDirection: 'desc'},
                    {key: 'image', label: 'Image'},
                    {key: 'category', label: 'Category', sortable: true, sortDirection: 'desc'},
                    {key: 'user', label: 'User', sortable: true, sortDirection: 'desc'},
                    {key: 'status', label: 'Status', sortable: true, sortDirection: 'desc'},
                    {key: 'likes', label: '#Likes', sortable: true, sortDirection: 'desc'},
                    {key: 'comments', label: '#Comments', sortable: true, sortDirection: 'desc'},
                    {key: 'created_at', label: 'Published Date', sortable: true, sortDirection: 'desc'},
                    {key: 'actions', label: 'Actions'},
                ],
                totalRows: 1,
                currentPage: 1,
                perPage: 20,
                pageOptions: [10, 25, 50, 100],
                sortBy: null,
                sortDesc: false,
                sortDirection: 'asc',
                filter: null,
                //select Status of Post
                selected: '',
                options: [
                    { text: 'Active', value: '1' },
                    { text: 'Pending', value: '2' },
                    { text: 'Banned', value: '0' }
                ],
                value: '',


                //DB
                image:'',
                posts: [],
                post: {},
                user: {},
                categories: [],
                categoriesIds: [],
                category: {},
                PostCategoryId: {},
                newPost: {
                    title: '',
                    description: '',
                    about: '',
                    subtitle:'',
                    type: '',
                    color: '',
                    image:'',
                    meta_keyword:'',
                    meta_title:'',
                    categoriesIds: [],

                },
                post_id: 0,
                image_src: '../../../../../public/images/AdminDashboardImages/images/gallery/chair.jpg',
            }
        },
        mounted: function () {
            console.log('Component fired.');
            this.totalRows = this.posts.length;
        },
        computed: {
            sortOptions() {
                // Create an options list from our fields
                return this.fields
                    .filter(f => f.sortable)
                    .map(f => {
                        return {text: f.label, value: f.key}
                    })
            }
        },

        created: function () {
            this.fetchPosts();
        },
        methods: {
            fetchPosts: function () {
                axios.get('../api/admin-dashboard/posts').then(response => {
                    this.posts = response.data.posts;
                    this.categories = response.data.categories;
                    this.totalRows = this.posts.length;
                });
            },
            storePost(e) {
                e.preventDefault();
                let currentObj = this;

                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }

                let formData = new FormData();
                formData.append('image', this.image);
                formData.append('users_id', this.auth_user_id);
                formData.append('title', this.newPost.title);
                formData.append('subtitle', this.newPost.subtitle);
                formData.append('description', this.newPost.description);
                formData.append('color', this.newPost.color);
                formData.append('status', this.newPost.status);
                formData.append('about', this.newPost.about);
                formData.append('meta_keyword', this.newPost.meta_keyword);
                formData.append('meta_title', this.newPost.meta_title);
                formData.append('type', this.newPost.type);
                formData.append('about', this.newPost.about);
                for (var i = 0; i < this.newPost.categoriesIds.length; i++) {
                    formData.append('categoriesIds[]', this.newPost.categoriesIds[i]);
                }
                // formData.append('categoriesIds', this.newPost.categoriesIds);
                console.log(this.newPost.categoriesIds);

                axios.post('../api/admin-dashboard/posts', formData, config)
                    .then(function (response) {
                        this.posts.push(this.newPost);
                    })
                    .catch(function (error) {
                        currentObj.output = error;
                    });
            },
            storePost2: function () {
                this.newPost.users_id = this.auth_user_id;
                this.newPost.image = this.image;
                console.log(this.newPost.image);
                // this.newPost.categoriesIds = this.newPost.categoriesIds;
                axios.post('../api/admin-dashboard/posts', this.newPost).then(response => {
                    this.newPost = response.data.newPost;
                    console.log(this.newPost);
                    // this.posts.push(this.newPost);
                    // $('.CloseAddUserForm').click();
                }).catch(error => {
                    console.log(error);
                })
            },
            destroyPost: function (id, index) {
                axios.delete('/api/admin-dashboard/posts/' + id).then(response => {
                    this.newPost = response.data.post;
                    this.posts.splice(index, 1);
                }).catch(error => {
                    console.log(error);
                })
            },
            // To Show the post information in the modal
            EditPost: function (id) {
                axios.get('/api/admin-dashboard/posts/' + id + '/edit').then(response => {
                    this.post = response.data.post[0];
                    this.categoriesIds = response.data.categoriesIds;
                    this.user = this.post.user;
                    console.log(this.user);
                }).catch(error => {
                    console.log(error);
                })
            },
            resetUser: function () {
                console.log(this.post);
            },
            updatePost: function (id, post) {
                console.log(post);
                axios.patch('/api/admin-dashboard/posts/' + id, post).then(response => {
                    this.post = response.data.post;
                    this.fetchPosts();
                }).catch(error => {
                    console.log(error);
                })
            },
            onFiltered(filteredItems) {
                // Trigger pagination to update the number of buttons/pages due to filtering
                this.totalRows = filteredItems.length;
                this.currentPage = 1;
            },
            path(image) {
                return require('../../../../../public/uploads/posts/images/' + image)
            },
            path2(image) {
                return require('../../../../../public/images/AdminDashboardImages/images/gallery/' + image)
            },
            onFileChange(e) {
                var files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.image(files[0]);
            },
            imageChanged(e) {
                var fileReader = new FileReader();
                fileReader.readAsDataURL(e.target.files[0]);
                fileReader.onload = (e) => {
                    this.image = e.target.result;
                }

            },
            fileChanged(e) {
                var fileReader = new FileReader();
                fileReader.readAsDataURL(e.target.files[0]);
                fileReader.onload = (e) => {
                    this.post.video = e.target.result;
                }
            },
            onImageChange(e){
                console.log(e.target.files[0]);
                this.image = e.target.files[0];
            },
        },
        components: {
            "multiselect": Multiselect,
        },
    }
</script>

<style scoped>
    .delete-alert {
        /*background-color: red;*/
        position: absolute;
        z-index: 1;
        top: 20%;
        left: 25%;
    }

    .alert-head {
        padding-bottom: 20px;
        padding-top: 10px;
        border-bottom: 1px solid #cccccc;
    }

    .alert-body {
        padding: 20px 0 10px 0;
        border-bottom: 1px solid #cccccc;
    }

    .alert-footer {
        padding: 20px 0;
        float: right;
    }

    table tr td span {
        text-transform: capitalize;
    }

    .btn-pure {
        background-color: transparent;
        color: #000;
        border: 0;
    }

    table tbody tr td {
        line-height: 79px;
    }

    .modal-content {
        width: 81vw;
        margin: 44px 214px;
    }

    .modal-dialog {
        margin: 0;
    }
</style>
