<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todolist</title>
    @vite([
        'resources/css/index2.css',
        'resources/js/app.js'
    ])
</head>

<body>
    <section>
        <header>
            <div class="logo">
                <img src="{{ Vite::asset('resources/views/rocket.svg') }}" width="22" height="36" alt="rocket-icon">
                <h1>to<span>do</span></h1>
            </div>
        </header>

        <div class="task-input">
            <input id="task-input" type="text" placeholder="Adicione uma nova tarefa">

            <button id="add-task" type="submit" class="create-btn">
                Criar
                <img src="{{ Vite::asset('resources/views/plus.svg') }}" width="16" height="16" alt="plus-icon">
            </button>
        </div>

        <div class="all">
            <div class="h2-h3">
                <h2>
                    Tarefas criadas
                    <span id="total" class="zero">0</span>
                </h2>

                <h3>
                    Concluídas
                    <span id="completed" class="zero">0</span>
                </h3>
            </div>

            <!-- ✅ ESTADO VAZIO (controlado pelo JS) -->
            <div class="empty-state">
                <hr>

                <div class="aaa">
                    <img src="{{ Vite::asset('resources/views/clipboard.svg') }}" width="56" height="56"
                        alt="clipboard-icon">

                    <p>Você ainda não tem tarefas cadastradas</p>
                    <span>Crie tarefas e organize seus itens a fazer</span>
                </div>
            </div>

            <!-- ✅ LISTA DE TAREFAS -->
            <div class="tasks-container"></div>
            
        </div>
    </section>
</body>

</html>

{{-- criar um component pra esse arquivo --}}