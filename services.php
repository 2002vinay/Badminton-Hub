<?php
include 'config.php';
?>



<html lang="en">
  <head>
    <title>Services</title>
    <link
      href="https://fonts.googleapis.com/css?family=Bentham|Playfair+Display|Raleway:400,500|Suranna|Trocchi"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="/home.css" />
  </head>
  <style>
    body {
      margin: 0;
      padding: 0;
      background-color: rgb(48, 48, 48);
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen,
        Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
    }
    .wrapper {
      height: 420px;
      width: 654px;
      margin: 50px auto;
      border-radius: 7px 7px 7px 7px;
      /* VIA CSS MATIC https://goo.gl/cIbnS */
      -webkit-box-shadow: 0px 14px 32px 0px rgba(0, 0, 0, 0.15);
      -moz-box-shadow: 0px 14px 32px 0px rgba(0, 0, 0, 0.15);
      box-shadow: 0px 14px 32px 0px rgba(0, 0, 0, 0.15);
    }
    .product-img {
      float: left;
      height: 420px;
      width: 327px;
    }
    .product-img img {
      border-radius: 7px 0 0 7px;
    }
    .product-info {
      float: left;
      height: 420px;
      width: 327px;
      border-radius: 0 10px 10px 0;
      background-color: rgba(252, 215, 92, 0.979);
    }
    .product-text h1 {
      padding-top: 10px;
      font-size: 20px;
      color: black;
      padding-left: 10px;
      margin-left: 10px;
      overflow-y: scroll;
      height: 50px;
    }
    .product-text h1,
    .product-price-btn p {
      font-family: "Bentham", serif;
    }
    .product-price-btn p {
      display: inline-block;
      font-family: "Trocchi", serif;
      margin-top: 0;
      font-size: 28px;
      font-weight: lighter;
      color: #474747;
    }
    .product-price-btn button {
      display: inline-block;
      height: 50px;
      width: 176px;
      position: relative;
      box-sizing: border-box;
      border: transparent;
      border-radius: 60px;
      font-family: "Raleway", sans-serif;
      font-size: 14px;
      font-weight: 500;
      text-transform: uppercase;
      letter-spacing: 0.2em;
      color: #ffffff;
      background-color: #070707;
      cursor: pointer;
      outline: none;
    }
    .product-price-btn button:hover {
      background-color: #79b0a1;
    }
    .container {
      display: grid;
      grid-template-columns: auto auto;
    }
    ol,
    ul {
      list-style: none;
    }
    a {
      color: white;
      text-decoration: none;
    }
    a:hover {
      color: white;
    }
    #mainMenu li {
      padding-left: 20px;
      padding-top: 15px;
    }
    #mainMenu {
      display: flex;
      flex-direction: row;
    }
    .navbar-container {
      background-color: black;
      color: white;
      display: flex;
      flex-direction: row;
    }
    .navbar-container header p {
      margin-left: 20px;
      font-size: 25px;
    }
    .description::-webkit-scrollbar {
      width: 5px; /* Remove scrollbar space */
      background: transparent;
      /* Optional: just make scrollbar invisible */
    }
    /* Optional: show position indicator in red */
    .description::-webkit-scrollbar-thumb {
      background: white;
      border-radius: 3px;
    }
    .heading::-webkit-scrollbar {
      width: 5px; /* Remove scrollbar space */
      background: transparent;
      /* Optional: just make scrollbar invisible */
    }
    /* Optional: show position indicator in red */
    .heading::-webkit-scrollbar-thumb {
      background: white;
      border-radius: 3px;
    }
    .description {
      margin-left: 10px;
      overflow-y: scroll;
      height: 200px;
    }
    #select1 {
      flex-direction: row;
      width: 10em;
      height: 2em;
      font-size: larger;
      color: white;
      padding-left: 20px;
      outline: none;
      border-radius: 2em;
      border: 2px solid white;
      background-color: rgb(46, 46, 46);
      position: absolute;
      top: 0;
      left: 15%;
    }
    .select {
      position: relative;
      top: 20px;
      left: 30%;
    }
    /* Set a style for all buttons */
    .Search-btn {
      border-radius: 25px;
      width: 100px;
      padding: 15px 0;
      margin-left: 20px;
      font-weight: bold;
      border: 1px solid #fff;
      background: transparent;
      color: #fff;
      position: absolute;
      overflow: hidden;
      top: 0;
      left: 28%;
    }
    /* Add a hover effect for buttons */
    .search-span {
      background: #fff;
      height: 100%;
      width: 0;
      border-radius: 25px;
      position: absolute;
      left: 0;
      bottom: 0;
      z-index: -1;
      transition: 0.5s;
    }
    .Search-btn:hover span {
      width: 100%;
    }
    .Search-btn:hover {
      border: none;
      color: black;
    }
    
    .profile-button {
    position: absolute;
    left: 90%;
    background-color: rgba(252, 215, 92, 0.979) ;
    border-radius: 25px;
    padding: 10px;
   
  }
  
  .profile-button a {
    
    color: black;
    margin-bottom: 10px;
     text-align: center;
     font-size: 17px;
     font-weight:bold; 

  }
  </style>

  <body>
    <div class="navbar-container">
      <header>
        <p>The Badminton Hub</p>
      </header>
      <nav>
        <ul id="mainMenu">
          <li>
            <a href="home.php">Home </a>
          </li>
          <li>
            <a href="services.php"><strong>Services</strong></a>
          </li>
          <li>
            <a href="products.php">Products</a>
          </li>
          <li><a href="orders.php">Orders</a></li>
          <li><a href="cart.php">Cart</a></li>
          <li style="position: absolute; left: 90%">
          <li class="profile-button">
  <a href="profile.php">Profile</a>
