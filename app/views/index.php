<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel and Angular Comment System</title>

	<!-- CSS -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"> <!-- load bootstrap via cdn -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"> <!-- load fontawesome -->
	<style>
		body 		{ padding-top:30px; }
		form 		{ padding-bottom:20px; }
		.comment 	{ padding-bottom:20px; }
	</style>

	<!-- JS -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.min.js"></script> <!-- load angular -->

	<!-- ANGULAR -->
	<!-- all angular resources will be loaded from the /public folder -->
		<script src="js/controllers/mainCtrl.js"></script> <!-- load our controller -->
		<script src="js/services/commentService.js"></script> <!-- load our service -->
		<script src="js/app.js"></script> <!-- load our application -->

</head>
<!-- declare our angular app and controller -->
<body class="container" ng-app="commentApp" ng-controller="mainController">
<div class="col-md-8 col-md-offset-2">

	<!-- PAGE TITLE -->
	<div class="page-header">
		<h2>Application Form - Real Estate Broker</h2>
	</div>

	<!-- NEW COMMENT FORM -->
	<form ng-submit="submitComment()"> <!-- ng-submit will disable the default form action and use our function -->

        <div class="form-group">
			<input type="text" class="form-control input-m" name="date" ng-model="commentData.date" placeholder="Date">
		</div>

		<div class="form-group">
			<input type="text" class="form-control input-m" name="name" ng-model="commentData.name" placeholder="Name">
		</div>

        <div class="form-group">
            <input type="text" class="form-control input-m" name="cnumber" ng-model="commentData.cnumber" placeholder="Contact Number">
        </div>

        <div class="form-group">
            <input type="text" class="form-control input-m" name="email" ng-model="commentData.email" placeholder="Email Address">
        </div>

        <div class="form-group">
            <input type="text" class="form-control input-m" name="datefrom" ng-model="commentData.datefrom" placeholder="Covered From">
        </div>

        <div class="form-group">
            <input type="text" class="form-control input-m" name="dateto" ng-model="commentData.dateto" placeholder="Covered To">
        </div>

        <div class="form-group">
            <input type="text" class="form-control input-m" name="prcno" ng-model="commentData.prcno" placeholder="PRC Id No.">
        </div>

        <div class="form-group">
            <input type="text" class="form-control input-m" name="recertno" ng-model="commentData.recertno" placeholder="Res Cert No.">
        </div>

		
		<!-- SUBMIT BUTTON -->
		<div class="form-group text-right">	
			<button type="submit" class="btn btn-primary btn-lg">Submit</button>
		</div>
	</form>

	<pre>
	{{ commentData }}
	</pre>

	<!-- LOADING ICON -->
	<!-- show loading icon if the loading variable is set to true -->
	<p class="text-center" ng-show="loading"><span class="fa fa-meh-o fa-5x fa-spin"></span></p>

	<!-- THE COMMENTS -->
	<!-- hide these comments if the loading variable is true -->
	<div class="comment" ng-hide="loading" ng-repeat="comment in comments | orderBy: '-id'">
		<h3>Record #{{ comment.id }} <small>by {{ comment.name }} on {{ comment.date }}</small></h3>
		<p>Contact No.: {{ comment.cnumber }}</p>
        <p>Email Address: {{ comment.email }}</p>
        <p>Covered From: {{ comment.datefrom }}</p>
        <p>Covered To: {{ comment.dateto }}</p>
        <p>PRC Id No.: {{ comment.prcno }}</p>
        <p>Res Cert No.: {{ comment.recertno }}</p>

		<p><a href="#" ng-click="deleteComment(comment.id)" class="text-muted">Delete</a></p>
	</div>

</div>
</body>
</html>
