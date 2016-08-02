{% extends 'layouts/main.volt' %}

{% block title %}Slayer - Sample Registration Form{% endblock %}

{% block header %}
<link rel="stylesheet" href="/css/main.css" media="bogus">
{% endblock %}

{% block content %}
    <div class="marginTop"></div>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            {# Info Message #}
            {% if flash().has('info')  %}
                <div class="alert alert-info">
                    {{ flash().get('info') }}
                </div>
            {% endif %}

            {# Success Message #}
            {% if flash().has('success')  %}
                <div class="alert alert-success">
                    {{ flash().get('success') }}
                </div>
            {% endif %}

            {# Error Messages #}
            {% if flash().has('error')  %}
                <div class="alert alert-danger">
                    {{ flash().get('error') }}
                </div>
            {% endif %}

            {# Any when using FlashBag #}
            {{ flash_bag.output() }}
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 col-md-offset-1">
            <div class="well well-white">
                <h4>Registration Form</h4>
                <hr>
                <div class="alert alert-info">
                    <span class="glyphicon glyphicon-info-sign"></span> At first, you must run <code>php&nbsp;brood&nbsp;queue:worker</code> in your console. Check your mailer configuration if you can't send an email request.
                </div>
                <hr>
                <h5>Registration Procedure:</h5>
                <ul>
                    <li>Type in your Email</li>
                    <li>Type in your Password</li>
                    <li>Type in your Repeat Password</li>
                    <li>Click <code>Register</code> button</li>
                </ul>
            </div>
        </div>

        <div class="col-md-6">
            <div class="well well-white">
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
    </div>
{% endblock %}

{% block footer %}
<script type="text/javascript"></script>
<link rel="stylesheet" href="/css/main.css">
{% endblock %}
