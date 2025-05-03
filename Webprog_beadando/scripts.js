// 15. public/js/scripts.js
document.getElementById("contactForm")?.addEventListener("submit", function(e) {
    const name = this.name.value.trim();
    const email = this.email.value.trim();
    const message = this.message.value.trim();
    if (!name || !email || !message || !email.includes("@")) {
        e.preventDefault();
        alert("Kérjük, minden mezőt helyesen töltsön ki.");
    }
});