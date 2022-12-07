<!DOCTYPE html>

<head>
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ================ PHP ================ -->
    <?php $arr = ["custom", "responsive", "bootstrap"];foreach ($arr as $css){echo '<link rel="stylesheet" href="' . URL_CSS . '/' . $css . '.css">';}?>
    <!-- ================ END PHP ================ -->
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
</head>

<body>
    <header class="p-1 p-fixed top-0">
        <div class="d-flex container justify-content-between aligns-items-center">
            <div class="home-logo">
                
            </div>
        </div>
    </header>