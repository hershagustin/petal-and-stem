        <?php 
        $title = 'THANK YOU';     

        include('../includes/header.php'); 

        require('../private/validation.php');
        require('../private/process.php'); 
        ?>
        
        <main class="container">
            <!-- Jumbotron -->
            <section class="row justify-content-center align-items-center my-5">
                <div class="col-md-4 col-xl-6 mb-3">
                    <img src="img/arrangement-tall.webp" alt="A lady arranging flowers." class="img-fluid rounded">
                </div>
                <div class="col-md-8 col-xl-6">
                    <h2 class="display-4">We've got your request.</h2>
                    <p class="lead">Thank you for your interest in a custom floral arrangement! We will get back to you within one (1) business day.</p>

                    <a href="index.php" class="btn btn-outline-success">Back to Home</a>
                </div>
            </section>
        </main>

        <?php include('../includes/footer.php'); ?>