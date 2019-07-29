<?php ob_start(); ?>
<?php include_once '../includes/db.php'; ?>
<?php include_once 'admin_functions.php'; ?>
<?php session_start(); ?>
<?php 

if(!isset($_SESSION["role"])) {
  header("location: {$cms_url}/index.php");
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../admin/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../admin/assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
Dashboard 
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!-- Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../admin/assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />


</head>

<body class="<?php echo $cms_main_color; ?>">
  <div class="wrapper ">