</li>
           
          </li>
        </ul>
      </nav>
    </div>

    <div class="container">
     <!-- <%if(result.length > 0) { %> <% result.forEach((results, index) => { %>-->
      <div class="wrapper">
        <div class="product-img">
          <img
            src="<%=result[index].service_image  %> "
            height="420"
            width="327"
          />
        </div>
        <div class="product-info">
          <div class="product-text">
          <!--  <h1 class="heading"><%= result[index].service_name%></h1>
            <p class="description"><%= result[index].description%></p>-->
          </div>
          <div class="product-price-btn">
            <p>
             <!-- <img
                src="./rupee-indian.png"
                alt=""
                width="20px"
                height="20px"
              /><span><%= result[index].price%></span>
            </p>-->
            <!--<form
             action="/services/<%=result[index].service_id%>"
              method="post"
              style="
                position: absolute;
                display: inline-block;
                margin-left: 50px;
              "
            >
              <button type="submit">Book Now</button>
            </form>-->
          </div>
        </div>
      </div>
     <!-- <% }) %> <%} else { %>
      <p style="color: white; position: relative; left: 90%; top: 20%">
        No services
      </p>
      <%} %>-->
    </div>

    <footer class="footer">
      <div class="about">
        <p><strong>About</strong></p>
        <p>Contact Us</p>
        <p>About us</p>
        <p>Our Social Media Handles:</p>
        <div class="icons">
          <a href="#"
            ><img src="whatsapp.png" alt="" width="20" height="20"
          /></a>
          <a href="#"
            ><img src="facebook.png" alt="" width="20" height="20"
          /></a>
          <a href="#"
            ><img src="instagram.png" alt="" width="20" height="20"
          /></a>
        </div>
      </div>

      <div class="help">
        <p><strong>Help</strong></p>
        <p>Payments</p>
        <p>Shipping</p>
      </div>
      <div class="address">
        <p><strong>Visit our Shop:</strong></p>
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3884.197886376466!2d75.00047231461471!3d13.212889390697955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bbb57ccb46f93fd%3A0x5463a907579f060!2sThribhuvan%20badminton%20Hub%20and%20Gutting%20centre!5e0!3m2!1sen!2sin!4v1640965345331!5m2!1sen!2sin"
          width="200"
          height="200"
          style="border: 0"
          allowfullscreen=""
          loading="lazy"
        ></iframe>
      </div>
    </footer>
  </body>
</html>