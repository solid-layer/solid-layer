{% extends 'layouts/main.volt' %}

{% block title %}Slayer - Sample Registration Form{% endblock %}

{% block header %}
<style type="text/css">
    .marginTop {
        margin-top:5vw;
    }
</style>
{% endblock %}

{% block content %}
    <div class="marginTop"></div>
    <div class="col-sm-4 col-sm-offset-4">
            {{ flash_bag.output() }}
            <hr>
            <form class="form-vertical" method="POST" action="{{ url.get(['for':'storeRegistrationForm']) }}" autocomplete="off">
                <input type="hidden" name="{{ security.getTokenKey() }}" value="{{ security.getToken() }}"/>
                <div class="form-group">
                    <label>Email</label>
                    {{ text_field('email', 'class': 'form-control') }}
                </div>
                <div class="form-group">
                    <label>Username</label>
                    {{ text_field('username', 'class': 'form-control') }}
                </div>
                <div class="form-group">
                    <label>Password</label>
                    {{ password_field('password', 'class': 'form-control') }}
                </div>
                <div class="form-group">
                    <label>Repeat Password</label>
                    {{ password_field('repassword', 'class': 'form-control') }}
                </div>
                <div class="pull-right">
                    <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-ok"></span> Register </button>
                </div>
            </form>
    </div>
    <div class="clearfix"></div>
{% endblock %}

{% block footer %}
<script type="text/javascript"></script>
{% endblock %}