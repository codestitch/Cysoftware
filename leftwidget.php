
                <!-- *** LEFT COLUMN *** -->

                <div class="col-sm-3">

                    <!-- *** Categories *** -->
                    <!-- <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Categories</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked category-menu">
                                <li>
                                    <a href="shop-category.html">Men <span class="badge pull-right">42</span></a>
                                    <ul>
                                        <li><a href="shop-category.html">T-shirts</a>
                                        </li>
                                        <li><a href="shop-category.html">Shirts</a>
                                        </li>
                                        <li><a href="shop-category.html">Pants</a>
                                        </li>
                                        <li><a href="shop-category.html">Accessories</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="active">
                                    <a href="shop-category.html">Ladies  <span class="badge pull-right">123</span></a>
                                    <ul>
                                        <li><a href="shop-category.html">T-shirts</a>
                                        </li>
                                        <li><a href="shop-category.html">Skirts</a>
                                        </li>
                                        <li><a href="shop-category.html">Pants</a>
                                        </li>
                                        <li><a href="shop-category.html">Accessories</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="shop-category.html">Kids  <span class="badge pull-right">11</span></a>
                                    <ul>
                                        <li><a href="shop-category.html">T-shirts</a>
                                        </li>
                                        <li><a href="shop-category.html">Skirts</a>
                                        </li>
                                        <li><a href="shop-category.html">Pants</a>
                                        </li>
                                        <li><a href="shop-category.html">Accessories</a>
                                        </li>
                                    </ul>
                                </li>

                            </ul>

                        </div>
                    </div>
                    -->

                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Brands</h3>
                            <a class="btn btn-xs btn-danger pull-right" href="#"><i class="fa fa-times-circle"></i> <span class="hidden-sm">Clear</span></a>
                        </div>

                        <div class="panel-body">

                            <form> 

                                <div class="form-group" ng-repeat="cat in getCategories()">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" ng-model="filter[cat]" />{{cat}}  
                                        </label>
                                    </div> 
                                </div> 
<!-- 
                                <button class="btn btn-default btn-sm btn-template-main"><i class="fa fa-pencil"></i> Apply</button> -->

                            </form>

                        </div>
                    </div>

                    <!-- <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title clearfix">Colours</h3>
                            <a class="btn btn-xs btn-danger pull-right" href="#"><i class="fa fa-times-circle"></i> <span class="hidden-sm">Clear</span></a>
                        </div>

                        <div class="panel-body">

                            <form>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> <span class="colour white"></span> White (14)
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> <span class="colour blue"></span> Blue (10)
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> <span class="colour green"></span> Green (20)
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> <span class="colour yellow"></span> Yellow (13)
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> <span class="colour red"></span> Red (10)
                                        </label>
                                    </div>
                                </div>

                                <button class="btn btn-default btn-sm btn-template-main"><i class="fa fa-pencil"></i> Apply</button>

                            </form>

                        </div>
                    </div> -->
 

                </div>
                <!-- /.col-md-3 -->

                <!-- *** LEFT COLUMN END *** -->

                <!-- *** RIGHT COLUMN ***
        _________________________________________________________ -->