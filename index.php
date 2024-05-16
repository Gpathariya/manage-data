<?php
session_start();
if ($_SESSION['email'] && $_SESSION['password']) {
  include ("includes/header.php");
  include ("includes/navbar.php");
  ?>
  <!-- sandeep kumar -->
  <!-- Slider -->
  <section>
    <div class="container-fluid">
      <div class="row">
        <div class="col p-0">
          <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="img/computer.jpg" class="d-block w-100" alt="" height="500vh" />
              </div>
              <div class="carousel-item">
                <img src="img/river.jpg" class="d-block w-100" alt="..." height="500vh" />
              </div>
              <div class="carousel-item">
                <img src="img/team1.jpg" class="d-block w-100" alt="..." height="500vh" />
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Slider End-->

  <section>
    <div class="container">
      <div class="row my-lg-5">
        <div class="col-lg-6">
          <img src="img/team1.jpg" alt="" width="100%" class="rounded" />
        </div>
        <div class="col-lg-6">
          <p class="fw-medium">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit
            asperiores sit beatae provident quas dolorum debitis perferendis
            possimus eum nemo tempora at in voluptate itaque expedita,
            voluptates, quam voluptatem cum. Lorem ipsum dolor sit amet
            consectetur adipisicing elit. Perspiciatis velit magni laudantium
            obcaecati nemo consectetur porro nisi facere nihil modi,
            recusandae architecto unde perferendis nam corrupti iste sint
            deserunt nobis. Lorem ipsum dolor sit amet consectetur adipisicing
            elit. Aliquam perspiciatis, necessitatibus esse soluta aliquid
            rem! Possimus asperiores consequuntur ratione accusantium fugiat
            veritatis saepe nisi aperiam. Sint ad nam delectus totam. Lorem
            ipsum, dolor sit amet consectetur adipisicing elit. Magnam, atque
            veniam facilis, modi ipsa beatae tempora sint magni exercitationem
            velit porro dignissimos ad dolor labore necessitatibus doloribus
            perspiciatis inventore consequuntur.
          </p>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col p-0">
          <div class="team-div p-3">
            <div class="container">
              <div class="row text-center">
                <h2>Ready To Contact ?</h2>
                <div class="col">
                  Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                  Eaque, molestias alias rem est odio iusto. Consectetur quis
                  voluptatum ad, accusamus quas soluta recusandae dolores
                  itaque voluptas iusto? Vel, tempore id! <br />
                  <br />
                  <button class="btn contactBtn w-25">Contact</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Cards -->
  <section>
    <div class="container">
      <div class="row my-5">
        <div class="col-lg-4">
          <div class="card">
            <img src="img/sl3.jpg" class="card-img-top" alt="..." height="180px" />
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">
                Some quick example text to build on the card title and make up
                the bulk of the card's content.
              </p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card">
            <img src="img/sl2.jpg" class="card-img-top" alt="..." height="180px" />
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">
                Some quick example text to build on the card title and make up
                the bulk of the card's content.
              </p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card">
            <img src="img/sl1.jpg" class="card-img-top" alt="..." height="180px" />
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">
                Some quick example text to build on the card title and make up
                the bulk of the card's content.
              </p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php
  include ("includes/footer.php");

} else {
  header("location:login.php");
}
?>