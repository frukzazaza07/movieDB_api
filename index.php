<?php
$url = "https://api.themoviedb.org/3/movie/550?api_key=211d3fd585df97cf03f7449e3c179d3c";
$pages = 1;
$url_allMovie_byPages = 'https://api.themoviedb.org/3/discover/movie?api_key=211d3fd585df97cf03f7449e3c179d3c&certification_country=US&certification.lte=G&sort_by=popularity.desc&page=' . $pages;
// $url = "https://api...";
$data = json_decode(file_get_contents($url_allMovie_byPages), true);
// print_r($data['results']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>AdminLTE 3 | Dashboard 3</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
        img:hover {
            width: 300px;
            height: 300px;
        }

        img {
            position: relative;
            cursor: pointer;
            transition: 0.5s ease;
        }
    </style>
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="position: sticky; top: 0;">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-md">
                    <input class="form-control form-control-navbar" id="txt_search" type="search" placeholder="Search Movie" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" id="btn_search" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="position: fixed; top: 0px;">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-header">Movie category</li>
                        <li class="nav-item">
                            <a href="pages/list-action.php" class="nav-link">
                                <i class="nav-icon fab fa-accessible-icon"></i>
                                <p>Action</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/list-fantasy.php" class="nav-link">
                                <i class="nav-icon fas fa-address-book"></i>
                                <p>Fantasy</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/list-crime.php" class="nav-link">
                                <i class="nav-icon fab fa-android"></i>
                                <p>Crime</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/list-war.php" class="nav-link">
                                <i class="nav-icon fas fa-american-sign-language-interpreting"></i>
                                <p>War</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/list-comedy.php" class="nav-link">
                                <i class="nav-icon fas fa-theater-masks"></i>
                                <p>Comedy</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <?php for ($i = 0; $i < count($data['results']); $i++) { ?>
                        <!-- <div class="col-4"> -->
                        <div class="card mt-5 ml-5" style="width: 20rem;">
                            <div class="mt-3" style="text-align: center;">
                                <a data-toggle="modal" data-target="#exampleModal" onclick="showVideo('<?php echo $data['results'][$i]['id'] ?>')">
                                    <img src="http://image.tmdb.org/t/p/w185/<?php echo $data['results'][$i]['poster_path']; ?>" width="280px" height="280px">
                                </a>
                            </div>
                            <div class="card-body">
                                <header class="text-center">
                                    <h5><?php echo $data['results'][$i]['title']; ?></h5>
                                </header>
                                <article>
                                    <div>
                                        <p><?php echo $data['results'][$i]['overview']; ?></p>
                                    </div>
                                </article>
                                <footer>
                                    <div><span><b>popularity:</b> </span><?php echo $data['results'][$i]['popularity']; ?></div>
                                    <div><span><b>vote_count:</b> </span><?php echo $data['results'][$i]['vote_count']; ?></div>
                                    <div><span><b>vote_average:</b> </span><?php echo $data['results'][$i]['vote_average']; ?></div>
                                    <div><span><b>release_date:</b> </span><?php echo $data['results'][$i]['release_date']; ?></div>
                                </footer>
                            </div>
                        </div>
                        <!-- </div> -->
                    <?php } ?>
                </div>
                <button class="btn btn-primary btn-block mt-4 mb-4" id="seeMore">See More.</button>
            </div>

        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.0.5
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Movie Tailer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <iframe width="420" height="345" src="" id="movie-tailer" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                    </iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="dist/js/adminlte.js"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <script src="dist/js/demo.js"></script>
    <script src="dist/js/pages/dashboard3.js"></script>
</body>

