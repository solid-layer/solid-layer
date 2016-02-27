<!DOCTYPE html>
<html>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>Slayer - Structured Phalcon Framework</title>
      <link href='http://fonts.googleapis.com/css?family=Josefin+Sans:100,400' rel='stylesheet' type='text/css'>
      <link href='https://fonts.googleapis.com/css?family=Dancing+Script' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" type="text/css" href="{{ base_uri('css/bootstrap.min.css') }}">
      <style type="text/css">
        body {
          font-family: 'Josefin Sans', sans-serif;
          color: #FC6A3B;
          background-color: #F7F7F7;
        }
        #frameworkTitle {
          font-family: 'Dancing Script', monospace;
          font-size: 15em;
          margin-bottom: 0.1em;
        }
        .footer p {
          font-size: 1.1em;
        }
        .container {
          text-align: center;
          margin-top: 3em;
        }

      </style>
    </head>
    <body>
      <div class="container">
        <h1 id="frameworkTitle">Slayer</h1>

        <p>Structured Phalcon Framework</p>
        <a class="btn btn-danger btn-xs" href="http://www.github.com/phalconslayer/docs" target="_blank">Let's get Started!</a>

        <a class="btn btn-default btn-xs" href="{{ route('trySampleForms') }}"><span class="glyphicon glyphicon-bookmark"></span> Try sample forms</a>

        <hr>
        <div class="footer">
          <p>Processing Time: <?php echo processing_time(SLAYER_START) ?></p>
        </div>
      </div>
    </body>
</html>