<template>
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page">
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
                                <h4 class="card-title">All Posts</h4>
                                <ul class="navbar-nav float-left mr-auto">
                                <li class="nav-item search-box" style="margin-top: -25px; margin-left: 30px;"><a class="nav-link waves-effect waves-dark" href="javascript:void(0)" style="padding-top: 25px; line-height: 0px"><i class="ti-search"></i></a>
                                    <form class="app-search position-absolute">
                                        <input type="search" class="form-control" placeholder="Search &amp; enter" v-model="search">
                                        <a @click.prevent="searchPost" class="srh-btn" style="margin-right:30px;"><i class="ti-search"></i></a>
                                        <a class="srh-btn"><i class="ti-close"></i></a>
                                    </form>
                                </li>
                                </ul>
                                <div class="ml-auto">
                                    <div class="btn-group">
<!--                                        <button type="button" class="btn btn-dark" data-toggle="modal"-->
<!--                                                data-target="#createmodel">-->
<!--                                            Create New Post-->
<!--                                        </button>-->
                                        <button type="button" class="btn btn-outline-dark ml-3 WideTable"
                                                data-toggle="modal" data-target="">
                                            <i class="ti-angle-double-right WideButtonArrow"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="row el-element-overlay" v-if="showSearch === false">
                                <div class="col-lg-12 col-md-6 Post"  v-for="post in filteredPosts" style>
                                    <div class="card">
                                        <div class="el-card-item">
                                            <div class="el-card-avatar el-overlay-1 changeSizeOfCardToSmall"> <img :src="path(post.image)" alt="user" />
                                                <div class="el-overlay">
                                                    <ul class="list-style-none el-info">
                                                        <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" :href="'./dashboard/post_profile/'+post.id" v-b-tooltip title="Post Page" variant="outline-success">
                                                            <i class="icon-magnifier"></i></a></li>
                                                        <li class="el-item"><a class="btn default btn-outline el-link" href="javascript:void(0);" v-on:click="SavePost(post.id)" v-b-tooltip title="Save Post" variant="outline-success"><i class="icon-link"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="d-flex no-block align-items-center m-b-15">
                                                    <span><i class="ti-calendar"></i> {{ post.created_at}}</span>
                                                    <div class="ml-auto" v-b-tooltip title="Comments" variant="outline-success" @click="modalShow = !modalShow"
                                                         v-on:click="copyPost(post)">
                                                        <a href="javascript:void(0)" class="link"><i class="ti-comments" ></i> {{post.comment.length}} Comments</a>
                                                    </div>
<!--                                                    <b-modal v-model="modalShow" title="Comments">-->
<!--                                                        <div class="list-group">-->
<!--                                                            <button v-for="comment in copedPost.comment" type="button" class="list-group-item list-group-item-action">-->
<!--                                                                <h6> Comment: </h6> {{comment.subject}}-->
<!--                                                            </button>-->
<!--                                                        </div>-->
<!--                                                    </b-modal>-->
                                                </div>
                                                <h3 class="font-normal">{{ post.title }}</h3>
                                                <p><small style="color: #CDBFFA">{{post.user.name}}</small> &nbsp;
                                                    <small style="color: #F9B8C7" v-if="post.user.type === 'admin'">{{post.user.type}}</small></p>
                                                <p class="m-b-0 m-t-10">{{ post.subtitle}}</p>
<!--                                                <button class="btn btn-primary btn-rounded waves-effect waves-light m-t-20">Like</button>-->
<!--                                                <button type="button" class="js-like-button like-btn">♥︎&nbsp; Like</button>-->
<!--                                                <p v-if="checkLike(post)"></p>-->
                                                <div class="like-content">