</html>
<script>
    let pages = 1;
    let pages_search = 1;

    $(document).on('click', '#seeMore_search', function() {
        pages_search += 1;
        let txtSearch = $('#txt_search').val();
        let search_url = `https://api.themoviedb.org/3/search/movie?api_key=211d3fd585df97cf03f7449e3c179d3c&language=en-US&page=${pages_search}&include_adult=false&query=${txtSearch}`;
        $.get(search_url, function(data) {
            $('.row > .card').remove();
            for (let i = 0; i < data.results.length; i++) {
                let templates = `<div class="card mt-5 ml-5" style="width: 20rem;">
                    <div class="mt-3" style="text-align: center;">
                        <img src="http://image.tmdb.org/t/p/w185/${data['results'][i].poster_path}" width="280px" height="280px">
                    </div>
                    <div class="card-body">
                        <header class="text-center">
                            <h5>${data['results'][i].title}</h5>
                        </header>
                        <article>
                            <div>
                                <p>${data['results'][i].overview}</p>
                            </div>
                        </article>
                        <footer>
                            <div><span><b>popularity:</b> </span>${data['results'][i].popularity}</div>
                            <div><span><b>vote_count:</b> </span>${data['results'][i].vote_count}</div>
                            <div><span><b>vote_average:</b> </span>${data['results'][i].vote_average}</div>
                            <div><span><b>release_date:</b> </span>${data['results'][i].release_date}</div>
                        </footer>
                    </div>
                </div>`;
                $('.row').append(templates);
            }
        });
    });
    //จำไว้ถ้าเปลี่ยนชื่อ elementID ต้อง add event แบบนี้
    $(document).on('click', '#seeMore', function() {
        pages += 1;
        let url_allMovie_byPages = 'https://api.themoviedb.org/3/discover/movie?api_key=211d3fd585df97cf03f7449e3c179d3c&certification_country=US&certification.lte=G&sort_by=popularity.desc&page=' + pages;
        $.get(url_allMovie_byPages, function(data) {
            for (let i = 0; i < data.results.length; i++) {
                let templates = `<div class="card mt-5 ml-5" style="width: 20rem;">
                                <div class="mt-3" style="text-align: center;">
                                    <a data-toggle="modal" data-target="#exampleModal" onclick="showVideo('${data['results'][i].id}')">
                                        <img src="http://image.tmdb.org/t/p/w185/${data['results'][i].poster_path}" width="280px" height="280px">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <header class="text-center">
                                        <h5>${data['results'][i].title}</h5>
                                    </header>
                                    <article>
                                        <div>
                                            <p>${data['results'][i].overview}</p>
                                        </div>
                                    </article>
                                    <footer>
                                        <div><span><b>popularity:</b> </span>${data['results'][i].popularity}</div>
                                        <div><span><b>vote_count:</b> </span>${data['results'][i].vote_count}</div>
                                        <div><span><b>vote_average:</b> </span>${data['results'][i].vote_average}</div>
                                        <div><span><b>release_date:</b> </span>${data['results'][i].release_date}</div>
                                    </footer>
                                </div>
                            </div>`;
                $('.row').append(templates);
            }
        });
    });

    function showVideo(movieID) {
        let url_video = `https://api.themoviedb.org/3/movie/${movieID}/videos?api_key=211d3fd585df97cf03f7449e3c179d3c&language=en-US`;
        $.get(url_video, function(data) {
            $("#movie-tailer").attr("src", "https://www.youtube.com/embed/" + data.results[0].key);
        });
    }
    $('#btn_search').click(function(evt) {
        evt.preventDefault();
        let txtSearch = $('#txt_search').val();
        let search_url = `https://api.themoviedb.org/3/search/movie?api_key=211d3fd585df97cf03f7449e3c179d3c&language=en-US&page=1&include_adult=false&query=${txtSearch}`;
        $.get(search_url, function(data) {
            if (data.total_pages > 1) {
                $('#seeMore').attr("id", "seeMore_search");
                $('.row > .card').remove();
                for (let i = 0; i < data.results.length; i++) {
                    let templates = `<div class="card mt-5 ml-5" style="width: 20rem;">
                    <div class="mt-3" style="text-align: center;">
                        <a data-toggle="modal" data-target="#exampleModal" onclick="showVideo('${data['results'][i].id}')">
                            <img src="http://image.tmdb.org/t/p/w185/${data['results'][i].poster_path}" width="280px" height="280px">
                        </a>
                    </div>
                    <div class="card-body">
                        <header class="text-center">
                            <h5>${data['results'][i].title}</h5>
                        </header>
                        <article>
                            <div>
                                <p>${data['results'][i].overview}</p>
                            </div>
                        </article>
                        <footer>
                            <div><span><b>popularity:</b> </span>${data['results'][i].popularity}</div>
                            <div><span><b>vote_count:</b> </span>${data['results'][i].vote_count}</div>
                            <div><span><b>vote_average:</b> </span>${data['results'][i].vote_average}</div>
                            <div><span><b>release_date:</b> </span>${data['results'][i].release_date}</div>
                        </footer>
                    </div>
                </div>`;
                    $('.row').append(templates);
                }
            } else {
                $('#seeMore').remove();
            }
        });
    });
</script>