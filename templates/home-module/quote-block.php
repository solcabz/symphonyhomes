<?php
if (have_rows('quote_section')):
    while (have_rows('quote_section')) : the_row();
        $quote_background = get_sub_field('quote_background');
        $quote_title = get_sub_field('quote_title');
        $quote_paragraph = get_sub_field('quote_paragraph');
        ?>
<section class="quote-section" style="background-image: url('<?php echo esc_url( $quote_background ? $quote_background['url'] : get_template_directory_uri() . '/assets/image/about-bg.jpg' ); ?>');">
  <div class="quote-container">
    <div class="quote-header">
      <h1><?php echo esc_html($quote_title); ?></h1>
      <p><?php echo esc_html($quote_paragraph); ?></p>
    </div>

    <form action="">
      <div class="quote-select">
        <label for="property">Property of Interest</label>
        <select name="property" id="property">
          <option value="" disabled selected>Select a property</option>
          <!-- Example options -->
          <option value="heights-nature">Heights Nature</option>
          <option value="symphony-homes">Symphony Homes</option>
        </select>
      </div>

      <div class="quote-row">
        <div class="quote-input">
          <label for="first-name">First Name</label>
          <input type="text" id="first-name" name="firstName">
        </div>
        <div class="quote-input">
          <label for="last-name">Last Name</label>
          <input type="text" id="last-name" name="lastName">
        </div>
      </div>

      <div class="quote-row">
        <div class="quote-input">
          <label for="email">Email</label>
          <input type="text" id="email" name="email">
        </div>
        <div class="quote-input">
          <label for="phone">Phone Number</label>
          <input type="text" id="phone" name="phone">
        </div>
      </div>

      <div class="quote-select">
        <label for="country">Country of Residence</label>
        <select name="country" id="country">
          <option value="" disabled selected>Select a country</option>
          <!-- Example options -->
          <option value="philippines">Philippines</option>
          <option value="usa">United States</option>
        </select>
      </div>

      <!-- Google reCAPTCHA -->
      <div class="g-recaptcha" data-sitekey="6LfSuRcrAAAAAEJzNucLpRKth4SDW_hkqUWhgnvE"></div>
      <script src="https://www.google.com/recaptcha/api.js" async defer></script>
      <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
            $recaptchaResponse = $_POST['g-recaptcha-response'];
            $secretKey = '6LfSuRcrAAAAAOUWbsb-OzTyjv8-cV2S0LqCXnPP';

            // Verify the reCAPTCHA response
            $verifyResponse = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$recaptchaResponse");
            $responseData = json_decode($verifyResponse);

            if ($responseData->success) {
              echo "<p class='text-success'>Form submitted successfully!</p>";
            } else {
              echo "<p class='text-danger'>reCAPTCHA verification failed. Please try again.</p>";
            }
            } else {
              echo "<p class='text-danger'>Please complete the reCAPTCHA verification.</p>";
          }
        }
      ?>

      <button type="submit">Submit</button>
    </form>
  </div>
</section>
<?php
    endwhile;
endif;
?>