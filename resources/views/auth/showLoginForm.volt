{% extends 'layouts/main.volt' %}

{% block title %}Sample Login Form{% endblock %}

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
            <form class="form-vertical" method="POST" action="<?php echo $this->url->get(['for' => 'attemptToLogin']) ?>">
                <input type="hidden" name="{{ security.getTokenKey() }}" value="{{ security.getToken() }}"/>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="pull-left">
                    <a href="<?php echo $this->url->get(['for' => 'showRegistrationForm']) ?>" class="btn btn-xs btn-info">Register</a> <a href="" class="btn btn-xs btn-danger">Forgot your password?</a>
                </div>
                <div class="pull-right">
                    <input type="submit" value="Login" class="btn btn-primary">
                </div>
            </form>
    </div>
    <div class="clearfix"></div>
{% endblock %}

{% block footer %}
<script type="text/javascript"></script>
{% endblock %}