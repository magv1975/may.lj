<form action="<?= url('/auth/regproc') ?>" method="post">
    <label>Login:
	<input type="text" name="login"/>
    </label>
    <label>Password:
	<input type="password" name="pass"/>
    </label>
    <label>Confirm password:
	<input type="password" name="pass_conf"/>
    </label>
    <label>Email:
	<input type="email" name="email"/>
    </label>
    <input type="submit" value="зарегистрироваться"/>
</form>