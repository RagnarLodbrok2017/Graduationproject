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
                    <h4 class="page-title">Your Histories</h4>
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
                <!-- Column  Categories Table -->
                <div class="col-lg-8 col-xl-9 col-md-9 UsersTableClass">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex no-block align-items-center m-b-30">
                                <h4 class="card-title">All Histories</h4>
<!--                                <button style="margin-left: 10px" type="button" class="btn btn-info" :onclick="myHistory()">-->
<!--                                    click to see your Histories-->
<!--                                </button>-->
                                <div class="ml-auto">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-danger" v-on:click="deleteHistories()">
                                            Delete all Histories
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
                                    :items="histories"
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
                                    <template slot="about" slot-scope="row">
                                        {{ row.value }}
                                    </template>
                                    <template slot="action" slot-scope="row">
                                        <span v-if="row.value === 'Delete'" class="badge badge-danger"> {{ row.value }}</span>
                                        <span v-if="row.value === 'Add'" class="badge badge-info"> {{ row.value }}</span>
                                    </template>
                                    <template slot="post_title" slot-scope="row">
                                        {{ row.value }}
                                    </template>
                                    <template slot="user_name" slot-scope="row">
                                        {{ row.value }}
                                    </template>
                                    <template slot="created_at" slot-scope="row">
                                        {{ row.value }}
                                    </template>
                                    <template slot="delete" slot-scope="row">
                                        <b-button type="button"
                                                  class="btn btn-sm btn-icon btn-pure btn-outline deleteUserButton"
                                                  v-on:click="destroyHistrory(row.item.id, row.index)"
                                                  data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i>
                                        </b-button>
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
                <!-- Column Users Details and Category-->
                <div class="col-lg-4 col-xl-3 col-md-3 ShareModel animated bounceInRight">
                    <div class="card">
                        <div class="border-bottom p-15">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#Sharemodel"
                                    style="width: 100%">
                                <i class="ti-share m-r-10"></i> Share With
                            </button>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ti-search"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Search Contacts Here..."
                                           aria-label="Amount (to the nearest dollar)">
                                    <div class="input-group-append">
                                        <button class="btn btn-info">Ok</button>
                                    </div>
                                </div>
                            </form>
                            <div class="list-group m-t-30">
                                <a href="javascript:void(0)" class="list-group-item active"><i
                                    class="ti-layers m-r-10"></i> All Histories</a>
                                <a href="javascript:void(0)" class="list-group-item"><i class="ti-star m-r-10"></i>
                                    Favourite Users</a>
                                <a href="javascript:void(0)" class="list-group-item"><i class="ti-bookmark m-r-10"></i>
                                    Recently Created</a>
                            </div>
                            <h4 class="card-title m-t-30">Groups</h4>
                            <div class="list-group">
                                <a href="javascript:void(0)" class="list-group-item"><i
                                    class="ti-flag-alt-2 m-r-10"></i> Users
                                    <span class="badge badge-info float-right">1</span>
                                </a>
                                <a href="javascript:void(0)" class="list-group-item"><i class="ti-notepad m-r-10"></i>
                                    Posts
                                    <span class="badge badge-success float-right">4</span>
                                </a>
                                <a href="javascript:void(0)" class="list-group-item"><i class="ti-target m-r-10"></i>
                                    Categories
                                    <span class="badge badge-dark float-right">42</span>
                                </a>
                                <a href="javascript:void(0)" class="list-group-item"><i class="ti-comments m-r-10"></i>
                                    Emails
                                    <span class="badge badge-danger float-right">45</span>
                                </a>
                                <a href="javascript:void(0)" class="list-group-item"><i class="ti-comments m-r-10"></i>
                                    Notifications
                                    <span class="badge badge-danger float-right">100</span>
                                </a>
                                <a href="javascript:void(0)" class="list-group-item"><i class="ti-comments m-r-10"></i>
                                    Other
                                    <span class="badge badge-danger float-right">204</span>
                                </a>
                            </div>
                            <h4 class="card-title m-t-30">More</h4>
                            <div class="list-group">
                                <a href="javascript:void(0)" class="list-group-item">
                                    <span class="badge badge-info m-r-10"><i class="ti-import"></i></span> Import Categories
                                </a>
                                <a href="javascript:void(0)" class="list-group-item">
                                    <span class="badge badge-warning text-white m-r-10"><i class="ti-export"></i></span>
                                    Export Categories
                                </a>
                                <a href="javascript:void(0)" class="list-group-item">
                                    <span class="badge badge-success m-r-10"><i class="ti-share-alt"></i></span> Restore
                                    Users
                                </a>
                                <a href="javascript:void(0)" class="list-group-item">
                                    <span class="badge badge-primary m-r-10"><i class="ti-layers-alt"></i></span>
                                    Duplicate Users
                                </a>
                                <a href="javascript:void(0)" class="list-group-item">
                                    <span class="badge badge-danger m-r-10"><i class="ti-trash"></i></span> Delete All
                                    Users
                                </a>
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
        props: ['auth_user_id'],
        data() {
            return {
                items: [],
                fields: [
                    {key: 'index', label: '#', sortable: true, sortDirection: 'desc'},
                    {key: 'about', label: 'About', sortable: true, sortDirection: 'desc'},
                    {key: 'action', label: 'Action', sortable: true, sortDirection: 'desc'},
                    {key: 'post_title', label: 'Post Title', sortable: true, sortDirection: 'desc'},
                    {key: 'user_name', label: 'Username', sortable: true, sortDirection: 'desc'},
                    {key: 'created_at', label: 'Created Date', sortable: true, sortDirection: 'desc'},
                    {key: 'delete', label: 'Delete'},
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
                histories: [],
                category: {},
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
            this.totalRows = this.histories.length;
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
            this.fetchHistories();
        },
        methods: {
            fetchHistories: function () {
                axios.get('../api/admin-dashboard/histories').then(response => {
                    this.histories = response.data.histories;
                    this.totalRows = this.histories.length;
                });
            },
            storeCategory: function () {
                axios.post('../api/admin-dashboard/histories', this.newCategory).then(response => {
                    this.newCategory = response.data.newCategory;
                    this.histories.push(this.newCategory);
                    // $('.CloseAddUserForm').click();
                }).catch(error => {
                    console.log(error);
                })
            },
            destroyHistrory: function (id, index) {
                axios.delete('/api/admin-dashboard/histories/' + id).then(response => {
                    this.newCategory = response.data.category;
                    this.histories.splice(index, 1);
                }).catch(error => {
                    console.log(error);
                })
            },
            deleteHistories: function () {
                var id = this.auth_user_id;
                axios.post('/api/admin-dashboard/histories/' + id).then(response => {
                    this.histories = response.data.histories;
                    this.totalRows = this.histories.length;
                    // this.histories = {};
                    // this.newCategory = response.data.category;
                    this.histories.splice(index, 1);
                }).catch(error => {
                    console.log(error);
                })
            },
            // To Show the category information in the modal
            EditCategory: function (id) {
                axios.get('/api/admin-dashboard/histories/' + id + '/edit').then(response => {
                    this.category = response.data.category;
                }).catch(error => {
                    console.log(error);
                })
            },
            resetCategory: function () {
                console.log(this.category);
            },
            updateCategory: function (id, category) {
                axios.patch('/api/admin-dashboard/histories/' + id, category).then(response => {
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
