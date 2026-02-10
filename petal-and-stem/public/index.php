
<?php 
$title = 'HOME';
include('../includes/header.php'); 

require('../private/validation.php');
require('../private/process.php'); 
?>

    <main>
      <!-- Introduction -->
      <section class="intro py-5 mb-5">
        <div class="container text-white py-5">
                <div class="col-xl-6">
                    <h2 class="display-3"> Say it with flowers.</h2>
                    <p>At Petal & Stem, we believe that flowers are more than just pretty petals - they're a powerful way to
                    express
                    your emotions and connect with the people you love. Whether you're celebrating a special occasion,
                    expressing
                    gratitude, or simply want to brighten someone's day, our beautiful floral arrangements and bouquets are
                    the
                    perfect way to say what's on your mind and in your heart.</p>
                </div>
            </div>
        </div>
      </section>
      <!-- Form -->
      <section class="container">
        <div class="row justify-content-center">
          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="col-lg-8 border border-success p-4 mb-2 border-opacity-25 rounded">
            <h2>Request a Quote for a Custom Flower Arrangement</h2>
            <p>Let us create a beautiful, custom flower arrangement for your special occasion. Simply fill out the form
              below and we'll get started on a quote for a unique flower arrangement, tailored to your preferences.</p>
              
                <h3>About the Recipient</h3>

               <!-- Recipient's Name -->
               <div class="mb-3">
                    <label for="recipients-name" class="form-label">Recipient's Name:</label>
                    <input type="text" id="recipients-name" name="recipients-name" class="form-control" value="<?php echo $val_recipientsname; ?>" >
                        <div id="name-help" class="form-text text-warning">
                            <?php echo $message_recipientsname; ?>
                        </div>
                    <p class="text-muted" style="font-size: 0.8rem;">The recipient's first and last name.</p>
                </div>

                <!-- Recipient's Phone Number -->
                <div class="mb-3">
                    <label for="recipients-phone" class="form-label">Recipient's Phone Number</label>
                    <input type="text" id="recipients-phone" name="recipients-phone" class="form-control" value="<?php echo $val_recipientsphone; ?>">
                        <div id="name-help" class="form-text text-warning">
                            <?php echo $message_recipientsphone; ?>
                        </div>
                    <p class="text-muted" style="font-size: 0.8rem;">Your phone number, in the following format: 1234567890 or 123 456 7890. We need to be able to contact them in case there are any issues with delivery.</p>
                </div>
              
                <!-- Card Message (Textarea) -->
                <div class="mb-3">
                    <label for="message" class="form-label">Card Message (Optional):</label>
                    <textarea id="message" name="message" class="form-control"><?php echo ($val_message); ?></textarea>
                        <div id="name-help" class="form-text text-warning">
                            <?php echo $message_message; ?>
                        </div>
                    <p class="text-muted" style="font-size: 0.8rem;">Your message must be less than 255 characters in length.</p>
                </div>

                <!-- Delivery Date  -->
                <div class="mb-3">
                    <label for="delivery-date" class="form-label">Delivery Date:</label>
                    <input type="date" name="delivery-date" class="form-control" value="<?php echo isset($_POST['delivery-date']) ? $_POST['delivery-date'] : ''; ?>">
                        <div id="name-help" class="form-text text-warning">
                            <?php echo $message_deliverydate; ?>
                        </div>
                    <p class="text-muted" style="font-size: 0.8rem;">We require a minimum of 72 hours lead-time for custom orders. We deliver from 10AM to 6PM daily.</p>
                </div>

                <h3>Your Arrangement</h3>

                <!-- Occasion -->
                <div class="mb-3">
                    <label for="occasion" class="form-label">Occasion:</label>
                    <select id="occasion" name="occasion" class="form-select">
                        <option value="">Select an occasion</option>
                        <option value="birthday" <?php if($val_selected_occasion == 'birthday'){echo "selected";} ?>>Birthday</option>
                        <option value="anniversary" <?php if($val_selected_occasion == 'anniversary'){echo "selected";} ?>>Anniversary</option>
                        <option value="congratulations" <?php if($val_selected_occasion == 'congratulations'){echo "selected";} ?>>Congratulations</option>
                        <option value="just-because" <?php if($val_selected_occasion == 'just-because'){echo "selected";} ?>>Just Because</option>
                        <option value="get-well-soon" <?php if($val_selected_occasion == 'get-well-soon'){echo "selected";} ?>>Get Well Soon</option>
                        <option value="sympathy" <?php if($val_selected_occasion == 'sympathy'){echo "selected";} ?>>Sympathy</option>
                        <option value="thank-you" <?php if($val_selected_occasion == 'thank-you'){echo "selected";} ?>>Thank You</option>
                        <option value="mothers-day" <?php if($val_selected_occasion == 'mothers-day'){echo "selected";} ?>>Mother's Day</option>
                    </select>
                        <div id="name-help" class="form-text text-warning">
                            <?php
                             echo $message_occasion; 
                             ?>
                        </div>
                        
                    <p class="text-muted" style="font-size: 0.8rem;">We'll select the right colours and flowers for the occasion.</p>
                </div>

                <!-- Size (Radio Buttons)-->      
                <fieldset class="mb-3">
                    <legend>Size:</legend>
                    <div class="form-check">
                        <input type="radio" id="regular" name="size" value="regular" class="form-check-input" <?php echo ($val_selected_size == 'regular') ? 'checked' : ''; ?>>
                        <label for="regular" class="form-check-label">Regular Bouquet</label>
                    </div>

                    <div class="form-check">
                        <input type="radio" id="premium" name="size" value="premium" class="form-check-input" <?php echo ($val_selected_size == 'premium') ? 'checked' : ''; ?>>
                        <label for="premium" class="form-check-label">Premium Bouquet (+$9.99)</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" id="deluxe" name="size" value="deluxe" class="form-check-input" <?php echo ($val_selected_size == 'deluxe') ? 'checked' : ''; ?>>
                        <label for="deluxe" class="form-check-label">Deluxe Bouquet (+$14.99)</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" id="centerpiece" name="size" value="centerpiece" class="form-check-input" <?php echo ($val_selected_size == 'centerpiece') ? 'checked' : ''; ?>>
                        <label for="centerpiece" class="form-check-label">Centerpiece (+$24.99)</label>
                    </div>
                        <div id="name-help" class="form-text text-warning">
                            <?php echo $message_size; ?>
                        </div>
                </fieldset>

                <!-- Add-ons (Optional) (Checkboxes) -->
                <fieldset class="mb-3">
                    <legend>Add-ons (Optional):</legend>
                    <div class="form-check">
                        <input type="checkbox" id="chocolates" name="add-ons[]" value="chocolates" class="form-check-input" <?php echo (in_array('chocolates', $val_selected_addons)) ? 'checked' : ''; ?>>
                        <label for="chocolates" class="form-check-label">Milk Chocolates (+$9.99)</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" id="shortbread" name="add-ons[]" value="shortbread" class="form-check-input"  <?php echo (in_array('shortbread', $val_selected_addons)) ? 'checked' : ''; ?>>
                        <label for="shortbread" class="form-check-label">Traditional Scotish Shortbread (+$9.99)</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" id="truffles" name="add-ons[]" value="truffles" class="form-check-input"  <?php echo (in_array('truffles', $val_selected_addons)) ? 'checked' : ''; ?>>
                        <label for="truffles" class="form-check-label">Belgium Truffles (+$12.99)</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" id="e=wine" name="add-ons[]" value="wine" class="form-check-input"  <?php echo (in_array('wine', $val_selected_addons)) ? 'checked' : ''; ?>>
                        <label for="wine" class="form-check-label">Red Wine (+$19.99)</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" id="bear" name="add-ons[]" value="bear" class="form-check-input"  <?php echo (in_array('bear', $val_selected_addons)) ? 'checked' : ''; ?>>
                        <label for="bear" class="form-check-label">Large Teddy Bear (+$24.99)</label>
                    </div>
                        <!-- <div id="name-help" class="form-text text-warning"> -->
                            <?php
                            // echo $message_addons; 
                            ?>
                        <!-- </div> -->
                </fieldset>
              
                <!-- Presentation Options --><fieldset class="mb-3">
                  <legend>Presentation Options:</legend>
                    <div class="form-check">
                        <input type="radio" id="wrapping" name="presentation" value="wrapping" class="form-check-input" <?php echo ($val_selected_presentation == 'wrapping') ? 'checked' : ''; ?>>
                        <label for="wrapping" class="form-check-label">Rustic Wrapping</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" id="small-vase" name="presentation" value="small-vase" class="form-check-input" <?php echo ($val_selected_presentation == 'small-vase') ? 'checked' : ''; ?>>
                        <label for="small-vase" class="form-check-label">Small Vase (Round)(+$9.99)</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" id="large-vase" name="presentation" value="large-vase" class="form-check-input" <?php echo ($val_selected_presentation == 'large-vase') ? 'checked' : ''; ?>>
                        <label for="large-vase" class="form-check-label">Large Vase (Flared, Tall)(+$9.99)</label>
                    </div>
                        <div id="name-help" class="form-text text-warning">
                            <?php echo $message_presentation; ?>
                        </div>
                </fieldset>

                <h3>Your Information</h3>

                <!-- Sender's Name -->
                <div class="mb-3">
                    <label for="senders-name" class="form-label">Sender's Name:</label>
                    <input type="text" id="senders-name" name="senders-name" class="form-control" value="<?php echo $val_sendersname; ?>">
                        <div id="name-help" class="form-text text-warning">
                            <?php echo $message_sendersname; ?>
                        </div>
                        
                    <p class="text-muted" style="font-size: 0.8rem;">The sender's first and last name.</p>
                </div>


                <!-- Sender's Email Address -->
                <div class="mb-3">
                    <label for="email" class="form-label">Sender's Email Address</label>
                    <input type="text" id="email" name="email" class="form-control" value="<?php echo $val_email; ?>">
                        <div id="name-help" class="form-text text-warning">
                            <?php echo $message_email; ?>
                        </div>
                    <p class="text-muted" style="font-size: 0.8rem;">We will exclusively use your email address to contact you about your custom arrangement quote.</p>
                </div>

                <!-- Sender's Phone Number -->
                <div class="mb-3">
                    <label for="senders-phone" class="form-label">Sender's Phone Number</label>
                    <input type="text" id="senders-phone" name="senders-phone" class="form-control" value="<?php echo $val_sendersphone; ?>">
                        <div id="name-help" class="form-text text-warning">
                            <?php echo $message_sendersphone; ?>
                        </div>
                    <p class="text-muted" style="font-size: 0.8rem;">Your phone number, in the following format: 1234567890 or 123 456 7890</p>
                </div>

                <!-- Submit Button -->
                <input type="submit" id="submit" name="submit" class="btn btn-primary" value="Submit">

          </form>
        </div>
      </section>
    </main>
  
    
    <?php include('../includes/footer.php'); ?>
