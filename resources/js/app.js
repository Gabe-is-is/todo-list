const modal = document.getElementById("modal");
const confirm = document.getElementById("confirm");
const cancel = document.getElementById("cancel");

const section = document.getElementById("section-dialog");
const article = document.getElementById("article-dialog");

let formtosend = null;

document.querySelectorAll(".delete-form").forEach((form) => {
    form.addEventListener("submit", function (e) {
        e.preventDefault();
        formtosend = form;

        section.classList.remove("hidden");
        section.classList.add("show");
    });
});

confirm.addEventListener("click", function () {
    if (formtosend) {
        formtosend.submit();
    }

    section.classList.remove("show");
    section.classList.add("hidden");
});

cancel.addEventListener("click", function () {
    formtosend = null;

    section.classList.remove("show");
    section.classList.add("hidden");
});

function closeModal(e) {
    const target = e.target;
    if (target === article) {
        section.classList.add("hidden");
        section.classList.remove("show");
    }
}

article.addEventListener("click", closeModal);

// criar uma tela de login