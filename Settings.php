<!DOCTYPE html>
<html lang = "en">
<head>
  <meta charset = "utf-8" />
  <title>Settings</title>
  <link rel = "stylesheet" href = "design.css" />
  <style>
  .logoutLblPos{
   position:fixed;
   right:10px;
   top:5px;
}
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
  .changeEmailButton{
    background-color: orange;
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
  .changeNameButton{
    background-color: green;
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
  .changeDOBButton{
    background-color: grey;
    border: none;
    color: black;
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
   <form align="right" name="form1" method="post" action="log_out.php">
  <label class="logoutLblPos">
  <input name="submit2" type="submit" id="submit2" value="log out">
  </label>
</form>
   <table border = "0">
     <tr>
       <th>
         <img src = "Karen.png" alt = "Karen"/>
       </th>

     </tr>
     <tr>
       <td>

       </td>
       <td class = "changePasswordButton">
         Change password
       </td>
     </tr>
     <tr>
       <td>

       </td>
       <td class = "changeEmailButton">
         Change email
       </td>
     </tr>
     <tr>
       <td>

       </td>
       <td class = "changeNameButton">
         Change name
       </td>
     </tr>
     <tr>
       <td>

       </td>
       <td class = "changeDOBButton">
         Change DOB
       </td>
     </tr>
   </table>
  <?php
    include('Footer.php');
   ?>
</body>
</html>
