<form action="<?= url('/auth/login') ?>" method="post">
    <label>Login:
	<input type="text" name="login" required/>
    </label>
    <label>Password:
	<input type="password" name="pass" required/>
    </label>
    <input type="submit" value="Войти"/>
    <a href="<?= url('/auth/registration') ?>">зарегистрироваться</a>
</form>