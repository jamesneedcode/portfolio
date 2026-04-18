// Admin panel JS — minor enhancements

// Auto-dismiss alerts after 4s
document.querySelectorAll('.alert').forEach(alert => {
    setTimeout(() => {
        alert.style.transition = 'opacity 0.4s ease';
        alert.style.opacity = '0';
        setTimeout(() => alert.remove(), 400);
    }, 4000);
});

// Confirm delete (inline in forms, but also available globally)
window.confirmDelete = (msg) => confirm(msg || 'Are you sure you want to delete this?');
