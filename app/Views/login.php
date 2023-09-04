<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: 'Open Sans', sans-serif;
        background-color: #222;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .form-container {
        width: 600px;
        margin: 0 auto;
        padding: 50px;
        background-color: #333;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        color: #fff;
    }

    h1 {
        text-align: center;
        margin-bottom: 30px;
        font-size: 36px;
        color: #b38bff;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    label {
        margin-bottom: 10px;
        font-size: 18px;
    }

    input {
        padding: 12px;
        border: none;
        border-radius: 5px;
        margin-bottom: 20px;
        font-size: 16px;
        color: #fff;
        background-color: #555;
    }

    button {
        padding: 10px;
        background-color: #b38bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 18px;
        transition: background-color 0.2s ease-in-out;
    }

    button:hover {
        background-color: #8c5fb2;
    }

    a {
        text-decoration: none;
        color: #b38bff;
        font-size: 18px;
        transition: color 0.2s ease-in-out;
    }

    a:hover {
        color: #8c5fb2;
    }

    p {
        text-align: center;
        margin: 8px;
    }
</style>
<div class="container">
    <div class="form-container" id="login-form">
        <h1>Login</h1>
        <form action=" <?= base_url('login_user') ?>" method="post">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="<?= base_url('Register') ?>" id="signup-link">Sign up</a></p>
    </div>


</div>

</div>