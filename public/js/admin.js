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

// Mobile Sidebar Toggle
const mobileMenuBtn = document.getElementById('mobileMenuBtn');
const sidebar = document.querySelector('.admin-sidebar');
const overlay = document.getElementById('sidebarOverlay');

if (mobileMenuBtn && sidebar && overlay) {
    function toggleSidebar() {
        sidebar.classList.toggle('active');
        overlay.classList.toggle('active');
        document.body.style.overflow = sidebar.classList.contains('active') ? 'hidden' : '';
    }
    
    mobileMenuBtn.addEventListener('click', toggleSidebar);
    overlay.addEventListener('click', toggleSidebar);
}
