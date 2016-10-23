<?php
/*
Template Name: Template Services Page Template
*/
?>
<?php
get_header();
?>
<div id="primary">
	<main id="main">

    <div class="ui fluid container">

      <br>
      <br>
      <br>

      <!-- Our Team Department Heads Panel -->

      <div class="ui fluid container">

        <div class="ui very padded text minimal segment">

          <h3 class="ui blue main header">Our Services</h3>

          <div class="ui three special cards">
            <div class="card">
              <div class="blurring dimmable image">
                <div class="ui dimmer">
                  <div class="content">
                    <div class="center">
                      <div class="ui inverted button">View Details</div>
                    </div>
                  </div>
                </div>
                <img src="<?php echo get_template_directory_uri().'/img/default-image/doctors/medical_services_01.jpg'; ?>">
                <a class="ui blue bottom attached label">Service (A)</a>
              </div>
              <div class="content">
                <h6 class="ui header">Short service description here....</h6>
              </div>
            </div>
            <div class="card">
              <div class="blurring dimmable image">
                <div class="ui dimmer">
                  <div class="content">
                    <div class="center">
                      <div class="ui inverted button">View Details</div>
                    </div>
                  </div>
                </div>
                <img src="<?php echo get_template_directory_uri().'/img/default-image/doctors/medical_services_02.jpg'; ?>">
                <a class="ui blue bottom attached label">Service (B)</a>
              </div>
              <div class="content">
                <h6 class="ui header">Short service description here....</h6>
              </div>
            </div>
            <div class="card">
              <div class="blurring dimmable image">
                <div class="ui dimmer">
                  <div class="content">
                    <div class="center">
                      <div class="ui inverted button">View Details</div>
                    </div>
                  </div>
                </div>
                <img src="<?php echo get_template_directory_uri().'/img/default-image/doctors/medical_services_04.jpg'; ?>">
                <a class="ui blue bottom attached label">Service (C)</a>
              </div>
              <div class="content">
                <h6 class="ui header">Short service description here....</h6>
              </div>
            </div>
          </div>


        </div>


      </div>

      <!-- End Out Team Department Heads Panel -->

      <!-- Our Team Nurses Panel -->

      <div class="ui fluid container">

        <div class="ui very padded text minimal segment">

          <h3 class="ui blue main header">Other Services</h3>

          <div class="ui six doubling stackable raised link cards">
            <div class="ui card">
              <div class="image">
                <img src="<?php echo get_template_directory_uri().'/img/default-image/doctors/doctor_02.jpg'; ?>">
              </div>
              <div class="content">
                <a class="date">Helen Troy</a>
              </div>
            </div>
            <div class="ui card">
              <div class="image">
                <img src="<?php echo get_template_directory_uri().'/img/default-image/doctors/doctor_04.jpg'; ?>">
              </div>
              <div class="content">
                <a class="date">Helen Troy</a>
              </div>
            </div>
            <div class="ui card">
              <div class="image">
                <img src="<?php echo get_template_directory_uri().'/img/default-image/doctors/doctor_05.jpg'; ?>">
              </div>
              <div class="content">
                <a class="date">Helen Troy</a>
              </div>
            </div>
            <div class="ui card">
              <div class="image">
                <img src="<?php echo get_template_directory_uri().'/img/default-image/doctors/doctor_04.jpg'; ?>">
              </div>
              <div class="content">
                <a class="date">Helen Troy</a>
              </div>
            </div>
            <div class="ui card">
              <div class="ui fluid centered image">
                <img src="<?php echo get_template_directory_uri().'/img/default-image/doctors/doctor_06.jpg'; ?>">
              </div>
              <div class="content">
                <a class="date">Helen Troy</a>
              </div>
            </div>
            <div class="ui card">
              <div class="image">
                <img src="<?php echo get_template_directory_uri().'/img/default-image/doctors/doctor_05.jpg'; ?>">
              </div>
              <div class="content">
                <a class="date">Helen Troy</a>
              </div>
            </div>
          </div>

        </div>


      </div>

      <!-- End Out Team Nurses Panel -->

      <!-- Footer Panel -->

      <div class="ui fluid footer container">

      </div>


      <!-- End Footer Panel -->

    </div>

  </main>
</div>
<?php
get_footer();
?>


<style>

.parallax {
    /* The image used */

    /* Full height */
    width: 100%;
    /* Create the parallax scrolling effect */
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

.parallax-quote {
  position: relative;
  top: 45%;
  bottom: 50%;
  text-align: center;
}

.parallax-quote h1 {
  color: rgba(255,255,255,1);
  font-weight: 500;
  font-size: 3.3rem !important;
  text-align: center;
}

h1.black {
  color: #373737 !important;
}

.img1 {
  height: 650px;
  background-image: url('<?php echo get_template_directory_uri().'/img/default-image/medical_03.jpg'; ?>');
}

.img2 {
  height: 350px;
  background-image: url('<?php echo get_template_directory_uri().'/img/default-image/bg_quote.jpg'; ?>');
}

.img3 {
  height: 450px;
  background-image: url('<?php echo get_template_directory_uri().'/img/default-image/medical_01.jpg'; ?>');
  background-size: cover !important;
}

.img4 {
  height: 150px;
  background-image: url('<?php echo get_template_directory_uri().'/img/default-image/medical_05.jpg'; ?>');
}


.minimal.segment {
  border: 0px !important;
  border-radius: 0px !important;
  box-shadow: 0px !important;
  padding: 2rem 8.5rem 2rem 8.5rem !important;
}

.main.header {
  padding: 0.75rem 0rem 1.5rem 0rem;
}

.service.column {
  margin: 5px;
  min-height: 400px;
  background-color: #373737;
}

.banner.cards {
  position: relative;
  top: -5rem;
  margin-bottom: -3rem;
  background-color: #3695EB !important;
}

.banner.panel {
  background-color: #3695EB !important;
  padding: 20px;
  height: 300px;
  width: 25%;
  border-radius: 0px !important;
  border: 0px !important;
  box-shadow: 0px !important;
}

.banner.panel i {
  margin-top: 0.4rem;
  margin-left: 0.7rem;
  color: rgba(255,255,255,1);
}

.banner.panel h1 {
  position: relative;
  font-size: 1.3em;
  font-weight: 200;
  line-height: 1.6em;
  color: rgba(255,255,255,1);
}

.ui.styled.accordion, .ui.styled.accordion .accordion {
  background: #2185D0 !important;
}

.active.content h4 {
  margin: 1rem 0rem 2rem 1rem !important;
}

.left-padded {
  padding-left: 10rem;
}

.footer.container {
  background-color: #373737;
  min-height: 20rem;
}
</style>
