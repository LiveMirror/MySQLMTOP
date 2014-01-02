<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="page-header">
  <h2>系统登录<small></small></h2>
</div>
  
<?php if ($error_code!==0) { ?>
	<div class="alert alert-error">
	<?php echo validation_errors(); ?>
	<?php if ($error_code=='captcha_error') { ?>
			<p>验证码错误</p>
	<?php } ?>
	<?php if ($error_code=='user_check_fail') { ?>
			<p>账号或密码错误！</p>
	<?php } ?>
	</div>
<?php } ?>

<form class="form-horizontal" method='post' action="<?php echo site_url('user/login')?>">
<input type='hidden'  name='login' value='doing' />
<input type='hidden'  name='return_url' value='<?php  echo $return_url ?>' />
  <div class="control-group ">
    <label class="control-label" for="inputEmail">*账  号</label>
    <div class="controls">
      <input type="text" id="username" name="username" value="<?php echo set_value('username'); ?>">
      <span class="help-inline"></span>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">*密  码</label>
    <div class="controls">
      <input type="password" id="" name="password" value="<?php echo set_value('password'); ?>">
    </div>
  </div>
    <div class="control-group">
    <label class="control-label" for="">*验证码</label>
    <div class="controls">
      <input type="text" id=""  name='captcha'  class='span2'  value="<?php echo set_value('captcha'); ?>">&nbsp<?php echo $captcha;?><a href='<?php echo site_url('user/login')?>'
>重新获取</a>    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn btn-success">登录</button>&nbsp;&nbsp;默认账号密码admin/admin
    </div>
  </div>
</form>

<div class="ds-login"></div>
