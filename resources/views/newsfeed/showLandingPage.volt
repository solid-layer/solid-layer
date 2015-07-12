{% extends 'layouts/main.volt' %}

{% block title %}Slayer - Newsfeed{% endblock %}

{% block header %}
<style type="text/css">
    .marginTop {
        margin-top:5vw;
    }
</style>
{% endblock %}

{% block content %}
    <div class="text-center">
        <h1>You have successfully landed to newsfeed</h1>
        <p>Try to change your <code>Auth Intended Url</code> at <code>config/app.php</code> under auth block. </p>
        <a href="{{ route('logout') }}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
    </div>
{% endblock %}

{% block footer %}
<script type="text/javascript"></script>
{% endblock %}