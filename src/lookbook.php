<?php
$imagens = 'bom demaisedit, GODedit, good timesedit, lindo, loca, meia, mt dark, muito loco memo, OH YES, P1180906, top';
$imagens = explode(', ', $imagens);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Lookbook | GARDEN</title>
    <link rel='stylesheet' type='text/css' media='screen' href='/public/css/index.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='/public/css/header.css'>
    <?php require 'head.php'; ?>
    <style>
        .main {
            align-items: start;
            margin-top: 100px;
        }

        .logo {
            width: 45%;
        }

        .itemmain {
            width: 40%;
            animation: comeco 0s;
        }

        @media screen and (max-width: 1024px) {
            .logo {
                width: 70%;
            }

            .itemmain {
                width: 60%;
            }

            .main {
                align-items: start;
                margin-top: 80px;
            }
        }

        @media screen and (max-width: 768px) {
            .logo {
                width: 90%;
            }

            .itemmain {
                width: 70%;
            }

            .main {
                align-items: start;
                margin-top: 60px;
            }
        }

        @media screen and (max-width: 425px) {
            .itemmain {
                width: 100%;
            }

            .logo {
                width: 60%;
            }

            .main {
                align-items: start;
                margin-top: 40px;
            }
        }
    </style>
</head>

<body>
    <center>
        <?php require 'header.php' ?>
        <div class="main" style="flex-direction: row;">
            <div class="itemmain">
                <!--Carousel Wrapper-->
                <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">

                    <!--Slides-->
                    <div class="carousel-inner" role="listbox">
                        <!--slides-->
                        <?php if (sizeof($imagens) < 2) { ?>
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="/img/lookshop/<?php echo $imagens[0] ?>.jpg" alt="slide">
                            </div>
                        <?php } else { ?>
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="/img/lookshop/<?php echo $imagens[0] ?>.jpg" alt="slide">
                            </div>
                            <?php for ($i = 1; $i < sizeof($imagens); $i++) { ?>
                                <div class="carousel-item ">
                                    <img class="d-block w-100" src="/img/lookshop/<?php echo $imagens[$i]; ?>.jpg" alt="slide">
                                </div>
                            <?php } ?>
                        <?php } ?>
                        <!--/slides-->
                    </div>
                    <!--/.Slides-->
                    <!--Controls-->
                    <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true" style="background-image: url(&quot;data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath d='M5.25 0l-4 4 4 4 1.5-1.5L4.25 4l2.5-2.5L5.25 0z'/%3e%3c/svg%3e&quot;);"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true" style="background-image: url(&quot;data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath d='M2.75 0l-1.5 1.5L3.75 4l-2.5 2.5L2.75 8l4-4-4-4z'/%3e%3c/svg%3e&quot;);"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    <!--/.Controls-->
                </div>
                <!--/.Carousel Wrapper-->
            </div>
        </div>
</body>

</html>