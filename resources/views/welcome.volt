<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Solid Layer - Structured Phalcon Framework</title>
        <link href='http://fonts.googleapis.com/css?family=Josefin+Sans:100,400' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Dancing+Script' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="{{ base_uri('css/bootstrap.min.css') }}">
        <style type="text/css">
            body {
                font-family: 'Josefin Sans', sans-serif;
                background-color: #F7F7F7;
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
            @media only screen and (max-width: 1050px) and (min-width: 400px) {
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
            <a class="btn btn-primary btn-xs" href="http://docs.phalconslayer.com" target="_blank">Let's get Started!</a>

            <a class="btn btn-warning btn-xs" href="{{ route('trySampleForms') }}"><span class="glyphicon glyphicon-bookmark"></span> Try sample forms</a>

            <div class="footer">
                <hr class="hr">
                <p title="From the boot time until render process time">Processing Time: <?php echo processing_time(SLAYER_START) ?></p>
                <hr class="hr">
                <h3 title="Current Version">v1.4.0</h3>
            </div>
        </div>
    </body>
</html>
