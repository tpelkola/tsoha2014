        <section>
            <span class="virhe"><?php echo $data->virhe; ?></span>
            <form action="login.php" method="POST">
                <label for="email">Sähköposti</label>
                <input type="text" name="email" /><br />
                <label for="password">Salasana</label>
                <input type="password" name="password" /><br />
                <input type="hidden" name="referer" value="login" /><br />
                <input type="hidden" name="login-redirect" value="<?php echo $data->login_redirect; ?>" />
                <input type="submit" value="Kirjaudu" /><br />
            </form>
        </section>