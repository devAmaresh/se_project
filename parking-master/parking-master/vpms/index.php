<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OPBS</title>
  <!-- <link link rel="icon" href="assets/image/logo.jpg" type="image/x-icon"> -->
  <link rel="stylesheet" href="./css/styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous"
    referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
</head>

<body>

  <header>
    <div class="content flex_space">
      <div class="logo">
        <!-- logo image change krna h abhi -->
        <img src="assets/image/logo.jpg" alt="" class="about-image">
      </div>
      <div class="navlinks">
        <ul id="menulist">
          <li><a href="#home-id">home</a> </li>
          <li><a href="#about-id">about</a> </li>
          <li><a href="#gallery-id">gallery</a> </li>
          <li><a href="#contact-id">contact</a> </li>
          <li> <button class="primary-btn" onclick="userLogin()">User</button> </li>
          <li> <button class="primary-btn" onclick="adminLogin()">Admin</button> </li>
        </ul>
        <span class="fa fa-bars" onclick="menutoggle()"></span>
      </div>
    </div>
  </header>


  <script>
    var menulist = document.getElementById('menulist');
    menulist.style.maxHeight = "0px";

    function menutoggle() {
      if (menulist.style.maxHeight == "0px") {
        menulist.style.maxHeight = "100vh";
      } else {
        menulist.style.maxHeight = "0px";
      }
    }

    function userLogin() {
      window.location.href = "users/login.php";
    }

    function adminLogin() {
      window.location.href = "admin/index.php";
    }
  </script>


  <section class="home" id="home-id">
    <div class="content">
      <div class="owl-carousel owl-theme">
        <div class="item">
          <img src="assets/image/banner1.jpg" alt="">
          <div class="text">
            <h1>Book Your Space</h1>
            <!-- change this -->
            <p>Reserve Your Parking Spot in Advance.
            </p>
            <div class="flex">
                <button class="primary-btn" id="read-more" onclick="readMoreToAboutSection()">READ MORE</button>
                <button class="secondary-btn" id="contact-us" onclick="toContactUsSection()">CONTACT US</button>
            </div>
        </div>
    </div>
    <div class="item">
        <img src="assets/image/banner2.jpg" alt="">
        <div class="text">
            <h1>Book Your Space</h1>
            <!-- change this -->
            <p>Reserve Your Parking Spot in Advance.
            </p>
            <div class="flex">
                <button class="primary-btn" id="read-more" onclick="readMoreToAboutSection()">READ MORE</button>
                <button class="secondary-btn" id="contact-us" onclick="toContactUsSection()">CONTACT US</button>
            </div>
        </div>
    </div>
    <div class="item">
        <img src="assets/image/banner3.jpg" alt="">
        <div class="text">
            <h1>Book Your Space</h1>
            <!-- change this -->
            <p>Reserve Your Parking Spot in Advance.
            </p>
            <div class="flex">
              <button class="primary-btn" id="read-more" onclick="readMoreToAboutSection()">READ MORE</button>
              <button class="secondary-btn" id="contact-us" onclick="toContactUsSection()">CONTACT US</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js" integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA==" crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>
  <script>
    $('.owl-carousel').owlCarousel({
      loop: true,
      margin: 0,
      nav: true,
      dots: false,
      navText: ["<i class = 'fa fa-chevron-left'></i>", "<i class = 'fa fa-chevron-right'></i>"],
      responsive: {
        0: {
          items: 1
        },
        768: {
          items: 1
        },
        1000: {
          items: 1
        }
      }
    })

    function readMoreToAboutSection() {
      window.location.href = "#about-id";
    }

    function toContactUsSection() {
      window.location.href = "#contact-id";
    }
  </script>




  <section class="book">
    <div class="container flex_space" id="book-now">
      <div class="text">
        <!-- <h1> <span>Book </span> Your Space </h1> -->
        <button class="primary-btn" onclick="userLogin()">BOOK NOW</button>
      </div>
    </div>
  </section>



  <section class="about top" id="about-id">
    <div class="container flex">
      <div class="left">
        <div class="heading">
          <h1>WELCOME</h1>
          <h2>Booking System</h2>
        </div>
        <p>We understand the frustration of searching for parking in crowded cities or busy events. That's why we've revolutionized the way you park with our convenient online booking platform. Our mission is to make parking stress-free and efficient for everyone. Whether you're heading to work, attending an event, or exploring a new city, we've got you covered. With just a few clicks, you can reserve your parking spot in advance, ensuring a seamless experience every time. Say goodbye to circling the block endlessly—welcome to a smarter way to park.
          </p>
        <button class="primary-btn" onclick="toContactUsSection()">ABOUT US</button>
      </div>
      <div class="right">
        <img src="assets/image/about.jpg" alt="" class="about-image">
      </div>
    </div>
  </section>

  <section class="counter top">
    <div class="container grid">
      <div class="box">
        <h1>2000+</h1>
        <hr>
        <span>Customer</span>
      </div>
      <div class="box">
        <h1>1000+</h1>
        <hr>
        <span>Happy Customer</span>
      </div>
      <div class="box">
        <h1>150+</h1>
        <hr>
        <span>Parking Lots</span>
      </div>
      <div class="box">
        <h1>2000+</h1>
        <hr>
        <span>Cars Parked</span>
      </div>
    </div>
  </section>


  <section class="rooms">
    <div class="container top">
      <div class="heading">
        <h1>EXPOLRE</h1>
        <h2>Our Parking Lots</h2>
        <!-- <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
        </p> -->
      </div>

      <div class="content mtop">
        <div class="owl-carousel owl-carousel1 owl-theme">
          <div class="items">
            <div class="image">
              <img src="assets/image/lot1.jpg" alt="">
            </div>
            <div class="text">
              <h2>Delhi</h2>
              <div class="rate flex">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </div>
              <p>Explore convenient parking options at various locations with us. Book hassle-free parking now!
              </p>
              <div class="button flex">
                <button class="primary-btn" onclick="userLogin()">BOOK NOW</button>
                <!-- <h3>$250 <span> <br> Per Night </span> </h3> -->
              </div>
            </div>
          </div>
          <div class="items">
            <div class="image">
              <img src="assets/image/lot2.jpg" alt="">
            </div>
            <div class="text">
              <h2>Mumbai</h2>
              <div class="rate flex">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </div>
              <p>Explore convenient parking options at various locations with us. Book hassle-free parking now!
              </p>
              <div class="button flex">
                <button class="primary-btn" onclick="userLogin()">BOOK NOW</button>
                <!-- <h3>$250 <span> <br> Per Night </span> </h3> -->
              </div>
            </div>
          </div>
          <div class="items">
            <div class="image">
              <img src="assets/image/lot10.jpg" alt="">
            </div>
            <div class="text">
              <h2>Kolkata</h2>
              <div class="rate flex">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </div>
              <p>Explore convenient parking options at various locations with us. Book hassle-free parking now!
              </p>
              <div class="button flex">
                <button class="primary-btn" onclick="userLogin()">BOOK NOW</button>
                <!-- <h3>$250 <span> <br> Per Night </span> </h3> -->
              </div>
            </div>
          </div>
          <div class="items">
            <div class="image">
              <img src="assets/image/lot9.jpg" alt="">
            </div>
            <div class="text">
              <h2>Ahmedabad</h2>
              <div class="rate flex">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </div>
              <p>Explore convenient parking options at various locations with us. Book hassle-free parking now!
              </p>
              <div class="button flex">
                <button class="primary-btn" onclick="userLogin()">BOOK NOW</button>
                <!-- <h3>$250 <span> <br> Per Night </span> </h3> -->
              </div>
            </div>
          </div>
          <div class="items">
            <div class="image">
              <img src="assets/image/lot5.jpg" alt="">
            </div>
            <div class="text">
              <h2>Jaipur</h2>
              <div class="rate flex">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </div>
              <p>Explore convenient parking options at various locations with us. Book hassle-free parking now!
              </p>
              <div class="button flex">
                <button class="primary-btn" onclick="userLogin()">BOOK NOW</button>
                <!-- <h3>$250 <span> <br> Per Night </span> </h3> -->
              </div>
            </div>
          </div>
          <div class="items">
            <div class="image">
              <img src="assets/image/lot6.jpg" alt="">
            </div>
            <div class="text">
              <h2>Indore</h2>
              <div class="rate flex">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </div>
              <p>Explore convenient parking options at various locations with us. Book hassle-free parking now!
              </p>
              <div class="button flex">
                <button class="primary-btn" onclick="userLogin()">BOOK NOW</button>
                <!-- <h3>$250 <span> <br> Per Night </span> </h3> -->
              </div>
            </div>
          </div>
          <div class="items">
            <div class="image">
              <img src="assets/image/lot7.jpg" alt="">
            </div>
            <div class="text">
              <h2>Banglore</h2>
              <div class="rate flex">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </div>
              <p>Explore convenient parking options at various locations with us. Book hassle-free parking now!
              </p>
              <div class="button flex">
                <button class="primary-btn" onclick="userLogin()">BOOK NOW</button>
                <!-- <h3>$250 <span> <br> Per Night </span> </h3> -->
              </div>
            </div>
          </div>
          <div class="items">
            <div class="image">
              <img src="assets/image/lot8.jpg" alt="">
            </div>
            <div class="text">
              <h2>Chennai</h2>
              <div class="rate flex">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </div>
              <p>Explore convenient parking options at various locations with us. Book hassle-free parking now!
              </p>
              <div class="button flex">
                <button class="primary-btn" onclick="userLogin()">BOOK NOW</button>
                <!-- <h3>$250 <span> <br> Per Night </span> </h3> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script>
    $('.owl-carousel1').owlCarousel({
      loop: true,
      margin: 40,
      nav: true,
      dots: false,
      navText: ["<i class = 'fa fa-chevron-left'></i>", "<i class = 'fa fa-chevron-right'></i>"],
      responsive: {
        0: {
          items: 1
        },
        768: {
          items: 2,
          margin: 10,
        },
        1000: {
          items: 3
        }
      }
    })
  </script>



  <section class="gallery" id="gallery-id">
    <div class="container top">
      <div class="heading">
        <h1>PHOTOS</h1>
        <h2>Our Gallery</h2>
        <p>Explore convenient parking options at various locations with us. Book hassle-free parking now!
      </div>
    </div>

    <div class="content mtop">
      <div class="owl-carousel owl-carousel1 owl-theme">
        <div class="items">
          <div class="img">
            <img src="assets/image/lot1.jpg" alt="">
          </div>
          <div class="overlay">
            <!-- <span class="fa fa-plus"> </span> -->
            <!-- <h3>Photo Title Here.</h3> -->
          </div>
        </div>
        <div class="items">
          <div class="img">
            <img src="assets/image/lot2.jpg" alt="">
          </div>
          <div class="overlay">
            <!-- <span class="fa fa-plus"> </span> -->
            <!-- <h3>Photo Title Here.</h3> -->
          </div>
        </div>
        <div class="items">
          <div class="img">
            <img src="assets/image/lot9.jpg" alt="">
          </div>
          <div class="overlay">
            <!-- <span class="fa fa-plus"> </span> -->
            <!-- <h3>Photo Title Here.</h3> -->
          </div>
        </div>
        <div class="items">
          <div class="img">
            <img src="assets/image/lot4.jpg" alt="">
          </div>
          <div class="overlay">
            <!-- <span class="fa fa-plus"> </span> -->
            <!-- <h3>Photo Title Here.</h3> -->
          </div>
        </div>
        <div class="items">
          <div class="img">
            <img src="assets/image/lot5.jpg" alt="">
          </div>
          <div class="overlay">
            <!-- <span class="fa fa-plus"> </span> -->
            <!-- <h3>Photo Title Here.</h3> -->
          </div>
        </div>
        <div class="items">
          <div class="img">
            <img src="assets/image/lot6.jpg" alt="">
          </div>
          <div class="overlay">
            <!-- <span class="fa fa-plus"> </span> -->
            <!-- <h3>Photo Title Here.</h3> -->
          </div>
        </div>
        <div class="items">
          <div class="img">
            <img src="assets/image/lot7.jpg" alt="">
          </div>
          <div class="overlay">
            <!-- <span class="fa fa-plus"> </span> -->
            <!-- <h3>Photo Title Here.</h3> -->
          </div>
        </div>
        <div class="items">
          <div class="img">
            <img src="assets/image/lot8.jpg" alt="">
          </div>
          <div class="overlay">
            <!-- <span class="fa fa-plus"> </span> -->
            <!-- <h3>Photo Title Here.</h3> -->
          </div>
        </div>
        <div class="items">
          <div class="img">
            <img src="assets/image/lot9.jpg" alt="">
          </div>
          <div class="overlay">
            <!-- <span class="fa fa-plus"> </span> -->
            <!-- <h3>Photo Title Here.</h3> -->
          </div>
        </div>
        <div class="items">
          <div class="img">
            <img src="assets/image/lot10.jpg" alt="">
          </div>
          <div class="overlay">
            <!-- <span class="fa fa-plus"> </span> -->
            <!-- <h3>Photo Title Here.</h3> -->
          </div>
        </div>
      </div>
    </div>
  </section>


  <script>
    $('.owl-carousel1').owlCarousel({
      loop: true,
      margin: 0,
      nav: true,
      dots: false,
      autoplay: true,
      autoplayTimeout: 1000,
      autoplayHoverPause: true,
      navText: ["<i class = 'fa fa-chevron-left'></i>", "<i class = 'fa fa-chevron-right'></i>"],
      responsive: {
        0: {
          items: 1
        },
        768: {
          items: 4,
        },
        1000: {
          items: 6
        }
      }
    })
  </script>


  <section class="services top">
    <div class="container">
      <div class="heading">
        <h1>SERVICES</h1>
        <h2>Our Services</h2>
        <p>Streamline your parking experience with our easy-to-use online booking platform.
      </div>


      <div class="content flex_space">
        <div class="left grid2">
          <div class="box">
            <div class="text">
              <i class="fa-solid fa-location-dot"></i>
              <h3>Parking Space</h3>
            </div>
          </div>
          <div class="box">
            <div class="text">
              <i class="fa-solid fa-user"></i>
              <h3>Real-Time Availability</h3>
            </div>
          </div>
          <div class="box">
            <div class="text">
              <i class="fa-solid fa-star"></i>
              <h3>Discounts</h3>
            </div>
          </div>
          <div class="box">
            <div class="text">
              <i class="fa-solid fa-phone"></i>
              <h3>Customer Support</h3>
            </div>
          </div>
        </div>
        <div class="right">
          <img src="assets/image/services.jpg" alt="">
        </div>
      </div>
    </div>
  </section>




  <section class="Customer top">
    <div class="container">
      <div class="owl-carousel owl-carousel2 owl-theme">
        <div class="item">
          <i class="fa-solid fa-quote-right"></i>
          <p>
          I recently used this website when I visited Mumbai for a business meeting, and I have to say, I was pleasantly surprised! Finding parking in Mumbai can be a nightmare, but with this website, it was a breeze. The interface is so easy to navigate, and I loved that I could see all the available parking spots near my destination. It saved me so much time and hassle—I'll definitely be using it again!
          </p>
          <h3>Neha S</h3>
          <label>Mumbai</label>
        </div>
        <div class="item">
          <i class="fa-solid fa-quote-right"></i>
          <p>
          As a frequent traveler, parking at Indian airports has always been a headache. But not anymore, thanks to them! I used it for the first time when I flew out of Delhi, and I was impressed by how smooth the process was. I booked my parking spot in advance, and when I arrived at the airport, everything was exactly as described. No more circling the parking lot or worrying about missing my flight—I can't recommend this website enough!
              </p>
          <h3>Rahul Kumar</h3>
          <label>Delhi</label>
        </div>
        <div class="item">
          <i class="fa-solid fa-quote-right"></i>
          <p>Living in Bengaluru, where parking is a constant struggle, I was thrilled to discover this website. I've used it several times now, and it's been a lifesaver! Whether I'm running errands in the city or attending a family function, I can always find parking quickly and conveniently with this website. The app's interface is user-friendly, and the prices are reasonable—it's made my life so much easier!
          </p>
          <h3>Priya</h3>
          <label>Bengaluru</label>
        </div>
      </div>
    </div>
  </section>
  <script>
    $('.owl-carousel2').owlCarousel({
      loop: true,
      margin: 0,
      nav: false,
      dots: true,
      responsive: {
        0: {
          items: 1
        },
        768: {
          items: 1,
        },
        1000: {
          items: 1
        }
      }
    })
  </script>

  <footer id="contact-id">
    <div class="container grid">
      <div class="box">
        <div class="logo">
            <!-- <img src="assets/images/logo.png" alt=""> -->
        </div>
        <p>In our commitment to providing seamless parking solutions, we prioritizes user convenience and satisfaction. With our extensive network of parking facilities across India's major cities, we ensure that finding parking is never a hassle. Our user-friendly platform allows you to browse, book, and manage your parking reservations with ease, whether you're on the go or planning in advance. From airports to bustling city centers, we offer a range of parking options to suit every need and budget. And with our transparent pricing and secure booking process, you can trust that your parking experience with us will be smooth and stress-free. Join our community of satisfied users and experience the convenience of hassle-free parking with us.
        </p>

        <div class="icon">
          <i class="fa fa-facebook-f"></i>
          <i class="fa fa-instagram"></i>
          <i class="fa fa-twitter"></i>
          <i class="fa fa-youtube"></i>
        </div>
      </div>

      <div class="box">
        <h2>Links</h2>
        <ul>
          <li>Company History</li>
          <li>About Us</li>
          <li>Contact Us</li>
          <li>Services</li>
          <li>Privacy Policy</li>
        </ul>
      </div>

      <div class="box">
        <h2>Contact Us</h2>
        <p>Explore convenient parking options at various locations with us. Book hassle-free parking now!
        </p>
        <i class="fa fa-location-dot"></i>
        <label>BH2, IIITA, Jhalwa, Prayagraj. </label> <br>
        <i class="fa fa-phone"></i>
        <label>+91 9666666666</label> <br>
        <i class="fa fa-envelope"></i>
        <label>info@opbs.com</label> <br>
      </div>
    </div>
  </footer>

  <div class="legal">
    <p class="container">Copyright (c) 2024 Copyright Holder All Rights Reserved.</p>
  </div>



  <script src="https://kit.fontawesome.com/032d11eac3.js" crossorigin="anonymous"></script>
</body>

</html>