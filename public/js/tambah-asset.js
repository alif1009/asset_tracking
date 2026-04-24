const openBtn = document.getElementById("openModal");
const modal = document.getElementById("modal");
const closeBtn = document.getElementById("closeModal");

openBtn.onclick = () => modal.classList.replace("hidden", "flex");
closeBtn.onclick = () => modal.classList.replace("flex", "hidden");

modal.onclick = (e) => {
    if (e.target === modal) modal.classList.replace("flex", "hidden");
};