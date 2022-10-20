<?php
include_once("verification.php");
?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" sizes="96x96" href="assets/images/logo.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>IFTSAU</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>
    <!--  Paper Dashboard core CSS    -->
    <link href="assets/css/paper-dashboard.css" rel="stylesheet"/>
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/themify-icons.css" rel="stylesheet">
</head>
<body>
<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="info">
    <div class="sidebar-wrapper">
            <div class="logo">
                <a href="https://www.iftsauoujda.ac.ma/" class="simple-text">
                <img src="assets/images/logo.png" alt="login" style="width:50px;height:60px;">IFTSAU
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="#">
                        <i class="ti-dashboard"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="etudiant.php">
                        <i class="ti-user"></i>
                        <p>Étudiants</p>
                    </a>
                </li>
                <li>
                    <a href="note.php">
                        <i class="ti-write"></i>
                        <p>Notes</p>
                    </a>
                </li>
                <li>
                    <a href="absence et assiduite.php">
                        <i class="ti-home"></i>
                        <p>Assiduité </p>
                    </a>
                </li>
                <li>
                    <a href="vacataire.php">
                        <i class="ti-id-badge"></i>
                        <p>Vacataires</p>
                    </a>
                </li>
                <li>
                    <a href="vacation.php">
                        <i class="ti-bookmark"></i>
                        <p>Vacation</p>
                    </a>
                </li>
                <li>
                    <a href="attestaion.php">
                        <i class="ti-printer"></i>
                        <p>Attestations</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="main.php">IFTSAU Admin</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                              <a href="déconnexion.php" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-power-off"></i>
                                    <p class="notification"></p>
									<p><strong>Déconnexion</strong></p>
                              </a>

                        </li>
                    </ul>

                </div>
            </div>
        </nav>
        <?php include("dashboard.php");?>
</div>
</body>
</html>
