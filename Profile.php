<!DOCTYPE html>
<html lang = "en">
<head>
  <meta charset="utf-8" />
  <title>Profile</title>
  <link rel = "stylesheet" href = "design.css" />
  <style>
  .button{
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
  </style>
</head>
<body>
  <?php
    include('Header.php');
   ?>
  <table border = "0">
    <tr>
      <th>
        Profile pic
      </th>
      <td>
        Name
      </td>
    </tr>
    <tr>
      <td>

      </td>
      <td>
        Email
      </td>
    </tr>
    <tr>
      <td>

      </td>
      <td>
        DOB
      </td>
    </tr>
  </table>
  <?php
    include('Footer.php');
   ?>
</body>
</html>
