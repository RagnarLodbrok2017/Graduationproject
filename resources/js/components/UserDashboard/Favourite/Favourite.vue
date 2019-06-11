<template>
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page">
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
                                <h4 class="card-title">All Saved and Favourite Posts</h4>
                                <div class="ml-auto">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-outline-dark ml-3 WideTable"
                                                data-toggle="modal" data-target="">
                                            <i class="ti-angle-double-right WideButtonArrow"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="row el-element-overlay">
                                <div class="col-lg-4 col-md-6"  v-for="(favourite, index) in favourites">
                                    <div class="card">
                                        <div class="el-card-item">
                                            <div class="el-card-avatar el-overlay-1 changeSizeOfCardToSmall"> <img :src="path(favourite.post.image)" alt="user" />
                                                <div class="el-overlay">
                                                    <ul class="list-style-none el-info">
                                                        <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" :href="path(favourite.post.image)"><i class="icon-magnifier"></i></a></li>
                                                        <li class="el-item"><a class="btn default btn-outline el-link" href="javascript:void(0);" v-on:click="DeleteSavedPost(favourite.id, index)"><i class="icon-trash"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="d-flex no-block align-items-center m-b-15">
                                                    <span><i class="ti-calendar"></i> {{ favourite.post.created_at}}</span>
                                                    <div class="ml-auto" v-b-tooltip title="Comments" variant="outline-success" @click="modalShow = !modalShow"
                                                         v-on:click="copyPost(favourite.post)">
                                                        <a href="javascript:void(0)" class="link"><i class="ti-comments" ></i> {{favourite.post.comment.length}} Comments</a>
                                                    </div>
<!--                                                    <b-modal v-model="modalShow" title="Comments">-->
<!--                                                        <div class="list-group">-->
<!--                                                            <button v-for="comment in copedPost.comment" type="button" class="list-group-item list-group-item-action">-->
<!--                                                                <h6> Comment: </h6> {{comment.subject}}-->
<!--                                                            </button>-->
<!--                                                        </div>-->
<!--                                                    </b-modal>-->
                                                </div>
                                                <h3 class="font-normal">{{ favourite.post.title }}</h3>
                                                <p><small style="color: #CDBFFA">{{favourite.user.name}}</small> &nbsp; <small style="color: #F9B8C7">{{favourite.user.type}}</small></p>
                                                <p class="m-b-0 m-t-10">{{ favourite.post.subtitle}}</p>
<!--                                                <button class="btn btn-primary btn-rounded waves-effect waves-light m-t-20">Like</button>-->
<!--                                                <button type="button" class="js-like-button like-btn">♥︎&nbsp; Like</button>-->
<!--                                                <p v-if="checkLike(favourite.post)"></p>-->
                                                <div class="like-content">
                                                    <button v-if="!favourite.post.like.length" v-on:click="LikePost(favourite.post.id)" class="btn-secondary2 like-review">
                                                        <i class="fa fa-heart" aria-hidden="true"></i> Like</button>
                                                </div>
                                                <div class="like-content" v-for="like in favourite.post.like" v-if="favourite.post.like.length">
                                                    <button v-if="!favourite.post.like.length" v-on:click="LikePost(favourite.post.id)" class="btn-secondary2 like-review">
                                                        <i class="fa fa-heart" aria-hidden="true"></i> Like</button>
                                                        <button v-if="like.users_id === auth_user_id" v-on:click="DislikePost(like.id)" class="btn-secondary like-review">
                                                        <i class="fa fa-heart" aria-hidden="true"></i> Dislike </button>
<!--                                                        <button v-if="!(like.users_id === auth_user_id)" v-on:click="LikePost(favourite.post.id)" class="btn-secondary2 like-review">-->
<!--                                                        <i class="fa fa-heart" aria-hidden="true"></i> Like</button>-->
                                                </div>
                                                <div class="comment-content">
                                                    <b-button class="btn-secondary like-review" data-toggle="modal"
                                                              data-target="#createComment" v-on:click="passId(favourite.post.id)">
                                                        <i class="fa fa-pen-square" aria-hidden="true"></i> Comment
                                                    </b-button>
                                                    <div class="modal fade" id="createComment" tabindex="-1" role="dialog" aria-labelledby="createModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <form>
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"><i class="ti-marker-alt m-r-10"></i>
                                                                            Enter your comment </h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form method="POST">
                                                                            <div class="form-body">
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <div class="form-group">
                                                                                            <input type="hidden" :value="favourite.post.id" name="id" >
                                                                                            <b-form-input type="text" v-model="comment.subject" class="form-control" placeholder="Enter Your Comment" maxlength="50"></b-form-input>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-actions m-t-40">
                                                                                <button type="button" class="btn btn-success"  v-on:click="addComment(comment.subject)"  v-show="comment.subject">
                                                                                    <i class="fa fa-check"></i> Add Comment
                                                                                </button>
                                                                                <button type="button" class="btn btn-dark" data-dismiss="modal">Cancel</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