<!--                                                    <button v-if="!post.like.length" v-on:click="LikePost(post.id)" class="btn-secondary2 like-review">-->
<!--                                                    <i class="fa fa-heart" aria-hidden="true"></i> Like</button>-->
                                                <button v-if="!checkLikeLoop(post)" v-on:click="LikePost(post.id)" class="btn-secondary2 like-review">
                                                    <i class="fa fa-heart" aria-hidden="true"></i> Like</button>
                                                </div>
                                                <div class="like-content" v-for="like in post.like">
<!--                                                    <button v-if="post.like.length && like.users_id !== auth_user_id" v-on:click="LikePost(post.id)" class="btn-secondary2 like-review">-->
<!--                                                        <i class="fa fa-heart" aria-hidden="true"></i> Like</button>-->
                                                    <button v-if="like.users_id === auth_user_id" v-on:click="DislikePost(like.id)" class="btn-secondary like-review">
                                                        <i class="fa fa-heart" aria-hidden="true"></i> Dislike </button>
<!--                                                        <button v-if="!(like.users_id === auth_user_id)" v-on:click="LikePost(post.id)" class="btn-secondary2 like-review">-->
<!--                                                        <i class="fa fa-heart" aria-hidden="true"></i> Like</button>-->
                                                </div>

                                                <div class="comment-content">
                                                    <b-button class="btn-secondary like-review" data-toggle="modal"
                                                              data-target="#createComment" v-on:click="passId(post.id)">
                                                        <i class="fa fa-pen-square" aria-hidden="true"></i> Comment
                                                    </b-button>
                                                    <div class="modal fade animated bounceInDown" id="createComment" tabindex="-1" role="dialog" aria-labelledby="createModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content modal-comment">
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
                                                                                            <input type="hidden" :value="post.id" name="id" >
                                                                                            <b-form-input type="text" v-model="comment.subject" class="form-control" placeholder="Enter Your Comment" maxlength="50"></b-form-input>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-actions m-t-40">
                                                                                <button type="button" class="btn btn-success" data-dismiss="modal" v-on:click="addComment(comment.subject)"  v-show="comment.subject">
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
                                                        <li href="#" class="list-group-item list-group-item-action" v-for="comment in post.comment">
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
                            <div class="row el-element-overlay" v-if="showCategory === true">
                                <div class="col-lg-12 col-md-6 Post"  v-for="post in posts" style>
                                    <div class="card">
                                        <div class="el-card-item">
                                            <div class="el-card-avatar el-overlay-1 changeSizeOfCardToSmall"> <img :src="path(post.image)" alt="user" />
                                                <div class="el-overlay">
                                                    <ul class="list-style-none el-info">
                                                        <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" :href="'./dashboard/post_profile/'+post.id"><i class="icon-magnifier"></i></a></li>
                                                        <li class="el-item"><a class="btn default btn-outline el-link" href="javascript:void(0);" v-on:click="SavePost(post.id)"><i class="icon-link"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="d-flex no-block align-items-center m-b-15">
                                                    <span><i class="ti-calendar"></i> {{ post.created_at}}</span>
                                                    <div class="ml-auto" v-b-tooltip title="Comments" variant="outline-success" @click="modalShow = !modalShow"
                                                         v-on:click="copyPost(post)">
                                                        <a href="javascript:void(0)" class="link"><i class="ti-comments" ></i> {{post.comment.length}} Comments</a>
                                                    </div>
<!--                                                    <b-modal v-model="modalShow" title="Comments">-->
<!--                                                        <div class="list-group">-->
<!--                                                            <button v-for="comment in copedPost.comment" type="button" class="list-group-item list-group-item-action">-->
<!--                                                                <h6> Comment: </h6> {{comment.subject}}-->
<!--                                                            </button>-->
<!--                                                        </div>-->
<!--                                                    </b-modal>-->
                                                </div>
                                                <h3 class="font-normal">{{ post.title }}</h3>
                                                <p><small style="color: #CDBFFA">{{post.user.name}}</small> &nbsp;
                                                    <small style="color: #F9B8C7" v-if="post.user.type === 'admin'">{{post.user.type}}</small></p>
                                                <p class="m-b-0 m-t-10">{{ post.subtitle}}</p>
