<main data-layout="split">
  <span data-template="login">
    <header>
      <h1>REGISTER</h1>
    </header>
    <section>
      <form action="{{ route('register') }}" class="text-white" method="POST">
    @csrf

    <div class="form-group">
        <label for="name" class="text-white" >Full Name</label>
        <input type="text" id="name" name="name" required autocomplete="off">
    </div>

    <div class="form-group">
        <label for="email" class="text-white" >Email Address</label>
        <input type="email" id="email" name="email" required autocomplete="off">
    </div>

    <div class="form-group">
        <label for="pwd" class="text-white" >Password</label>
        <input type="password" id="pwd" name="password" required>
    </div>

    <div class="form-group">
        <label for="cpwd" class="text-white" >Confirm Password</label>
        <input type="password" id="cpwd" name="password_confirmation" required>
    </div>

    <div class="btn-row">
        <button type="submit" class="btn-login">Create Account</button>
        <button type="button" class="btn-register" id="goLogin">Back to Login</button>
    </div>
</form>

    </section>
    <footer>
      &copy; 2025 MOLLER.STUDIO. ALL RIGHTS RESERVED.
    </footer>
  </span>
  <span data-blob>
    <div class="blob"></div>
    <div class="blob-2"></div>
  </span>
</main>

<script>
const goLogin = document.getElementById('goLogin');
goLogin.addEventListener('click', () => {
  window.location.href = 'login.html';
});
</script>

<script>
const registerBtn = document.querySelector('.btn-register');
const title = document.querySelector('h1');

registerBtn.addEventListener('click', () => {
  title.textContent = 'REGISTER';
});
</script>

<style>
:root {
  --bg: #EFEFEF;
  --panel-bg: #EFEFEF;
  --text: #121212;
  --accent: #E4FF1A;
  --line: 1px solid #E0E0E0;
  --input-border: #E5E5E5;
  --placeholder: #A0A0A0;
  --checkbox-border: #D0D0D0;
  --blob-opacity: 1.0;
  --blob2-opacity: 1.0;
  --blob1-bg: linear-gradient(135deg, var(--accent), #d1ff4d);
  --blob2-bg: #EFEFEF;
  --ease: cubic-bezier(0.23, 1, 0.32, 1);
}

@media (prefers-color-scheme: dark) {
  :root {
    --bg: #121212;
    --panel-bg: #121212;
    --text: #EFEFEF;
    --accent: #E4FF1A;
    --line: 1px solid #333333;
    --input-border: #2A2A2A;
    --placeholder: #555555;
    --checkbox-border: #444444;
    --blob-opacity: 1.0;
    --blob2-opacity: 1.0;
    --blob1-bg: linear-gradient(135deg, var(--accent), #d1ff4d);
    --blob2-bg: #121212;
  }
}

* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body {
  
  color: var(--text);
  font-family: 'Outfit', sans-serif;
  height: 100vh;
  width: 100vw;
  overflow: hidden;
}

[data-layout="split"] {
  display: grid;
  grid-template-columns: auto 1fr;
  height: 100%;
  width: 100%;
}

[data-template="login"] {
  display: grid;
  grid-template-rows: auto 1fr auto;
  padding: 4rem 6vw;
  background: var(--bg);
  z-index: 2;
  height: 100%;
}

h1 {
  font-size: 5rem;
  font-weight: 800;
  letter-spacing: -2px;
  color: var(--text);
  text-transform: uppercase;
}

form {
  width: 100%;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 1.5rem 1rem;
}

.form-group {
  grid-column: 1 / -1;
}

label {
  font-size: 0.75rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 1px;
  color: #000;
}

input {
  width: 100%;
  background: transparent;
  border: none;
  border-bottom: 2px solid var(--input-border);
  color: var(--text);
  font-size: 1.5rem;
  padding: 0.5rem 0;
  font-weight: 600;
  outline: none;
  transition: border-color 0.3s ease;
}

.btn-row {
  grid-column: 1 / -1;
  display: grid;
  gap: inherit;
}

button {
  padding: 1.2rem;
  font-size: 1rem;
  font-weight: 800;
  text-transform: uppercase;
  cursor: pointer;
  transition: all 0.3s var(--ease);
}

.btn-login {
  background: var(--text);
  color: var(--bg);
  border: 2px solid var(--text);
}

.btn-register {
  background: transparent;
  color: var(--text);
  border: 2px solid var(--input-border);
}

.meta-row {
  grid-column: 1 / -1;
  display: grid;
  gap: inherit;
  align-items: center;
}
</style>
