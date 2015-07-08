<html>
    <head>
        <title>Slayer - Sample Login Form</title>

        <link rel="stylesheet" type="text/css" href="<?php echo $this->url->getStatic('bootflat.github.io/css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo $this->url->getStatic('bootflat.github.io/css/site.min.css'); ?>">
        <style type="text/css">
            body {
              background-color: #fefbf9 !important;
            }
        </style>

        
<style type="text/css">
    .marginTop {
        margin-top:5vw;
    }
</style>
 
    </head>
    <body>
        <div class="container-fluid">
            
    <div class="marginTop"></div>
    <div class="col-sm-4 col-sm-offset-4">
            <?php echo $this->flashSession->output(); ?>
            <hr>
            <form class="form-vertical" method="POST" action="<?php echo $this->url->get(['for' => 'attemptToLogin']) ?>">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label><?php echo $this->lang->get('auth.login.username_label'); ?></label>
                    <input type="text" name="username" class="form-control">
                </div>
                <div class="form-group">
                    <label><?php echo $this->lang->get('auth.login.password_label'); ?></label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="pull-left">
                    <a href="<?php echo $this->url->get(['for' => 'showRegistrationForm']) ?>" class="btn btn-xs btn-info"><?php echo $this->lang->get('auth.button.register_button'); ?></a> <a href="" class="btn btn-xs btn-danger"><?php echo $this->lang->get('auth.button.forgot_button'); ?></a>
                </div>
                <div class="pull-right">
                    <input type="submit" value="<?php echo $this->lang->get('auth.button.login_button'); ?>" class="btn btn-primary">
                </div>
            </form>
    </div>
    <div class="clearfix"></div>

        </div>

        <script type="text/javascript" src="<?php echo $this->url->getStatic('bootflat.github.io/js/jquery-1.10.1.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo $this->url->getStatic('bootflat.github.io/js/bootstrap.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo $this->url->getStatic('bootflat.github.io/js/site.min.js'); ?>"></script>
        
<script type="text/javascript"></script>
 
    </body>
</html>