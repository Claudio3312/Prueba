<!DOCTYPE html>
<html lang="en">
<head>

<?php 
include ("header.php")
?>    
</head>
<body>
<?php 
include ("navbar.php")
?>	
	

<?php 
include ("sidebar.php")
?>				

    
    
    
                <div class="span9">
                    <div class="content">
                        <div class="module">
                            <div class="module-head">
                                <h3>
                                    Chart - flot</h3>
                            </div>
                            <div class="module-body">
                                <div class="chart">
                                    <div id="placeholder" class="graph">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/.module-->
                        <br />
                        <div class="module">
                            <div class="module-head">
                                <h3>
                                    Chart - flot</h3>
                            </div>
                            <div class="module-body">
                                <div class="chart inline-legend grid">
                                    <div id="placeholder2" class="graph">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/.module-->
                        <br />
                        <div class="module">
                            <div class="module-head">
                                <h3>
                                    Pie - Default</h3>
                            </div>
                            <div class="module-body">
                                <div class="chart pie donut">
                                    <div id="pie-default" class="graph">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/.module-->
                        <br />
                        <div class="module">
                            <div class="module-head">
                                <h3>
                                    Pie - Donut</h3>
                            </div>
                            <div class="module-body">
                                <div class="chart pie donut">
                                    <div id="pie-donut" class="graph">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/.module-->
                        <br />
                        <div class="module">
                            <div class="module-head">
                                <h3>
                                    Pie - Donut & Interactive</h3>
                            </div>
                            <div class="module-body">
                                <div class="chart pie donut interactive">
                                    <div id="pie-interactive" class="graph">
                                    </div>
                                    <div id="hover">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/.module-->
                    </div>
                    <!--/.content-->
                </div>
                <!--/.span9-->
            </div>
        </div>
        <!--/.container-->
    </div>
<?php
include ("footer.php")
?>

   <!--/.wrapper-->
<div class="footer">
        <div class="container">
            <b class="copyright">&copy; 2014 Edmin - EGrappler.com </b>All rights reserved.
        </div>
    </div>
    <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
    <script src="scripts/flot/jquery.flot.pie.js" type="text/javascript"></script>
    <script src="scripts/common.js" type="text/javascript"></script>

</body>
