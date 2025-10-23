@extends('layouts.base')

@section('title', 'CIURB - EPIs')
@section('max-title', 'EPIs - CIURB')
@section('subtitle', 'Gestão de Equipamentos de Proteção Individual')

@push('styles')
<style>
    body {
        font-size: 14px;
        background-color: #e9ecef;
    }
    
    /* Force Bootstrap Grid */
    .row {
        display: flex;
        flex-wrap: wrap;
        margin-right: -0.75rem;
        margin-left: -0.75rem;
    }
    
    .col-md-6 {
        flex: 0 0 50%;
        max-width: 50%;
        padding-right: 0.75rem;
        padding-left: 0.75rem;
    }
    
    .col-md-3 {
        flex: 0 0 25%;
        max-width: 25%;
        padding-right: 0.75rem;
        padding-left: 0.75rem;
    }
    
    .col-md-4 {
        flex: 0 0 33.333333%;
        max-width: 33.333333%;
        padding-right: 0.75rem;
        padding-left: 0.75rem;
    }
    
    .col-md-12 {
        flex: 0 0 100%;
        max-width: 100%;
        padding-right: 0.75rem;
        padding-left: 0.75rem;
    }
    
    .col-12 {
        flex: 0 0 100%;
        max-width: 100%;
        padding-right: 0.75rem;
        padding-left: 0.75rem;
    }
    
    .col-8 {
        flex: 0 0 66.666667%;
        max-width: 66.666667%;
        padding-right: 0.375rem;
        padding-left: 0.375rem;
    }
    
    .col-4 {
        flex: 0 0 33.333333%;
        max-width: 33.333333%;
        padding-right: 0.375rem;
        padding-left: 0.375rem;
    }
    
    /* Barra de Notificações */
    .notifications-bar {
        background-color: #3c3c3c;
        border-radius: 8px;
        padding: 15px;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 30px;
        width: 100%;
        margin-bottom: 30px;
    }
    
    .notification-icon {
        position: relative;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: transform 0.2s;
    }
    
    .notification-icon:hover {
        transform: scale(1.1);
    }
    
    .notification-calendar {
        background-color: #2196F3;
    }
    
    .notification-checklist {
        background-color: #4CAF50;
    }
    
    .notification-truck {
        background-color: #F44336;
    }
    
    .notification-globe {
        background-color: #9E9E9E;
    }
    
    .notification-icon svg {
        width: 24px;
        height: 24px;
    }
    
    .badge-count {
        position: absolute;
        top: -5px;
        right: -5px;
        background-color: #FF5722;
        color: white;
        border-radius: 50%;
        width: 22px;
        height: 22px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 11px;
        font-weight: bold;
        border: 2px solid #3c3c3c;
    }
    
    /* Cards de EPIs */
    .custom-container {
        border-radius: 8px;
        overflow: hidden;
        margin-bottom: 1.5rem;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    
    .custom-header {
        background-color: #3c3c3c;
        color: #FFA500;
        padding: 12px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .custom-header h3 {
        margin: 0;
        font-weight: bold;
        font-size: 18px;
    }
    
    .button-custom {
        background-color: transparent;
        color: #FFA500;
        padding: 6px 16px;
        border: 1px solid #FFA500;
        border-radius: 4px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 13px;
    }
    
    .button-custom:hover {
        background-color: #FFA500;
        color: #3c3c3c;
    }
    
    .custom-form {
        background: linear-gradient(to bottom, #ffffff, #e0e0e0);
        padding: 20px;
    }
    
    .section-subtitle {
        font-weight: bold;
        color: #333;
        margin: 0;
        font-size: 15px;
    }
    
    .form-label {
        color: #FFA500;
        font-weight: 500;
        font-size: 13px;
        margin-bottom: 5px;
        display: block;
    }
    
    .form-control, .form-select {
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 13px;
        width: 100%;
        padding: 0.375rem 0.75rem;
    }
    
    .form-control-sm, .form-select-sm {
        padding: 0.25rem 0.5rem;
        font-size: 12px;
    }
    
    .form-check-label {
        color: #333;
        font-size: 13px;
    }
    
    .g-2 {
        margin-right: -0.375rem;
        margin-left: -0.375rem;
    }
    
    .g-2 > * {
        padding-right: 0.375rem;
        padding-left: 0.375rem;
    }
    
    /* Botões de ação */
    .btn-action {
        padding: 10px 30px;
        font-size: 14px;
        font-weight: 600;
        border-radius: 5px;
        border: none;
        transition: all 0.3s ease;
        cursor: pointer;
    }
    
    .btn-cancel {
        background-color: #6c757d;
        color: white;
    }
    
    .btn-cancel:hover {
        background-color: #5a6268;
    }
    
    .btn-save {
        background-color: #FFA500;
        color: white;
    }
    
    .btn-save:hover {
        background-color: #e69500;
    }
</style>
@endpush

@section('content')
<div class="container-fluid px-4 py-3">
    
    {{-- Barra de Notificações com Ícones --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="notifications-bar">
                <div class="notification-icon notification-calendar" data-bs-toggle="modal" data-bs-target="#modalNotificacaoGeral" title="Notificações Gerais">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" viewBox="0 0 16 16">
                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v1h14V3a1 1 0 0 0-1-1H2zm13 3H1v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V5z"/>
                        <path d="M11 7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                    </svg>
                    <span class="badge-count">1</span>
                </div>
                <div class="notification-icon notification-checklist" data-bs-toggle="modal" data-bs-target="#modalNotificacaoChecklist" title="Checklist">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" viewBox="0 0 16 16">
                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                        <path d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                    </svg>
                    <span class="badge-count">1</span>
                </div>
                <div class="notification-icon notification-truck" data-bs-toggle="modal" data-bs-target="#modalNotificacaoEntrega" title="Entregas Pendentes">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" viewBox="0 0 16 16">
                        <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                    </svg>
                    <span class="badge-count">2</span>
                </div>
                <div class="notification-icon notification-globe" data-bs-toggle="modal" data-bs-target="#modalNotificacaoGlobal" title="Notificações do Sistema">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" viewBox="0 0 16 16">
                        <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12H5.145zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5H3.82zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933zM8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855.173-.324.33-.682.468-1.068H8.5zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5h2.49zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4h2.355z"/>
                    </svg>
                    <span class="badge-count">1</span>
                </div>
            </div>
        </div>
    </div>
    
    <form method="POST" action="{{ route('ciurb.update') }}">
        @csrf
        
        {{-- Primeira linha: Conjunto e Capacete --}}
        <div class="row">
            {{-- CONJUNTO --}}
            <div class="col-md-6">
                <div class="custom-container">
                    <div class="custom-header">
                        <h3>Conjunto</h3>
                        <button type="button" class="button-custom" data-bs-toggle="modal" data-bs-target="#modalMedidas" data-img-url="/img/conjunto.png">
                            Medidas
                        </button>
                    </div>
                    <div class="custom-form">
                        {{-- Primeira linha: Possui/Não Possui e Título --}}
                        <div class="row mb-3">
                            <div class="col-md-6 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="conjunto_possui" id="possuiconjunto" value="1" {{ ($episCiurb['conjunto']['possui'] ?? true) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="possuiconjunto">Possui</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="conjunto_possui" id="naopossuiconjunto" value="0" {{ !($episCiurb['conjunto']['possui'] ?? true) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="naopossuiconjunto">Não possui</label>
                                </div>
                            </div>
                            <div class="col-md-6 text-end">
                                <h5 class="section-subtitle">Dados do Equipamento</h5>
                            </div>
                        </div>
                        
                        {{-- Segunda linha: Medidas e Marca/Modelo --}}
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <h5 class="section-subtitle">Medidas</h5>
                            </div>
                            <div class="col-md-3">
                                <label for="conjunto_marca" class="form-label">Marca</label>
                                <input type="text" class="form-control" id="conjunto_marca" name="conjunto_marca" value="{{ $episCiurb['conjunto']['marca'] ?? '' }}">
                            </div>
                            <div class="col-md-3">
                                <label for="conjunto_modelo" class="form-label">Modelo</label>
                                <input type="text" class="form-control" id="conjunto_modelo" name="conjunto_modelo" value="{{ $episCiurb['conjunto']['modelo'] ?? '' }}">
                            </div>
                        </div>
                        
                        {{-- Terceira linha: Jaqueta e Ano de Fabricação --}}
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="conjunto_jaqueta" class="form-label">Jaqueta</label>
                                <div class="row g-2">
                                    <div class="col-8">
                                        <select class="form-select form-select-sm" id="conjunto_jaqueta" name="conjunto_jaqueta">
                                            <option value="">Selecione</option>
                                            <option value="pequeno" {{ ($episCiurb['conjunto']['jaqueta_tamanho'] ?? '') == 'pequeno' ? 'selected' : '' }}>Pequeno</option>
                                            <option value="medio" {{ ($episCiurb['conjunto']['jaqueta_tamanho'] ?? '') == 'medio' ? 'selected' : '' }}>Médio</option>
                                            <option value="grande" {{ ($episCiurb['conjunto']['jaqueta_tamanho'] ?? '') == 'grande' ? 'selected' : '' }}>Grande</option>
                                            <option value="1extra" {{ ($episCiurb['conjunto']['jaqueta_tamanho'] ?? '') == '1extra' ? 'selected' : '' }}>1º Extra Grande</option>
                                            <option value="2extra" {{ ($episCiurb['conjunto']['jaqueta_tamanho'] ?? '') == '2extra' ? 'selected' : '' }}>2º Extra Grande</option>
                                            <option value="3extra" {{ ($episCiurb['conjunto']['jaqueta_tamanho'] ?? '') == '3extra' ? 'selected' : '' }}>3º Extra Grande</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <select class="form-select form-select-sm" name="conjunto_jaqueta_num">
                                            <option value="">-</option>
                                            @for($i = 0; $i <= 4; $i++)
                                                <option value="{{ $i }}" {{ ($episCiurb['conjunto']['jaqueta_numeracao'] ?? '') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="conjunto_ano" class="form-label">Ano de Fabricação</label>
                                <input type="number" class="form-control form-control-sm" id="conjunto_ano" name="conjunto_ano" maxlength="4" value="{{ $episCiurb['conjunto']['ano_fabricacao'] ?? '' }}">
                            </div>
                        </div>
                        
                        {{-- Quarta linha: Calça e Plano de Distribuição --}}
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="conjunto_calca" class="form-label">Calça</label>
                                <div class="row g-2">
                                    <div class="col-8">
                                        <select class="form-select form-select-sm" id="conjunto_calca" name="conjunto_calca">
                                            <option value="">Selecione</option>
                                            <option value="pequeno" {{ ($episCiurb['conjunto']['calca_tamanho'] ?? '') == 'pequeno' ? 'selected' : '' }}>Pequeno</option>
                                            <option value="medio" {{ ($episCiurb['conjunto']['calca_tamanho'] ?? '') == 'medio' ? 'selected' : '' }}>Médio</option>
                                            <option value="grande" {{ ($episCiurb['conjunto']['calca_tamanho'] ?? '') == 'grande' ? 'selected' : '' }}>Grande</option>
                                            <option value="1extra" {{ ($episCiurb['conjunto']['calca_tamanho'] ?? '') == '1extra' ? 'selected' : '' }}>1º Extra Grande</option>
                                            <option value="2extra" {{ ($episCiurb['conjunto']['calca_tamanho'] ?? '') == '2extra' ? 'selected' : '' }}>2º Extra Grande</option>
                                            <option value="3extra" {{ ($episCiurb['conjunto']['calca_tamanho'] ?? '') == '3extra' ? 'selected' : '' }}>3º Extra Grande</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <select class="form-select form-select-sm" name="conjunto_calca_num">
                                            <option value="">-</option>
                                            @for($i = 0; $i <= 4; $i++)
                                                <option value="{{ $i }}" {{ ($episCiurb['conjunto']['calca_numeracao'] ?? '') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Plano de Distribuição</label>
                                <div class="row g-2">
                                    <div class="col-4">
                                        <input type="text" class="form-control form-control-sm" name="conjunto_plano_ano" placeholder="Ano" value="{{ $episCiurb['conjunto']['plano_distribuicao'][0] ?? '' }}">
                                    </div>
                                    <div class="col-4">
                                        <input type="text" class="form-control form-control-sm" name="conjunto_plano_mes" placeholder="Mês" value="{{ $episCiurb['conjunto']['plano_distribuicao'][1] ?? '' }}">
                                    </div>
                                    <div class="col-4">
                                        <input type="text" class="form-control form-control-sm" name="conjunto_plano_dia" placeholder="Dia" value="{{ $episCiurb['conjunto']['plano_distribuicao'][2] ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        {{-- Quinta linha: Estado de Conservação e Prioridade --}}
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="conjunto_estado" class="form-label">Estado de Conservação</label>
                                <select class="form-select form-select-sm" id="conjunto_estado" name="conjunto_estado">
                                    <option value="">Selecione</option>
                                    <option value="otimo" {{ ($episCiurb['conjunto']['estado_conservacao'] ?? '') == 'otimo' ? 'selected' : '' }}>Ótimo</option>
                                    <option value="bom" {{ ($episCiurb['conjunto']['estado_conservacao'] ?? '') == 'bom' ? 'selected' : '' }}>Bom</option>
                                    <option value="razoavel" {{ ($episCiurb['conjunto']['estado_conservacao'] ?? '') == 'razoavel' ? 'selected' : '' }}>Razoável</option>
                                    <option value="ruim" {{ ($episCiurb['conjunto']['estado_conservacao'] ?? '') == 'ruim' ? 'selected' : '' }}>Ruim</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="conjunto_prioridade" class="form-label">Prioridade</label>
                                <select class="form-select form-select-sm" id="conjunto_prioridade" name="conjunto_prioridade">
                                    <option value="">Selecione</option>
                                    <option value="1" {{ ($episCiurb['conjunto']['prioridade'] ?? '') == '1' ? 'selected' : '' }}>1ª Prioridade</option>
                                    <option value="2" {{ ($episCiurb['conjunto']['prioridade'] ?? '') == '2' ? 'selected' : '' }}>2ª Prioridade</option>
                                    <option value="3" {{ ($episCiurb['conjunto']['prioridade'] ?? '') == '3' ? 'selected' : '' }}>3ª Prioridade</option>
                                    <option value="4" {{ ($episCiurb['conjunto']['prioridade'] ?? '') == '4' ? 'selected' : '' }}>4ª Prioridade</option>
                                </select>
                            </div>
                        </div>
                        
                        {{-- Sexta linha: Condição Analisada e Recebimento --}}
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Condição Analisada:</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="conjunto_condicao" id="conjunto_procede" value="procede" {{ ($episCiurb['conjunto']['condicao_analisada'] ?? '') == 'procede' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="conjunto_procede">Procede</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="conjunto_condicao" id="conjunto_nao_procede" value="nao_procede" {{ ($episCiurb['conjunto']['condicao_analisada'] ?? '') == 'nao_procede' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="conjunto_nao_procede">Não Procede</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-end h-100">
                                    <div class="form-check me-3">
                                        <input type="checkbox" class="form-check-input" id="conjunto_recebido" name="conjunto_recebido" value="1" {{ ($episCiurb['conjunto']['recebido'] ?? false) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="conjunto_recebido">Recebido</label>
                                    </div>
                                    <div class="flex-grow-1">
                                        <label for="conjunto_data_recebimento" class="form-label">Recebimento</label>
                                        <input type="date" class="form-control form-control-sm" id="conjunto_data_recebimento" name="conjunto_data_recebimento" value="{{ $episCiurb['conjunto']['data_recebimento'] ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- CAPACETE --}}
            <div class="col-md-6">
                <div class="custom-container">
                    <div class="custom-header">
                        <h3>Capacete</h3>
                        <div class="custom-inform">
                            <button type="button" class="button-custom" data-bs-toggle="modal" data-bs-target="#modalMedidas" data-img-url="/img/capacete.png">
                                Medidas
                            </button>
                        </div>
                    </div>
                    <div class="custom-form">
                        {{-- Possui/Não Possui --}}
                        <div class="row mb-3">
                            <div class="col-md-6 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="capacete_possui" id="possuicapacete" value="1" {{ ($episCiurb['capacete']['possui'] ?? true) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="possuicapacete">Possui</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="capacete_possui" id="naopossuicapacete" value="0" {{ !($episCiurb['capacete']['possui'] ?? true) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="naopossuicapacete">Não possui</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5 class="section-subtitle">Dados do Equipamento</h5>
                            </div>
                        </div>
                        
                        {{-- Características e Marca/Modelo --}}
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <h5 class="section-subtitle">Características</h5>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="capacete_marca" class="form-label">Marca</label>
                                        <input type="text" class="form-control" id="capacete_marca" name="capacete_marca" value="{{ $episCiurb['capacete']['marca'] ?? '' }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="capacete_modelo" class="form-label">Modelo</label>
                                        <input type="text" class="form-control" id="capacete_modelo" name="capacete_modelo" value="{{ $episCiurb['capacete']['modelo'] ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        {{-- Cor e Ano de Fabricação --}}
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="capacete_cor" class="form-label">Cor</label>
                                <select class="form-select" id="capacete_cor" name="capacete_cor">
                                    <option value="">Selecione</option>
                                    <option value="branco" {{ ($episCiurb['capacete']['cor'] ?? '') == 'branco' ? 'selected' : '' }}>Branco</option>
                                    <option value="vermelho" {{ ($episCiurb['capacete']['cor'] ?? '') == 'vermelho' ? 'selected' : '' }}>Vermelho</option>
                                    <option value="amarelo" {{ ($episCiurb['capacete']['cor'] ?? '') == 'amarelo' ? 'selected' : '' }}>Amarelo</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="capacete_ano" class="form-label">Ano de Fabricação</label>
                                <input type="number" class="form-control" id="capacete_ano" name="capacete_ano" maxlength="4" value="{{ $episCiurb['capacete']['ano_fabricacao'] ?? '' }}">
                            </div>
                        </div>
                        
                        {{-- Estado de Conservação e Prioridade --}}
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="capacete_estado" class="form-label">Estado de Conservação</label>
                                <select class="form-select" id="capacete_estado" name="capacete_estado">
                                    <option value="">Selecione</option>
                                    <option value="otimo" {{ ($episCiurb['capacete']['estado_conservacao'] ?? '') == 'otimo' ? 'selected' : '' }}>Ótimo</option>
                                    <option value="bom" {{ ($episCiurb['capacete']['estado_conservacao'] ?? '') == 'bom' ? 'selected' : '' }}>Bom</option>
                                    <option value="razoavel" {{ ($episCiurb['capacete']['estado_conservacao'] ?? '') == 'razoavel' ? 'selected' : '' }}>Razoável</option>
                                    <option value="ruim" {{ ($episCiurb['capacete']['estado_conservacao'] ?? '') == 'ruim' ? 'selected' : '' }}>Ruim</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="capacete_prioridade" class="form-label">Prioridade</label>
                                <select class="form-select" id="capacete_prioridade" name="capacete_prioridade">
                                    <option value="">Selecione</option>
                                    <option value="1" {{ ($episCiurb['capacete']['prioridade'] ?? '') == '1' ? 'selected' : '' }}>1ª Prioridade</option>
                                    <option value="2" {{ ($episCiurb['capacete']['prioridade'] ?? '') == '2' ? 'selected' : '' }}>2ª Prioridade</option>
                                    <option value="3" {{ ($episCiurb['capacete']['prioridade'] ?? '') == '3' ? 'selected' : '' }}>3ª Prioridade</option>
                                    <option value="4" {{ ($episCiurb['capacete']['prioridade'] ?? '') == '4' ? 'selected' : '' }}>4ª Prioridade</option>
                                </select>
                            </div>
                        </div>
                        
                        {{-- Plano de Distribuição --}}
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label">Plano de Distribuição</label>
                                <div class="row">
                                    <div class="col-4">
                                        <input type="text" class="form-control" name="capacete_plano_ano" placeholder="Ano" value="{{ $episCiurb['capacete']['plano_distribuicao'][0] ?? '' }}">
                                    </div>
                                    <div class="col-4">
                                        <input type="text" class="form-control" name="capacete_plano_mes" placeholder="Mês" value="{{ $episCiurb['capacete']['plano_distribuicao'][1] ?? '' }}">
                                    </div>
                                    <div class="col-4">
                                        <input type="text" class="form-control" name="capacete_plano_dia" placeholder="Dia" value="{{ $episCiurb['capacete']['plano_distribuicao'][2] ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        {{-- Condição Analisada e Recebimento --}}
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Condição Analisada:</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="capacete_condicao" id="capacete_procede" value="procede" {{ ($episCiurb['capacete']['condicao_analisada'] ?? '') == 'procede' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="capacete_procede">Procede</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="capacete_condicao" id="capacete_nao_procede" value="nao_procede" {{ ($episCiurb['capacete']['condicao_analisada'] ?? '') == 'nao_procede' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="capacete_nao_procede">Não Procede</label>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex flex-column justify-content-end">
                                <div class="d-flex justify-content-between align-items-end">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="capacete_recebido" name="capacete_recebido" value="1" {{ ($episCiurb['capacete']['recebido'] ?? false) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="capacete_recebido">Recebido</label>
                                    </div>
                                    <div style="flex: 1; margin-left: 15px;">
                                        <label for="capacete_data_recebimento" class="form-label">Recebimento</label>
                                        <input type="date" class="form-control" id="capacete_data_recebimento" name="capacete_data_recebimento" value="{{ $episCiurb['capacete']['data_recebimento'] ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- Segunda linha: Luva e Balaclava --}}
        <div class="row mt-4">
            {{-- LUVA --}}
            <div class="col-md-6">
                <div class="custom-container">
                    <div class="custom-header">
                        <h3>Luva</h3>
                        <div class="custom-inform">
                            <button type="button" class="button-custom" data-bs-toggle="modal" data-bs-target="#modalMedidas" data-img-url="/img/luva.png">
                                Medidas
                            </button>
                        </div>
                    </div>
                    <div class="custom-form">
                        {{-- Conteúdo similar aos anteriores --}}
                        <div class="row mb-3">
                            <div class="col-md-6 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="luva_possui" id="possuiluva" value="1" {{ ($episCiurb['luva']['possui'] ?? true) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="possuiluva">Possui</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="luva_possui" id="naopossuiluva" value="0" {{ !($episCiurb['luva']['possui'] ?? true) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="naopossuiluva">Não possui</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5 class="section-subtitle">Dados do Equipamento</h5>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <h5 class="section-subtitle">Medidas</h5>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="luva_marca" class="form-label">Marca</label>
                                        <input type="text" class="form-control" id="luva_marca" name="luva_marca" value="{{ $episCiurb['luva']['marca'] ?? '' }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="luva_modelo" class="form-label">Modelo</label>
                                        <input type="text" class="form-control" id="luva_modelo" name="luva_modelo" value="{{ $episCiurb['luva']['modelo'] ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="luva_circunferencia" class="form-label">Circunferência da mão</label>
                                <select class="form-select" id="luva_circunferencia" name="luva_circunferencia">
                                    <option value="">Selecione</option>
                                    <option value="pequeno" {{ ($episCiurb['luva']['circunferencia_mao'] ?? '') == 'pequeno' ? 'selected' : '' }}>Pequeno</option>
                                    <option value="medio" {{ ($episCiurb['luva']['circunferencia_mao'] ?? '') == 'medio' ? 'selected' : '' }}>Médio</option>
                                    <option value="grande" {{ ($episCiurb['luva']['circunferencia_mao'] ?? '') == 'grande' ? 'selected' : '' }}>Grande</option>
                                    <option value="1extra" {{ ($episCiurb['luva']['circunferencia_mao'] ?? '') == '1extra' ? 'selected' : '' }}>1º Extra Grande</option>
                                    <option value="2extra" {{ ($episCiurb['luva']['circunferencia_mao'] ?? '') == '2extra' ? 'selected' : '' }}>2º Extra Grande</option>
                                    <option value="3extra" {{ ($episCiurb['luva']['circunferencia_mao'] ?? '') == '3extra' ? 'selected' : '' }}>3º Extra Grande</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="luva_ano" class="form-label">Ano de Fabricação</label>
                                <input type="number" class="form-control" id="luva_ano" name="luva_ano" maxlength="4" value="{{ $episCiurb['luva']['ano_fabricacao'] ?? '' }}">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="luva_tamanho" class="form-label">Tamanho</label>
                                <select class="form-select" id="luva_tamanho" name="luva_tamanho">
                                    <option value="">Selecione</option>
                                    <option value="pequeno" {{ ($episCiurb['luva']['tamanho'] ?? '') == 'pequeno' ? 'selected' : '' }}>Pequeno</option>
                                    <option value="medio" {{ ($episCiurb['luva']['tamanho'] ?? '') == 'medio' ? 'selected' : '' }}>Médio</option>
                                    <option value="grande" {{ ($episCiurb['luva']['tamanho'] ?? '') == 'grande' ? 'selected' : '' }}>Grande</option>
                                    <option value="1extra" {{ ($episCiurb['luva']['tamanho'] ?? '') == '1extra' ? 'selected' : '' }}>1º Extra Grande</option>
                                    <option value="2extra" {{ ($episCiurb['luva']['tamanho'] ?? '') == '2extra' ? 'selected' : '' }}>2º Extra Grande</option>
                                    <option value="3extra" {{ ($episCiurb['luva']['tamanho'] ?? '') == '3extra' ? 'selected' : '' }}>3º Extra Grande</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Plano de Distribuição</label>
                                <div class="row">
                                    <div class="col-4">
                                        <input type="text" class="form-control" name="luva_plano_ano" placeholder="Ano" value="{{ $episCiurb['luva']['plano_distribuicao'][0] ?? '' }}">
                                    </div>
                                    <div class="col-4">
                                        <input type="text" class="form-control" name="luva_plano_mes" placeholder="Mês" value="{{ $episCiurb['luva']['plano_distribuicao'][1] ?? '' }}">
                                    </div>
                                    <div class="col-4">
                                        <input type="text" class="form-control" name="luva_plano_dia" placeholder="Dia" value="{{ $episCiurb['luva']['plano_distribuicao'][2] ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="luva_estado" class="form-label">Estado de Conservação</label>
                                <select class="form-select" id="luva_estado" name="luva_estado">
                                    <option value="">Selecione</option>
                                    <option value="otimo" {{ ($episCiurb['luva']['estado_conservacao'] ?? '') == 'otimo' ? 'selected' : '' }}>Ótimo</option>
                                    <option value="bom" {{ ($episCiurb['luva']['estado_conservacao'] ?? '') == 'bom' ? 'selected' : '' }}>Bom</option>
                                    <option value="razoavel" {{ ($episCiurb['luva']['estado_conservacao'] ?? '') == 'razoavel' ? 'selected' : '' }}>Razoável</option>
                                    <option value="ruim" {{ ($episCiurb['luva']['estado_conservacao'] ?? '') == 'ruim' ? 'selected' : '' }}>Ruim</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="luva_prioridade" class="form-label">Prioridade</label>
                                <select class="form-select" id="luva_prioridade" name="luva_prioridade">
                                    <option value="">Selecione</option>
                                    <option value="1" {{ ($episCiurb['luva']['prioridade'] ?? '') == '1' ? 'selected' : '' }}>1ª Prioridade</option>
                                    <option value="2" {{ ($episCiurb['luva']['prioridade'] ?? '') == '2' ? 'selected' : '' }}>2ª Prioridade</option>
                                    <option value="3" {{ ($episCiurb['luva']['prioridade'] ?? '') == '3' ? 'selected' : '' }}>3ª Prioridade</option>
                                    <option value="4" {{ ($episCiurb['luva']['prioridade'] ?? '') == '4' ? 'selected' : '' }}>4ª Prioridade</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Condição Analisada:</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="luva_condicao" id="luva_procede" value="procede" {{ ($episCiurb['luva']['condicao_analisada'] ?? '') == 'procede' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="luva_procede">Procede</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="luva_condicao" id="luva_nao_procede" value="nao_procede" {{ ($episCiurb['luva']['condicao_analisada'] ?? '') == 'nao_procede' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="luva_nao_procede">Não Procede</label>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex flex-column justify-content-end">
                                <div class="d-flex justify-content-between align-items-end">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="luva_recebido" name="luva_recebido" value="1" {{ ($episCiurb['luva']['recebido'] ?? false) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="luva_recebido">Recebido</label>
                                    </div>
                                    <div style="flex: 1; margin-left: 15px;">
                                        <label for="luva_data_recebimento" class="form-label">Recebimento</label>
                                        <input type="date" class="form-control" id="luva_data_recebimento" name="luva_data_recebimento" value="{{ $episCiurb['luva']['data_recebimento'] ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- BALACLAVA --}}
            <div class="col-md-6">
                <div class="custom-container">
                    <div class="custom-header">
                        <h3>Balaclava</h3>
                        <div class="custom-inform">
                            <button type="button" class="button-custom" data-bs-toggle="modal" data-bs-target="#modalMedidas" data-img-url="/img/balaclava.png">
                                Medidas
                            </button>
                        </div>
                    </div>
                    <div class="custom-form">
                        <div class="row mb-3">
                            <div class="col-md-6 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="balaclava_possui" id="possuibalaclava" value="1" {{ ($episCiurb['balaclava']['possui'] ?? true) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="possuibalaclava">Possui</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="balaclava_possui" id="naopossuibalaclava" value="0" {{ !($episCiurb['balaclava']['possui'] ?? true) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="naopossuibalaclava">Não possui</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5 class="section-subtitle">Dados do Equipamento</h5>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <h5 class="section-subtitle">Medidas</h5>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="balaclava_marca" class="form-label">Marca</label>
                                        <input type="text" class="form-control" id="balaclava_marca" name="balaclava_marca" value="{{ $episCiurb['balaclava']['marca'] ?? '' }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="balaclava_modelo" class="form-label">Modelo</label>
                                        <input type="text" class="form-control" id="balaclava_modelo" name="balaclava_modelo" value="{{ $episCiurb['balaclava']['modelo'] ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="balaclava_camadas" class="form-label">Camadas</label>
                                <select class="form-select" id="balaclava_camadas" name="balaclava_camadas">
                                    <option value="">Selecione</option>
                                    <option value="simples" {{ ($episCiurb['balaclava']['camadas'] ?? '') == 'simples' ? 'selected' : '' }}>Simples</option>
                                    <option value="dupla" {{ ($episCiurb['balaclava']['camadas'] ?? '') == 'dupla' ? 'selected' : '' }}>Dupla</option>
                                    <option value="tripla" {{ ($episCiurb['balaclava']['camadas'] ?? '') == 'tripla' ? 'selected' : '' }}>Tripla</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="balaclava_ano" class="form-label">Ano de Fabricação</label>
                                <input type="number" class="form-control" id="balaclava_ano" name="balaclava_ano" maxlength="4" value="{{ $episCiurb['balaclava']['ano_fabricacao'] ?? '' }}">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="balaclava_estado" class="form-label">Estado de Conservação</label>
                                <select class="form-select" id="balaclava_estado" name="balaclava_estado">
                                    <option value="">Selecione</option>
                                    <option value="otimo" {{ ($episCiurb['balaclava']['estado_conservacao'] ?? '') == 'otimo' ? 'selected' : '' }}>Ótimo</option>
                                    <option value="bom" {{ ($episCiurb['balaclava']['estado_conservacao'] ?? '') == 'bom' ? 'selected' : '' }}>Bom</option>
                                    <option value="razoavel" {{ ($episCiurb['balaclava']['estado_conservacao'] ?? '') == 'razoavel' ? 'selected' : '' }}>Razoável</option>
                                    <option value="ruim" {{ ($episCiurb['balaclava']['estado_conservacao'] ?? '') == 'ruim' ? 'selected' : '' }}>Ruim</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="balaclava_prioridade" class="form-label">Prioridade</label>
                                <select class="form-select" id="balaclava_prioridade" name="balaclava_prioridade">
                                    <option value="">Selecione</option>
                                    <option value="1" {{ ($episCiurb['balaclava']['prioridade'] ?? '') == '1' ? 'selected' : '' }}>1ª Prioridade</option>
                                    <option value="2" {{ ($episCiurb['balaclava']['prioridade'] ?? '') == '2' ? 'selected' : '' }}>2ª Prioridade</option>
                                    <option value="3" {{ ($episCiurb['balaclava']['prioridade'] ?? '') == '3' ? 'selected' : '' }}>3ª Prioridade</option>
                                    <option value="4" {{ ($episCiurb['balaclava']['prioridade'] ?? '') == '4' ? 'selected' : '' }}>4ª Prioridade</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label">Plano de Distribuição</label>
                                <div class="row">
                                    <div class="col-4">
                                        <input type="text" class="form-control" name="balaclava_plano_ano" placeholder="Ano" value="{{ $episCiurb['balaclava']['plano_distribuicao'][0] ?? '' }}">
                                    </div>
                                    <div class="col-4">
                                        <input type="text" class="form-control" name="balaclava_plano_mes" placeholder="Mês" value="{{ $episCiurb['balaclava']['plano_distribuicao'][1] ?? '' }}">
                                    </div>
                                    <div class="col-4">
                                        <input type="text" class="form-control" name="balaclava_plano_dia" placeholder="Dia" value="{{ $episCiurb['balaclava']['plano_distribuicao'][2] ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Condição Analisada:</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="balaclava_condicao" id="balaclava_procede" value="procede" {{ ($episCiurb['balaclava']['condicao_analisada'] ?? '') == 'procede' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="balaclava_procede">Procede</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="balaclava_condicao" id="balaclava_nao_procede" value="nao_procede" {{ ($episCiurb['balaclava']['condicao_analisada'] ?? '') == 'nao_procede' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="balaclava_nao_procede">Não Procede</label>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex flex-column justify-content-end">
                                <div class="d-flex justify-content-between align-items-end">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="balaclava_recebido" name="balaclava_recebido" value="1" {{ ($episCiurb['balaclava']['recebido'] ?? false) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="balaclava_recebido">Recebido</label>
                                    </div>
                                    <div style="flex: 1; margin-left: 15px;">
                                        <label for="balaclava_data_recebimento" class="form-label">Recebimento</label>
                                        <input type="date" class="form-control" id="balaclava_data_recebimento" name="balaclava_data_recebimento" value="{{ $episCiurb['balaclava']['data_recebimento'] ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- Terceira linha: Bota --}}
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="custom-container">
                    <div class="custom-header">
                        <h3>Bota</h3>
                        <div class="custom-inform">
                            <button type="button" class="button-custom" data-bs-toggle="modal" data-bs-target="#modalMedidas" data-img-url="/img/bota.png">
                                Medidas
                            </button>
                        </div>
                    </div>
                    <div class="custom-form">
                        <div class="row mb-3">
                            <div class="col-md-6 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bota_possui" id="possuibota" value="1" {{ ($episCiurb['bota']['possui'] ?? true) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="possuibota">Possui</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bota_possui" id="naopossuibota" value="0" {{ !($episCiurb['bota']['possui'] ?? true) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="naopossuibota">Não possui</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5 class="section-subtitle">Dados do Equipamento</h5>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <h5 class="section-subtitle">Medidas</h5>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="bota_marca" class="form-label">Marca</label>
                                        <input type="text" class="form-control" id="bota_marca" name="bota_marca" value="{{ $episCiurb['bota']['marca'] ?? '' }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="bota_modelo" class="form-label">Modelo</label>
                                        <input type="text" class="form-control" id="bota_modelo" name="bota_modelo" value="{{ $episCiurb['bota']['modelo'] ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="bota_tamanho" class="form-label">Tamanho</label>
                                <select class="form-select" id="bota_tamanho" name="bota_tamanho">
                                    <option value="">Selecione</option>
                                    @for($i = 35; $i <= 48; $i++)
                                        <option value="{{ $i }}" {{ ($episCiurb['bota']['tamanho'] ?? '') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="bota_ano" class="form-label">Ano de Fabricação</label>
                                <input type="number" class="form-control" id="bota_ano" name="bota_ano" maxlength="4" value="{{ $episCiurb['bota']['ano_fabricacao'] ?? '' }}">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="bota_estado" class="form-label">Estado de Conservação</label>
                                <select class="form-select" id="bota_estado" name="bota_estado">
                                    <option value="">Selecione</option>
                                    <option value="otimo" {{ ($episCiurb['bota']['estado_conservacao'] ?? '') == 'otimo' ? 'selected' : '' }}>Ótimo</option>
                                    <option value="bom" {{ ($episCiurb['bota']['estado_conservacao'] ?? '') == 'bom' ? 'selected' : '' }}>Bom</option>
                                    <option value="razoavel" {{ ($episCiurb['bota']['estado_conservacao'] ?? '') == 'razoavel' ? 'selected' : '' }}>Razoável</option>
                                    <option value="ruim" {{ ($episCiurb['bota']['estado_conservacao'] ?? '') == 'ruim' ? 'selected' : '' }}>Ruim</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="bota_prioridade" class="form-label">Prioridade</label>
                                <select class="form-select" id="bota_prioridade" name="bota_prioridade">
                                    <option value="">Selecione</option>
                                    <option value="1" {{ ($episCiurb['bota']['prioridade'] ?? '') == '1' ? 'selected' : '' }}>1ª Prioridade</option>
                                    <option value="2" {{ ($episCiurb['bota']['prioridade'] ?? '') == '2' ? 'selected' : '' }}>2ª Prioridade</option>
                                    <option value="3" {{ ($episCiurb['bota']['prioridade'] ?? '') == '3' ? 'selected' : '' }}>3ª Prioridade</option>
                                    <option value="4" {{ ($episCiurb['bota']['prioridade'] ?? '') == '4' ? 'selected' : '' }}>4ª Prioridade</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label">Plano de Distribuição</label>
                                <div class="row">
                                    <div class="col-4">
                                        <input type="text" class="form-control" name="bota_plano_ano" placeholder="Ano" value="{{ $episCiurb['bota']['plano_distribuicao'][0] ?? '' }}">
                                    </div>
                                    <div class="col-4">
                                        <input type="text" class="form-control" name="bota_plano_mes" placeholder="Mês" value="{{ $episCiurb['bota']['plano_distribuicao'][1] ?? '' }}">
                                    </div>
                                    <div class="col-4">
                                        <input type="text" class="form-control" name="bota_plano_dia" placeholder="Dia" value="{{ $episCiurb['bota']['plano_distribuicao'][2] ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Condição Analisada:</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bota_condicao" id="bota_procede" value="procede" {{ ($episCiurb['bota']['condicao_analisada'] ?? '') == 'procede' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="bota_procede">Procede</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bota_condicao" id="bota_nao_procede" value="nao_procede" {{ ($episCiurb['bota']['condicao_analisada'] ?? '') == 'nao_procede' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="bota_nao_procede">Não Procede</label>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex flex-column justify-content-end">
                                <div class="d-flex justify-content-between align-items-end">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="bota_recebido" name="bota_recebido" value="1" {{ ($episCiurb['bota']['recebido'] ?? false) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="bota_recebido">Recebido</label>
                                    </div>
                                    <div style="flex: 1; margin-left: 15px;">
                                        <label for="bota_data_recebimento" class="form-label">Recebimento</label>
                                        <input type="date" class="form-control" id="bota_data_recebimento" name="bota_data_recebimento" value="{{ $episCiurb['bota']['data_recebimento'] ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- Botões de ação --}}
        <div class="row mt-4">
            <div class="col-12">
                <div class="d-flex justify-content-end gap-3">
                    <button type="button" class="btn btn-action btn-cancel">Cancelar</button>
                    <button type="submit" class="btn btn-action btn-save">Salvar</button>
                </div>
            </div>
        </div>
    </form>
</div>

{{-- Modais de Notificações --}}
<div class="modal fade" id="modalNotificacaoGeral" tabindex="-1" aria-labelledby="modalNotificacaoGeralLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #fff; border-bottom: none;">
                <h5 class="modal-title" id="modalNotificacaoGeralLabel" style="color: #2196F3; font-weight: bold;">Notificação de Geral</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding: 30px;">
                <p style="color: #333; font-size: 15px; line-height: 1.6;">
                    Seu EPI foi classificado como entregue ✅. Caso não tenha recebido realize contato com o almoxarifado
                </p>
                <p style="color: #666; font-size: 13px; margin-top: 20px;">
                    <strong>Data:</strong> 24/09/2024
                </p>
            </div>
            <div class="modal-footer" style="border-top: none; justify-content: flex-end;">
                <button type="button" class="btn" data-bs-dismiss="modal" style="background-color: #6c757d; color: white; padding: 8px 20px; border-radius: 4px;">Fechar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalNotificacaoChecklist" tabindex="-1" aria-labelledby="modalNotificacaoChecklistLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #fff; border-bottom: none;">
                <h5 class="modal-title" id="modalNotificacaoChecklistLabel" style="color: #4CAF50; font-weight: bold;">Notificação de Checklist</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding: 30px;">
                <p style="color: #333; font-size: 15px; line-height: 1.6;">
                    Por favor, atualize suas informações de EPIs no sistema. Há campos pendentes de preenchimento.
                </p>
                <p style="color: #666; font-size: 13px; margin-top: 20px;">
                    <strong>Data:</strong> {{ date('d/m/Y') }}
                </p>
            </div>
            <div class="modal-footer" style="border-top: none; justify-content: flex-end;">
                <button type="button" class="btn" data-bs-dismiss="modal" style="background-color: #6c757d; color: white; padding: 8px 20px; border-radius: 4px;">Fechar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalNotificacaoEntrega" tabindex="-1" aria-labelledby="modalNotificacaoEntregaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #fff; border-bottom: none;">
                <h5 class="modal-title" id="modalNotificacaoEntregaLabel" style="color: #F44336; font-weight: bold;">Notificação de Entrega</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding: 30px;">
                <p style="color: #333; font-size: 15px; line-height: 1.6;">
                    Há 2 EPIs aguardando retirada no almoxarifado. Por favor, compareça no horário de expediente para retirada.
                </p>
                <ul style="color: #333; font-size: 14px; margin-top: 15px;">
                    <li>Conjunto CIURB - Lion X-TREME</li>
                    <li>Capacete MSA Cairns 1044</li>
                </ul>
                <p style="color: #666; font-size: 13px; margin-top: 20px;">
                    <strong>Data:</strong> {{ date('d/m/Y') }}
                </p>
            </div>
            <div class="modal-footer" style="border-top: none; justify-content: flex-end;">
                <button type="button" class="btn" data-bs-dismiss="modal" style="background-color: #6c757d; color: white; padding: 8px 20px; border-radius: 4px;">Fechar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalNotificacaoGlobal" tabindex="-1" aria-labelledby="modalNotificacaoGlobalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #fff; border-bottom: none;">
                <h5 class="modal-title" id="modalNotificacaoGlobalLabel" style="color: #9E9E9E; font-weight: bold;">Notificação Global</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding: 30px;">
                <p style="color: #333; font-size: 15px; line-height: 1.6;">
                    O sistema passará por manutenção programada no dia 30/10/2024 das 22h às 02h. Salve todas as informações antes deste horário.
                </p>
                <p style="color: #666; font-size: 13px; margin-top: 20px;">
                    <strong>Data:</strong> {{ date('d/m/Y') }}
                </p>
            </div>
            <div class="modal-footer" style="border-top: none; justify-content: flex-end;">
                <button type="button" class="btn" data-bs-dismiss="modal" style="background-color: #6c757d; color: white; padding: 8px 20px; border-radius: 4px;">Fechar</button>
            </div>
        </div>
    </div>
</div>

{{-- Modal para exibir imagens de medidas --}}
<div class="modal fade" id="modalMedidas" tabindex="-1" aria-labelledby="modalMedidasLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-custom modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #333; color: #FFA500;">
                <h5 class="modal-title fw-bold" id="modalMedidasLabel">Medidas do Equipamento</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img id="modal-image" src="" alt="Medidas" class="img-fluid" style="max-height: 70vh;">
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modalImage = document.getElementById('modal-image');
        const modal = document.getElementById('modalMedidas');
        
        modal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const imageUrl = button.getAttribute('data-img-url');
            modalImage.src = imageUrl;
        });
    });
</script>
@endpush
@endsection
