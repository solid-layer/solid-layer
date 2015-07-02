{% extends 'layouts/main.volt' %}

{% block title %}Sample Registration Form{% endblock %}

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
            <form class="form-vertical" method="POST" action="<?php echo $this->url->get(['for' => 'showLoginForm']) ?>">
                <input type="hidden" name="{{ security.getTokenKey() }}" value="{{ security.getToken() }}"/>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label>Repeat Password</label>
                    <input type="password" name="repassword" class="form-control">
                </div>
                <div class="pull-right">
                    <input type="submit" value="Register" class="btn btn-info">
                </div>
            </form>
    </div>
    <div class="clearfix"></div>
{% endblock %}

{% block footer %}
<script type="text/javascript"></script>
{% endblock %}