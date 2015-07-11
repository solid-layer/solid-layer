<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>{% block title %}{% endblock %}</title>

        <link rel="stylesheet" type="text/css" href="{{static_url('css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{static_url('css/site.min.css')}}">
        <style type="text/css">
            body {
              background-color: #fefbf9 !important;
            }
        </style>

        {% block header %}
        {% endblock %} 
    </head>
    <body>
        <div class="container-fluid">
            {% block content %}{% endblock %}
        </div>

        <script type="text/javascript" src="{{static_url('js/jquery-1.10.1.min.js')}}"></script>
        <script type="text/javascript" src="{{static_url('js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{static_url('js/site.min.js')}}"></script>
        {% block footer %}{% endblock %} 
    </body>
</html>