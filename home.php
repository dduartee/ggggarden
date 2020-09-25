<html>

<head>
    <link rel="stylesheet" type="text/css" media="screen" href="/css/index.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/css/header.css">
    <meta name="description" content="isso não é uma planta, é o jardim inteiro" />
    <title>GARDEN</title>
    <?php require 'head.php' ?>
    <style>
        a {
            color: black;
        }
        #logo img {
                width: 50%;
            }
        @media screen and (max-width: 1024px) {
            #shop h3 {
                font-size: 2em;
            }

            #logo img {
                width: 70%;
            }

            #lookbook h3 {
                font-size: 2em;
            }


        }
        @media screen and (max-width: 768px) {
            #shop h3 {
                font-size: 2em;
            }

            #logo img {
                width: 70%;
            }

            #lookbook h3 {
                font-size: 2em;
            }


        }

        @media screen and (max-width: 425px) {
            #shop h3 {
                font-size: 1.5em;
            }

            #logo img {
                width: 75%;
            }

            #lookbook h3 {
                font-size: 1.5em;
            }


        }
        @media screen and (max-width: 320px) {
            #shop h3 {
                font-size: 1.5em;
            }

            #logo img {
                width: 90%;
            }

            #lookbook h3 {
                font-size: 1.5em;
            }


        }
    </style>
</head>

<body>
    <center>
        <div class="main">
            <div class="itemmain" id="shop">
                <a href="/shop">
                    <h3>Shop</h3>
                </a>
            </div>
            <div class="itemmain" id="logo" >
                <img src="/img/logo.png">
            </div>
            <div class="itemmain" id="lookbook">
                <a href="/lookbook">
                    <h3>Lookbook</h3>
                </a>
            </div>
        </div>


    </center>
</body>

</html>