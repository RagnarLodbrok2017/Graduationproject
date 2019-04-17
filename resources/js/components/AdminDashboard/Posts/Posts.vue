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
                                        <span v-if="row.value === '0'" class="label label-danger"> Banned</span>
                                        <span v-if="row.value === '1'" class="label label-info"> Active </span>
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
                    <form>
                        <div class="modal-header">
                            <h5 class="modal-title" id="createModalLabel"><i class="ti-marker-alt m-r-10"></i> Create
                                New User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <button type="button" class="btn btn-info"><i class="ti-post text-white"></i></button>
                                <b-form-input type="text" v-model="newPost.name" class="form-control"
                                              placeholder="Enter Name Here" aria-label="name" minlength="10"
                                              maxlength="30" required></b-form-input>
                            </div>
                            <div class="input-group mb-3">
                                <button type="button" class="btn btn-info"><i class="ti-more text-white"></i></button>
                                <b-form-input type="email" v-model="newPost.email" placeholder="Enter Email Here"
                                              aria-label="no" maxlength="40" required></b-form-input>
                            </div>
                            <div class="input-group mb-3">
                                <button type="button" class="btn btn-info"><i class="ti-key text-white"></i></button>
                                <b-form-input type="password" v-model="newPost.password"
                                              placeholder="Enter Password Here" minlength="8" maxlength="20"
                                              required></b-form-input>
                            </div>
                            <div class="input-group mb-3">
                                <button type="button" class="btn btn-info"><i
                                    class="ti-hand-point-right text-white"></i></button>
                                <b-form-select v-model="newPost.type" class="custom-select" required>
                                    <option value="post" selected="selected">User</option>
                                    <option value="admin">Admin</option>
                                    <option value="vip" disabled>VIP</option>
                                    <option value="superadmin" disabled>SuperAdmin</option>
                                </b-form-select>
                            </div>
                            <div class="input-group mb-3">
                                <button type="button" class="btn btn-info"><i class="ti-import text-white"></i></button>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary CloseAddUserForm" data-dismiss="modal">
                                Close
                            </button>
                            <button type="button" class="btn btn-success addUserButtonAlert"
                                    v-show="newPost.name && newPost.email && newPost.password && newPost.type"
                                    @click="storePost">
                                <i class="ti-save"></i> Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Edit User Modal -->
        <div class="modal fade" id="updatemodel" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form>
                        <div class="modal-header">
                            <h5 class="modal-title" id=""><i class="ti-marker-alt m-r-10"></i> Create
                                Edit User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <button type="button" class="btn btn-info"><i class="ti-post text-white"></i></button>
                                <b-form-input type="text" v-model="post.name" class="form-control" aria-label="name" minlength="10"
                                              maxlength="30" required></b-form-input>
                            </div>
                            <div class="input-group mb-3">
                                <button type="button" class="btn btn-info"><i class="ti-more text-white"></i></button>
                                <b-form-input type="email" v-model="post.email" aria-label="no" maxlength="40" required></b-form-input>
                            </div>
                            <div class="input-group mb-3">
                                <button type="button" class="btn btn-info"><i class="ti-key text-white"></i></button>
                                <b-form-input type="password" v-model="post.password" placeholder="**********" minlength="8" maxlength="20"></b-form-input>
                            </div>
                            <div class="input-group mb-3">
                                <button type="button" class="btn btn-info"><i
                                    class="ti-hand-point-right text-white"></i></button>
                                <b-form-select v-model="post.type" class="custom-select" required>
                                    <option value="post">User</option>
                                    <option value="admin">Admin</option>
                                    <option value="vip" disabled>VIP</option>
                                    <option value="superadmin" disabled>SuperAdmin</option>
                                </b-form-select>
                            </div>
                            <div class="input-group mb-3">
                                <button type="button" class="btn btn-info"><i
                                    class="ti-alert text-white"></i></button>
                                <b-form-select v-model="post.status" class="custom-select" required>
                                    <option value="1" selected="selected">Active</option>
                                    <option value="0">Banned</option>
                                </b-form-select>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary CloseAddUserForm" data-dismiss="modal" v-on:click="resetUser()">
                                Cancel
                            </button>
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

    export default {
        props: {},
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
                //DB
                posts: [],
                post: {},
                newPost: {
                    title: '',
                    description: '',
                    about: '',
                    type: '',
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
                    this.totalRows = this.posts.length;
                    console.table(this.posts);
                    // console.log("************* This.posts *****************");
                    // console.log(this.posts);
                    // console.log(JSON.stringify(this.posts[0]));
                });
            },
            storePost: function () {
                axios.post('../api/admin-dashboard/posts', this.newPost).then(response => {
                    this.newPost = response.data.newPost;
                    this.posts.push(this.newPost);
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
                    this.post = response.data.post;
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
                    console.log(this.post);
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
                return require('../../../../../public/images/AdminDashboardImages/images/gallery/' + image)
            }
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
    table tbody tr td{
        line-height: 79px;
    }
</style>
