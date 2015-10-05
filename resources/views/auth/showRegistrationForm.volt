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
        <form class="form-vertical" method="POST" action="{{ route('storeRegistrationForm') }}" autocomplete="off">
            <input type="hidden" name="{{ security.getTokenKey() }}" value="{{ security.getToken() }}"/>
            <div class="form-group">
                <label>{{ lang.get('auth.login.email_label') }}</label>
                {{ text_field('email', 'class': 'form-control') }}
            </div>
            <div class="form-group">
                <label>{{ lang.get('auth.login.password_label') }}</label>
                {{ password_field('password', 'class': 'form-control') }}
            </div>
            <div class="form-group">
                <label>{{ lang.get('auth.login.re_password_label') }}</label>
                {{ password_field('repassword', 'class': 'form-control') }}
            </div>
            <div class="pull-right">
                <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-ok"></span> Register </button>
            </div>
            <div class="clearfix"></div>
            {{ partial('layouts/processingTime') }}
        </form>
    </div>
{% endblock %}

{% block footer %}
<script type="text/javascript"></script>
{% endblock %}