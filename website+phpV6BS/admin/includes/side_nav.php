<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">

            <?php 

        $secNo = $_SESSION['secID'];

        switch ($secNo) {
            case '1':
                ?>
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="../admin/index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-gear"></i> Create New User</a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-fw fa-gear"></i> Edit a User</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-gear"></i> Delete a User</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <?php
                break;
            //Lecturer
            case '2':
                ?>
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="../admin/index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-bar-chart-o"></i> Create a new Test</a>
                    </li>
                    <li>
                        <a href="../admin/insertQ.php"><i class="fa fa-fw fa-table"></i> Create New Question</a>
                    </li>
                    <li>
                        <a href="../admin/searchQ.php"><i class="fa fa-fw fa-edit"></i> Edit a Question</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> View Your Students<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="../admin/search.Stud.php">Maths</a>
                            </li>
                            <li>
                                <a href="#">English</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <?php
                break;

            //Student
            case '3':
                ?>
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="../admin/index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Take a Test <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="../admin/testMaths.php">Maths</a>
                            </li>
                            <li>
                                <a href="#">English</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="../admin/stud.viewResults.php"><i class="fa fa-fw fa-table"></i> View Test Results</a>
                    </li>
                    
                </ul>
                <?php
                break;    
            
        }
         ?>
                
            </div><!--end of nav-bar div-->