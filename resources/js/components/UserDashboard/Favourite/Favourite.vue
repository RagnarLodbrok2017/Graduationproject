<template>
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
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
                                        <h4 class="m-b-0">Total Posts Saved</h4>
                                        <span>Saved</span>
                                    </div>
                                    <div class="ml-auto align-self-center">
                                        <h2 class="font-medium m-b-0">{{ favourites.length }}</h2>
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
                                        <h4 class="m-b-0">Total Likes</h4>
                                        <span>Likes</span>
                                    </div>
                                    <div class="ml-auto align-self-center">
                                        <h2 class="font-medium m-b-0">1</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
            </div>
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <!-- Column  Users Table -->
                <div class="col-lg-12 col-xl-12 col-md-12 UsersTableClass">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex no-block align-items-center m-b-30">
                                <h4 class="card-title">All Saved and Favourite Posts</h4>
                            </div>
                            <div class="row el-element-overlay">
                                <div class="col-lg-6 col-md-6"  v-for="(favourite, index) in favourites">
                                    <div class="card">
                                        <div class="el-card-item">
                                            <div class="el-card-avatar el-overlay-1 changeSizeOfCardToSmall"> <img :src="path(favourite.post.image)" alt="user" />
                                                <div class="el-overlay">
                                                    <ul class="list-style-none el-info">
                                                        <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" :href="'../../../dashboard/post_profile/'+favourite.post.id"><i class="icon-magnifier"></i></a></li>
                                                        <li class="el-item">
                                                            <a class="btn default btn-outline el-link" href="javascript:void(0);" v-on:click="DeleteSavedPost(favourite.id, index)">
                                                                <i class="icon-trash"></i>
                                                            </a>
                                                        </li>
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
                                                <div class="comments-dev col-12">
                                                    <ul class="list-group">
                                                        <button type="button" class="list-group-item list-group-item-action active">
                                                            Comments:
                                                        </button>
                                                        <li href="#" class="list-group-item list-group-item-action" v-for="comment in favourite.post.comment">
                                                            <div class="post-footer-comment-wrapper">
                                                                <div class="comment-form">

                                                                </div>
                                                                <div class="comment">
                                                                    <div class="media">
                                                                        <div class="media-left">
                                                                            <a href="#">
                                                                                <img class="media-object photo-profile img-circle" :src="path3(comment.user.photo)" width="32" height="32" alt="...">
                                                                            </a>
                                                                        </div>
                                                                        <div class="media-body">
                                                                            <a href="#" class="anchor-username"><h4 class="media-heading">{{comment.user.name}}</h4></a>
                                                                            <a href="#" class="anchor-time">{{comment.created_at}}</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="like-content deleteComment">
                                                                <button v-if="comment.users_id === auth_user_id" v-on:click="DeleteComment(comment.id)" class="btn-secondary like-review">
                                                                    <i class="fa fa-trash" aria-hidden="true"></i></button>
                                                            </div>
                                                            <p style="float:right">{{comment.subject}}</p>
                                                        </li>
                                                    </ul>
                                                    <!--                                                    <div class="comments" v-for="comment in post.comment">-->
                                                    <!--                                                    <p><small style="color: #CDBFFA; float: left; font-size:14px">{{ comment.user.name }}</small> &nbsp;-->
                                                    <!--                                                        <small style="color: #F9B8C7; float: right">{{ comment.subject}}</small>-->
                                                    <!--                                                    </p>-->
                                                    <!--                                                    </div>-->
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
                    this.fetchPosts();
                    // this.posts.push(this.newPost);
                    // $('.CloseAddUserForm').click();
                }).catch(error => {
                    console.log(error);
                })
            },
            DeleteComment: function (id) {
                axios.post('/dashboard/posts/deletecomment/' + id).then(response => {
                    // this.newPost = response.data.post;
                    this.fetchPosts();
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
            path3(image) {
                return require('../../../../../public/images/AdminDashboardImages/images/users/' + image)
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
    .comments-dev{
        overflow: hidden;
        padding: 0;
        padding-top: 11px;
    }
    .comments-dev .media{
        float: left;
    }
    .comments-dev .media .media-heading{
        font-size : 14px;
        padding-left: 13px;
    }
    .comments-dev .media .anchor-time{
        padding-left: 14px;
        font-size :11px;
    }
    .el-element-overlay .Post{
        border-bottom: 20px solid #eef5f9;
        border-radius: 2px;
        margin: 30px 0 20px 0;
    }
    .modal-comment{
        width: 40vw;
        margin: 72px 386px
    }
    .deleteComment {
        float: right;
    }
    .deleteComment .like-review{
        padding: 5px;
        margin: 0 0 0 15px;
    }

</style>
