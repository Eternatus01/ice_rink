/**
 * Маска телефона: +7 (___) ___-__-__
 */
export function initPhoneMask(selector = 'input[name="phone"]') {
    const input = document.querySelector(selector);
    if (!input) return;

    input.addEventListener('input', (e) => {
        let value = e.target.value.replace(/\D/g, '');
        if (value.startsWith('8')) value = '7' + value.slice(1);
        if (value.startsWith('7')) value = value.slice(1);
        value = value.slice(0, 10);

        let formatted = '+7';
        if (value.length > 0) formatted += ' (' + value.slice(0, 3);
        if (value.length >= 3) formatted += ') ' + value.slice(3, 6);
        if (value.length >= 6) formatted += '-' + value.slice(6, 8);
        if (value.length >= 8) formatted += '-' + value.slice(8, 10);

        e.target.value = formatted;
    });

    input.addEventListener('focus', (e) => {
        if (e.target.value === '') e.target.value = '+7 (';
    });

    input.addEventListener('blur', (e) => {
        if (e.target.value === '+7 (' || e.target.value === '+7') e.target.value = '';
    });
}
