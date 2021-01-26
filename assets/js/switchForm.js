function myFunction() {
    const form1 = document.getElementById('formCompany');
    const form2 = document.getElementById('formParticular');
    const switchButton = document.getElementById('switch');

    if (switchButton.value === 'Formulaire - Je suis un particulier') {
        switchButton.value = 'Formulaire - Je suis une entreprise';
    } else {
        switchButton.value = 'Formulaire - Je suis un particulier';
    }

    if (form1.style.display === 'none') {
        form1.style.display = 'block';
    } else {
        form1.style.display = 'none';
    }
    if (form2.style.display === 'none') {
        form2.style.display = 'block';
    } else {
        form2.style.display = 'none';
    }
}

document.getElementById('switch').addEventListener('click', myFunction, false);
