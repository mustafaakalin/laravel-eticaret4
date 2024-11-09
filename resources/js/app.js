import './bootstrap';

document.addEventListener('DOMContentLoaded', function () {
    window.addEventListener('toast', event => {
        const { message } = event.detail;
        // DaisyUI toast bildirimini göstermek için buraya kod ekleyin
        const toast = document.createElement('div');
        toast.classList.add('toast', '');
        toast.innerHTML = `<div class="alert alert-success">${message}</div>`;
        document.body.appendChild(toast);

        setTimeout(() => {
            toast.remove();
        }, 3000); // 3 saniye sonra toast'ı kaldır
    });
});
