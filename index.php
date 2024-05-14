<?php include('conexao.php'); ?>

<!DOCTYPE html>
<html>
  <?php include './components/head.php'; ?>

  <body>
    <div class="hero_area">
      <div class="bg-box">
        <img src="images/hero-bg.jpg" alt="" />
      </div>
      <!-- header section strats -->
      <?php include './layouts/site/menu.php'; ?>
      <!-- end header section -->

      <!-- slider section -->
      <section class="slider_section">
        <div id="customCarousel1" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="container">
                <div class="row">
                  <div class="col-md-7 col-lg-6">
                    <div class="detail-box">
                      <h1>Fast Food Restaurant</h1>
                      <p>
                        Doloremque, itaque aperiam facilis rerum, commodi,
                        temporibus sapiente ad mollitia laborum quam quisquam
                        esse error unde. Tempora ex doloremque, labore, sunt
                        repellat dolore, iste magni quos nihil ducimus libero
                        ipsam.
                      </p>
                      <div class="btn-box">
                        <a href="" class="btn1"> Order Now </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="container">
                <div class="row">
                  <div class="col-md-7 col-lg-6">
                    <div class="detail-box">
                      <h1>Fast Food Restaurant</h1>
                      <p>
                        Doloremque, itaque aperiam facilis rerum, commodi,
                        temporibus sapiente ad mollitia laborum quam quisquam
                        esse error unde. Tempora ex doloremque, labore, sunt
                        repellat dolore, iste magni quos nihil ducimus libero
                        ipsam.
                      </p>
                      <div class="btn-box">
                        <a href="" class="btn1"> Order Now </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="container">
                <div class="row">
                  <div class="col-md-7 col-lg-6">
                    <div class="detail-box">
                      <h1>Fast Food Restaurant</h1>
                      <p>
                        Doloremque, itaque aperiam facilis rerum, commodi,
                        temporibus sapiente ad mollitia laborum quam quisquam
                        esse error unde. Tempora ex doloremque, labore, sunt
                        repellat dolore, iste magni quos nihil ducimus libero
                        ipsam.
                      </p>
                      <div class="btn-box">
                        <a href="" class="btn1"> Order Now </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="container">
            <ol class="carousel-indicators">
              <li
                data-target="#customCarousel1"
                data-slide-to="0"
                class="active"
              ></li>
              <li data-target="#customCarousel1" data-slide-to="1"></li>
              <li data-target="#customCarousel1" data-slide-to="2"></li>
            </ol>
          </div>
        </div>
      </section>
      <!-- end slider section -->
    </div>

    <!-- offer section -->
    <section class="offer_section layout_padding-bottom">
      <div class="offer_container">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="box">
                <div class="img-box">
                  <img src="images/o1.jpg" alt="" />
                </div>
                <div class="detail-box">
                  <h5>Tasty Thursdays</h5>
                  <h6><span>20%</span> Off</h6>
                  <a href="">
                    Order Now
                  </a>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="box">
                <div class="img-box">
                  <img src="images/o2.jpg" alt="" />
                </div>
                <div class="detail-box">
                  <h5>Pizza Days</h5>
                  <h6><span>15%</span> Off</h6>
                  <a href="">
                    Order Now
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- end offer section -->


    <!-- about section -->

    <section class="about_section layout_padding">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="img-box">
              <img src="images/about-img.png" alt="" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="detail-box">
              <div class="heading_container">
                <h2>Nós Somos Feane</h2>
              </div>
              <p>
                There are many variations of passages of Lorem Ipsum available,
                but the majority have suffered alteration in some form, by
                injected humour, or randomised words which don't look even
                slightly believable. If you are going to use a passage of Lorem
                Ipsum, you need to be sure there isn't anything embarrassing
                hidden in the middle of text. All
              </p>
              <a href="about.php"> Read More </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- end about section -->

    <!-- client section -->

    <section class="client_section layout_padding">
      <div class="container">
        <div class="heading_container heading_center psudo_white_primary mb_45">
          <h2>O Que Dizem Nossos Clientes</h2>
        </div>
        <div class="carousel-wrap row">
          <div class="owl-carousel client_owl-carousel">
            <div class="item">
              <div class="box">
                <div class="detail-box">
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                    do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Ut enim ad minim veniam
                  </p>
                  <h6>Thiago Taveiros Pereira</h6>
                  <p>São Paulo - SP</p>
                </div>
                <div class="img-box">
                  <img src="images/client2.jpg" alt="" class="box-img" />
                </div>
              </div>
            </div>
            <div class="item">
              <div class="box">
                <div class="detail-box">
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                    do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Ut enim ad minim veniam
                  </p>
                  <h6>Vitor</h6>
                  <p>São Paulo - SP</p>
                </div>
                <div class="img-box">
                  <img src="images/client2.jpg" alt="" class="box-img" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- end client section -->

    <!-- footer section -->
    <?php include './components/footer.php'; ?>
    <!-- footer section -->
  </body>
</html>
