<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Solid Layer - Structured Phalcon Framework</title>
        <!-- <link href='http://fonts.googleapis.com/css?family=Josefin+Sans:100,400' rel='stylesheet' type='text/css'> -->
        <!-- <link href='https://fonts.googleapis.com/css?family=Dancing+Script' rel='stylesheet' type='text/css'> -->
        <link rel="stylesheet" href="/css/bootstrap.min.css" media="bogus">
        <style>
            /* latin-ext */
            @font-face {
              font-family: 'Josefin Sans';
              font-style: normal;
              font-weight: 100;
              src: local('Josefin Sans Thin'), local('JosefinSans-Thin'), url(http://fonts.gstatic.com/s/josefinsans/v9/q9w3H4aeBxj0hZ8Osfi3dyU-eqv6n8lOlIZB5nq_8UM.woff2) format('woff2');
              unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF;
            }
            /* latin */
            @font-face {
              font-family: 'Josefin Sans';
              font-style: normal;
              font-weight: 100;
              src: local('Josefin Sans Thin'), local('JosefinSans-Thin'), url(http://fonts.gstatic.com/s/josefinsans/v9/q9w3H4aeBxj0hZ8Osfi3d1dBB84BqlWy1BjOnCrU9PY.woff2) format('woff2');
              unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215, U+E0FF, U+EFFD, U+F000;
            }
            /* latin-ext */
            @font-face {
              font-family: 'Josefin Sans';
              font-style: normal;
              font-weight: 400;
              src: local('Josefin Sans'), local('JosefinSans'), url(http://fonts.gstatic.com/s/josefinsans/v9/xgzbb53t8j-Mo-vYa23n5j0LW-43aMEzIO6XUTLjad8.woff2) format('woff2');
              unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF;
            }
            /* latin */
            @font-face {
              font-family: 'Josefin Sans';
              font-style: normal;
              font-weight: 400;
              src: local('Josefin Sans'), local('JosefinSans'), url(http://fonts.gstatic.com/s/josefinsans/v9/xgzbb53t8j-Mo-vYa23n5ugdm0LZdjqr5-oayXSOefg.woff2) format('woff2');
              unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215, U+E0FF, U+EFFD, U+F000;
            }
            /* latin */
            @font-face {
              font-family: 'Dancing Script';
              font-style: normal;
              font-weight: 400;
              src: local('Dancing Script'), local('DancingScript'), url(https://fonts.gstatic.com/s/dancingscript/v7/DK0eTGXiZjN6yA8zAEyM2Ud0sm1ffa_JvZxsF_BEwQk.woff2) format('woff2');
              unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215, U+E0FF, U+EFFD, U+F000;
            }
            body {
                font-family: 'Josefin Sans', sans-serif !important;
                background-color: #F7F7F7 !important;
            }
            #frameworkTitle {
                font-family: 'Dancing Script', monospace;
                font-size: 15em;
                margin-bottom: 0.1em;
                color: #2c3e50;
            }
            .footer p {
                font-size: 1.1em;
            }
            .welcome {
                text-align: center;
                margin-top: 3em;
            }
            .hr {
                border-top: 1px dashed #777;
            }
            @media only screen and (max-width: 400px) {
                #frameworkTitle {
                    font-size: 5em;
                }
                .welcome {
                    margin-top: 9em;
                }
            }
            @media only screen and (max-width: 449px) and (min-width: 401px) {
                #frameworkTitle {
                    font-size: 6em;
                }
                .welcome {
                    margin-top: 0.1em;
                }
            }
            @media only screen and (max-width: 1050px) and (min-width: 500px) {
                #frameworkTitle {
                    font-size: 8em;
                }
                .welcome {
                    margin-top: 0.3em;
                }
            }
        </style>
    </head>
    <body>
        <div class="container welcome">

            <h1 id="frameworkTitle">
                <span title="Solid">S</span>.<span title="Layer">layer</span>
            </h1>

            <p>Solid Layer / Structured Phalcon Framework</p>
            <a class="btn btn-primary btn-xs" href="http://phalconslayer.com/docs" target="_blank">Let's get Started!</a>

            <a class="btn btn-warning btn-xs" href="{{ route('try-sample-forms') }}"><span class="glyphicon glyphicon-bookmark"></span> Try sample forms</a>

            <div class="footer">
                <hr class="hr">
                <p title="From the boot time until render process time">Processing Time: <?php echo processing_time(SLAYER_START) ?></p>
                <hr class="hr">
                <h3 title="Current Version"><?= Clarity\Providers\Console::VERSION ?></h3>
            </div>
        </div>

        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    </body>
</html>
