<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Gestão de EPI')</title>
    <meta name="theme-color" content="#202122" />

    {{-- CSS principal (preload para performance) --}}
    <link rel="preload" href="{{ asset('css/app.css') }}" as="style" onload="this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="{{ asset('css/app.css') }}"></noscript>

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .topbar__actions {
            margin-left: auto;
            display: flex;
            align-items: center;
        }
        
        .user-info {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 0.3rem;
            padding: 0.5rem 1rem;
        }
        
        .user-info__name {
            font-weight: 600;
            font-size: 0.85rem;
            color: #2c3e50;
        }
        
        .user-info__role {
            display: flex;
            align-items: center;
        }
        
        .badge {
            display: inline-block;
            padding: 0.2rem 0.6rem;
            border-radius: 10px;
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }
        
        .badge-admin {
            background: #dc3545;
            color: white;
            box-shadow: 0 2px 4px rgba(220, 53, 69, 0.3);
        }
        
        .badge-user {
            background: #007bff;
            color: white;
            box-shadow: 0 2px 4px rgba(0, 123, 255, 0.3);
        }
    </style>

    {{-- Espaço para CSS extra de páginas --}}
    @stack('styles')

    {{-- Favicon (ajuste seus caminhos) --}}
    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
</head>
<body class="no-js">
    <div class="app-shell">

        {{-- SIDEBAR (off-canvas no mobile, fixa no desktop) --}}
        <aside id="sidebar" class="sidebar" aria-label="Menu lateral">
            <div class="sidebar__brand">
                <a href="{{ route('home') }}" class="brand">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo CBMMG" width="40" height="40" loading="lazy">
                    <span>Gestão de EPI</span>
                </a>
            </div>

            <nav class="sidebar__nav" role="navigation">
                <ul class="nav">
                    <li class="nav__item">
                        <a class="nav__link" href="{{ route('home') }}">
                            <span class="nav__icon" aria-hidden="true">🏠</span>
                            <span>Meus dados</span>
                        </a>
                    </li>

                    <li class="nav__item">
                        <details class="nav__group">
                            <summary class="nav__summary">
                                <span class="nav__icon" aria-hidden="true">🧰</span>
                                <span>EPIs</span>
                                <span class="chev" aria-hidden="true"></span>
                            </summary>
                            <ul class="nav__sub">
                                <li><a class="nav__sublink" href="{{ route('ciurb') }}">CIURB</a></li>
                                <li><a class="nav__sublink" href="{{ route('multimissao') }}">Multimissão</a></li>
                                <li><a class="nav__sublink" href="{{ route('salvamento') }}">Salvamento</a></li>
                                <li><a class="nav__sublink" href="{{ route('motorresgate') }}">Motorresgate</a></li>
                            </ul>
                        </details>
                    </li>

                    <li class="nav__item">
                        <details class="nav__group">
                            <summary class="nav__summary">
                                <span class="nav__icon" aria-hidden="true">👨‍</span>
                                <span>ADMIN</span>
                                <span class="chev" aria-hidden="true"></span>
                            </summary>
                            <ul class="nav__sub">
                                <li><a class="nav__sublink" href="#">Dashboard</a></li>
                                <li><a class="nav__sublink" href="{{ route('listar_usuarios') }}">Gerenciar Usuários</a></li>
                                <li><a class="nav__sublink" href="{{ route('criaplano') }}">Plano de Aquisição</a></li>
                                <li><a class="nav__sublink" href="#">Plano de Distribuição</a></li>
                                <li><a class="nav__sublink" href="#">Configurações</a></li>
                            </ul>
                        </details>
                    </li>

                    <li class="nav__item">
                        <details class="nav__group">
                            <summary class="nav__summary">
                                <span class="nav__icon" aria-hidden="true">📦</span>
                                <span>ALMOX</span>
                                <span class="chev" aria-hidden="true"></span>
                            </summary>
                            <ul class="nav__sub">
                                <li><a class="nav__sublink" href="#">Gerenciar Usuários</a></li>
                                <li><a class="nav__sublink" href="#">Saída/Entrada EPIs</a></li>
                                <li><a class="nav__sublink" href="#">Notificações</a></li>
                                <li><a class="nav__sublink" href="#">Relatórios</a></li>
                            </ul>
                        </details>
                    </li>

                    <li class="nav__item">
                        <details class="nav__group">
                            <summary class="nav__summary">
                                <span class="nav__icon" aria-hidden="true">🏥</span>
                                <span>CSM</span>
                                <span class="chev" aria-hidden="true"></span>
                            </summary>
                            <ul class="nav__sub">
                                <li><a class="nav__sublink" href="#">Gerenciar Usuários</a></li>
                                <li><a class="nav__sublink" href="#">Saída/Entrada EPIs</a></li>
                                <li><a class="nav__sublink" href="#">Notificações</a></li>
                                <li><a class="nav__sublink" href="#">Relatórios</a></li>
                            </ul>
                        </details>
                    </li>

                    <li class="nav__item">
                        <details class="nav__group">
                            <summary class="nav__summary">
                                <span class="nav__icon" aria-hidden="true">⚙️</span>
                                <span>CONFIGURAÇÕES</span>
                                <span class="chev" aria-hidden="true"></span>
                            </summary>
                            <ul class="nav__sub">
                                <li><a class="nav__sublink" href="#">Perfil de Usuário</a></li>
                                <li><a class="nav__sublink" href="#">Preferências de Notificação</a></li>
                                <li><a class="nav__sublink" href="#">Logs de Acesso</a></li>
                            </ul>
                        </details>
                    </li>
                </ul>
            </nav>
        </aside>

        {{-- TOPBAR --}}
        <header class="topbar" role="banner">
            <button id="sidebarToggle" class="iconbtn" aria-controls="sidebar" aria-expanded="false" aria-label="Abrir menu">
                ☰
            </button>

            <div class="topbar__title">
                <h1 class="max-title">@yield('max-title', '')</h1>
            </div>

            <div class="topbar__actions">
                @if(isset($user) && isset($user->nome))
                    <div class="user-info">
                        <div class="user-info__name">{{ $user->nome ?? 'Usuário' }}</div>
                        <div class="user-info__role">
                            @if(($user->cargo_code ?? 'U') === 'A')
                                <span class="badge badge-admin">Administrador</span>
                            @else
                                <span class="badge badge-user">Usuário</span>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </header>

        {{-- BACKDROP para o sidebar no mobile --}}
        <div class="backdrop" id="backdrop" hidden></div>

        {{-- MAIN --}}
        <main id="main" class="main" role="main">
            @hasSection('subtitle')
                <div class="pagetitle">
                    <h2 class="subtitle">@yield('subtitle')</h2>
                </div>
            @endif

            {{-- Flash messages / alerts --}}
            <section class="alerts" aria-live="polite" aria-atomic="true">
                @foreach (['success','error','warning','info','status'] as $key)
                    @if(session($key))
                        <div class="alert alert--{{ $key }}">
                            <span>{{ session($key) }}</span>
                            <button class="alert__close" type="button" aria-label="Fechar" data-close>×</button>
                        </div>
                    @endif
                @endforeach

                @if($errors->any())
                    <div class="alert alert--error">
                        <ul class="m-0 p-0">
                            @foreach($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                        <button class="alert__close" type="button" aria-label="Fechar" data-close>×</button>
                    </div>
                @endif
            </section>

            {{-- Conteúdo da página --}}
            <section class="section">
                @yield('content')
            </section>
        </main>

        {{-- FOOTER --}}
        <footer class="footer" role="contentinfo">
            <div class="credits">Designed by Cleyton Batista</div>
        </footer>
    </div>

    {{-- Bootstrap JS Bundle (inclui Popper) --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    {{-- JS principal (defer para não bloquear renderização) --}}
    <script defer src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
