<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>{% block title %}{% endblock %}</title>
        <link rel="stylesheet" href="/css/bootstrap.min.css" media="bogus">
        <style type="text/css">
            body {
              background-color: #f7f7f7 !important;
            }
        </style>
        {% block header %}{% endblock %}
    </head>
    <body>
        <div class="container-fluid">
            {% block content %}{% endblock %}
        </div>
        <script type="text/javascript" src="/js/bootstrap.min.js"></script>
        {% block footer %}{% endblock %}

        <link rel="stylesheet" href="/css/bootstrap.min.css">
    </body>
</html>
