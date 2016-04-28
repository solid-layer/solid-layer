<!DOCTYPE html>
<html>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
        .container {
            text-align: center;
            margin-top: 3em;
        }
        .hr {
            border-top: 1px dashed #777;
        }
      </style>
    </head>
    <body>
      <div class="container">
        <h1 id="frameworkTitle">
          <span title="Solid">S</span>.<span title="Layer">layer</span>
        </h1>

        <p>Solid Layer / Structured Phalcon Framework</p>
        <a class="btn btn-primary btn-xs" href="http://phalconslayer.readme.io/docs/setup-installation" target="_blank">Let's get Started!</a>

        <a class="btn btn-warning btn-xs" href="{{ route('trySampleForms') }}"><span class="glyphicon glyphicon-bookmark"></span> Try sample forms</a>

        <hr class="hr">

        <div class="footer">
          <p>Processing Time: <?php echo processing_time(SLAYER_START) ?></p>
        </div>
      </div>
    </body>
</html>