<!--                                                <button class="btn btn-success btn-rounded waves-effect waves-light m-t-20" style="float: right">Comment</button>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
    import Multiselect from 'vue-multiselect';
    export default {
        props: ['auth_user_id'],
        data() {
            return {
                //select Status of Post
                selected: '',
                options: [
                    { text: 'Active', value: '1' },
                    { text: 'Pending', value: '2' },
                    { text: 'Banned', value: '0' }
                ],
                value: '',

                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                routeName: "{{route(''post.uploadVideoRoute')}}",
                modalShow:false,
                //DB
                commentSubject:'',
                liked : false,
                image:'',
                posts: [],
                post: {},
                copedPost: {},
                comment: {
                    subject:'',
                    post_id:'',
                },
                user: {},
                categories: [],
                favourites: [],
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
                    video:'',
                    meta_keyword:'',
                    meta_title:'',
                    categoriesIds: [],
                },
                post_id: 0,
                postId: '',
                // image_src: '../../../../../public/images/AdminDashboardImages/images/gallery/chair.jpg',
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
                axios.get('../dashboard/favourites/posts').then(response => {
                    this.favourites = response.data.favourites;
                    // this.categories = response.data.categories;
                    console.log(this.posts);
                    this.totalRows = this.favourites.length;
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
                formData.append('video', this.video);
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

                axios.post('../dashboard/posts', formData, config)
                    .then(function (response) {
                        this.posts.push(this.newPost);
                    })
                    .catch(function (error) {
                        currentObj.output = error;
                    });
            },
            passId:function(id){
                this.comment.post_id = id;
            },
            copyPost:function(post){
                this.copedPost = {};
                this.copedPost = post;
            },
            addComment: function (subject) {
                // this.newPost.categoriesIds = this.newPost.categoriesIds;
                this.comment.subject = subject;
                axios.post('../dashboard/posts/comment', this.comment).then(response => {
                    // this.newPost = response.data.newPost;
                    console.log(this.comment);
                    this.comment.subject = '';
                    this.comment.post_id = '';
                    // this.posts.push(this.newPost);
                    // $('.CloseAddUserForm').click();
                }).catch(error => {
                    console.log(error);
                })
            },
            LikePost: function (id) {
                axios.post('/dashboard/posts/like/' + id).then(response => {
                    // this.newPost = response.data.post;
                    this.fetchPosts();
                }).catch(error => {
                    console.log(error);
                })
            },
            DislikePost: function (id) {
                axios.post('/dashboard/posts/dislike/' + id).then(response => {
                    // this.newPost = response.data.post;
                    this.fetchPosts();
                }).catch(error => {
                    console.log(error);
                })
            },
            checkLike: function(post){
                post.like.map((like) => {
                    if (like.users_id === this.auth_user_id){
                        console.log("Yes");
                        this.liked = true;
                    }
                    else {
                        this.liked = false;
                    }
                    // return like.users_id === this.auth_user_id;
                });
                    },
            DeleteSavedPost: function (id, index) {
                axios.delete('/dashboard/favourites/posts/' + id).then(response => {
                    // this.newPost = response.data.post;
                    this.favourites.splice(index, 1);
                    console.log(response);
                }).catch(error => {
                    console.log(error);
                })
            },
            // To Show the post information in the modal
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
                this.image = e.target.files[0];
                console.log(this.image);
            },
            onVideoChange(e){
                // this.video = e.target.files[0];
                console.log(e.target);
                this.image = e.target.files[1];
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
    /*Like and comment Buttons */
    .like-content .btn-secondary,
    .like-content .btn-secondary2,
    .comment-content .btn-secondary
    {
         display: block;
         text-align: center;
         border-radius: 3px;
         margin-top: 20px;
         padding: 8px 15px;
         font-size: 14px;
         cursor: pointer;
         border: none;
         outline: none;
         color: #ffffff;
         text-decoration: none;
         -webkit-transition: 0.3s ease;
         transition: 0.3s ease;
     }
    .like-content .btn-secondary{
        float: left;
        /*background: #ed2553;*/
        background: white;
        color: #ed2553;
        box-shadow: 0 10px 20px -8px rgb(240, 75, 113);
        border: 1px solid #ed2553;
    }
    .like-content .btn-secondary2{
        float: left;
        background: #ed2553;
        color: white;
        border: none;
    }
    .comment-content .btn-secondary{
        float: right;
        background: #1A5099;
        box-shadow: 0 10px 20px -8px rgb(115, 77, 240);
    }
    .like-content .btn-secondary:hover {
        transform: translateY(-3px);
    }
    .like-content .btn-secondary .fa {
        margin-right: 5px;
    }

    .animate-like {
        animation-name: likeAnimation;
        animation-iteration-count: 1;
        animation-fill-mode: forwards;
        animation-duration: 0.65s;
    }
    @keyframes likeAnimation {
        0%   { transform: scale(30); }
        100% { transform: scale(1); }
    }
    .changeSizeOfCardToSmall{
        min-height: 263px;
    }
    .changeSizeOfCardToBig{
        min-height: 415px;
    }
    .changeSizeOfCardToBigger{
        min-height: 491px;
    }

</style>
