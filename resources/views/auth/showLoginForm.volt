{% extends 'layouts/main.volt' %}

{% block title %}Slayer - Sample Login Form{% endblock %}

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
            {{ flashSession.output() }}
            <hr>
            <form class="form-vertical" method="POST" action="<?php echo $this->url->get(['for' => 'attemptToLogin']) ?>" autocomplete="off">
                {{ csrf_field() }}

                <input type="hidden" name="ref" value="{{ request().get('ref') }}"> 

                <div class="form-group">
                    <label>{{ lang.get('auth.login.username_label') }}</label>
                    <input type="text" name="username" class="form-control">
                </div>
                <div class="form-group">
                    <label>{{ lang.get('auth.login.password_label') }}</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="pull-left">
                    <a href="<?php echo $this->url->get(['for' => 'showRegistrationForm']) ?>" class="btn btn-info">{{ lang.get('auth.button.register_button') }}</a> <a href="" class="btn btn-danger">{{ lang.get('auth.button.forgot_button') }}</a>
                </div>
                <div class="pull-right">
                    <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-ok"></span> {{ lang.get('auth.button.login_button') }}</button>
                </div>
            </form>
    </div>
    <div class="clearfix"></div>
{% endblock %}

{% block footer %}
<script type="text/javascript"></script>
{% endblock %}