<!DOCTYPE html>
<html lang = "en">
<head>
  <meta charset="utf-8" />
  <title>Profile</title>
  <link rel = "stylesheet" href = "design.css" />
  <style>
  .changePasswordButton{
  	background-color: blue;
  	border: none;
  	color: white;
  	padding: 15px 32px;
  	text-align: center;
  	text-decoration: none;
  	display: inline-block;
  	font-size: 16px;
  	margin:4px 2px;
  	cursor: pointer;
  }
  .SignOutButton{
  	background-color: #29962e;
  	border: none;
  	color: white;
  	padding: 15px 32px;
  	text-align: center;
  	text-decoration: none;
  	display: inline-block;
  	font-size: 16px;
  	margin:4px 2px;
  	cursor: pointer;
  	position: relative;
  	left: 1300px;
  	bottom: 600px;
  	}
    img{
      width: 50%;
      height: 50%;
    }
  </style>
</head>
<body>
  <?php
    include('Header.php');
   ?>
  <table border = "0">
    <tr>
      <th>
        <img src = "Avatars/Karen.png" />
      </th>
    </tr>
    <tr>
      <td>
        getName()
      </td>
      <td>
        getEmail()
      </td>
    </tr>
    <tr>
      <td>
        getDOB()
      </td>
    </tr>
  </table>
  <?php
    include('Footer.php');
   ?>
   <script>
    function getName(){

    }

    function getEmail(){

    }

    function getDOB(){

    }
   </script>
</body>
</html>
