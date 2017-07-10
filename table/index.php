
<html>
	<head>
		<title> Bootstrap Tables</title>
		<link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
		<link type="text/css" href="css/bootstrap-table.css" rel="stylesheet">
		<link type="text/css" href="css/font-awesome.css" rel="stylesheet">
</head>
 
<body>

<div class="container">
	<div class="col-md-12">
		<div class="page-header">
			<h1>
				How to use bootstrap tables to  Display data from MySQL using PHP
			</h1>
		</div>


		<div class="panel panel-success">
			<div class="panel-heading "> 
				<span class=""> This Source Code Provided By<br>
				 <a href="https://www.sourcecodesite.com">SourceCodeSite.com</a> </span>  
			 	
			 	
			 </div>
						 
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12">
					 
						<table 	id="table"
			                	data-show-columns="true"
 				                data-height="460">
						</table>
					</div>
				</div>
			</div>				
		</div>

	</div>
</div>
  		
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-table.js"></script>


<script type="text/javascript">
	
	 var $table = $('#table');
		     $table.bootstrapTable({
			      url: 'list-user.php',
			      search: true,
			      pagination: true,
			      buttonsClass: 'primary',
			      showFooter: true,
			      minimumCountColumns: 2,
			      columns: [{
			          field: 'num',
			          title: '#',
			          sortable: true,
			      },{
			          field: 'first',
			          title: 'Firstname',
			          sortable: true,
			      },{
			          field: 'last',
			          title: 'Lastname',
			          sortable: true,
			          
			      },  ],
 
  			 });

</script>

</body>
</html>





