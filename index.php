<!DOCTYPE html>

<html lang="en-US">

<head>
  <!-- META TAGS -->
  <meta charset="UTF-8">
  <meta name="keywords" content="HTML, CSS, JavaScript">
  <meta name="description" content="Projekti per Inxhinieri t'Webit">
  <meta name="author" content="Fitim Bytyqi">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Gonex - WELCOME</title>

  <!-- CSS -->
  <link rel="stylesheet" href="css/styles.css">
  

</head>

<body>
  <!-- HEADER -->
  <header id="header">
    <div class="header__navbar">
      <div class="container">
        <div class="navbar__wrapper">
          <!-- LOGO -->
          <div id="header__logo">
            <img src="images/logo.jpg" alt="gonex logo">
          </div>

          <!-- HEADER NAVIGATION -->
          <nav id="header__navigation">
            <ul class="navigation__links">
              <li class="navigation__link">
                <a href="#header" class="active">HOME</a>
              </li>
              <li class="navigation__link">
                <a href="#section__a">SERVICES</a>
              </li>
              <li class="navigation__link">
                <a href="#section__b">WORK</a>
              </li>
              <li class="navigation__link">
                <a href="#section__e">ABOUT US</a>
              </li>
              <li class="navigation__link">
                <a href="#section__f">SKILLS</a>
              </li>
              <li class="navigation__link">
                <a href="#contact__us">CONTACT</a>
              </li>
              <li class="navigation__link">
                <a href="blog.php">BLOG</a>
              </li>
              <li class="navigation__link">
                <a href="login.php">LOGIN</a>
              </li>
              <li class="navigation__link">
                <a href="#">
                  <i class="fa fa-search"></i>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>

    <!-- HEADER SHOWCASE -->
    <div class="header__showcase">
      <img src="images/slider-img1.jpg" alt="slider image" id="slider__image">
      <div class="container">
        <h1>WE ARE GONEX</h1>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente
          veritatis explicabo maxime,<br />
          dolor doloribus maiores eos sint praesentium magnam molestiae.
        </p>
        <button type="button" class="btn__more">SHOW ME MORE</button>
      </div>

      <span class="prev" onclick="plusSlides(-1)">
        <i class="fas fa-caret-left fa-2x"></i>
      </span>
      <span class="next" onclick="plusSlides(1)">
        <i class="fas fa-caret-right fa-2x"></i>
      </span>
    </div>
  </header>

  <!-- MAIN -->
  <main id="main">
    <!-- SECTION A -->
    <section id="section__a">
      <div class="container">
        <div class="section__boxes">
          <div class="section__box transparent__box">
            <h2>
              WHAT WE DO
              <span style="color: #f95353; font-size: 3rem;">BEST</span>
              <br />
              <span style="font-size: 1rem;"><em>see it for yourself</em></span>
            </h2>
          </div>

          <div class="section__box">
            <h3>PHOTOGRAPHY</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
            </p>
            <a href="#">SEE PROJECTS</a>
          </div>

          <div class="section__box">
            <h3>GRAPHIC DESIGN</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
            </p>
            <a href="#">SEE PROJECTS</a>
          </div>

          <div class="section__box">
            <h3>APP DEVELOPMENT</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
            </p>
            <a href="#">SEE PROJECTS</a>
          </div>

          <div class="section__box green__box">
            <h3>PROGRAMMING</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
            </p>
            <a href="#">SEE PROJECTS</a>
          </div>

          <div class="section__box">
            <h3>WEB CODING</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
            </p>
            <a href="#">SEE PROJECTS</a>
          </div>
        </div>
      </div>
    </section>

    <!-- SECTION B -->
    <section id="section__b">
      <div class="container">
        <div class="video__wrapper">
          <img src="images/section__logo.jpg" alt="video">
          <h3>SHOW ME THE VIDEO</h3>
          <p>Just hit play and relax...</p>
        </div>

        <div class="video__controls">
          <img src="images/video__controls.jpg" alt="video controls">
        </div>
      </div>
    </section>
