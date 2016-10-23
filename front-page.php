<?php
get_header();
if ( get_option( 'show_on_front' ) == 'page' ) {

    include( get_page_template() );

}else {

?>
<div id="primary">
	<main id="main">

    <div class="ui fluid container">

      <div class="parallax img1"></div>

      <!-- About Us Panel -->

      <div class="ui container">

        <div class="">

          <div class="ui four centered banner stackable cards">

            <div class="ui banner card">

                <i class="fa fa-hospital-o fa-3x" aria-hidden="true"></i>

                <h1 class="ui dividing header">Service One</h1>

            </div>

            <div class="ui banner card">

              <i class="fa fa-ambulance fa-3x" aria-hidden="true"></i>

              <h1 class="ui dividing header">Service Two</h1>

            </div>

            <div class="ui banner card">

              <i class="fa fa-heartbeat fa-3x" aria-hidden="true"></i>

              <h1 class="ui dividing header">Service Three</h1>

            </div>

            <div class="ui banner card">

              <i class="fa fa-stethoscope fa-3x" aria-hidden="true"></i>

              <h1 class="ui dividing header">Service Five</h1>

            </div>

          </div>

          <h3 class="ui gray header">About Us</h3>

          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

          <br>
          <br>

        </div>

      </div>

      <!-- End About Us Panel -->

      <div class="parallax img2">

        <div class="parallax-quote">

          <!-- <h1>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt </h1> -->

        </div>

      </div>

      <!-- Our Team Panel -->

      <div class="ui container">

        <div class="">

          <div class="ui three column stackable grid">

            <div class="eleven wide column">

              <h3 class="ui blue header">Our Team</h3>

              <div class="ui one column grid">

                <div class="column">

                  <h4 class="ui header">Fabulous Introduction</h4>

                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                  </p>

                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                  </p>

                </div>

              </div>

            </div>

            <div class="five wide centered column">

              <div class="ui one column grid">

                <div class="column">

                  <h4 class="ui blue  header">Make An Appointment</h4>

                  <div class="ui styled fluid accordion">
                    <div class="active title">
                      <h5 class="ui header">General Appointments</h5>
                    </div>
                    <div class="active content">

                        <h6 class="ui header"> <i class="phone icon"></i>(303) 234-234</h6>
                        <h6 class="ui header"> <i class="avatar mail icon"></i>Contact@ourhospital.com</h6>

                    </div>
                    <div class="title">
                      <h5 class="ui header">Specialists</h5>
                    </div>
                    <div class="content">

                      <h6 class="ui header"> <i class="black phone icon"></i>(303) 234-234</h6>
                      <h6 class="ui header"> <i class="black avatar mail icon"></i>Contact@ourhospital.com</h6>

                    </div>
                    <div class="title">
                      <h5 class="ui header">Other</h5>
                    </div>
                    <div class="content">
                      <h5 class="ui header"> <i class="black phone icon"></i>(303) 234-234</h5>
                      <h5 class="ui header"> <i class="black avatar mail icon"></i>Contact@ourhospital.com</h5>
                    </div>
                  </div>

                </div>

              </div>

            </div>

          </div>

          <div class="ui three column stackable info grid">

            <div class="column">

              <div class="ui padded text segment">

                <h4 class="parallax-quote"> Something Cool </h4>

              </div>

            </div>

            <div class="column">

              <div class="ui padded text segment">

                <h4 class="parallax-quote"> Something Cool </h4>

              </div>

            </div>

            <div class="column">

              <div class="ui padded text segment">

                <h4 class="parallax-quote"> Something Cool </h4>

              </div>

            </div>

          </div>

        </div>

      </div>

      <!-- End Out Team Panel -->

      <div class="parallax img3">

        <div class="parallax-quote">

          <!-- <h1 class="black">Our Services</h1> -->

        </div>

      </div>

      <!-- Services Panel -->

      <div class="ui container">

        <div class="ui very padded text minimal segment">

          <h3 class="ui dividing blue header">Our Services</h3>

          <div class="ui centered two stackable cards">

            <div class="ui fluid link card">
              <div class="ui image">
                <img src="<?php echo get_template_directory_uri().'/img/default-image/medical_03.jpg'; ?>" class="visible content">
              </div>
              <div class="content">
                <div class="meta">
                  <span class="date">Service Name</span>
                </div>
              </div>
            </div>

            <div class="ui fluid link card">
              <div class="ui image">
                <img src="<?php echo get_template_directory_uri().'/img/default-image/medical_03.jpg'; ?>" class="visible content">
              </div>
              <div class="content">
                <div class="meta">
                  <span class="date">Service Name</span>
                </div>
              </div>
            </div>

            <div class="ui fluid link card">
              <div class="ui image">
                <img src="<?php echo get_template_directory_uri().'/img/default-image/medical_03.jpg'; ?>" class="visible content">
              </div>
              <div class="content">
                <div class="meta">
                  <span class="date">Service Name</span>
                </div>
              </div>
            </div>

            <div class="ui fluid link card">
              <div class="ui image">
                <img src="<?php echo get_template_directory_uri().'/img/default-image/medical_03.jpg'; ?>" class="visible content">
              </div>
              <div class="content">
                <div class="meta">
                  <span class="date">Service Name</span>
                </div>
              </div>
            </div>

          </div>

        </div>

      </div>

      <!-- End Services Panel -->

      <!-- Footer Panel -->

      <div class="ui fluid footer container">

      </div>


      <!-- End Footer Panel -->

    </div>

  </main>
</div>
<?php
}
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
    margin: 2rem 0 2rem 0;
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

.parallax-quote h4 {
  color: rgba(255,255,255,1);
  font-weight: 500;
  font-size: 1.3rem !important;
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

.banner.ui.card, .ui.cards>.banner.card {
  background-color: #3695EB !important;
  height: 300px;
  border-radius: 0px !important;
  border: 0px !important;
  box-shadow: 0 0px 0px 0 #D4D4D5,0 0 0 0px #D4D4D5;
}

.banner.card i {
  margin-top: 0.4rem;
  margin-left: 0.7rem;
  color: rgba(255,255,255,1);
}

.banner.card h1 {
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
  /*margin: 1rem 0rem 2rem 1rem !important;*/
}

.info.grid .segment {
  min-height: 200px;
  vertical-align: middle;
}

.footer.container {
  background-color: #373737;
  min-height: 20rem;
}
</style>
