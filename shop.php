<?php
    include_once('header.php');
?>

<!-- Breadcrumbs -->
<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1>Cyclesoftware Shop</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li>Shop</li>
                </ul>

            </div>
        </div>
    </div>
</div>

<div id="content" ng-controller="MyController" ng-init="onInit()">
    <div class="container">

        <div class="row">

            <!-- Left Widget -->
            <?php  include_once('leftwidget.php'); ?>

            <div class="col-sm-9" >

                <!-- <p class="text-muted lead">In our Ladies department we offer wide selection of the best products we have found and carefully selected worldwide. Pellentesque habitant morbi tristique senectus et netuss.</p> -->
                    
                <div class="row">
                    <div class="col-xs-8">
                      <h3>Product Page: {{ currentPage }}</h3>
                    </div>
                   <!--  <div class="col-xs-4">
                      <label for="search">Search:</label>
                      <input ng-model="filterText" id="search" class="form-control" placeholder="Search Product">
                    </div>  -->
                </div>

                <div class="row products"> 

                     <div dir-paginate="model in filtered=(data | filter:filterByCategory) |  itemsPerPage: pageSize" current-page="currentPage">

                        <div class="col-md-4 col-sm-6" ng-if="model.pos_description != null && model.rrp != null ">

                            <div class="product">
                                <div class="image">
                                    <a href="shop-detail.php?product={{model.pos_description}}&bicycleID={{model.bicycle_id[0]}}">
                                        <img ng-if="model.images.length " src="{{ model.images[0].url_large }}" alt="" class="img-responsive image1" style="width: 300px; height: 200px;">
                                        <img ng-if="!model.images.length" src="assets/img/default.png" alt="" class="img-responsive image1" style="width: 300px; height: 200px;">
                                    </a>

                                </div>
                                <!-- /.image -->
                                <div class="text">
                                    <h3><a href="shop-detail.php?product={{model.pos_description}}&bicycleID={{model.bicycle_id[0]}}">{{ model.pos_description }}</a></h3>  
                                    
                                    <p ng-if="model.rrp == model.salesprice" class="price"> $ {{ model.rrp }}</p> 
                                    <p ng-if="model.rrp != model.salesprice" class="price"> 
                                         <del>$ {{ model.rrp }} </del> $ {{ model.salesprice }}</p> 
                                  

                                    <p class="buttons">
                                        <a href="shop-detail.html" class="btn btn-default">View detail</a>
                                        <a href="shop-basket.html" class="btn btn-template-main"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </p>
                                </div>
                                <!-- /.text -->

                                <div ng-if="model.rrp != model.salesprice" class="ribbon sale">
                                    <div class="theribbon">SALE</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon -->

                                <div ng-if="model.has_stock == 'false' " class="ribbon new">
                                    <div class="theribbon">No Stock</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon -->
                            </div>
                            <!-- /.product -->
                        </div>

                    </div> 

                     
                </div>
                <!-- /.products --> 


                <div class="pages">
                    <div ng-controller="OtherController">
                        <div class="text-center">
                        <dir-pagination-controls boundary-links="true"  on-page-change="pageChangeHandler(newPageNumber)" template-url="dirPagination.tpl.php"></dir-pagination-controls>
                        </div>
                    </div>
                </div>



            </div>
            <!-- /.col-md-9 -->

            <!-- *** RIGHT COLUMN END *** -->

        </div>

    </div>
    <!-- /.container -->
</div>
<!-- /#content -->
 
<?php
    include_once('footer.php');
?>