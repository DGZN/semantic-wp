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

          <div class="ui four centered banner cards">

            <div class="banner panel">

                <i class="fa fa-hospital-o fa-3x" aria-hidden="true"></i>

                <h1 class="ui dividing header">Service One</h1>

            </div>

            <div class="banner panel">

              <i class="fa fa-ambulance fa-3x" aria-hidden="true"></i>

              <h1 class="ui dividing header">Service Two</h1>

            </div>

            <div class="banner panel">

              <i class="fa fa-heartbeat fa-3x" aria-hidden="true"></i>

              <h1 class="ui dividing header">Service Three</h1>

            </div>

            <div class="banner panel">

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

        <div class="ui very padded text minimal segment">


          <div class="ui two column stackable grid">

            <div class="ten wide column">

              <h3 class="ui dividing gray header">Our Team</h3>

              <div class="ui one column grid">

                <div class="column">

                  <img class="ui fluid bordered rounded left floated image" src="<?php echo get_template_directory_uri().'/img/default-image/medical_03.jpg'; ?>">

                </div>


              </div>

            </div>

            <div class="five wide column">

              <div class="ui one column grid">

                <div class="column">

                  <h3 class="ui dividing header">Make An Appointment</h3>

                  <div class="ui styled fluid accordion">
                    <div class="active title">
                      <h4 class="ui header">GENERAL</h4>
                    </div>
                    <div class="active content">

                        <h4 class="ui header"> <i class="phone icon"></i>(303) 234-234</h4>
                        <h4 class="ui header"> <i class="avatar mail icon"></i>Contact@ourhospital.com</h4>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>

                    </div>
                    <div class="title">
                      <h4 class="ui header">SPECIALIST</h4>
                    </div>
                    <div class="content">

                      <h4 class="ui header"> <i class="black phone icon"></i>(303) 234-234</h4>
                      <h4 class="ui header"> <i class="black avatar mail icon"></i>Contact@ourhospital.com</h4>

                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>

                    </div>
                    <div class="title">
                      <h4 class="ui header">OTHER</h4>
                    </div>
                    <div class="content">
                      <h4 class="ui header"> <i class="black phone icon"></i>(303) 234-234</h4>
                      <h4 class="ui header"> <i class="black avatar mail icon"></i>Contact@ourhospital.com</h4>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                    </div>
                  </div>


                </div>

              </div>

            </div>

          </div>

          <div class="ui container">

            <div class="ui horizontal segments">
            <div class="ui very padded segment">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
            </div>
            <div class="ui very padded segment">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
            </div>
            <div class="ui very padded segment">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
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

.footer.container {
  background-color: #373737;
  min-height: 20rem;
}
</style>
