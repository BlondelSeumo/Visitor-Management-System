<!-- Sidebar -->
<div class="sidebar">
    <div class="tab-content h-100" role="tablist">
        <div class="tab-pane fade h-100" id="tab-content-create-chat" role="tabpanel">
            <div class="d-flex flex-column h-100">

                <div class="hide-scrollbar">
                    <div class="container-fluid py-6">

                        <!-- Title -->
                        <h2 class="font-bold mb-6">Create group</h2>
                        <!-- Title -->

                        <!-- Search -->
                        <form class="mb-6">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-lg" placeholder="Search for messages or users..." aria-label="Search for messages or users...">
                                <div class="input-group-append">
                                    <button class="btn btn-lg btn-ico btn-secondary btn-minimal" type="submit">
                                        <i class="fe-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <!-- Search -->

                        <!-- Tabs -->
                        <ul class="nav nav-tabs nav-justified mb-6" role="tablist">
                            <li class="nav-item">
                                <a href="#create-group-details" class="nav-link active" data-toggle="tab" role="tab" aria-selected="true">Details</a>
                            </li>

                            <li class="nav-item">
                                <a href="#create-group-members" class="nav-link" data-toggle="tab" role="tab" aria-selected="false">Members</a>
                            </li>
                        </ul>
                        <!-- Tabs -->

                        <!-- Create chat -->
                        <div class="tab-content" role="tablist">

                            <!-- Chat details -->
                            <div id="create-group-details" class="tab-pane fade show active" role="tabpanel">
                                <form action="#">
                                    <div class="form-group">
                                        <label class="small">Photo</label>
                                        <div class="position-relative text-center bg-secondary rounded p-6">
                                            <div class="avatar bg-primary text-white mb-5">
                                                <i class="icon-md fe-image"></i>
                                            </div>

                                            <p class="small text-muted mb-0">You can upload jpg, gif or png files. <br> Max file size 3mb.</p>
                                            <input id="upload-chat-photo" class="d-none" type="file">
                                            <label class="stretched-label mb-0" for="upload-chat-photo"></label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="small" for="new-chat-title">Name</label>
                                        <input class="form-control form-control-lg" name="new-chat-title" id="new-chat-title" type="text" placeholder="Group Name">
                                    </div>

                                    <div class="form-group">
                                        <label class="small" for="new-chat-topic">Topic (optional)</label>
                                        <input class="form-control form-control-lg" name="new-chat-topic" id="new-chat-topic" type="text" placeholder="Group Topic">
                                    </div>

                                    <div class="form-group mb-0">
                                        <label class="small" for="new-chat-description">Description</label>
                                        <textarea class="form-control form-control-lg" name="new-chat-description" id="new-chat-description" rows="6" placeholder="Group Description"></textarea>
                                    </div>

                                </form>
                            </div>
                            <!-- Chat details -->

                            <!-- Chat Members -->
                            <div id="create-group-members" class="tab-pane fade" role="tabpanel">
                                <nav class="list-group list-group-flush mb-n6">

                                    <div class="mb-6">
                                        <small class="text-uppercase">A</small>
                                    </div>

                                    <!-- Friend -->
                                    <div class="card mb-6">
                                        <div class="card-body">

                                            <div class="media">

                                                <div class="avatar avatar-online mr-5">
                                                    <img class="avatar-img" src="assets/images/avatars/10.jpg" alt="Anna Bridges">
                                                </div>



                                                <div class="media-body align-self-center mr-6">
                                                    <h6 class="mb-0">Anna Bridges</h6>
                                                    <small class="text-muted">Online</small>
                                                </div>

                                                <div class="align-self-center ml-auto">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" id="id-user-1" type="checkbox">
                                                        <label class="custom-control-label" for="id-user-1"></label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <!-- Label -->
                                        <label class="stretched-label" for="id-user-1"></label>
                                    </div>
                                    <!-- Friend -->

                                    <div class="mb-6">
                                        <small class="text-uppercase">B</small>
                                    </div>

                                    <!-- Friend -->
                                    <div class="card mb-6">
                                        <div class="card-body">

                                            <div class="media">


                                                <div class="avatar mr-5">
                                                    <img class="avatar-img" src="assets/images/avatars/6.jpg" alt="Brian Dawson">
                                                </div>


                                                <div class="media-body align-self-center mr-6">
                                                    <h6 class="mb-0">Brian Dawson</h6>
                                                    <small class="text-muted">last seen 2 hours ago</small>
                                                </div>

                                                <div class="align-self-center ml-auto">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" id="id-user-2" type="checkbox">
                                                        <label class="custom-control-label" for="id-user-2"></label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <!-- Label -->
                                        <label class="stretched-label" for="id-user-2"></label>
                                    </div>
                                    <!-- Friend -->

                                    <div class="mb-6">
                                        <small class="text-uppercase">L</small>
                                    </div>

                                    <!-- Friend -->
                                    <div class="card mb-6">
                                        <div class="card-body">

                                            <div class="media">


                                                <div class="avatar mr-5">
                                                    <img class="avatar-img" src="assets/images/avatars/5.jpg" alt="Leslie Sutton">
                                                </div>


                                                <div class="media-body align-self-center mr-6">
                                                    <h6 class="mb-0">Leslie Sutton</h6>
                                                    <small class="text-muted">last seen 3 days ago</small>
                                                </div>

                                                <div class="align-self-center ml-auto">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" id="id-user-3" type="checkbox">
                                                        <label class="custom-control-label" for="id-user-3"></label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <!-- Label -->
                                        <label class="stretched-label" for="id-user-3"></label>
                                    </div>
                                    <!-- Friend -->

                                    <div class="mb-6">
                                        <small class="text-uppercase">M</small>
                                    </div>

                                    <!-- Friend -->
                                    <div class="card mb-6">
                                        <div class="card-body">

                                            <div class="media">


                                                <div class="avatar mr-5">
                                                    <img class="avatar-img" src="assets/images/avatars/4.jpg" alt="Matthew Wiggins">
                                                </div>


                                                <div class="media-body align-self-center mr-6">
                                                    <h6 class="mb-0">Matthew Wiggins</h6>
                                                    <small class="text-muted">last seen 3 days ago</small>
                                                </div>

                                                <div class="align-self-center ml-auto">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" id="id-user-4" type="checkbox">
                                                        <label class="custom-control-label" for="id-user-4"></label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <!-- Label -->
                                        <label class="stretched-label" for="id-user-4"></label>
                                    </div>
                                    <!-- Friend -->

                                    <div class="mb-6">
                                        <small class="text-uppercase">S</small>
                                    </div>

                                    <!-- Friend -->
                                    <div class="card mb-6">
                                        <div class="card-body">

                                            <div class="media">


                                                <div class="avatar mr-5">
                                                    <img class="avatar-img" src="assets/images/avatars/7.jpg" alt="Simon Hensley">
                                                </div>


                                                <div class="media-body align-self-center mr-6">
                                                    <h6 class="mb-0">Simon Hensley</h6>
                                                    <small class="text-muted">last seen 3 days ago</small>
                                                </div>

                                                <div class="align-self-center ml-auto">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" id="id-user-5" type="checkbox">
                                                        <label class="custom-control-label" for="id-user-5"></label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <!-- Label -->
                                        <label class="stretched-label" for="id-user-5"></label>
                                    </div>
                                    <!-- Friend -->

                                    <div class="mb-6">
                                        <small class="text-uppercase">W</small>
                                    </div>

                                    <!-- Friend -->
                                    <div class="card mb-6">
                                        <div class="card-body">

                                            <div class="media">


                                                <div class="avatar mr-5">
                                                    <img class="avatar-img" src="assets/images/avatars/9.jpg" alt="William Wright">
                                                </div>


                                                <div class="media-body align-self-center mr-6">
                                                    <h6 class="mb-0">William Wright</h6>
                                                    <small class="text-muted">last seen 3 days ago</small>
                                                </div>

                                                <div class="align-self-center ml-auto">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" id="id-user-6" type="checkbox">
                                                        <label class="custom-control-label" for="id-user-6"></label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <!-- Label -->
                                        <label class="stretched-label" for="id-user-6"></label>
                                    </div>
                                    <!-- Friend --><!-- Friend -->
                                    <div class="card mb-6">
                                        <div class="card-body">

                                            <div class="media">


                                                <div class="avatar mr-5">
                                                    <img class="avatar-img" src="assets/images/avatars/3.jpg" alt="William Greer">
                                                </div>


                                                <div class="media-body align-self-center mr-6">
                                                    <h6 class="mb-0">William Greer</h6>
                                                    <small class="text-muted">last seen 10 minutes ago</small>
                                                </div>

                                                <div class="align-self-center ml-auto">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" id="id-user-7" type="checkbox">
                                                        <label class="custom-control-label" for="id-user-7"></label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <!-- Label -->
                                        <label class="stretched-label" for="id-user-7"></label>
                                    </div>
                                    <!-- Friend -->

                                    <div class="mb-6">
                                        <small class="text-uppercase">Z</small>
                                    </div>

                                    <!-- Friend -->
                                    <div class="card mb-6">
                                        <div class="card-body">

                                            <div class="media">


                                                <div class="avatar mr-5">
                                                    <img class="avatar-img" src="assets/images/avatars/7.jpg" alt="Zane Mayes">
                                                </div>


                                                <div class="media-body align-self-center mr-6">
                                                    <h6 class="mb-0">Zane Mayes</h6>
                                                    <small class="text-muted">last seen 3 days ago</small>
                                                </div>

                                                <div class="align-self-center ml-auto">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" id="id-user-8" type="checkbox">
                                                        <label class="custom-control-label" for="id-user-8"></label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <!-- Label -->
                                        <label class="stretched-label" for="id-user-8"></label>
                                    </div>
                                    <!-- Friend -->

                                </nav>
                            </div>
                            <!-- Chat Members -->

                        </div>
                        <!-- Create chat -->

                    </div>
                </div>

                <!-- Button -->
                <div class="pb-6">
                    <div class="container-fluid">
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Create group</button>
                    </div>
                </div>

            </div>
        </div>

        <div class="tab-pane fade h-100" id="tab-content-friends" role="tabpanel">
            <div class="d-flex flex-column h-100">

                <div class="hide-scrollbar">
                    <div class="container-fluid py-6">

                        <!-- Title -->
                        <h2 class="font-bold mb-6">Friends</h2>
                        <!-- Title -->

                        <!-- Search -->
                        <form class="mb-6">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-lg" placeholder="Search for messages or users..." aria-label="Search for messages or users...">
                                <div class="input-group-append">
                                    <button class="btn btn-lg btn-ico btn-secondary btn-minimal" type="submit">
                                        <i class="fe-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <!-- Search -->

                        <!-- Button -->
                        <button type="button" class="btn btn-lg btn-block btn-secondary d-flex align-items-center mb-6" data-toggle="modal" data-target="#invite-friends">
                            Invite friends
                            <i class="fe-users ml-auto"></i>
                        </button>

                        <!-- Friends -->
                        <nav class="mb-n6">

                            <div class="mb-6">
                                <small class="text-uppercase">A</small>
                            </div>

                            <!-- Friend -->
                            <div class="card mb-6">
                                <div class="card-body">

                                    <div class="media">

                                        <div class="avatar avatar-online mr-5">
                                            <img class="avatar-img" src="assets/images/avatars/10.jpg" alt="Anna Bridges">
                                        </div>


                                        <div class="media-body align-self-center">
                                            <h6 class="mb-0">Anna Bridges</h6>
                                            <small class="text-muted">Online</small>
                                        </div>

                                        <div class="align-self-center ml-5">
                                            <div class="dropdown z-index-max">
                                                <a href="#" class="btn btn-sm btn-ico btn-link text-muted w-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fe-more-vertical"></i>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                        New chat <span class="ml-auto fe-edit-2"></span>
                                                    </a>
                                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                        Delete <span class="ml-auto fe-trash-2"></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Link -->
                                    <a href="chat-2.html" class="stretched-link"></a>

                                </div>
                            </div>
                            <!-- Friend -->

                            <div class="mb-6">
                                <small class="text-uppercase">B</small>
                            </div>

                            <!-- Friend -->
                            <div class="card mb-6">
                                <div class="card-body">

                                    <div class="media">


                                        <div class="avatar mr-5">
                                            <img class="avatar-img" src="assets/images/avatars/6.jpg" alt="Brian Dawson">
                                        </div>

                                        <div class="media-body align-self-center">
                                            <h6 class="mb-0">Brian Dawson</h6>
                                            <small class="text-muted">last seen 2 hours ago</small>
                                        </div>

                                        <div class="align-self-center ml-5">
                                            <div class="dropdown z-index-max">
                                                <a href="#" class="btn btn-sm btn-ico btn-link text-muted w-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fe-more-vertical"></i>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                        New chat <span class="ml-auto fe-edit-2"></span>
                                                    </a>
                                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                        Delete <span class="ml-auto fe-trash-2"></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Link -->
                                    <a href="#" class="stretched-link"></a>

                                </div>
                            </div>
                            <!-- Friend -->

                            <div class="mb-6">
                                <small class="text-uppercase">L</small>
                            </div>

                            <!-- Friend -->
                            <div class="card mb-6">
                                <div class="card-body">

                                    <div class="media">


                                        <div class="avatar mr-5">
                                            <img class="avatar-img" src="assets/images/avatars/5.jpg" alt="Leslie Sutton">
                                        </div>

                                        <div class="media-body align-self-center">
                                            <h6 class="mb-0">Leslie Sutton</h6>
                                            <small class="text-muted">last seen 3 days ago</small>
                                        </div>

                                        <div class="align-self-center ml-5">
                                            <div class="dropdown z-index-max">
                                                <a href="#" class="btn btn-sm btn-ico btn-link text-muted w-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fe-more-vertical"></i>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                        New chat <span class="ml-auto fe-edit-2"></span>
                                                    </a>
                                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                        Delete <span class="ml-auto fe-trash-2"></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Link -->
                                    <a href="#" class="stretched-link"></a>

                                </div>
                            </div>
                            <!-- Friend -->

                            <div class="mb-6">
                                <small class="text-uppercase">M</small>
                            </div>

                            <!-- Friend -->
                            <div class="card mb-6">
                                <div class="card-body">

                                    <div class="media">


                                        <div class="avatar mr-5">
                                            <img class="avatar-img" src="assets/images/avatars/4.jpg" alt="Matthew Wiggins">
                                        </div>

                                        <div class="media-body align-self-center">
                                            <h6 class="mb-0">Matthew Wiggins</h6>
                                            <small class="text-muted">last seen 3 days ago</small>
                                        </div>

                                        <div class="align-self-center ml-5">
                                            <div class="dropdown z-index-max">
                                                <a href="#" class="btn btn-sm btn-ico btn-link text-muted w-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fe-more-vertical"></i>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                        New chat <span class="ml-auto fe-edit-2"></span>
                                                    </a>
                                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                        Delete <span class="ml-auto fe-trash-2"></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Link -->
                                    <a href="#" class="stretched-link"></a>

                                </div>
                            </div>
                            <!-- Friend -->

                            <div class="mb-6">
                                <small class="text-uppercase">S</small>
                            </div>

                            <!-- Friend -->
                            <div class="card mb-6">
                                <div class="card-body">

                                    <div class="media">


                                        <div class="avatar mr-5">
                                            <img class="avatar-img" src="assets/images/avatars/7.jpg" alt="Simon Hensley">
                                        </div>

                                        <div class="media-body align-self-center">
                                            <h6 class="mb-0">Simon Hensley</h6>
                                            <small class="text-muted">last seen 3 days ago</small>
                                        </div>

                                        <div class="align-self-center ml-5">
                                            <div class="dropdown z-index-max">
                                                <a href="#" class="btn btn-sm btn-ico btn-link text-muted w-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fe-more-vertical"></i>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                        New chat <span class="ml-auto fe-edit-2"></span>
                                                    </a>
                                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                        Delete <span class="ml-auto fe-trash-2"></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Link -->
                                    <a href="#" class="stretched-link"></a>

                                </div>
                            </div>
                            <!-- Friend -->

                            <div class="mb-6">
                                <small class="text-uppercase">W</small>
                            </div>

                            <!-- Friend -->
                            <div class="card mb-6">
                                <div class="card-body">

                                    <div class="media">


                                        <div class="avatar mr-5">
                                            <img class="avatar-img" src="assets/images/avatars/9.jpg" alt="William Wright">
                                        </div>

                                        <div class="media-body align-self-center">
                                            <h6 class="mb-0">William Wright</h6>
                                            <small class="text-muted">last seen 3 days ago</small>
                                        </div>

                                        <div class="align-self-center ml-5">
                                            <div class="dropdown z-index-max">
                                                <a href="#" class="btn btn-sm btn-ico btn-link text-muted w-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fe-more-vertical"></i>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                        New chat <span class="ml-auto fe-edit-2"></span>
                                                    </a>
                                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                        Delete <span class="ml-auto fe-trash-2"></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Link -->
                                    <a href="#" class="stretched-link"></a>

                                </div>
                            </div>
                            <!-- Friend --><!-- Friend -->
                            <div class="card mb-6">
                                <div class="card-body">

                                    <div class="media">


                                        <div class="avatar mr-5">
                                            <img class="avatar-img" src="assets/images/avatars/3.jpg" alt="William Greer">
                                        </div>

                                        <div class="media-body align-self-center">
                                            <h6 class="mb-0">William Greer</h6>
                                            <small class="text-muted">last seen 10 minutes ago</small>
                                        </div>

                                        <div class="align-self-center ml-5">
                                            <div class="dropdown z-index-max">
                                                <a href="#" class="btn btn-sm btn-ico btn-link text-muted w-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fe-more-vertical"></i>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                        New chat <span class="ml-auto fe-edit-2"></span>
                                                    </a>
                                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                        Delete <span class="ml-auto fe-trash-2"></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Link -->
                                    <a href="#" class="stretched-link"></a>

                                </div>
                            </div>
                            <!-- Friend -->

                            <div class="mb-6">
                                <small class="text-uppercase">Z</small>
                            </div>

                            <!-- Friend -->
                            <div class="card mb-6">
                                <div class="card-body">

                                    <div class="media">


                                        <div class="avatar mr-5">
                                            <img class="avatar-img" src="assets/images/avatars/7.jpg" alt="Zane Mayes">
                                        </div>

                                        <div class="media-body align-self-center">
                                            <h6 class="mb-0">Zane Mayes</h6>
                                            <small class="text-muted">last seen 3 days ago</small>
                                        </div>

                                        <div class="align-self-center ml-5">
                                            <div class="dropdown z-index-max">
                                                <a href="#" class="btn btn-sm btn-ico btn-link text-muted w-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fe-more-vertical"></i>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                        New chat <span class="ml-auto fe-edit-2"></span>
                                                    </a>
                                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                        Delete <span class="ml-auto fe-trash-2"></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Link -->
                                    <a href="#" class="stretched-link"></a>

                                </div>
                            </div>
                            <!-- Friend -->

                        </nav>
                        <!-- Friends -->

                    </div>
                </div>

            </div>
        </div>

        <div class="tab-pane fade h-100 show active" id="tab-content-dialogs" role="tabpanel">
            <div class="d-flex flex-column h-100">

                <div class="hide-scrollbar">
                    <div class="container-fluid py-6">

                        <!-- Title -->
                        <h2 class="font-bold mb-6">Chats</h2>
                        <!-- Title -->

                        <!-- Search -->
                        <form class="mb-6">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-lg" placeholder="Search for messages or users..." aria-label="Search for messages or users...">
                                <div class="input-group-append">
                                    <button class="btn btn-lg btn-ico btn-secondary btn-minimal" type="submit">
                                        <i class="fe-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <!-- Search -->

                        <!-- Favourites -->
                        <div class="text-center hide-scrollbar d-flex my-7" data-horizontal-scroll="">
                            <a href="#" class="d-block text-reset mr-7 mr-lg-6">
                                <div class="avatar avatar-sm avatar-online mb-3">
                                    <img class="avatar-img" src="assets/images/avatars/2.jpg" alt="Image Description">
                                </div>
                                <div class="small">William</div>
                            </a>

                            <a href="#" class="d-block text-reset mr-7 mr-lg-6">
                                <div class="avatar avatar-sm avatar-online mb-3">
                                    <img class="avatar-img" src="assets/images/avatars/3.jpg" alt="Image Description">
                                </div>
                                <div class="small">Simon</div>
                            </a>

                            <a href="#" class="d-block text-reset mr-7 mr-lg-6">
                                <div class="avatar avatar-sm avatar-online mb-3">
                                    <img class="avatar-img" src="assets/images/avatars/4.jpg" alt="Image Description">
                                </div>
                                <div class="small">Thomas</div>
                            </a>

                            <a href="#" class="d-block text-reset mr-7 mr-lg-6">
                                <div class="avatar avatar-sm avatar-online mb-3">
                                    <img class="avatar-img" src="assets/images/avatars/5.jpg" alt="Image Description">
                                </div>
                                <div class="small">Zane</div>
                            </a>

                            <a href="#" class="d-block text-reset mr-7 mr-lg-6">
                                <div class="avatar avatar-sm mb-3">
                                    <img class="avatar-img" src="assets/images/avatars/6.jpg" alt="Image Description">
                                </div>
                                <div class="small">Thomas</div>
                            </a>

                            <a href="#" class="d-block text-reset mr-7 mr-lg-6">
                                <div class="avatar avatar-sm mb-3">
                                    <img class="avatar-img" src="assets/images/avatars/7.jpg" alt="Image Description">
                                </div>
                                <div class="small">William</div>
                            </a>

                            <a href="#" class="d-block text-reset mr-7 mr-lg-6">
                                <div class="avatar avatar-sm mb-3">
                                    <img class="avatar-img" src="assets/images/avatars/8.jpg" alt="Image Description">
                                </div>
                                <div class="small">Simon</div>
                            </a>

                            <a href="#" class="d-block text-reset mr-7 mr-lg-6">
                                <div class="avatar avatar-sm mb-3">
                                    <img class="avatar-img" src="assets/images/avatars/9.jpg" alt="Image Description">
                                </div>
                                <div class="small">Thomas</div>
                            </a>
                        </div>
                        <!-- Favourites -->

                        <!-- Chats -->
                        <nav class="nav d-block list-discussions-js mb-n6">
                            <!-- Chat link -->
                            <a class="text-reset nav-link p-0 mb-6" href="chat-1.html">
                                <div class="card card-active-listener">
                                    <div class="card-body">

                                        <div class="media">


                                            <div class="avatar mr-5">
                                                <img class="avatar-img" src="assets/images/avatars/11.jpg" alt="Bootstrap Themes">
                                            </div>

                                            <div class="media-body overflow-hidden">
                                                <div class="d-flex align-items-center mb-1">
                                                    <h6 class="text-truncate mb-0 mr-auto">Bootstrap Themes</h6>
                                                    <p class="small text-muted text-nowrap ml-4">10:42 am</p>
                                                </div>
                                                <div class="text-truncate">Anna Bridges: Hey, Maher! How are you? The weather is great isn't it?</div>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="badge badge-circle badge-primary badge-border-light badge-top-right">
                                        <span>3</span>
                                    </div>

                                </div>
                            </a>
                            <!-- Chat link -->
                            <!-- Chat link -->
                            <a class="text-reset nav-link p-0 mb-6" href="chat-2.html">
                                <div class="card card-active-listener">
                                    <div class="card-body">

                                        <div class="media">

                                            <div class="avatar avatar-online mr-5">
                                                <img class="avatar-img" src="assets/images/avatars/10.jpg" alt="Anna Bridges">
                                            </div>


                                            <div class="media-body overflow-hidden">
                                                <div class="d-flex align-items-center mb-1">
                                                    <h6 class="text-truncate mb-0 mr-auto">Anna Bridges</h6>
                                                    <p class="small text-muted text-nowrap ml-4">10:42 am</p>
                                                </div>
                                                <div class="text-truncate">is typing<span class='typing-dots'><span>.</span><span>.</span><span>.</span></span></div>
                                            </div>
                                        </div>

                                    </div>


                                </div>
                            </a>
                            <!-- Chat link -->
                            <!-- Chat link -->
                            <a class="text-reset nav-link p-0 mb-6" href="#">
                                <div class="card card-active-listener">
                                    <div class="card-body">

                                        <div class="media">


                                            <div class="avatar mr-5">
                                                <img class="avatar-img" src="assets/images/avatars/7.jpg" alt="Simon Hensley">
                                            </div>

                                            <div class="media-body overflow-hidden">
                                                <div class="d-flex align-items-center mb-1">
                                                    <h6 class="text-truncate mb-0 mr-auto">Simon Hensley</h6>
                                                    <p class="small text-muted text-nowrap ml-4">10:38 am</p>
                                                </div>
                                                <div class="text-truncate">I’m sorry, this question would be out of my expertise.</div>
                                            </div>
                                        </div>

                                    </div>


                                </div>
                            </a>
                            <!-- Chat link -->
                            <!-- Chat link -->
                            <a class="text-reset nav-link p-0 mb-6" href="#">
                                <div class="card card-active-listener">
                                    <div class="card-body">

                                        <div class="media">


                                            <div class="avatar mr-5">
                                                <img class="avatar-img" src="assets/images/avatars/9.jpg" alt="William Wright">
                                            </div>

                                            <div class="media-body overflow-hidden">
                                                <div class="d-flex align-items-center mb-1">
                                                    <h6 class="text-truncate mb-0 mr-auto">William Wright</h6>
                                                    <p class="small text-muted text-nowrap ml-4">10:20 am</p>
                                                </div>
                                                <div class="text-truncate">Hello! Let me transfer you to the marketing department.</div>
                                            </div>
                                        </div>

                                    </div>


                                </div>
                            </a>
                            <!-- Chat link -->
                            <!-- Chat link -->
                            <a class="text-reset nav-link p-0 mb-6" href="#">
                                <div class="card card-active-listener">
                                    <div class="card-body">

                                        <div class="media">


                                            <div class="avatar mr-5">
                                                <img class="avatar-img" src="assets/images/avatars/5.jpg" alt="Leslie Sutton">
                                            </div>

                                            <div class="media-body overflow-hidden">
                                                <div class="d-flex align-items-center mb-1">
                                                    <h6 class="text-truncate mb-0 mr-auto">Leslie Sutton</h6>
                                                    <p class="small text-muted text-nowrap ml-4">09:55 am</p>
                                                </div>
                                                <div class="text-truncate"><h6 class='d-inline'>You:</h6> I’m sorry, I don’t have the information on that.</div>
                                            </div>
                                        </div>

                                    </div>


                                </div>
                            </a>
                            <!-- Chat link -->
                            <!-- Chat link -->
                            <a class="text-reset nav-link p-0 mb-6" href="#">
                                <div class="card card-active-listener">
                                    <div class="card-body">

                                        <div class="media">


                                            <div class="avatar mr-5">
                                                <img class="avatar-img" src="assets/images/avatars/4.jpg" alt="Matthew Wiggins">
                                            </div>

                                            <div class="media-body overflow-hidden">
                                                <div class="d-flex align-items-center mb-1">
                                                    <h6 class="text-truncate mb-0 mr-auto">Matthew Wiggins</h6>
                                                    <p class="small text-muted text-nowrap ml-4">09:25 am</p>
                                                </div>
                                                <div class="text-truncate">Matthew, let me transfer you to the marketing department.</div>
                                            </div>
                                        </div>

                                    </div>


                                </div>
                            </a>
                            <!-- Chat link -->
                            <!-- Chat link -->
                            <a class="text-reset nav-link p-0 mb-6" href="#">
                                <div class="card card-active-listener">
                                    <div class="card-body">

                                        <div class="media">


                                            <div class="avatar mr-5">
                                                <img class="avatar-img" src="assets/images/avatars/3.jpg" alt="Thomas Walker">
                                            </div>

                                            <div class="media-body overflow-hidden">
                                                <div class="d-flex align-items-center mb-1">
                                                    <h6 class="text-truncate mb-0 mr-auto">Thomas Walker</h6>
                                                    <p class="small text-muted text-nowrap ml-4">09:00 am</p>
                                                </div>
                                                <div class="text-truncate">I am really sorry to hear that. Is there anything I can do to help you?</div>
                                            </div>
                                        </div>

                                    </div>


                                </div>
                            </a>
                            <!-- Chat link -->
                            <!-- Chat link -->
                            <a class="text-reset nav-link p-0 mb-6" href="#">
                                <div class="card card-active-listener">
                                    <div class="card-body">

                                        <div class="media">


                                            <div class="avatar mr-5">
                                                <img class="avatar-img" src="assets/images/avatars/2.jpg" alt="Zane Mayes">
                                            </div>

                                            <div class="media-body overflow-hidden">
                                                <div class="d-flex align-items-center mb-1">
                                                    <h6 class="text-truncate mb-0 mr-auto">Zane Mayes</h6>
                                                    <p class="small text-muted text-nowrap ml-4">08:05 am</p>
                                                </div>
                                                <div class="text-truncate">That is a good question, let me find out for you.</div>
                                            </div>
                                        </div>

                                    </div>


                                </div>
                            </a>
                            <!-- Chat link -->
                            <!-- Chat link -->
                            <a class="text-reset nav-link p-0 mb-6" href="#">
                                <div class="card card-active-listener">
                                    <div class="card-body">

                                        <div class="media">


                                            <div class="avatar mr-5">
                                                <img class="avatar-img" src="assets/images/avatars/6.jpg" alt="Brian Dawson">
                                            </div>

                                            <div class="media-body overflow-hidden">
                                                <div class="d-flex align-items-center mb-1">
                                                    <h6 class="text-truncate mb-0 mr-auto">Brian Dawson</h6>
                                                    <p class="small text-muted text-nowrap ml-4">08:00 am</p>
                                                </div>
                                                <div class="text-truncate">I’m not sure, but let me find out for you.</div>
                                            </div>
                                        </div>

                                    </div>


                                </div>
                            </a>
                            <!-- Chat link -->

                        </nav>
                        <!-- Chats -->

                    </div>
                </div>

            </div>
        </div>

        <div class="tab-pane fade h-100" id="tab-content-user" role="tabpanel">
            <div class="d-flex flex-column h-100">

                <div class="hide-scrollbar">
                    <div class="container-fluid py-6">

                        <!-- Title -->
                        <h2 class="font-bold mb-6">Profile</h2>
                        <!-- Title -->

                        <!-- Search -->
                        <form class="mb-6">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-lg" placeholder="Search for messages or users..." aria-label="Search for messages or users...">
                                <div class="input-group-append">
                                    <button class="btn btn-lg btn-ico btn-secondary btn-minimal" type="submit">
                                        <i class="fe-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <!-- Search -->

                        <!-- Card -->
                        <div class="card mb-6">
                            <div class="card-body">
                                <div class="text-center py-6">
                                    <!-- Photo -->
                                    <div class="avatar avatar-xl mb-5">
                                        <img class="avatar-img" src="assets/images/avatars/12.jpg" alt="">
                                    </div>

                                    <h5>Matthew Wiggins</h5>
                                    <p class="text-muted">Bootstrap is an open source toolkit for developing web with HTML.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Card -->

                        <!-- Card -->
                        <div class="card mb-6">
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item px-0 py-6">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <p class="small text-muted mb-0">Country</p>
                                                <p>Warsaw, Poland</p>
                                            </div>
                                            <i class="text-muted icon-sm fe-globe"></i>
                                        </div>
                                    </li>

                                    <li class="list-group-item px-0 py-6">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <p class="small text-muted mb-0">Phone</p>
                                                <p>+39 02 87 21 43 19</p>
                                            </div>
                                            <i class="text-muted icon-sm fe-mic"></i>
                                        </div>
                                    </li>

                                    <li class="list-group-item px-0 py-6">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <p class="small text-muted mb-0">Email</p>
                                                <p>anna@gmail.com</p>
                                            </div>
                                            <i class="text-muted icon-sm fe-mail"></i>
                                        </div>
                                    </li>

                                    <li class="list-group-item px-0 py-6">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <p class="small text-muted mb-0">Time</p>
                                                <p>10:03 am</p>
                                            </div>
                                            <i class="text-muted icon-sm fe-clock"></i>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Card -->

                        <!-- Card -->
                        <div class="card mb-6">
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item px-0 py-6">
                                        <a href="#" class="media text-muted">
                                            <div class="media-body align-self-center">
                                                Twitter
                                            </div>
                                            <i class="icon-sm fe-twitter"></i>
                                        </a>
                                    </li>

                                    <li class="list-group-item px-0 py-6">
                                        <a href="#" class="media text-muted">
                                            <div class="media-body align-self-center">
                                                Facebook
                                            </div>
                                            <i class="icon-sm fe-facebook"></i>
                                        </a>
                                    </li>

                                    <li class="list-group-item px-0 py-6">
                                        <a href="#" class="media text-muted">
                                            <div class="media-body align-self-center">
                                                Github
                                            </div>
                                            <i class="icon-sm fe-github"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Card -->

                        <div class="form-row">
                            <div class="col">
                                <!-- Button -->
                                <button type="button" class="btn btn-lg btn-block btn-basic d-flex align-items-center">
                                    Settings
                                    <span class="fe-settings ml-auto"></span>
                                </button>
                            </div>

                            <div class="col">
                                <!-- Button -->
                                <button type="button" class="btn btn-lg btn-block btn-basic d-flex align-items-center">
                                    Logout
                                    <span class="fe-log-out ml-auto"></span>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>

            </div>




        </div>
    </div>
</div>
<!-- Sidebar -->
