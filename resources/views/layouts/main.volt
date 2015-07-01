<html>
    <head>
        <title>{% block title %}{% endblock %}</title>

        <link rel="stylesheet" type="text/css" href="{{static_url('bootflat.github.io/css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{static_url('bootflat.github.io/css/site.min.css')}}">
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

        <script type="text/javascript" src="{{static_url('bootflat.github.io/js/jquery-1.10.1.min.js')}}"></script>
        <script type="text/javascript" src="{{static_url('bootflat.github.io/js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{static_url('bootflat.github.io/js/site.min.js')}}"></script>
        {% block footer %}{% endblock %} 
    </body>
</html>