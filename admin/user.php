<?php include($_SERVER['DOCUMENT_ROOT']. '/urlizer/access/session.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard - Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Urlizer Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo " Welcome ".$logged_in_user; ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo "/urlizer/access/logout.php"; ?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="/urlizer/admin/dashboard.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"></i> Charts</a>
                    </li>
                    <li>
                        <a href="tables.html"><i class="fa fa-fw fa-table"></i> Tables</a>
                    </li>
                    <li>
                        <a href="forms.html"><i class="fa fa-fw fa-edit"></i> Forms</a>
                    </li>
                    <li>
                        <a href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a>
                    </li>
                    <li>
                        <a href="bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Bootstrap Grid</a>
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
                    <li>
                        <a href="blank-page.html"><i class="fa fa-fw fa-file"></i> Blank Page</a>
                    </li>
                    <li>
                        <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> RTL Dashboard</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Statistics Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Like SB Admin?</strong> Try out <a href="http://startbootstrap.com/template-overviews/sb-admin-2" class="alert-link">SB Admin 2</a> for additional features!
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
      <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>

      <table style="float: left;">
          <tr>
              <td>
                  <button type="button" class="btn btn-primary btn-sm" style="margin-bottom:10px;float: left;" data-toggle="modal" data-target="#basicModalsave"></span><b><span class="glyphicon glyphicon-plus" style="padding: 3px 30px;"></b></button>
              </td>
          </tr>
      </table>
    <!-- Save trigger modal -->
    <div class="modal fade" id="basicModalsave" tabindex="-1" role="dialog" aria-labelledby="basicModalsave" aria-hidden="true">
     <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Add a User</h4>
        </div>
        <div class="modal-body">      
            <form action="/urlizer/crud/signup.php" method="post">

                <label for="name" class="sr-only">First Name</label>
                <input id="name" name="fname" placeholder="First Name" type="text" class="form-control" required><br>

                <label for="name" class="sr-only">Last Name</label>
                <input id="name" name="lname" placeholder="Last Name" type="text" class="form-control" required><br>

                <label for="email" class="sr-only">E-Mail</label>
                <input id="email" name="email" placeholder="E-Mail" type="email" class="form-control" required><br>

                <div class="form-group">
                    <label for="role" class="sr-only">Role of User</label>
                    <select class="form-control" name="user_role">
                        <option><i>User Role</i></option>
                        <option value="Agent">Agent</option>
                        <option value="Admin">Admin</option>
                    </select>
                </div>

                <label for="password" class="sr-only">Password</label>
                <input id="password" name="password1" placeholder="Password" type="password" class="form-control" required><br>

                <label for="password" class="sr-only">Password</label>
                <input id="password" name="password2" placeholder="Re-Type Your Password" type="password" class="form-control" required><br>

                <div class="modal-footer">
                  <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                  <input name="submit" type="submit" value="Add User"  class="btn btn-success">
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>

      <table style="float: right;" class="col-sm-4">
          <tr>
              <td>
                <div class="form-group .col-sm-6">
                    <i><input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Search by user's email..."></i>
                </div>
              </td>
          </tr>
      </table>
    
    <div class="row">
        <?php
            if($error)
            {
                echo "
                <div class=\"error\">
                    <p><strong>Database Error:</strong> $error</p>
                </div>";
            } ?>
    
            
            <div class="col-lg-12">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped table-condensed" id="myTable">
                      <thead>
                          <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Edit</th>
                            <th>Delete</th>
                          </tr>
                      </thead>
            <?php 
                if($result && count($result) > 0)
                    { 
                        foreach($result as $key => $row)
                            { ?>              
                                <tbody>
                                  <tr>
                                    <td><?php echo $row['firstname']; ?></td>
                                    <td><?php echo $row['lastname']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['role']; ?></td>

                                    <td width="1"><button class="btn btn-primary btn-sm modals-button" data-title="Edit" data-toggle="modal" data-target="#basicModaledit_<?php echo $row['id']; ?>" style="padding: 5px 40px;"><span class="glyphicon glyphicon-pencil"></span></button></td>

                                    <!-- Edit trigger modal -->
                                    <div class="modal fade" id="basicModaledit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="basicModaledit_<?php echo $row['id']; ?>" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h4 class="modal-title" id="myModalLabel">Update a User</h4>
                                            </div>
                                            <div class="modal-body">      
                                                <form action="/urlizer/crud/update_user.php" method="post">
                                                    <label for="name" class="sr-only">First Name</label>
                                                    <input id="name" name="fname" placeholder="First Name" type="text" class="form-control" value="<?php echo $row['firstname']; ?>"><br>

                                                    <label for="name" class="sr-only">Last Name</label>
                                                    <input id="name" name="lname" placeholder="Last Name" type="text" class="form-control" value="<?php echo $row['lastname']; ?>"><br>

                                                    <label for="email" class="sr-only">E-Mail</label>
                                                    <input id="email" name="email" placeholder="E-Mail" type="email" class="form-control" value="<?php echo $row['email']; ?>"><br>

                                                    <label for="role" class="sr-only">Role</label>
                                                    <input id="role" name="role" type="text" class="form-control" value="<?php echo $row['role']; ?>"><br>

                                                    <input id="userid" name="userid" type="hidden" value="<?php echo $row['id']; ?>"><br>

                                                    <input id="page" name="page" type="hidden" value="<?php echo $get_pages; ?>"><br>

                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                                                      <input name="submit" id="update_btn" type="submit" value="Update User"  class="btn btn-success">
                                                    </div>
                                                </form>
                                            </div>
                                          </div>
                                        </div>
                                    </div>

                                    <!-- Delete trigger modal -->
                                    <td width="1"><button class="btn btn-danger btn-sm" data-title="Delete" data-toggle="modal" data-target="#basicModaldelete_<?php echo $row['id']; ?>" style="padding: 5px 40px;"><span class="glyphicon glyphicon-trash"></span></button></td>

                                    <!-- Delete trigger modal -->
                                    <div class="modal fade" id="basicModaldelete_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="basicModaldelete_<?php echo $row['id']; ?>" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h4 class="modal-title" id="myModalLabel" style="text-align: center;">Are you sure?</h4>
                                            </div>
                                            <div class="modal-body" style="margin-top: -15px">
                                                 <div class="modal-footer">
                                                  <button type="button" class="btn btn-warning" data-dismiss="modal" style="width: 110px">No</button>
                                                  <a href="<?php $userid = $row['id']; echo "/urlizer/crud/delete_user.php?page=$get_pages&userid=$userid";?>" class="btn btn-success" style="width: 110px">Yes</a>
                                                </div> 
                                            </div>
                                          </div>
                                        </div>
                                    </div> 
                                  </tr>
                                </tbody>
                            <?php
                        }
                }
            ?>
                </table>
                
                <div class="clearfix"></div>

                    <?php
                        
                        if($result && count($result) > 0)
                        {
                            # first page
                            if($number <= 1){
                                echo "<ul class=\"pagination pull-right\">";
                                    echo "<li class=\"page-item disabled\"><a class=\"page-link\" href=\"#\">Previous</a></li>";
                                     if ($pages<=1) {
                                        echo "<li class=\"page-item disabled\"> <a class=\"page-link\" href=\"#\">Next</a></li>";
                                    }else{
                                        echo "<li class=\"page-item active\"><a class=\"page-link\" href=\"/urlizer/admin/users.php?page=$next\">Next</a></li>";
                                    }
                                echo "</ul>";
                            }
                            
                            # last page
                            elseif($number >= $pages){
                                echo "<ul class=\"pagination pull-right\">";
                                    echo "<li class=\"page-item active\"><a class=\"page-link\" href=\"/urlizer/admin/users.php?page=$prev\">Previous</a></li>";
                                    echo "<li class=\"page-item disabled\"><a class=\"page-link\" href=\"#\">Next</a></li>";
                                echo "</ul>";
                            }
                            
                            # in range
                            else {
                                echo "<ul class=\"pagination pull-right\">";
                                    echo "<li class=\"page-item active\"><a class=\"page-link\" href=\"/urlizer/admin/users.php?page=$prev\">Previous</a></li>";
                                    echo "<li class=\"page-item active\"><a class=\"page-link\" href=\"?page=$next\">Next</a></li>";
                                echo "</ul>";
                            }
                        }

                        else
                        {
                            echo "<p>No results found.</p>";
                        }              
                    ?>
            </div>
        </div>
    </div>
    <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
