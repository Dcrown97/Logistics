<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin || Or</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/vendors/jvectormap/jquery-jvectormap.css">
    <!-- End plugin css for this page -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/demo/style.css">
    <!-- End layout styles -->

    <!-- favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- fontawesome css -->
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <!-- fontawesome css -->
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <!-- owl carousel css -->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <!-- owl carousel theme css -->
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <!-- slicknav css -->
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <!-- animate css -->
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <!-- main css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- responsive css -->
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- jquery js -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./dist/css/adminlte.min.css">
    <script src="customized.js" defer></script>
    <link rel="stylesheet" href="css/faq_style.css">

</head>

<body>
    <script src="../assets/js/preloader.js"></script>
    <div class="body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <aside class="mdc-drawer mdc-drawer--dismissible mdc-drawer--open">
            <div class="mdc-drawer__header">
                <a href="/dashboard" class="brand-logo">
                    <h1 style="color: white;">Welcome!</h1>
                </a>
            </div>
            <div class="mdc-drawer__content">
                <div class="user-info">
                    <p class="name">Clyde Miles</p>
                    <p class="email">clydemiles@elenor.us</p>
                </div>
                <div class="mdc-list-group">
                    <nav class="mdc-list mdc-drawer-menu">
                        <div class="mdc-list-item mdc-drawer-item">
                            <a class="mdc-drawer-link" href="/dashboard">
                                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">home</i>
                                Dashboard
                            </a>
                        </div>
                        <div class="mdc-list-item mdc-drawer-item">
                            <a class="mdc-drawer-link" href="/adminContact">Contacts</a>
                        </div>
                        <div class="mdc-list-item mdc-drawer-item">
                            <a class="mdc-expansion-panel-link" href="/adminBlog" data-toggle="expansionPanel" data-target="ui-sub-menu">
                                Blogs
                            </a>
                        </div>
                        <div class="mdc-list-item mdc-drawer-item">
                            <a class="mdc-drawer-link" href="/adminOrder">Order</a>
                        </div>
                        <div class="mdc-list-item mdc-drawer-item">
                            <a class="mdc-drawer-link" href="/adminAbout">Settings</a>
                        </div>
                        <div class="mdc-list-item mdc-drawer-item">
                            <a class="mdc-expansion-panel-link" href="/calculator" data-toggle="expansionPanel" data-target="sample-page-submenu">
                                Calculator
                            </a>
                        </div>
                    </nav>
                </div>
                <div class="profile-actions">
                    <a href="/logout">Logout</a>
                </div>
            </div>
        </aside>
        <!-- partial -->
        <div class="main-wrapper mdc-drawer-app-content">
            <!-- partial:partials/_navbar.html -->
            <header class="mdc-top-app-bar">
                <div class="mdc-top-app-bar__row">
                    <div class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
                        <button class="material-icons mdc-top-app-bar__navigation-icon mdc-icon-button sidebar-toggler">menu</button>
                        <span class="mdc-top-app-bar__title">Greetings Clyde!</span>
                    </div>
                </div>
            </header>
            <!-- partial -->

            <div class="page-wrapper mdc-toolbar-fixed-adjust">

                <section class="content" id="contactTable">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="form-element mb-0">
                                        <div class="card-header" id="card-header">
                                            <h3 class="card-title">Order Overview</h3>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered" id="my_table">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10px">#</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Pickup Location</th>
                                                    <th>Dropoff loction</th>
                                                    <th>Weight</th>
                                                    <th>Distance</th>
                                                    <th>Frieght</th>
                                                    <th>Phone Number</th>
                                                    <th>Tracking Id</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>
                                                <tr>
                                                    <td>{{$orders['id']}}</td>
                                                    <td>{{$orders['name']}}</td>
                                                    <td>{{$orders['email']}}</td>
                                                    <td>{{$orders['pickup']}}</td>
                                                    <td>{{$orders['dropoff']}}</td>
                                                    <td>{{$orders['weight']}}</td>
                                                    <td>{{$orders['distance']}}</td>
                                                    <td>{{$orders['freight']}}</td>
                                                    <td>{{$orders['phone']}}</td>
                                                    <td>{{$orders['tracking_id']}}</td>
                                                    <td>
                                                    <form action="" method="POST">
                                                        <div class="select-wrapper" class="cut">
                                                            <select name="status" style="margin-bottom: 20px;">
                                                                <option value="" selected disabled>Update</option>
                                                                <option value="Pending">Pending</option>
                                                                <option value="In Transit">In Transit</option>
                                                                <option value="Delivered">Delivered</option>
                                                                <option value="Completed">Completed</option>
                                                            </select>
                                                            
                                                                @csrf
                                                                <div class="form-element mb-0">
                                                                    <a href=""><button type="submit" name="submit"><span>Submit</span></button></a>
                                                                </div>
                                                            
                                                        </div>
                                                        </form>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        
                                        </table>
                                    </div>
                                    <div class="card-footer clearfix">
                                        <ul class="pagination pagination-sm m-0 float-right">
                                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- partial:partials/_footer.html -->
                <footer>
                    <div class="mdc-layout-grid">
                        <div class="mdc-layout-grid__inner">
                            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                                <span class="text-center text-sm-left d-block d-sm-inline-block tx-14">Copyright © Logistics 2021</span>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- partial -->
            </div>
        </div>
    </div>
    <!-- plugins:js -->
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="../assets/vendors/chartjs/Chart.min.js"></script>
    <script src="../assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="../assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="../assets/js/material.js"></script>
    <script src="../assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../assets/js/dashboard.js"></script>
    <!-- End custom js for this page-->
</body>

</html>