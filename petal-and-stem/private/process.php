<?php 

// Initialise Variables
$recipientsname = isset($_POST['submit']) ? trim($_POST['recipients-name']) : "";
$recipientsphone = isset($_POST['submit']) ? trim($_POST['recipients-phone']) : "";
$message = isset($_POST['submit']) ? trim($_POST['message']) : "";
$sendersname = isset($_POST['submit']) ? trim($_POST['senders-name']) : "";
$email = isset($_POST['submit']) ? trim($_POST['email']) : "";
$sendersphone = isset($_POST['submit']) ? trim($_POST['senders-phone']) : "";
$deliverydate = isset($_POST['submit']) ? trim($_POST['delivery-date']) : "";

// Initialise Array Variables (Radio Buttons) with null coalescing operator
$size = $_POST['size'] ?? '';
$presentation= $_POST['presentation'] ?? '';

// Initialise Array Variables (Checkboxes) with null coalescing operator
$addons = isset($_POST['add-ons']) ? (array) $_POST['add-ons'] : []; 

// Initialise Array Variables (Dropdown) with null coalescing operator
$occasion= $_POST['occasion'] ?? '';

// Message Variables
$message_recipientsname= "";
$message_recipientsphone= "";
$message_message= "";
$message_sendersname= "";
$message_email= "";
$message_sendersphone= "";
$message_deliverydate= "";
$message_size= "";
$message_presentation= "";
// $message_addons= "";
$message_occasion= "";

//Values Variables
$val_recipientsname = isset($_POST['submit']) ? trim($_POST['recipients-name']) : "";
$val_recipientsphone = isset($_POST['submit']) ? trim($_POST['recipients-phone']) : "";
$val_message = isset($_POST['submit']) ? trim($_POST['message']) : "";
$val_sendersname = isset($_POST['submit']) ? trim($_POST['senders-name']) : "";
$val_email = isset($_POST['submit']) ? trim($_POST['email']) : "";
$val_sendersphone = isset($_POST['submit']) ? trim($_POST['senders-phone']) : "";
$val_deliverydate = isset($_POST['submit']) ? trim($_POST['delivery-date']) : "";
$val_selected_size = isset($_POST['submit']) && isset($_POST['size']) ? $_POST['size'] : "";
$val_selected_presentation = isset($_POST['submit']) && isset($_POST['presentation']) ? $_POST['presentation'] : "";
$val_selected_addons = isset($_POST['add-ons']) ? (array) $_POST['add-ons'] : [];
$val_selected_occasion = isset($_POST['submit']) && isset($_POST['occasion']) ? $_POST['occasion'] : "";

// Validation Boolean
$form_good = isset($_POST['submit']) ? TRUE : FALSE;

