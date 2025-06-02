const charCount = document.querySelector('.char-count');
const stars = document.querySelectorAll('.rating > span');
const commentInput = document.getElementById('comment');
commentInput.addEventListener('input', () => {
    const remainingChars = 200 - commentInput.value.length;
    charCount.textContent = `${remainingChars} caracteres restantes`;
});
stars.forEach((star, index) => {
    star.addEventListener('click', () => {
        resetStars();
        for (let i = 0; i <= index; i++) {
            stars[i].textContent = '★';
        }
    });
});

function resetStars() {
    stars.forEach(star => {
        star.textContent = '☆';
    });
}

function toggleOptions(nome) {
    var options = document.getElementsByClassName('options');
    for (var i = 0; i < options.length; i++) {
        options[i].style.display = 'none';
    }
    var selectedOptions = document.getElementById(nome + 'Options');
    selectedOptions.style.display = (selectedOptions.style.display === 'none') ? 'block' : 'none';

    var allNames = document.querySelectorAll('.nome');
    allNames.forEach(function(elem) {
        elem.classList.remove('selected');
    });

    var selectedName = document.querySelector('.nome[data-option="' + nome + '"]');
    selectedName.classList.add('selected');
}




window.onload = function() {
    toggleOptions('servico');
};

// Função para abrir o modal quando o botão "Agendar" é clicado
document.getElementById('botao-agendar').onclick = function() {
    var serviceId = this.getAttribute('data-service-id');
    document.getElementById('modal-agendamento').style.display = 'block';
}

// Função para fechar o modal quando clicar fora dele
window.onclick = function(event) {
    var modal = document.getElementById('modal-agendamento');
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}

// Função para abrir o modal quando o botão "Agendar" é clicado
document.getElementById('botao-confir').onclick = function() {
    document.getElementById('modal-agendamento1').style.display = 'block';
}

// Função para fechar o modal quando clicar fora dele
window.onclick = function(event) {
    var modal = document.getElementById('modal-agendamento1');
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}
// função das categorias serviço 
function toggleOptio(nome) {
    var options = document.getElementsByClassName('optio');
    for (var i = 0; i < options.length; i++) {
        options[i].style.display = 'none';
    }
    var selectedOption = document.getElementById(nome + 'Optio');
    selectedOption.style.display = 'block';
}



/* Página de agendamento */

  
