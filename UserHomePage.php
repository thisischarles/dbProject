<!DOCTYPE html>
<html lang = "en">
<head>
  <meta charset = "utf-8" />
  <title>Home</title>
  <link rel = "stylesheet" href = "design.css" />
  <style>.logoutLblPos{
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
  .button{
    width: 120px;
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
  img{
    max-width: 50%;
    max-height: 50%;
  }
  </style>
</head>
<body>
  <?php
    include(Header.php);
   ?>
   <table border = "0">
     <tr>
       <th>
        <img src = "/Users/Charles/Documents/dbProject/Avatars/Karen.png" alt = "Karen" />
       </th>
       <td>
         Create group
       </td>
     </tr>
     <tr>
       <td>

       </td>
       <td>
         Add participant to event
       </td>
     </tr>
     <tr>
       <td>

       </td>
       <td>
         Invitations
       </td>
     </tr>
     <tr>
       <td>

       </td>
       <td>
         Notifications
       </td>
     </tr>
   </table>
  <?php
    include(Footer.php);
   ?>
</body>
</html>
