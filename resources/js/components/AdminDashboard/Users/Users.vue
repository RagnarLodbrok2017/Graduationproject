<template>
    <!--    <div class="container Users" id="Users">
            <div class="row">
                <b-alert show>{{users.length}}</b-alert>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <td>#</td>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Age</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="user in users">
                        <td>{{ user.id }}</td>
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
                        <td>
                            lol
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>-->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">All Users</h4>
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
                <div class="col-lg-8 col-xl-9 col-md-9 UsersTableClass">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex no-block align-items-center m-b-30">
                                <h4 class="card-title">All Users</h4>
                                <div class="ml-auto">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#createmodel">
                                            Create New User
                                        </button>
                                        <button type="button" class="btn btn-outline-dark ml-3 WideTable" data-toggle="modal" data-target="">
                                            <i class="ti-angle-double-right WideButtonArrow"></i>
                                            <i class="ti-angle-double-right WideButtonArrow"></i>
                                            <i class="ti-angle-double-right WideButtonArrow"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="file_export" class="table table-bordered nowrap display">
                                    <thead>
                                    <tr>
                                        <th> </th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Role</th>
                                        <th>Age</th>
                                        <th>Joining date</th>
                                        <th>Posts</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="user in users">
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customControlValidation2" required>
                                                <label class="custom-control-label" for="customControlValidation2"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="../"><img :src="image_src" alt="user" class="rounded-circle" width="30" /> {{ user.name }} </a>
                                        </td>
                                        <td>{{ user.email }}</td>
                                        <td>+123 456 789</td>
                                        <td><span class="label label-danger">{{ user.type }}</span> </td>
                                        <td>{{ user.age }}</td>
                                        <td>12-10-2014</td>
                                        <td>1200</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
                                            <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-pencil" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customControlValidation3" required>
                                                <label class="custom-control-label" for="customControlValidation3"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="../"><img src="../../../../../public/images/AdminDashboardImages/images/users/1.jpg" alt="user" class="rounded-circle" width="30" /> Arijit Singh</a>
                                        </td>
                                        <td>arijit@gmail.com</td>
                                        <td>+234 456 789</td>
                                        <td><span class="label label-info">Tester2</span> </td>
                                        <td>26</td>
                                        <td>10-09-2014</td>
                                        <td>$1800</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customControlValidation4" required>
                                                <label class="custom-control-label" for="customControlValidation4"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="../"><img src="images/users/3.jpg" alt="user" class="rounded-circle" width="30" /> Govinda jalan</a>
                                        </td>
                                        <td>govinda@gmail.com</td>
                                        <td>+345 456 789</td>
                                        <td><span class="label label-success">Admin</span></td>
                                        <td>28</td>
                                        <td>1-10-2013</td>
                                        <td>$2200</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customControlValidation5" required>
                                                <label class="custom-control-label" for="customControlValidation5"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="../"><img src="images/users/4.jpg" alt="user" class="rounded-circle" width="30" /> Hritik Roshan</a>
                                        </td>
                                        <td>hritik@gmail.com</td>
                                        <td>+456 456 789</td>
                                        <td><span class="label label-inverse">Vip</span></td>
                                        <td>25</td>
                                        <td>2-10-2017</td>
                                        <td>$200</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customControlValidation6" required>
                                                <label class="custom-control-label" for="customControlValidation6"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="../"><img src="images/users/5.jpg" alt="user" class="rounded-circle" width="30" /> John Abraham</a>
                                        </td>
                                        <td>john@gmail.com</td>
                                        <td>+567 456 789</td>
                                        <td><span class="label label-danger">Vip</span></td>
                                        <td>23</td>
                                        <td>10-9-2015</td>
                                        <td>$1200</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customControlValidation7" required>
                                                <label class="custom-control-label" for="customControlValidation7"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="../"><img src="images/users/6.jpg" alt="user" class="rounded-circle" width="30" /> Pawandeep kumar</a>
                                        </td>
                                        <td>pawandeep@gmail.com</td>
                                        <td>+678 456 789</td>
                                        <td><span class="label label-warning">Admin</span></td>
                                        <td>29</td>
                                        <td>10-5-2013</td>
                                        <td>$1500</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customControlValidation8" required>
                                                <label class="custom-control-label" for="customControlValidation8"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="../"><img src="images/users/7.jpg" alt="user" class="rounded-circle" width="30" /> Ritesh Deshmukh</a>
                                        </td>
                                        <td>ritesh@gmail.com</td>
                                        <td>+123 456 789</td>
                                        <td><span class="label label-danger">User</span></td>
                                        <td>35</td>
                                        <td>05-10-2012</td>
                                        <td>$3200</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customControlValidation9" required>
                                                <label class="custom-control-label" for="customControlValidation9"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="../"><img src="images/users/8.jpg" alt="user" class="rounded-circle" width="30" /> Salman Khan</a>
                                        </td>
                                        <td>salman@gmail.com</td>
                                        <td>+234 456 789</td>
                                        <td><span class="label label-info">User</span></td>
                                        <td>27</td>
                                        <td>11-10-2014</td>
                                        <td>$1800</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customControlValidation10" required>
                                                <label class="custom-control-label" for="customControlValidation10"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="../"><img src="images/users/1.jpg" alt="user" class="rounded-circle" width="30" /> Govinda jalan</a>
                                        </td>
                                        <td>govinda@gmail.com</td>
                                        <td>+345 456 789</td>
                                        <td><span class="label label-success">User</span></td>
                                        <td>18</td>
                                        <td>12-5-2017</td>
                                        <td>$100</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customControlValidation11" required>
                                                <label class="custom-control-label" for="customControlValidation11"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="../"><img src="images/users/2.jpg" alt="user" class="rounded-circle" width="30" /> Sonu Nigam</a>
                                        </td>
                                        <td>sonu@gmail.com</td>
                                        <td>+456 456 789</td>
                                        <td><span class="label label-inverse">Admin</span></td>
                                        <td>36</td>
                                        <td>18-5-2009</td>
                                        <td>$4200</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customControlValidation12" required>
                                                <label class="custom-control-label" for="customControlValidation12"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="../"><img src="images/users/3.jpg" alt="user" class="rounded-circle" width="30" /> Varun Dhawan</a>
                                        </td>
                                        <td>varun@gmail.com</td>
                                        <td>+567 456 789</td>
                                        <td><span class="label label-danger">Manager</span></td>
                                        <td>43</td>
                                        <td>12-10-2010</td>
                                        <td>$5200</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customControlValidation13" required>
                                                <label class="custom-control-label" for="customControlValidation13"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="../"><img src="images/users/4.jpg" alt="user" class="rounded-circle" width="30" /> Genelia Deshmukh</a>
                                        </td>
                                        <td>genelia@gmail.com</td>
                                        <td>+123 456 789</td>
                                        <td><span class="label label-danger">User</span> </td>
                                        <td>23</td>
                                        <td>12-10-2014</td>
                                        <td>$1200</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customControlValidation14" required>
                                                <label class="custom-control-label" for="customControlValidation14"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="../"><img src="images/users/5.jpg" alt="user" class="rounded-circle" width="30" /> Arijit Singh</a>
                                        </td>
                                        <td>arijit@gmail.com</td>
                                        <td>+234 456 789</td>
                                        <td><span class="label label-info">Admin</span> </td>
                                        <td>26</td>
                                        <td>10-09-2014</td>
                                        <td>$1800</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customControlValidation15" required>
                                                <label class="custom-control-label" for="customControlValidation15"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="../"><img src="images/users/6.jpg" alt="user" class="rounded-circle" width="30" /> Govinda jalan</a>
                                        </td>
                                        <td>govinda@gmail.com</td>
                                        <td>+345 456 789</td>
                                        <td><span class="label label-success">Admin</span></td>
                                        <td>28</td>
                                        <td>1-10-2013</td>
                                        <td>$2200</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customControlValidation16" required>
                                                <label class="custom-control-label" for="customControlValidation16"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="../"><img src="images/users/1.jpg" alt="user" class="rounded-circle" width="30" /> Genelia Deshmukh</a>
                                        </td>
                                        <td>genelia@gmail.com</td>
                                        <td>+123 456 789</td>
                                        <td><span class="label label-danger">Designer</span> </td>
                                        <td>23</td>
                                        <td>12-10-2014</td>
                                        <td>$1200</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customControlValidation17" required>
                                                <label class="custom-control-label" for="customControlValidation17"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="../"><img src="images/users/2.jpg" alt="user" class="rounded-circle" width="30" /> Arijit Singh</a>
                                        </td>
                                        <td>arijit@gmail.com</td>
                                        <td>+234 456 789</td>
                                        <td><span class="label label-info">Developer</span> </td>
                                        <td>26</td>
                                        <td>10-09-2014</td>
                                        <td>$1800</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customControlValidation18" required>
                                                <label class="custom-control-label" for="customControlValidation18"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="../"><img src="images/users/3.jpg" alt="user" class="rounded-circle" width="30" /> Govinda jalan</a>
                                        </td>
                                        <td>govinda@gmail.com</td>
                                        <td>+345 456 789</td>
                                        <td><span class="label label-success">User</span></td>
                                        <td>28</td>
                                        <td>1-10-2013</td>
                                        <td>$2200</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customControlValidation19" required>
                                                <label class="custom-control-label" for="customControlValidation19"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="../"><img src="images/users/4.jpg" alt="user" class="rounded-circle" width="30" /> Hritik Roshan</a>
                                        </td>
                                        <td>hritik@gmail.com</td>
                                        <td>+456 456 789</td>
                                        <td><span class="label label-inverse">User</span></td>
                                        <td>25</td>
                                        <td>2-10-2017</td>
                                        <td>$200</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customControlValidation20" required>
                                                <label class="custom-control-label" for="customControlValidation20"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="../"><img src="images/users/5.jpg" alt="user" class="rounded-circle" width="30" /> John Abraham</a>
                                        </td>
                                        <td>john@gmail.com</td>
                                        <td>+567 456 789</td>
                                        <td><span class="label label-danger">Admin</span></td>
                                        <td>23</td>
                                        <td>10-9-2015</td>
                                        <td>$1200</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customControlValidation21" required>
                                                <label class="custom-control-label" for="customControlValidation21"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="../"><img src="images/users/6.jpg" alt="user" class="rounded-circle" width="30" /> Pawandeep kumar</a>
                                        </td>
                                        <td>pawandeep@gmail.com</td>
                                        <td>+678 456 789</td>
                                        <td><span class="label label-warning">Vip</span></td>
                                        <td>29</td>
                                        <td>10-5-2013</td>
                                        <td>$1500</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customControlValidation22" required>
                                                <label class="custom-control-label" for="customControlValidation22"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="../"><img src="images/users/7.jpg" alt="user" class="rounded-circle" width="30" /> Ritesh Deshmukh</a>
                                        </td>
                                        <td>ritesh@gmail.com</td>
                                        <td>+123 456 789</td>
                                        <td><span class="label label-danger">Designer</span></td>
                                        <td>35</td>
                                        <td>05-10-2012</td>
                                        <td>$3200</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customControlValidation23" required>
                                                <label class="custom-control-label" for="customControlValidation23"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="../"><img src="images/users/8.jpg" alt="user" class="rounded-circle" width="30" /> Salman Khan</a>
                                        </td>
                                        <td>salman@gmail.com</td>
                                        <td>+234 456 789</td>
                                        <td><span class="label label-info">Developer</span></td>
                                        <td>27</td>
                                        <td>11-10-2014</td>
                                        <td>$1800</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customControlValidation24" required>
                                                <label class="custom-control-label" for="customControlValidation24"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="../"><img src="images/users/1.jpg" alt="user" class="rounded-circle" width="30" /> Govinda jalan</a>
                                        </td>
                                        <td>govinda@gmail.com</td>
                                        <td>+345 456 789</td>
                                        <td><span class="label label-success">Accountant</span></td>
                                        <td>18</td>
                                        <td>12-5-2017</td>
                                        <td>$100</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customControlValidation25" required>
                                                <label class="custom-control-label" for="customControlValidation25"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="../"><img src="images/users/2.jpg" alt="user" class="rounded-circle" width="30" /> Sonu Nigam</a>
                                        </td>
                                        <td>sonu@gmail.com</td>
                                        <td>+456 456 789</td>
                                        <td><span class="label label-inverse">HR</span></td>
                                        <td>36</td>
                                        <td>18-5-2009</td>
                                        <td>$4200</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column Users Details and Category-->
                <div class="col-lg-4 col-xl-3 col-md-3 ShareModel animated bounceInRight">
                    <div class="card">
                        <div class="border-bottom p-15">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#Sharemodel" style="width: 100%">
                                <i class="ti-share m-r-10"></i> Share With
                            </button>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ti-search"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Search Contacts Here..." aria-label="Amount (to the nearest dollar)">
                                    <div class="input-group-append">
                                        <button class="btn btn-info">Ok</button>
                                    </div>
                                </div>
                            </form>
                            <div class="list-group m-t-30">
                                <a href="javascript:void(0)" class="list-group-item active"><i class="ti-layers m-r-10"></i> All Users</a>
                                <a href="javascript:void(0)" class="list-group-item"><i class="ti-star m-r-10"></i> Favourite Users</a>
                                <a href="javascript:void(0)" class="list-group-item"><i class="ti-bookmark m-r-10"></i> Recently Created</a>
                            </div>
                            <h4 class="card-title m-t-30">Groups</h4>
                            <div class="list-group">
                                <a href="javascript:void(0)" class="list-group-item"><i class="ti-flag-alt-2 m-r-10"></i> SuperAdmins
                                    <span class="badge badge-info float-right">1</span>
                                </a>
                                <a href="javascript:void(0)" class="list-group-item"><i class="ti-notepad m-r-10"></i> Admins
                                    <span class="badge badge-success float-right">4</span>
                                </a>
                                <a href="javascript:void(0)" class="list-group-item"><i class="ti-target m-r-10"></i> VIPs
                                    <span class="badge badge-dark float-right">42</span>
                                </a>
                                <a href="javascript:void(0)" class="list-group-item"><i class="ti-comments m-r-10"></i> Users
                                    <span class="badge badge-danger float-right">204</span>
                                </a>
                            </div>
                            <h4 class="card-title m-t-30">More</h4>
                            <div class="list-group">
                                <a href="javascript:void(0)" class="list-group-item">
                                    <span class="badge badge-info m-r-10"><i class="ti-import"></i></span> Import Users
                                </a>
                                <a href="javascript:void(0)" class="list-group-item">
                                    <span class="badge badge-warning text-white m-r-10"><i class="ti-export"></i></span> Export Users
                                </a>
                                <a href="javascript:void(0)" class="list-group-item">
                                    <span class="badge badge-success m-r-10"><i class="ti-share-alt"></i></span> Restore Users
                                </a>
                                <a href="javascript:void(0)" class="list-group-item">
                                    <span class="badge badge-primary m-r-10"><i class="ti-layers-alt"></i></span> Duplicate Users
                                </a>
                                <a href="javascript:void(0)" class="list-group-item">
                                    <span class="badge badge-danger m-r-10"><i class="ti-trash"></i></span> Delete All Users
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
            </div>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right sidebar -->
            <!-- ============================================================== -->
            <!-- .right-sidebar -->
            <!-- ============================================================== -->
            <!-- End Right sidebar -->
            <!-- ============================================================== -->
        </div>
        <!-- Share Modal -->
        <div class="modal fade" id="Sharemodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form>
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="mdi mdi-auto-fix m-r-10"></i> Share With</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <button type="button" class="btn btn-info"><i class="ti-user text-white"></i></button>
                                <input type="text" class="form-control" placeholder="Enter Name Here" aria-label="Username">
                            </div>
                            <div class="row">
                                <div class="col-3 text-center">
                                    <a href="#Whatsapp" class="text-success">
                                        <i class="display-6 mdi mdi-whatsapp"></i><br><span class="text-muted">Whatsapp</span>
                                    </a>
                                </div>
                                <div class="col-3 text-center">
                                    <a href="#Facebook" class="text-info">
                                        <i class="display-6 mdi mdi-facebook"></i><br><span class="text-muted">Facebook</span>
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
                            <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Create Modal -->
        <div class="modal fade" id="createmodel" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form>
                        <div class="modal-header">
                            <h5 class="modal-title" id="createModalLabel"><i class="ti-marker-alt m-r-10"></i> Create New Contact</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <button type="button" class="btn btn-info"><i class="ti-user text-white"></i></button>
                                <input type="text" class="form-control" placeholder="Enter Name Here" aria-label="name">
                            </div>
                            <div class="input-group mb-3">
                                <button type="button" class="btn btn-info"><i class="ti-more text-white"></i></button>
                                <input type="text" class="form-control" placeholder="Enter Mobile Number Here" aria-label="no">
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
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
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
            All Rights Reserved by Ahmed R. Mohamed
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
        mounted: function () {
            console.log('Component fired.');
            // this.totalRows = this.items.length;
        },
        data() {
            return {
                //DB
                users: [],
                user: [],
                user_id : 0,
                filter: null,
                image_src:'../../../../../public/images/AdminDashboardImages/images/users/1.jpg',
            }
        },
        created: function () {
            this.fetchUsers();
        },
        methods: {
            fetchUsers: function () {
                {
                    axios.get('../api/admin-dashboard/users').then(response => {
                        this.users = response.data.users;
                        console.log("************* This.users *****************");
                        console.log(this.users);
                        console.log(JSON.stringify(this.users[0]));
                    });
                }
            },
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
</style>
