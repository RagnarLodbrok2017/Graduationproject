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
                    <h4 class="page-title">Profile Page</h4>
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
                        <div class=""><small>LAST MONTH</small>
                            <h4 class="text-info m-b-0 font-medium">4,352</h4></div>
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
            <!-- Row -->
            <div class="row">
                <!-- Column -->
                <div class="col-lg-4 col-xlg-3 col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <center class="m-t-30"> <img src="../../../../../public/images/AdminDashboardImages/images/users/5.jpg" class="rounded-circle" width="150" />
                                <h4 class="card-title m-t-10">{{user.name}}</h4>
                                <h6 class="card-subtitle">Full Stack Web Developer</h6>
                                <div class="row text-center justify-content-md-center">
                                    <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-like"></i> <font class="font-medium">804</font></a></div>
                                    <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">10</font></a></div>
                                </div>
                            </center>
                        </div>
                        <div>
                            <hr> </div>
                        <div class="card-body"> <small class="text-muted">Email address </small>
                            <h6>{{ user.email }}</h6> <small class="text-muted p-t-30 db">Phone</small>
                            <h6>+91 654 784 547</h6> <small class="text-muted p-t-30 db">Address</small>
                            <h6>Egypt Cairo, ST 201</h6>
                            <small class="text-muted p-t-30 db">Social Profile</small>
                            <br/>
                            <button class="btn btn-circle btn-secondary"><i class="fab fa-facebook-f"></i></button>
                            <button class="btn btn-circle btn-secondary"><i class="fab fa-twitter"></i></button>
                            <button class="btn btn-circle btn-secondary"><i class="fab fa-youtube"></i></button>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-8 col-xlg-9 col-md-7">
                    <div class="card">
                        <!-- Tabs -->
                        <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-timeline-tab" data-toggle="pill" href="#current-month" role="tab" aria-controls="pills-timeline" aria-selected="true">Timeline</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#last-month" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">Setting</a>
                            </li>
                        </ul>
                        <!-- Tabs -->
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="current-month" role="tabpanel" aria-labelledby="pills-timeline-tab">
                                <div class="card-body">
                                    <div class="profiletimeline m-t-0">
                                        <div class="sl-item">
                                            <div class="sl-left"> <img src="../../../../../public/images/AdminDashboardImages/images/users/1.jpg" alt="user" class="rounded-circle" /> </div>
                                            <div class="sl-right">
                                                <div><a href="javascript:void(0)" class="link">Mohamed Abduallah</a> <span class="sl-date">5 minutes ago</span>
                                                    <p>assign a new Post <a href="javascript:void(0)"> Posts</a></p>
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-6 m-b-20"><img src="../../../../../public/images/AdminDashboardImages/images/big/img1.jpg" class="img-fluid rounded" /></div>
                                                        <div class="col-lg-3 col-md-6 m-b-20"><img src="../../../../../public/images/AdminDashboardImages/images/big/img2.jpg" class="img-fluid rounded" /></div>
                                                        <div class="col-lg-3 col-md-6 m-b-20"><img src="../../../../../public/images/AdminDashboardImages/images/big/img3.jpg" class="img-fluid rounded" /></div>
                                                        <div class="col-lg-3 col-md-6 m-b-20"><img src="../../../../../public/images/AdminDashboardImages/images/big/img4.jpg" class="img-fluid rounded" /></div>
                                                    </div>
                                                    <div class="like-comm"> <a href="javascript:void(0)" class="link m-r-10">2 comment</a> <a href="javascript:void(0)" class="link m-r-10"><i class="fa fa-heart text-danger"></i> 5 Love</a> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="sl-item">
                                            <div class="sl-left"> <img src="../../../../../public/images/AdminDashboardImages/images/users/2.jpg" alt="user" class="rounded-circle" /> </div>
                                            <div class="sl-right">
                                                <div> <a href="javascript:void(0)" class="link">Mohamed Abduallah</a> <span class="sl-date">5 minutes ago</span>
                                                    <div class="m-t-20 row">
                                                        <div class="col-md-3 col-xs-12"><img src="../../../../../public/images/AdminDashboardImages/images/big/img1.jpg" alt="user" class="img-fluid rounded" /></div>
                                                        <div class="col-md-9 col-xs-12">
                                                            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. </p> <a href="javascript:void(0)" class="btn btn-success"> Show Post</a></div>
                                                    </div>
                                                    <div class="like-comm m-t-20"> <a href="javascript:void(0)" class="link m-r-10">2 comment</a> <a href="javascript:void(0)" class="link m-r-10"><i class="fa fa-heart text-danger"></i> 5 Love</a> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="sl-item">
                                            <div class="sl-left"> <img src="../../../../../public/images/AdminDashboardImages/images/users/3.jpg" alt="user" class="rounded-circle" /> </div>
                                            <div class="sl-right">
                                                <div><a href="javascript:void(0)" class="link">Mohamed Abduallah</a> <span class="sl-date">5 minutes ago</span>
                                                    <p class="m-t-10"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper </p>
                                                </div>
                                                <div class="like-comm m-t-20"> <a href="javascript:void(0)" class="link m-r-10">2 comment</a> <a href="javascript:void(0)" class="link m-r-10"><i class="fa fa-heart text-danger"></i> 5 Love</a> </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="sl-item">
                                            <div class="sl-left"> <img src="../../../../../public/images/AdminDashboardImages/images/users/4.jpg" alt="user" class="rounded-circle" /> </div>
                                            <div class="sl-right">
                                                <div><a href="javascript:void(0)" class="link">Hager Elgabaly</a> <span class="sl-date">5 minutes ago</span>
                                                    <blockquote class="m-t-10">
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                                    </blockquote>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
                                            <br>
                                            <p class="text-muted">{{ user.name }}</p>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Phone</strong>
                                            <br>
                                            <p class="text-muted">0115461652</p>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                            <br>
                                            <p class="text-muted">{{ user.email }}</p>
                                        </div>
                                        <div class="col-md-3 col-xs-6"> <strong>Location</strong>
                                            <br>
                                            <p class="text-muted">Egypt</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <p class="m-t-30">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries </p>
                                    <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ips. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries </p>
                                    <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                                <div class="card-body">
                                    <div class="form-horizontal form-material">
                                        <div class="form-group">
                                            <label class="col-md-12">Full Name</label>
                                            <div class="col-md-12">
                                                <input type="text" v-model="user.name" class="form-control form-control-line">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-email" class="col-md-12">Email</label>
                                            <div class="col-md-12">
                                                <input type="email" v-model="user.email" class="form-control form-control-line" name="email" id="example-email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12">Password</label>
                                            <div class="col-md-12">
                                                <input type="password" v-model="user.password" class="form-control form-control-line">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12">Phone No</label>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="123 456 7890" class="form-control form-control-line">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-12">Select Country</label>
                                            <div class="col-sm-12">
                                                <select class="form-control form-control-line">
                                                    <option>Egypt</option>
                                                    <option>Usa</option>
                                                    <option>Canada</option>
                                                    <option>France</option>
                                                    <option>Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12">Image</label>
                                            <div class="col-md-12">
                                                <input type="file" placeholder="" class="form-control form-control-line">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <button class="btn btn-success" v-on:click="updateUser(user.id, user)">Update Profile</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
            </div>
            <!-- Row -->
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center">
            Ahmed R.Mohamed
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
                //DB
                user: {},
                newUser: {
                    name: '',
                    email: '',
                    password: '',
                    type: '',
                },
            }
        },
        mounted: function () {
            console.log('Component fired.');
        },
        computed: {
        },

        created: function () {
            this.getUser();
        },
        methods: {
            getUser: function () {
                axios.get('../api/admin-dashboard/profile/'+this.auth_user_id).then(response => {
                    this.user = response.data.user;
                    console.log(this.user);
                });
            },

            destroyUser: function (id, index) {
                axios.delete('/api/admin-dashboard/users/' + id).then(response => {
                    this.newUser = response.data.user;
                    this.users.splice(index, 1);
                }).catch(error => {
                    console.log(error);
                })
            },
            // To Show the user information in the modal
            EditUser: function(id){
                axios.get('/api/admin-dashboard/users/' + id + '/edit').then(response => {
                    this.user = response.data.user;
                }).catch(error => {
                    console.log(error);
                })
            },
            resetUser:function(){
              console.log(this.user);
            },
            updateUser: function (id, user) {
                axios.patch('/api/admin-dashboard/users/' + id, user).then(response => {
                    this.user = response.data.user;
                    console.log(this.user);
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
