{% extends 'layouts/main.volt' %}

{% block title %}Slayer - Sample Registration Form{% endblock %}

{% block header %}
<link rel="stylesheet" type="text/css" href="{{ url('css/main.css') }}">
{% endblock %}

{% block content %}
    <div class="marginTop"></div>

    <div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2">

        {# Success Message #}
        {% if di().get('flash').has('success')  %}
            <div class="alert alert-success">
                {{ di().get('flash').get('success') }}
            </div>
        {% endif %}

        {# Error Messages #}
        {% if di().get('flash').has('error')  %}
            <div class="alert alert-danger">
                {{ di().get('flash').get('error') }}
            </div>
        {% endif %}

        {{ flash_bag.output() }}

        <div class="well">
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
                    <button id="register-btn" class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-ok"></span> Register </button>
                </div>
                <div class="clearfix"></div>
                {{ partial('layouts/processingTime') }}
            </form>
        </div>
    </div>
{% endblock %}

{% block footer %}
<script type="text/javascript"></script>
{% endblock %}