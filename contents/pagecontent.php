<?php
class pagecontent{

    public function navbar(){
        ?>
        <section>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
    <img src="images/favicon.ico" alt="" width="30" height="24">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#aboutus">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="usersignup.php">Sign Up</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="userlogin.php">Login</a>
        </li>
      </ul>
      
    </div>
  </div>
</nav>
</section>
        <?php
    }
    public function carousel(){
        ?>
        <section>
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/agriculture-trucks.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>WELCOME TO URBAN LINKS TRANSPORT</h5>
        <p>Where we provide transportation for various agricultural goods for farmers</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/loaders.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Staff</h5>
        <p>Entails drivers and loaders, who ensure that the agricultural goods are transported safely.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/pickup.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Our services</h5>
        <p>The company transports produce such as cereal, livestock, farm inputs,and perishable goods.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</section>
    <?php
    }
    public function aboutus(){
        ?>
        <section id = "aboutus">
  <div>
  <h4 style = "text-align:center">About us</h4>
</div>
  <div class = "row align-items-md-stretch">
  <div class = "col-md-6">
  <div class = "h-100 p-5  text-bg-dark rounded-3">
    <h6>Deliver Resources</h6>
    <p>The Urban Links Transport transports produce<br> such as cereals, livestock, perishable
      like<br> milk, eggs, fish and flowers, and<br> farm inputs such as fertilizers, manure,<br> herbicides,
      pesticides and seeds.
    </p>
  </div>
  </div>
  <div class = "col-md-6">
  <div class = "h-100 p-5 text-bg-dark rounded-3">
    <h6>Shipping to retailers</h6>
    <p>We provide transportation of the agricultural<br> goods for farmers between farms and<br>
      retail-outlets, instead of having consumer<br> pick up the agricultural produce directly<br> from
      farmers.
    </p>
  </div>
  </div>
</div>

</section>
        <?php
    }
}