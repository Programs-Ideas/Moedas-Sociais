
document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("signUp_container__formulario");
    const usernameInput = document.getElementById("LoginMatricula");
    const idInput = document.getElementById("IdFuncional");
    const errorUsername = document.getElementById("error-username-professor");
    const errorId = document.getElementById("error-id-professor");

    form.addEventListener("submit", function(event) {
        let valid = true;

        // Clear previous error messages
        errorUsername.textContent = "";
        errorId.textContent = "";

        // Validate username
        if (usernameInput.value.trim() === "") {
            errorUsername.textContent = "O nome de usuário é obrigatório.";
            valid = false;
        }

        // Validate ID
        if (idInput.value.trim() === "") {
            errorId.textContent = "O ID do professor é obrigatório.";
            valid = false;
        }

        if (!valid) {
            event.preventDefault(); // Prevent form submission if validation fails
        }
    });
});