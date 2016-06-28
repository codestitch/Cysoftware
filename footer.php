
    <footer id="footer">
        <div class="container">
            <div class="col-md-3 col-sm-6">
                <h4>About us</h4>

                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>

                <hr>

                <h4>Join our monthly newsletter</h4>

                <form>
                    <div class="input-group">

                        <input type="text" class="form-control">

                        <span class="input-group-btn">

                    <button class="btn btn-default" type="button"><i class="fa fa-send"></i></button>

                </span>

                    </div>
                    <!-- /input-group -->
                </form>

                <hr class="hidden-md hidden-lg hidden-sm">

            </div>
            <!-- /.col-md-3 -->

            <div class="col-md-3 col-sm-6">

                <h4>Blog</h4>

                <div class="blog-entries">
                    <div class="item same-height-row clearfix">
                        <div class="image same-height-always">
                            <a href="#">
                                <img class="img-responsive" src="assets/img/detailsquare.jpg" alt="">
                            </a>
                        </div>
                        <div class="name same-height-always">
                            <h5><a href="#">Blog post name</a></h5>
                        </div>
                    </div>

                    <div class="item same-height-row clearfix">
                        <div class="image same-height-always">
                            <a href="#">
                                <img class="img-responsive" src="assets/img/detailsquare.jpg" alt="">
                            </a>
                        </div>
                        <div class="name same-height-always">
                            <h5><a href="#">Blog post name</a></h5>
                        </div>
                    </div>

                    <div class="item same-height-row clearfix">
                        <div class="image same-height-always">
                            <a href="#">
                                <img class="img-responsive" src="assets/img/detailsquare.jpg" alt="">
                            </a>
                        </div>
                        <div class="name same-height-always">
                            <h5><a href="#">Very very long blog post name</a></h5>
                        </div>
                    </div>
                </div>

                <hr class="hidden-md hidden-lg">

            </div>
            <!-- /.col-md-3 -->

            <div class="col-md-3 col-sm-6">

                <h4>Contact</h4>

                <p><strong>Universal Ltd.</strong>
                    <br>13/25 New Avenue
                    <br>Newtown upon River
                    <br>45Y 73J
                    <br>England
                    <br>
                    <strong>Great Britain</strong>
                </p>

                <a href="contact.html" class="btn btn-small btn-template-main">Go to contact page</a>

                <hr class="hidden-md hidden-lg hidden-sm">

            </div>
            <!-- /.col-md-3 -->



            <div class="col-md-3 col-sm-6">

                <h4>Photostream</h4>

                <div class="photostream">
                    <div>
                        <a href="#">
                            <img src="assets/img/detailsquare.jpg" class="img-responsive" alt="#">
                        </a>
                    </div>
                    <div>
                        <a href="#">
                            <img src="assets/img/detailsquare2.jpg" class="img-responsive" alt="#">
                        </a>
                    </div>
                    <div>
                        <a href="#">
                            <img src="assets/img/detailsquare3.jpg" class="img-responsive" alt="#">
                        </a>
                    </div>
                    <div>
                        <a href="#">
                            <img src="assets/img/detailsquare3.jpg" class="img-responsive" alt="#">
                        </a>
                    </div>
                    <div>
                        <a href="#">
                            <img src="assets/img/detailsquare2.jpg" class="img-responsive" alt="#">
                        </a>
                    </div>
                    <div>
                        <a href="#">
                            <img src="assets/img/detailsquare.jpg" class="img-responsive" alt="#">
                        </a>
                    </div>
                </div>

            </div>
            <!-- /.col-md-3 -->
        </div>
        <!-- /.container -->
    </footer>
    <!-- /#footer -->

    <!-- *** FOOTER END *** -->

    <!-- *** COPYRIGHT ***
_________________________________________________________ -->

    <div id="copyright">
        <div class="container">
            <div class="col-md-12">
                <p class="pull-left">&copy; 2015. Your company / name goes here</p>
                <p class="pull-right">Template by <a href="http://bootstrapious.com">Bootstrap 4 Themes</a> with support from <a href="http://kakusei.cz">Designové předměty</a> 
                    <!-- Not removing these links is part of the licence conditions of the template. Thanks for understanding :) -->
                </p>

            </div>
        </div>
    </div>
    <!-- /#copyright -->

    <!-- *** COPYRIGHT END *** -->



    </div>
    <!-- /#all -->


    <!-- #### JAVASCRIPT FILES ### -->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/jquery-1.11.0.min.js"><\/script>')
    </script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

    <script src="assets/js/jquery.cookie.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/jquery.parallax-1.1.3.js"></script>
    <script src="assets/js/front.js"></script>
    <script src="assets/js/dirPagination.js"></script> 

    <?php if ($basename == 'shop') { ?>
        <script src="assets/js/core/shop.js"></script> 
    <?php
        } elseif ($basename == 'shop-detail') {
    ?> 
    <script src="assets/js/core/shop-detail.js"></script> 
        <!-- <script src="assets/js/core/shop.js"></script>  -->
    <?php
        } 
    ?>


</body>

</html>