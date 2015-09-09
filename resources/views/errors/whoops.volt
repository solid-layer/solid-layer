<html>
    <head>
        <title>Whoops error found</title>

        <link rel="stylesheet" type="text/css" href="{{base_uri('css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{base_uri('css/site.min.css')}}">
        <style type="text/css">
            body {
              background-color: #fefbf9 !important;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row" style="margin-top:20px;">
                <div class="col-sm-12 text-center">
                    <div class="alert alert-danger">
                        <h4>Whoops! Something went wrong.</h4>

                        <?php if (!empty($exception) && config()->app->debug ): ?>

                            <p>{{ exception.getMessage() }}</p>
                            <p>
                                <b>File:</b> {{ exception.getFile() }} on line <b>{{ exception.getLine() }}</b>
                            </p>

                        <?php else: ?>

                            <p>It seems the system is not functioning.</p>

                        <?php endif ?>

                    </div>

                    <a target="_blank" href="http://www.github.com/phalconslayer/slayer"><code>Powered By: Slayer - Structured Phalcon Framework</code></a>
                </div>
            </div>
        </div>
    </body>
</html>