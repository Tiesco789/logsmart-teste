const nomeInput = document.getElementById('nome');
const emailInput = document.getElementById('email');
const botaoSalvar = document.getElementById('botaoSalvar');

function validarEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

function validarCampos() {
    const nomeValido = nomeInput.value.trim() !== '';
    const emailValido = validarEmail(emailInput.value);

    botaoSalvar.disabled = !(nomeValido && emailValido);
}

nomeInput.addEventListener('input', validarCampos);
emailInput.addEventListener('input', validarCampos);

validarCampos();