if (isset($_POST['submit'])) {

        // Validation for Recipient's Name
        $recipientsname= filter_var($recipientsname, FILTER_SANITIZE_STRING);

        if (is_blank($recipientsname)) {
            $message_recipientsname = "<p>Please enter your name.</p>";
            $form_good = FALSE;
        } elseif (!is_letters($recipientsname)) {
            $message_recipientsname = "<p>Your name can only contain letters and spaces.</p>";
            $form_good = FALSE;
        } elseif (no_spaces($recipientsname)) {
            $message_recipientsname = "<p>Please enter both your first and last name.</p>";
            $form_good = FALSE;
        } elseif ($recipientsname == null || $recipientsname == FALSE) {
            $message_recipientsname = "<p>Your name can only contain letters and spaces.</p>";
            $form_good = FALSE;
        }

        // Validation for Recipient's Phone
        $recipientsphone = valid_phone_format($recipientsphone);

        if (is_blank($recipientsphone)) {
            $message_recipientsphone = "<p class='text-warning'>Please enter your phone number.</p>";
        } elseif (!filter_var($recipientsphone, FILTER_SANITIZE_NUMBER_INT)) {
            $message_recipientsphone .= "<p class='text-warning'>Please enter a valid phone number, using numbers only.</p>";
        } elseif (!is_numeric($recipientsphone)) {
            $message_recipientsphone .= "<p class='text-warning'>Please enter a valid phone number, using numbers only.</p>";
        } elseif (strlen( $recipientsphone) !== 10) {
            $message_recipientsphone .= "<p class='text-warning'>Please enter a 10 digit phone number.</p>";
        }
        if ($message_recipientsphone != "") {
            $form_good = FALSE;
        }

        // Validation for Message (Text Area)
        $message = filter_var($message, FILTER_SANITIZE_STRING);
        $message= filter_var($message, FILTER_SANITIZE_SPECIAL_CHARS);
    
        if (!is_blank($message) && !has_length_less_than($message, 255)) {
            $message_message = "<p>Your message must be less than 255 characters in length.</p>";
            $form_good = FALSE;
        }

        // Delivery Date
        if (is_blank($deliverydate)) {
            $message_deliverydate = "<p>Please select a delivery date.</p>";
            $form_good = FALSE;
           
            } else  {
    
                if(validate_date($deliverydate)){
                $days_difference = calculate_days_difference($deliverydate);
        
                if($days_difference < 0){
                    $in_hours = (abs($days_difference) * 24);
    
                    if ($in_hours < 72){
                         $message_deliverydate = 'Delivery date must be at least 72 hours (3 days) from today.';
                         $form_good = FALSE;
                    }
                } elseif($days_difference > 0){
                    $message_deliverydate = "Delivery date cannot be in the past.</p>";
                    $form_good = FALSE;
                } else {
                    $message_deliverydate = "Delivery cannot be scheduled for today. Please select a date at least 3 days from now.";
                    $form_good = FALSE;
                }
    
                } else {
                    $message_deliverydate = 'Invalid date format. Please enter a valid date.';
                    $form_good = FALSE;
                }      
        } 
            
        // Validation for Dropdown (Occasion)
        if (empty($occasion)) {
            $message_occasion = "<p>Please select at least one (1) occasion.</p>";
            $form_good = FALSE;
        }
        
        // Validation for Radio Buttons (Size)
        if (empty($size)) {
            $message_size = "<p>Please select at least one (1) size.</p>";
            $form_good = FALSE;
        }

        // Validation for Checkboxes (Add-Ons) (Optional)
        // if (empty($addons)) {
        //     $message_size = "<p>Please select at least one (1) size.</p>";
        //     $form_good = FALSE;
        // }

        // Validation for Radio Buttons (Presentation)
        if (empty($presentation)) {
            $message_presentation = "<p>Please select at least one (1) presentation.</p>";
            $form_good = FALSE;
        }

        // Validation for Sender's Name
        $sendersname= filter_var($sendersname, FILTER_SANITIZE_STRING);

        if (is_blank($sendersname)) {
            $message_sendersname = "<p>Please enter your name.</p>";
            $form_good = FALSE;
        } elseif (!is_letters($sendersname)) {
            $message_sendersname = "<p>Your name can only contain letters and spaces.</p>";
            $form_good = FALSE;
        } elseif (no_spaces($sendersname)) {
            $message_sendersname = "<p>Please enter both your first and last name.</p>";
            $form_good = FALSE;
        } elseif ($sendersname == null || $sendersname == FALSE) {
            $message_sendersname = "<p>Your name can only contain letters and spaces.</p>";
            $form_good = FALSE;
        }

        // Validation for Email
        if (is_blank($email)) {
            $message_email = "<p>Please enter your email address.</p>";
            $form_good = FALSE;
        } elseif (!filter_var($email, FILTER_SANITIZE_EMAIL) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message_email .= "<p>Please enter a valid email address.</p>";
            $form_good = FALSE;
        } elseif (!has_valid_email_format($email)) {
            $message_email .= "<p>Please enter a valid email address.</p>";
            $form_good = FALSE;
        }

        // Validation for Sender's Phone
        $sendersphone = valid_phone_format($sendersphone);

        if (is_blank($sendersphone)) {
            $message_sendersphone = "<p class='text-warning'>Please enter your phone number.</p>";
        } elseif (!filter_var($sendersphone, FILTER_SANITIZE_NUMBER_INT)) {
            $message_sendersphone .= "<p class='text-warning'>Please enter a valid phone number, using numbers only.</p>";
        } elseif (!is_numeric($sendersphone)) {
            $message_sendersphone .= "<p class='text-warning'>Please enter a valid phone number, using numbers only.</p>";
        } elseif (strlen( $sendersphone) !== 10) {
            $message_sendersphone .= "<p class='text-warning'>Please enter a 10 digit phone number.</p>";
        }
        if ($message_sendersphone != "") {
            $form_good = FALSE;
        }
   
        // Passing Validation & Redirecting the User
        if ($form_good == TRUE) {

            header( 'Location: thank-you.php');
            exit();
    
        } else {
    
                $val_recipientsname = $recipientsname;
                $val_recipientsphone = $recipientsphone;
                $val_message = $message;
                $val_sendersname = $sendersname;
                $val_email = $email;
                $val_sendersphone = $sendersphone;
                $val_deliverydate = $deliverydate;
                $val_selected_size = $size;
                $val_selected_presentation = $presentation;
                $val_selected_addons = $addons;
                $val_selected_occasion = $occasion;
        }
}
?>