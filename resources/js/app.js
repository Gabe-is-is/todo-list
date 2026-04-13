const input = document.getElementById("task-input");
const button = document.getElementById("add-task");

const tasksContainer = document.querySelector(".tasks-container");
const emptyState = document.querySelector(".empty-state");

const totalSpan = document.getElementById("total");
const completedSpan = document.getElementById("completed");

let tarefas = [];

function atualizarTela() {
    tasksContainer.innerHTML = "";

    // controla mensagem + hr
    if (tarefas.length === 0) {
        emptyState.style.display = "block";
    } else {
        emptyState.style.display = "none";
    }

    let concluidas = 0;

    tarefas.forEach((tarefa, index) => {
        const task = document.createElement("div");
        task.classList.add("task");

        // CHECK
        const check = document.createElement("button");
        check.classList.add("check");
        check.innerHTML = `<img src="/icons/check.svg" alt="check">`;

        check.onclick = () => {
            tarefa.concluida = !tarefa.concluida;
            atualizarTela();
        };

        // TEXTO
        const text = document.createElement("h4");
        text.classList.add("task-text");
        text.textContent = tarefa.texto;

        if (tarefa.concluida) {
            check.innerHTML = `<img src="/icons/done.svg" alt="done">`;
            text.style.textDecoration = "line-through";
            text.style.color = "#808080";
            concluidas++;
        }

        // DELETE
        const del = document.createElement("button");
        del.classList.add("delete");
        del.innerHTML = `<img src="/icons/trash.svg" alt="trash">`;

        del.onclick = () => {
            tarefas.splice(index, 1);
            atualizarTela();
        };

        task.appendChild(check);
        task.appendChild(text);
        task.appendChild(del);

        tasksContainer.appendChild(task);
    });

    totalSpan.textContent = tarefas.length;
    completedSpan.textContent = `${concluidas} de ${tarefas.length}`;
}

// criar tarefa
button.addEventListener("click", () => {
    const texto = input.value.trim();

    if (texto === "") return;

    tarefas.push({
        texto: texto,
        concluida: false
    });

    input.value = "";
    atualizarTela();
});