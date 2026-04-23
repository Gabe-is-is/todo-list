<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todolist</title>
    @vite([
        'resources/css/login.css'
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
                <h2>Recuperar senha</h2>
                <p>Preencha o campo abaixo para recuperar a sua senha</p>
            </div>
            <form class="infos" method="post" action="{{ route('login.create') }}">
                <div class="nome">
                    @error('email')
                        <span>{{ $message }}</span>
                    @enderror
                    <h3>E-mail</h3>
                    <div class="input-container">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="lucide lucide-mail absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-muted-foreground"
                                aria-hidden="true">
                                <path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7"></path>
                                <rect x="2" y="4" width="20" height="16" rx="2"></rect>
                            </svg>
                        </div>
                        <input placeholder="seu@email.com" name="email" type="text" value="{{ old("email") }}">
                    </div>
                </div>
                <button type="submit">
                    Recuperação de senha
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-arrow-right h-4 w-4 transition-transform group-hover:translate-x-1"
                            aria-hidden="true">
                            <path d="M5 12h14"></path>
                            <path d="m12 5 7 7-7 7"></path>
                        </svg>
                </button>
                <h4>Lembrou da sua senha? <span class="login"><a href="{{ route('login') }}">Faça o login</a></span></h4>
            </form>
        </section>
    </main>
</body>

</html>