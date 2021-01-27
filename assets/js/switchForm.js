function companyFunction() {
    const company = document.getElementById('formCompany');
    const particular = document.getElementById('formParticular');

    if (company.style.display === 'none') {
        particular.style.display = 'none';
        company.style.display = 'block';
    } 
}
document.getElementById('switchCompany').addEventListener('click', companyFunction, false);

function particularFunction() {
    const particular = document.getElementById('formParticular');
    const company = document.getElementById('formCompany');

    if (particular.style.display === 'none') {
        company.style.display = 'none';
        particular.style.display = 'block';
    } 
}
document.getElementById('switchParticular').addEventListener('click', particularFunction, false);