<!--                                                <button class="btn btn-primary btn-rounded waves-effect waves-light m-t-20">Like</button>-->
<!--                                                <button type="button" class="js-like-button like-btn">♥︎&nbsp; Like</button>-->
<!--                                                <p v-if="checkLike(post)"></p>-->
                                                <div class="like-content">
<!--                                                    <button v-if="!post.like.length" v-on:click="LikePost(post.id)" class="btn-secondary2 like-review">-->
<!--                                                    <i class="fa fa-heart" aria-hidden="true"></i> Like</button>-->
                                                <button v-if="!checkLikeLoop(post)" v-on:click="LikePost(post.id)" class="btn-secondary2 like-review">
                                                    <i class="fa fa-heart" aria-hidden="true"></i> Like</button>
                                                </div>
                                                <div class="like-content" v-for="like in post.like">
<!--                                                    <button v-if="post.like.length && like.users_id !== auth_user_id" v-on:click="LikePost(post.id)" class="btn-secondary2 like-review">-->
<!--                                                        <i class="fa fa-heart" aria-hidden="true"></i> Like</button>-->
                                                    <button v-if="like.users_id === auth_user_id" v-on:click="DislikePost(like.id)" class="btn-secondary like-review">
                                                        <i class="fa fa-heart" aria-hidden="true"></i> Dislike </button>
<!--                                                        <button v-if="!(like.users_id === auth_user_id)" v-on:click="LikePost(post.id)" class="btn-secondary2 like-review">-->
<!--                                                        <i class="fa fa-heart" aria-hidden="true"></i> Like</button>-->
                                                </div>

                                                <div class="comment-content">
                                                    <b-button class="btn-secondary like-review" data-toggle="modal"
                                                              data-target="#createComment3" v-on:click="passId(post.id)">
                                                        <i class="fa fa-pen-square" aria-hidden="true"></i> Comment
                                                    </b-button>
                                                    <div class="modal fade animated bounceInDown" id="createComment3" tabindex="-1" role="dialog" aria-labelledby="createModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content modal-comment">
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
                                                                                            <input type="hidden" :value="post.id" name="id" >
                                                                                            <b-form-input type="text" v-model="comment.subject" class="form-control" placeholder="Enter Your Comment" maxlength="50"></b-form-input>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-actions m-t-40">
                                                                                <button type="button" class="btn btn-success" data-dismiss="modal" v-on:click="addComment(comment.subject)"  v-show="comment.subject">
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
                                                        <li href="#" class="list-group-item list-group-item-action" v-for="comment in post.comment">
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
                                                </div>
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
                            <button type="button" class="btn btn-info" data-toggle="modal"
                                    data-target="#createmodel" style="width: 100%">
                                Create New Post
                            </button>
