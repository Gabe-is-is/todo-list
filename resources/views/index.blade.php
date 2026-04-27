<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todolist</title>
    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>

<body>
    <section class="section-dialog hidden" id="section-dialog">
        <article class="article-dialog" id="article-dialog">
            <div id="modal" class="dialog">
                <div id="modal-text">
                    <h2>Você tem certeza que deseja excluir esta tarefa?</h2>
                    <p>Esta ação não poderá ser desfeita!</p>
                </div>
                <div class="buttons">
                    <button id="confirm">Confirmar</button>
                    <button id="cancel">Cancelar</button>
                </div>
            </div>
        </article>
    </section>

    <section>
        <header>
            <div class="logo">
                <img src="{{ Vite::asset('resources/views/rocket.svg') }}" width="22" height="36" alt="rocket-icon">
                <h1>to<span>do</span></h1>
            </div>
        </header>
        <div class="organizer">
            <form class="task-input" action="{{ route('todo.create') }}" method="post">
                <input type="text" placeholder="Adicione uma nova tarefa" name="todo">
                @error('todo')
                    <span>{{ $message }}</span>
                @enderror
                <button type="submit">
                    Criar
                    <img class= "create" src="{{ Vite::asset('resources/views/plus.svg') }}" width="16" height="16" alt="plus-icon">
                </button>
            </form>
             <form action="{{ route('logout') }}" method="post">
                <button type="submit">
                    <img class="logout" src="{{ Vite::asset('resources/views/logout-svgrepo-com.svg') }}" width="16" height="16" alt="logout-icon">
                </button>
            </form>
        </div>
        <div class="all">
            <div class="h2-h3">
                <h2>Tarefas criadas<span class="zero">{{ count($todos) }}</span></h2>
                <h3>Concluídas<span class="zero">{{ $completed }}</span></h3>
            </div>
            @if (!count($todos))
                <hr>
                <div class="aaa">
                    <img src="{{ Vite::asset('resources/views/clipboard.svg') }}" width="56" height="56"
                        alt="clipboard-icon">
                    <p>Você ainda não tem tarefas cadastradas</p>
                    <span>Crie tarefas e organize seus itens a fazer</span>
                </div>
            @endif

            @foreach ($todos as $todo)
                <div class="task">
                    <form action="{{ route('todo.toggleConcluded', ['id' => $todo->id]) }}" method="post">
                        @method('PATCH')
                        <button class="toggle-btn @if ($todo->concluded) active @endif">
                        </button>
                    </form>
                    <div class="task-text">
                        <h4>{{ $todo->name }}</h4>
                    </div>
                    <form class="delete-form" action="{{ route('todo.delete', ['id' => $todo->id]) }}" method="post">
                        @method('DELETE')
                        <button class="icon-btn">
                            <img class="delete" src="{{ Vite::asset('resources/views/trash.svg') }}" width="24" height="24" alt="trash-icon">
                        </button>
                    </form>
                </div>
            @endforeach

        </div>
    </section>
</body>

</html>
