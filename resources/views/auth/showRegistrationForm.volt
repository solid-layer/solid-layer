{% extends 'layouts/main.volt' %}

{% block title %}Slayer - Sample Registration Form{% endblock %}

{% block header %}
<link rel="stylesheet" type="text/css" href="{{ url('css/main.css') }}">
{% endblock %}

{% block content %}
    <div class="marginTop"></div>

    <div class="col-md-4 col-md-offset-1">
        <div class="well">
            <h4>Registration Form</h4>
            <hr>
            <ul>
                <li>At first, you must run <code>php brood queue:worker</code> in your console.</li>
                <li>Check your mailer configuration if you can't send an email request.</li>
                <li>Put your email, password and repeat password.</li>
            </ul>
        </div>
    </div>

    <div class="col-md-6">

        {# Info Message #}
        {% if di().get('flash').has('info')  %}
            <div class="alert alert-info">
                {{ di().get('flash').get('info') }}
            </div>
        {% endif %}

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
