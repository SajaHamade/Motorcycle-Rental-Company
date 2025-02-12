const formOpenBtn = document.querySelectorAll("#form-open"),
      home = document.querySelector(".home"),
      formContainer = document.querySelector(".form_container"),
      formCloseBtn = document.querySelector(".form_close"),
      signupBtn = document.querySelector("#signup"),
      loginBtn = document.querySelector("#login"),
      pwShowHide = document.querySelectorAll(".pw_hide"),
      loginForm = document.querySelector(".login-form"),
      signupForm = document.querySelector(".signup_form");

formOpenBtn.forEach(btn => {
    btn.addEventListener("click", () => {
        home.classList.add("show");
        formContainer.classList.add("active");
        loginForm.style.display = "block";
        signupForm.style.display = "none";
    });
});

formCloseBtn.addEventListener("click", () => {
    home.classList.remove("show");
    formContainer.classList.remove("active");
});

pwShowHide.forEach(icon => {
    icon.addEventListener("click", () => {
        let getPwInput = icon.parentElement.querySelector("input");
        if (getPwInput.type === "password") {
            getPwInput.type = "text";
            icon.classList.replace("uil-eye-slash", "uil-eye");
        } else {
            getPwInput.type = "password";
            icon.classList.replace("uil-eye", "uil-eye-slash");
        }
    });
});

signupBtn.addEventListener("click", (e) => {
    e.preventDefault();
    loginForm.style.display = "none";
    signupForm.style.display = "block";
});

loginBtn.addEventListener("click", (e) => {
    e.preventDefault();
    loginForm.style.display = "block";
    signupForm.style.display = "none";
});
