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
                    <h4 class="page-title">All Categories</h4>
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
                <!-- Row -->
                <div class="col-lg-12">
                    <!-- Row -->
                    <div class="row">
                        <!-- Column -->
                        <div class="col-sm-12 col-md-6">
                            <div class="card bg-success">
                                <div class="card-body text-white">
                                    <div class="d-flex flex-row">
                                        <div class="align-self-center display-6"><i class="ti-wallet"></i></div>
                                        <div class="p-10 align-self-center">
                                            <h4 class="m-b-0">Total Categories</h4>
                                            <span>Published</span>
                                        </div>
                                        <div class="ml-auto align-self-center">
                                            <h2 class="font-medium m-b-0">{{ categories.length }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <!-- Column -->
                        <div class="col-sm-12 col-md-6">
                            <div class="card bg-cyan">
                                <div class="card-body text-white">
                                    <div class="d-flex flex-row">
                                        <div class="display-6 align-self-center"><i class="ti-calendar"></i></div>
                                        <div class="p-10 align-self-center">
                                            <h4 class="m-b-0">Total Posts</h4>
                                            <span>Published</span>
                                        </div>
                                        <div class="ml-auto align-self-center">
                                            <h2 class="font-medium m-b-0">{{ posts_number }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                    </div>
                    <!-- Row -->
                </div>
                <!-- End Row -->

                <!-- Column  Categories Table -->
                <div class="col-lg-12 col-xl-12 col-md-12 UsersTableClass">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex no-block align-items-center m-b-30">
                                <h4 class="card-title">All Categories</h4>
                                <div class="ml-auto">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-dark" data-toggle="modal"
                                                data-target="#createmodel">
                                            Create New Category
                                        </button>
                                        <button type="button" class="btn btn-outline-dark ml-3 WideTable"
                                                data-toggle="modal" data-target="">
                                            <i class="ti-angle-double-right WideButtonArrow"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <b-row>
                                <b-col md="6" class="my-1">
                                    <b-form-group label-cols-sm="3" label="Filter" class="mb-0">
                                        <b-input-group>
                                            <b-form-input v-model="filter" placeholder="Type to Search"></b-form-input><b-input-group-append>
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
                                    :items="categories"
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
                                    <template slot="name" slot-scope="row">
                                        {{ row.value }}
                                    </template>
                                    <template slot="posts" slot-scope="row">
                                        <span v-if="row.item.post.length === 0" class="badge badge-danger"> {{ row.item.post.length }}</span>
                                        <span v-if="row.item.post.length > 0 && row.item.post.length < 100" class="badge badge-warning"> {{ row.item.post.length }}</span>
                                        <span v-if="row.item.post.length >= 100" class="badge badge-info"> {{ row.item.post.length }}</span>
                                    </template>
                                    <template slot="created" slot-scope="row">
                                        {{ row.value }}
                                    </template>
                                    <template slot="actions" slot-scope="row">
                                        <b-button type="button"
                                                  class="btn btn-sm btn-icon btn-pure btn-outline deleteUserButton"
                                                  v-on:click="destroyCategory(row.item.id, row.index)"
                                                  data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i>
                                        </b-button>
                                        <b-button type="button"
                                                  class="btn btn-sm btn-icon btn-pure btn-outline edit-row-btn"
                                                  data-toggle="modal" data-original-title="Edit" data-target="#updatemodel" v-on:click="EditCategory(row.item.id)">
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
            </div>
            <!-- ============================================================== -->
            <!-- End page Content -->
            <!-- ============================================================== -->
        </div>
        <!-- Share Modal -->
        <div class="modal fade" id="Sharemodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form>
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="mdi mdi-auto-fix m-r-10"></i> Share
                                With</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <button type="button" class="btn btn-info"><i class="ti-user text-white"></i></button>
                                <input type="text" class="form-control" placeholder="Enter Category Name Here"
                                       aria-label="name">
                            </div>
                            <div class="row">
                                <div class="col-3 text-center">
                                    <a href="#Whatsapp" class="text-success">
                                        <i class="display-6 mdi mdi-whatsapp"></i><br><span
                                        class="text-muted">Whatsapp</span>
                                    </a>
                                </div>
                                <div class="col-3 text-center">
                                    <a href="#Facebook" class="text-info">
                                        <i class="display-6 mdi mdi-facebook"></i><br><span
                                        class="text-muted">Facebook</span>
                                    </a>
                                </div>
                                <div class="col-3 text-center">
                                    <a href="#Instagram" class="text-danger">
                                        <i class="display-6 mdi mdi-instagram"></i><br><span class="text-muted">Instagram</span>
                                    </a>
                                </div>
                                <div class="col-3 text-center">
                                    <a href="#Skype" class="text-cyan">
                                        <i class="display-6 mdi mdi-skype"></i><br><span class="text-muted">Skype</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Send
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Create User Modal -->
        <div class="modal fade" id="createmodel" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form>
                        <div class="modal-header">
                            <h5 class="modal-title" id="createModalLabel"><i class="ti-marker-alt m-r-10"></i> Create
                                New Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <button type="button" class="btn btn-danger"><i class="ti-bookmark-alt text-white"></i></button>
                                <b-form-input type="text" v-model="newCategory.name" class="form-control" placeholder="Enter Name Here" minlength="6"
                                              maxlength="30" required></b-form-input>
                            </div>
                            <div class="input-group mb-3">
                                <button type="button" class="btn btn-dark"><i class="ti-more text-white"></i></button>
                                <b-form-textarea type="text" v-model="newCategory.description" placeholder="Enter Description Here" maxlength="400" style="height: 150px;"></b-form-textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary CloseAddUserForm" data-dismiss="modal">
                                Close
                            </button>
                            <button type="button" class="btn btn-success" v-show="newCategory.name" @click="storeCategory">
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
                                Edit Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <button type="button" class="btn btn-info"><i class="ti-user text-white"></i></button>
                                <b-form-input type="text" v-model="category.name" class="form-control" aria-label="name" minlength="10"
                                              maxlength="30" required></b-form-input>
                            </div>
                            <div class="input-group mb-3">
                                <button type="button" class="btn btn-info"><i class="ti-more text-white"></i></button>
                                <b-form-textarea type="text" v-model="category.description" aria-label="no" maxlength="200"></b-form-textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary CloseAddUserForm" data-dismiss="modal" v-on:click="resetCategory()">
                                Cancel
                            </button>
                            <button type="button" class="btn btn-success" v-show="category.name" v-on:click="updateCategory(category.id, category)">
                                <i class="ti-save"></i> Update
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
                    {key: 'name', label: 'Name', sortable: true, sortDirection: 'desc'},
                    {key: 'posts', label: '# Posts', sortable: true, sortDirection: 'desc'},
                    {key: 'created_at', label: 'Created Date', sortable: true, sortDirection: 'desc'},
                    {key: 'actions', label: 'Actions'},
                ],
                totalRows: 1,
                currentPage: 1,
                perPage: 10,
                pageOptions: [10, 25, 50, 100],
                sortBy: null,
                sortDesc: false,
                sortDirection: 'asc',
                filter: null,
                //DB
                categories: [],
                category: {},
                posts_number : 0,
                newCategory: {
                    name: '',
                    description: '',
                },
                category_id: 0,
                image_src: '../../../../../public/images/AdminDashboardImages/images/users/1.jpg',
            }
        },
        mounted: function () {
            console.log('Component fired.');
            this.totalRows = this.categories.length;
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
            this.fetchCategories();
        },
        methods: {
            fetchCategories: function () {
                axios.get('../api/admin-dashboard/categories').then(response => {
                    this.categories = response.data.categories;
                    this.totalRows = this.categories.length;
                    this.posts_number = response.data.posts_number;
                });
            },
            storeCategory: function () {
                axios.post('../api/admin-dashboard/categories', this.newCategory).then(response => {
                    this.newCategory = response.data.newCategory;
                    this.categories.push(this.newCategory);
                    // $('.CloseAddUserForm').click();
                }).catch(error => {
                    console.log(error);
                })
            },
            destroyCategory: function (id, index) {
                axios.delete('/api/admin-dashboard/categories/' + id).then(response => {
                    this.newCategory = response.data.category;
                    this.categories.splice(index, 1);
                }).catch(error => {
                    console.log(error);
                })
            },
            // To Show the category information in the modal
            EditCategory: function (id) {
                axios.get('/api/admin-dashboard/categories/' + id + '/edit').then(response => {
                    this.category = response.data.category;
                }).catch(error => {
                    console.log(error);
                })
            },
            resetCategory: function () {
                console.log(this.category);
            },
            updateCategory: function (id, category) {
                axios.patch('/api/admin-dashboard/categories/' + id, category).then(response => {
                    this.category = response.data.category;
                    this.fetchCategories();
                    console.log(this.category);
                }).catch(error => {
                    console.log(error);
                })
            },
            onFiltered(filteredItems) {
                // Trigger pagination to update the number of buttons/pages due to filtering
                this.totalRows = filteredItems.length;
                this.currentPage = 1;
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
</style>
