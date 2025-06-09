<section class="inquiry-section">
  <div class="inquiry-container">
    
    <!-- Left Column: Inquire Now Form -->
    <div class="inquiry-form-left">
      <h2>Inquire Now</h2>
      <form action="#" method="post" class="inquire-form">

        <!-- Row 1 -->
        <div class="form-row two-columns">
          <input type="text" name="first_name" placeholder="First Name" required>
          <input type="text" name="last_name" placeholder="Last Name" required>
        </div>

        <?php
          $args = [
              'post_type' => 'property', // Change to your custom post type slug
              'posts_per_page' => -1, // Fetch all
              'orderby' => 'title',
              'order' => 'ASC'
          ];

          $custom_posts = new WP_Query($args);
        ?>

        <!-- Row 2 -->
        <div class="form-row">
          <select name="property_interest" required>
            <option value="" selected disabled>Property of Interest</option>
            <?php if ($custom_posts->have_posts()) : ?>
                <?php while ($custom_posts->have_posts()) : $custom_posts->the_post(); ?>
                    <option value="<?php the_permalink(); ?>"><?php the_title(); ?></option>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <option>No properties found</option>
            <?php endif; ?>
            <!-- <option value="property1">Property 1</option>
            <option value="property2">Property 2</option> -->

          </select>
        </div>

        <!-- Row 3 -->
        <div class="form-row two-columns">
          <input type="text" name="contact_number" placeholder="Contact Number" required>
          <input type="email" name="email" placeholder="Email Address" required>
        </div>

        <!-- Row 4 -->
        <div class="form-row">
          <textarea name="message" placeholder="Message" rows="4"></textarea>
        </div>

        <!-- Row 5 -->
        <div class="checkbox-terms">
          <input type="checkbox" required>
          <label>I have read the Privacy Policy.</label>
        </div>

        <!-- Row 6 -->
        <div class="checkbox-terms">
          <input type="checkbox" required>
          <label>I agree to the Terms and Conditions.</label>
        </div>

        <!-- Row 7 -->
        <div class="form-row">
          <!-- Replace this with actual reCAPTCHA later -->
          <div class="recaptcha-placeholder">[ reCAPTCHA ]</div>
        </div>

        <!-- Submit Button -->
        <div class="form-row">
          <button type="submit" class="submit-btn">Submit</button>
        </div>

      </form>
    </div>

    <!-- Right Column: Set Appointment + Chat Now -->
    <div class="inquiry-form-right">
      <!-- Set Appointment Form -->
      <div class="appointment-form">
        <h2>Set An Appointment</h2>
        <form action="#" method="post">

          <!-- Row 1 -->
          <div class="form-row two-columns">
            <input type="date" name="appointment_date" required>
            <input type="time" name="appointment_time" required>
          </div>

          <!-- Row 2 -->
          <div class="form-row three-columns">
            <input type="text" name="name" placeholder="Name" required>
            <input type="text" name="contact" placeholder="Contact Number" required>
            <input type="email" name="email" placeholder="Email Address" required>
          </div>

          <!-- Submit -->
          <div class="form-row">
            <button type="submit" class="submit-btn">Submit</button>
          </div>
        </form>
      </div>
      <!-- Chat Now Form -->
      <div class="chat-now-box">
        <h2>Chat Now</h2>
        <p>Our representative is ready to assist you immediately.</p>
        <button class="chat-btn">Chat Now</button>
      </div>
      
    </div>
    <!-- <div class="inquiry-form-right">
      
    </div> -->
  </div>
</section>