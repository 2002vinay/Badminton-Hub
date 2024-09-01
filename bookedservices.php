<?php
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="home.css">
    <title>Thribhuvan badminton hub</title>
    <style>
      body {
        margin: 0;
        padding: 0;
        background-color: rgb(177, 177, 177);
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
          Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
      }
      
      table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }
      td,
      th {
        border: 1px solid white;
        text-align: left;
        padding: 20px;
      }
      tr:nth-child(even) {
        background-color: yellow;
      }
    </style>
  </head>
  <body>
   <h1 style="color: white;margin-left: 30px;">Services</h1>
    <div>
      <table>
        <tr>
          <th>Service Name</th>
          <th>Cost</th>
          <th>Description</th>
          <th>User Boked</th>
        
          
        </tr>
      <% for(var i=0;i<result.length;i++) {%>
        <tr>
          <td><%=result[i].service_name%></td>
          <td><%=result[i].price %></td>
          <td><%=result[i].description %> </td>
          <td><%=result[i].UName %> </td>
         
        </tr>
        <% } %>
      </table>
      <a
      href="admin.php"
      style="color: white; font-family: 'Ubuntu-Bold', sans-serif ;margin-left: 50%; margin-top: 30px; font-size: 25px;"
      >Back</a
    >
    </div>
    
  </body>
</html>