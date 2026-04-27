<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todolist</title>
    @vite([
        'resources/css/register.css'
    ])
</head>

<body>
    <main>
        <header>
            <div class="logo">
                <img src="{{ Vite::asset('resources/views/rocket.svg') }}" width="22" height="36" alt="rocket-icon">
                <h1>to<span>do</span></h1>
            </div>
        </header>
        <section>
            <div class="h2-p">
                <h2>Email verificado com sucesso!</h2>
            </div>
                <form class="infos" method="get" action="{{ route('todo.index') }}">
                <button type="submit">
                    Ir para a página inicial
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-arrow-right h-4 w-4 transition-transform group-hover:translate-x-1"
                            aria-hidden="true">
                            <path d="M5 12h14"></path>
                            <path d="m12 5 7 7-7 7"></path>
                        </svg>
                    </div>
                </button>
                </form>
        </section>
    </main>
</body>

</html>
