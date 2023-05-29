
window.addEventListener('load', function() {
    let form = document.getElementById('testForm');
    form.addEventListener('submit', function(event) {
        let checkboxGroups = document.querySelectorAll('div.checkbox-group');
        for (let i = 0; i < checkboxGroups.length; i++) {
            let checkboxes = checkboxGroups[i].querySelectorAll('input[type=checkbox]');
            let checkedOne = Array.prototype.slice.call(checkboxes).some(x => x.checked);
            if (!checkedOne) {
                event.preventDefault(); // Prevent form from submitting
                alert('Вы пропустили вопрос с множественным выбором!\nПожалуйста, выберите хотя бы один ответ на вопрос.');
            }
        }
    });
});
