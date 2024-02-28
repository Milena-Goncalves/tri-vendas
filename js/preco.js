document.getElementById('price').addEventListener('input', function (e) {
    var input = e.target.value.replace(/[\D]/g, ''); // Remove tudo que não é dígito
    var num = parseInt(input, 10);

    if (isNaN(num)) {
        e.target.value = '';
    } else {
        var valor = (num / 100).toFixed(2);
        e.target.value = valor + '€';
    }
});