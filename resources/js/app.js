import './bootstrap';

// Выбираем все радио кнопки типа вопроса и привязываем к ним обработчик события 'change'
document.querySelectorAll('[id$="choice1"], [id$="choice2"], [id$="choice3"]').forEach((option) => {
    option.addEventListener('change', (event) => {
        // Получаем id вопроса
        let questionId = event.target.id.charAt(0);

        // Удаляем все дополнительные поля для текущего вопроса
        let inputDiv = document.getElementById('input_' + questionId);
        if (inputDiv) {
            inputDiv.remove();
        }

        let radioDiv = document.getElementById('radio_' + questionId);
        if (radioDiv) {
            radioDiv.remove();
        }

        let checkboxDiv = document.getElementById('checkbox_' + questionId);
        if (checkboxDiv) {
            checkboxDiv.remove();
        }

        // Создаем новый блок div в зависимости от выбранного типа вопроса
        let newDiv;
        switch(event.target.value) {
            case 'input':
                newDiv = createInputDiv(questionId);
                break;
            case 'one':
                newDiv = createRadioDiv(questionId);
                break;
            case 'multiple':
                newDiv = createCheckboxDiv(questionId);
                break;
        }

        // Добавляем новый div в DOM
        document.getElementById('q_' + questionId).appendChild(newDiv);
    });
});

// Функции для создания новых div
function createInputDiv(questionId) {
    let div = document.createElement('div');
    div.id = 'input_' + questionId;
    div.className = 'mb-3 choice';
    div.innerHTML = `
        <label for="correct_answer" class="block">Правильный ответ</label>
        <div class="relative mt-1 rounded-md shadow-sm">
            <input type="text" id="correct_answer_${questionId}" name="${questionId}_correct_answer" class="inputOk" required value=""/>
        </div>`;

    return div;
}

function createRadioDiv(questionId) {
    let div = document.createElement('div');
    div.id = 'radio_' + questionId;
    div.className = 'flex flex-col relative';
    div.innerHTML = `
        <div class="flex items-center mt-2">
            <input type="radio" name="${questionId}_choice" value="${questionId}_r_1" class="mr-4">
            <textarea name="${questionId}_choice_1" id="" rows="2" class="inputOk" required></textarea>
        </div>
        <div class="flex items-center mt-2">
            <input type="radio" name="${questionId}_choice" value="${questionId}_r_2" class="mr-4">
            <textarea name="${questionId}_choice_2" id="" rows="2" class="inputOk" required></textarea>
        </div>
        <div class="flex items-center mt-2">
            <input type="radio" name="${questionId}_choice" value="${questionId}_r_3" class="mr-4">
            <textarea name="${questionId}_choice_3" id="" rows="2" class="inputOk" required></textarea>
        </div>
        <p class="addCh">Добавить вариант</p><p class="delCh" style="display: none;">Удалить вариант</p>`;

        let addButton = div.querySelector('.addCh');
        let deleteButton = div.querySelector('.delCh');

        addButton.addEventListener('click', addChoiceHandler);
        deleteButton.addEventListener('click', deleteChoiceHandler);

    return div;
}

function createCheckboxDiv(questionId) {
    let div = document.createElement('div');
    div.id = 'checkbox_' + questionId;
    div.className = 'flex flex-col relative';
    div.innerHTML = `
        <div class="flex items-center mt-2">
            <input type="checkbox" name="${questionId}_choice[]" value="${questionId}_ch_1" class="mr-4 rounded">
            <textarea name="${questionId}_choice_1" id="" rows="2" class="inputOk" required></textarea>
        </div>
        <div class="flex items-center mt-2">
            <input type="checkbox" name="${questionId}_choice[]" value="${questionId}_ch_2" class="mr-4 rounded">
            <textarea name="${questionId}_choice_2" id="" rows="2" class="inputOk" required></textarea>
        </div>
        <div class="flex items-center mt-2">
            <input type="checkbox" name="${questionId}_choice[]" value="${questionId}_ch_3" class="mr-4 rounded">
            <textarea name="${questionId}_choice_3" id="" rows="2" class="inputOk" required></textarea>
        </div>
        <div class="flex items-center mt-2">
            <input type="checkbox" name="${questionId}_choice[]" value="${questionId}_ch_4" class="mr-4 rounded">
            <textarea name="${questionId}_choice_4" id="" rows="2" class="inputOk" required></textarea>
        </div>
        <p class="addCh">Добавить вариант</p><p class="delCh" style="display: none;">Удалить вариант</p>`;

        let addButton = div.querySelector('.addCh');
        let deleteButton = div.querySelector('.delCh');

        addButton.addEventListener('click', addChoiceHandler);
        deleteButton.addEventListener('click', deleteChoiceHandler);

    return div;
}

function addChoiceHandler(event) {
    event.preventDefault();
    const questionDiv = event.target.parentElement;
    const lastChoiceDiv = questionDiv.querySelectorAll('div')[questionDiv.querySelectorAll('div').length - 1];
    const clonedDiv = lastChoiceDiv.cloneNode(true);
    let inputElement = clonedDiv.querySelector('input');
    let textAreaElement = clonedDiv.querySelector('textarea');

    let inputValueParts = inputElement.value.split('_');
    inputValueParts[inputValueParts.length - 1] = parseInt(inputValueParts[inputValueParts.length - 1]) + 1;
    inputElement.value = inputValueParts.join('_');

    let textAreaNameParts = textAreaElement.name.split('_');
    textAreaNameParts[textAreaNameParts.length - 1] = parseInt(textAreaNameParts[textAreaNameParts.length - 1]) + 1;
    textAreaElement.name = textAreaNameParts.join('_');

    questionDiv.insertBefore(clonedDiv, event.target);

    let maxChoices = questionDiv.id.startsWith('radio_') ? 3 : 4;

    if(questionDiv.querySelectorAll('div').length > maxChoices) {
        questionDiv.querySelector('.delCh').style.display = 'block';
    }
}

function deleteChoiceHandler(event) {
    event.preventDefault();
    const questionDiv = event.target.parentElement;
    const lastChoiceDiv = questionDiv.querySelectorAll('div')[questionDiv.querySelectorAll('div').length - 1];

    let maxChoices = questionDiv.id.startsWith('radio_') ? 3 : 4;

    if(questionDiv.querySelectorAll('div').length > maxChoices) {
        questionDiv.removeChild(lastChoiceDiv);
    }

    if(questionDiv.querySelectorAll('div').length === maxChoices) {
        questionDiv.querySelector('.delCh').style.display = 'none';
    }
}


