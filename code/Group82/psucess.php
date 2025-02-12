<html>
  <head>
    <style>
      body {
     text-align: center;
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        padding: 40px 0;
     background: radial-gradient(circle at center,  rgba(255, 0, 0, 0.7),rgba(0, 0, 0, 0.9)), url('https://via.placeholder.com/150');
        background-size: cover;
        background-size: cover;
        backdrop-filter: blur(5px);
      }

      .card {
        background: rgba(255, 255, 255, 0.8);
        padding: 60px;
        border-radius: 20px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        display: inline-block;
        margin-top: 40px;
      }

      i {
      color: white;
        font-size: 100px;
        line-height: 200px;
        margin-left: -15px;
		
      }

      h1 {
        font-weight: 900;
        font-size: 40px;
        margin-bottom: 10px;
		color: black;
      }

      p {
        font-size: 20px;
        margin: 0;
		color: #707070;
      }

      .search {
      width: 150px;
        height: 40px;
        background: rgb(179, 44, 48);
        border: none;
        margin-top: 20px;
        font-size: 18px;
        color: white;
        border-radius: 5px;
        cursor: pointer;

      }

      .search a {
        text-decoration: none;
        font-weight: bold;
        color: white;
      }
	  
      .search:hover
      {
       background: #ff6666;
      }
    </style>
  </head>
  <body>
    <div class="card">
      <div style="border-radius: 200px; height: 200px; width: 200px; background: #707070; margin: 0 auto;">
        <i class="checkmark">✓</i>
      </div>
      <h1>Success</h1>
      <p>We received your rental request;<br/> we'll be in touch shortly!</p>
      <div><button class="search" ><a href="MotorcyclesDisplay.php">Search Motorcycles</a></button></div>
    </div>
  </body>
</html>
