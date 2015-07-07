{% extends 'layouts/main.volt' %}

{% block title %}Whoops error found{% endblock %}

{% block header %}
{% endblock %}

{% block content %}
<div class="row" style="margin-top:20px;">
    <div class="col-sm-12 text-center">
        <div class="well">
            <h4>Whoops error found!</h4>
            <p>Please tail slayer's log to view the error, or try to debug your system.</p>
        </div>

        <a href="http://www.github.com/phalconslayer/slayer"><code>Powered By: Slayer - Bootstrapped Phalcon Framework</code></a>
    </div>
</div>
{% endblock %}

{% block footer %}
{% endblock %}