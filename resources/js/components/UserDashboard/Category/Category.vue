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
                                    <template slot="post" slot-scope="row">
                                        <span v-if="row.item.post.length === 0" class="badge badge-danger"> {{ row.item.post.length }}</span>
                                        <span v-if="row.item.post.length > 0 && row.item.post.length < 100" class="badge badge-warning"> {{ row.item.post.length }}</span>
                                        <span v-if="row.item.post.length >= 100" class="badge badge-info"> {{ row.item.post.length }}</span>
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
                    {key: 'post', label: 'Number of Posts', sortable: true, sortDirection: 'desc'},
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
                posts_number : 0,
                category: {},
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
                    this.posts_number = response.data.posts_number;
                    this.totalRows = this.categories.length;
                });
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
