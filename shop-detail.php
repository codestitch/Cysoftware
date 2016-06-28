<?php
    include_once('header.php');
?>

<!-- Breadcrumbs -->
<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1><?php echo $_GET['product'] ?></h1>
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

<div id="content" ng-controller="MyController" ng-init="initDetails()">
    <div class="container" ng-model="data">

        <div class="row"> 
            <div class="col-md-9">

                <h1 >
                    {{ data[0].brand }}
                </h1>

                    </div> 

                <div class="row" id="productMain">
                    <div class="col-sm-6">
                        <div id="mainImage">
                            <img ng-if="data[0].images.length " src="{{ data[0].images[0].url_large }}" alt="" class="img-responsive">
                        </div>

                        <div ng-if="data[0].rrp != data[0].salesprice"  class="ribbon sale">
                            <div class="theribbon">SALE</div>
                            <div class="ribbon-background"></div>
                        </div>
                        <!-- /.ribbon -->

                       <div ng-if="data[0].has_stock == 'false' " class="ribbon new">
                            <div class="theribbon">No Stock</div>
                            <div class="ribbon-background"></div>
                        </div>
                        <!-- /.ribbon -->

                        <div ng-if="data[0].rrp != data[0].salesprice" style="margin-top: 20px;">
                             <label> {{ data[0].sales_text }}</label>
                        </div>

                    </div>
                    <div class="col-sm-6">

                        <p class="goToDescription"><a href="#details" class="scroll-to text-uppercase">Check product details, material & care and sizing</a>
                        </p> 
                        <div class="box">

                            <form>
                                <div class="sizes">

                                    <h3>Available sizes</h3>

                                    <span ng-if="data[0].supplier_data.length " ng-repeat="d in data[0].supplier_data">
                                        <label ng-if="d[9]">
                                            <a >{{ d[9] }}</a>
                                            <input type="radio"  name="size" value="s" class="size-input">
                                        </label> 
                                    </span> 

                                </div>
 
                                <p ng-if="data[0].rrp == data[0].salesprice" class="price"> $ {{ data[0].rrp }}</p> 
                                <p ng-if="data[0].rrp != data[0].salesprice" class="price"> 
                                     <del style="font-size: 25px; color: rgb(197, 76, 0);">$ {{ data[0].rrp }} </del> $ {{ data[0].salesprice }}
                                </p> 

                                <p class="text-center">
                                    <button type="submit" class="btn btn-template-main"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                                    <button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Add to wishlist"><i class="fa fa-heart-o"></i>
                                    </button>
                                </p>

                            </form>
                        </div>
 
                    </div>

                </div>


                <div class="box" id="details">
                    <p>
                    <h4>Product details</h4>  

                    <div class="container" ng-repeat="item in data[0].supplier_data"> 
                      <table class="table table-striped"> 
                        <tbody>
                          <tr ng-repeat='(key,val) in item[27] track by $index'>
                            <td width="40%"> 
                                <div ng-repeat='(innerkey,innerval) in datacolumns[27].properties track by $index'>  
                                    <p ng-if="innerkey == key"> {{innerval}}</p>
                                </div>

                            </td>
                            <td width="40%">{{ val }}</td> 
                          </tr> 
                        </tbody>
                      </table>
                    </div> 

                   <!--  <div class="container"> 

                        <div class="panel-group" id="accordion" ng-repeat="item in data[0].supplier_data track by $index">
                            <div ng-if="$first" > 
                                <div class="panel panel-default">
                                  <div class="panel-heading">
                                    <h4 class="panel-title">
                                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse_{{$index}}">Collapsible Group 1</a>
                                    </h4>
                                  </div>
                                  <div id="collapse_{{$index}}" ng-if="$first" ng-class="panel-collapse collapse in">  
                                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                                  </div>
                                </div> 
                            </div>

                            <div ng-if="!$first" >

                                <div class="panel panel-default">
                                  <div class="panel-heading">
                                    <h4 class="panel-title">
                                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse_{{$index}}">Collapsible Group 1</a>
                                    </h4>
                                  </div>
                                  <div id="collapse_{{$index}}" ng-if="$first" ng-class="panel-collapse collapse">  
                                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                                  </div>
                                </div> 

                            </div>


                        </div>

                    </div> --> 

<!-- 
                    <div class="container">
                      <h2>Accordion Example</h2>
                      <p><strong>Note:</strong> The <strong>data-parent</strong> attribute makes sure that all collapsible elements under the specified parent will be closed when one of the collapsible item is shown.</p>
                      
                      <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Collapsible Group 1</a>
                            </h4>
                          </div>
                          <div id="collapse1" class="panel-collapse collapse in">
                            <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                          </div>
                        </div>
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Collapsible Group 2</a>
                            </h4>
                          </div>
                          <div id="collapse2" class="panel-collapse collapse">
                            <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                          </div>
                        </div>
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Collapsible Group 3</a>
                            </h4>
                          </div>
                          <div id="collapse3" class="panel-collapse collapse">
                            <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                          </div>
                        </div>
                      </div>


                    </div> -->
                        
                </div>

                <div class="box social" id="product-social">
                    <h4>Show it to your friends</h4>
                    <p>
                        <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                        <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                    </p>
                </div>


            </div>



        </div>

    </div>
    <!-- /.container -->
</div>
<!-- /#content -->
 
<?php
    include_once('footer.php');
?>