<!--                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#Sharemodel"-->
<!--                                    style="width: 100%">-->
<!--                                <i class="ti-share m-r-10"></i> Share With-->
<!--                            </button>-->
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ti-search"></i></span>
                                    </div>
                                    <input type="search" v-model="search" class="form-control" placeholder="Search Posts Here..."
                                           aria-label="">
                                    <div class="input-group-append">
                                        <button class="btn btn-info" @click.prevent>Ok</button>
                                    </div>
                                </div>
                            </form>
                            <div class="list-group m-t-30">
                                <a href="javascript:void(0)" class="list-group-item active"><i
                                    class="ti-layers m-r-10"></i> All Histories</a>
                                <a href="../../../../dashboard/histories" class="list-group-item"><i class="ti-bookmark m-r-10"></i>
                                    Recently Created</a>
                            </div>
                            <h4 class="card-title m-t-30">Categories</h4>
                            <div class="list-group">
                                <div v-for="(category, index) in categories">
                                <a href="javascript:void(0)" class="list-group-item" v-on:click="fetchPostsByCategory(category.id)"><i
                                    class="ti-flag-alt-2 m-r-10"></i> {{ category.name }}
                                    <span class="badge badge-info float-right">{{ category.post.length }}</span>
                                </a>
                                </div>
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
        <!-- Create User Modal -->
        <div class="modal fade animated bounceInDown " id="createmodel" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"><i class="ti-marker-alt m-r-10"></i>Create new Post</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="../dashboard/posts" method="POST" role="form" enctype="multipart/form-data">
                                <input type="hidden" name="_token" :value="csrf">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Post Title</label>
                                                <b-form-input type="text" name="title" class="form-control" minlength="10" maxlength="50" required></b-form-input>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Sub title</label>
                                                <b-form-input type="text" name="subtitle"  class="form-control" required></b-form-input>
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
                                                <select class="selectpicker" name="categoriesIds[]" multiple data-selected-text-format="count" data-width="100%" data-max-options="3">
                                                    <option v-for="category in categories" :value="category.id">{{ category.name }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!--/span-->
<!--                                        <div class="col-md-6">-->
<!--                                            <div class="form-group">-->
<!--                                                <label>Status</label>-->
<!--                                                <br/>-->
<!--                                                <b-form-group>-->
<!--                                                    <b-form-radio-group-->
<!--                                                        v-model="newPost.status"-->
<!--                                                        :options="options"-->
<!--                                                        name="radio-inline"-->
<!--                                                    ></b-form-radio-group>-->
<!--                                                </b-form-group>-->
<!--                                            </div>-->
<!--                                        </div>-->
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
<!--                                    <div class="row">-->
<!--                                        <div class="col-md-6">-->
<!--                                            <div class="form-group">-->
<!--                                                <label>Meta Title</label>-->
<!--                                                <div class="input-group mb-3">-->
<!--                                                    <div class="input-group-prepend">-->
<!--                                                        <span class="input-group-text" ><i class="ti-search"></i></span>-->
<!--                                                    </div>-->
<!--                                                    <b-form-input name="meta_title" type="text" aria-describedby="basic-addon1"></b-form-input>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        &lt;!&ndash;/span&ndash;&gt;-->
<!--                                        <div class="col-md-6">-->
<!--                                            <div class="form-group">-->
<!--                                                <label>Meta Keyword</label>-->
<!--                                                <div class="input-group mb-3">-->
<!--                                                    <div class="input-group-prepend">-->
<!--                                                        <span class="input-group-text" ><i class="ti-search"></i></span>-->
<!--                                                    </div>-->
<!--                                                    <b-form-input name="meta_keyword" type="text" aria-describedby="basic-addon1"></b-form-input>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        &lt;!&ndash;/span&ndash;&gt;-->
<!--                                    </div>-->
                                    <h5 class="card-title m-t-40">Post Description</h5>
                                    <div class="row">
                                        <div class="col-md-12 ">
                                            <div class="form-group">
                                                <b-textarea class="form-control" name="description" rows="4"></b-textarea>
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
                                                    <input type="file" class="upload" accept=".jpg, .png, .jpeg" name="image">
<!--                                                    <input type="file" v-on:change="onImageChange" class="upload" accept=".jpg, .png, .jpeg">-->
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
                                                    <input type="file" class="upload" accept="video/*" name="video">
<!--                                                    <input type="file" :onchange="onVideoChange" class="upload" accept="video/*">-->
                                                    <p>you can upload video after adding the post</p>
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
                                                            <b-form-input type="text" name="about"></b-form-input>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label for="" class="form-control"> Color </label>
                                                        </td>
                                                        <td>
                                                            <b-form-input type="text" name="color"></b-form-input>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <label for="" class="form-control"> Type</label>
                                                        </td>
                                                        <td>
                                                            <b-form-input type="text" name="type"></b-form-input>
                                                        </td>
                                                    </tr>
                                                    <b-form-input type="text" name="users_id" hidden></b-form-input>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
<!--                                <div class="row">-->
<!--                                    <div class="col-12">-->
<!--                                        @if (session('status'))-->
<!--                                        <div class="alert alert-success">-->
<!--                                            {{ session('status') }}-->
<!--                                        </div>-->
<!--                                        @endif-->
<!--                                    </div>-->
<!--                                </div>-->
                                <div class="form-actions m-t-40">
                                    <button type="submit" class="btn btn-sucess">Submit Post</button>
                                    <!--                                    <button type="button" class="btn btn-success" v-show="newPost.title && newPost.categoriesIds"-->
<!--                                            @click="storePost"><i class="fa fa-check"></i> Save-->
<!--                                    </button>-->
                                    <button type="button" class="btn btn-dark" data-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div>
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
                search:'',
                showSearch : false,
                showCategory : false,
                categoryId: 0,
                caris:[],
                // image_src: '../../../../public/images/AdminDashboardImages/images/gallery/chair.jpg',
            }
        },
        mounted: function () {
            console.log('Component fired.');
            this.totalRows = this.posts.length;
        },
        computed: {
            filteredPosts: function() {
                return this.posts.filter((post) => {
                    return post.title.match(this.search);
                });
            },
            // filteredPostsByCategory: function() {
            //     return this.posts.filter((post) => {
            //         return (post.category.map(function(category){
            //             this.showCategory = true;
            //             return category.id === this.categoryId;
            //         }))
            //     });
            // },
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
                axios.get('../dashboard/posts').then(response => {
                    this.posts = response.data.posts;
                    // console.log(this.posts);
                    this.categories = response.data.categories;
                    this.totalRows = this.posts.length;
                });
            },
            fetchPostsByCategory: function (id) {
                axios.get('../dashboard/posts/category/'+ id).then(response => {
                    this.posts = response.data.posts;
                    // this.categories = response.data.categories;
                    // this.totalRows = this.posts.length;
                    this.showSearch = true;
                    this.showCategory = true;
                });
            },
            searchPost() {
                axios.get('../dashboard/posts/search?q='+this.search).then(response => {
                    this.caris = response.data;
                    // this.caris = response.data.caris;
                    // this.caris = response;
                    this.search = '';
                    this.showSearch = true;
                    console.log("caris: " + this.caris);
                }).catch(error => {
                    console.log(error);
                })
            },
                storePost(e) {
                e.preventDefault();
                let currentObj = this;

                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                };

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
            DeleteComment: function (id) {
                axios.post('/dashboard/posts/deletecomment/' + id).then(response => {
                    // this.newPost = response.data.post;
                    this.fetchPosts();
                }).catch(error => {
                    console.log(error);
                })
            },
            SavePost: function (id) {
                axios.post('/dashboard/posts/favourite/' + id).then(response => {
                    // this.newPost = response.data.post;
                    this.fetchPosts();
                }).catch(error => {
                    console.log(error);
                })
            },
            checkLikeLoop: function(post){
                let likedPost= false;
                post.like.map((like) => {
                    if (like.users_id === this.auth_user_id){
                        // console.log("Yes");
                        // return true;
                        likedPost= true;
                        // console.log(post.title);
                    }
                });
                // console.log(post.title +' ::::: '+ this.liked);
                if (likedPost)
                {
                    // console.log(post.title);
                    return true;
                } else{
                    return false;
                }
                // this.liked = false;
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
                return require('../../../../public/uploads/posts/images/' + image)
            },
            path2(image) {
                return require('../../../../public/images/AdminDashboardImages/images/gallery/' + image)
            },
            path3(image) {
                return require('../../../../public/images/AdminDashboardImages/images/users/' + image)
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
    .el-element-overlay .el-card-item .el-overlay{
        height: 500px;
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
