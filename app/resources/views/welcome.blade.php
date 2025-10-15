@extends('layouts.base')

@section('title', 'Dashboard – Gestão de EPI')
@section('max-title', 'Painel de Controle')
@section('subtitle', 'Meus dados')

@push('styles')
<style>
    .form-section {
        background: #ffffff;
        border-radius: 8px;
        padding: 2rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    
    .section-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 1.5rem;
        padding-bottom: 0.75rem;
        border-bottom: 3px solid #28a745;
    }
    
    .form-label {
        font-weight: 500;
        color: #28a745;
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
    }
    
    .form-control, .form-select {
        border: 1px solid #dee2e6;
        border-radius: 6px;
        padding: 0.625rem 0.875rem;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: #28a745;
        box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.15);
    }
    
    .tags-container {
        background: #f8f9fa;
        border: 1px solid #dee2e6;
        border-radius: 6px;
        padding: 0.5rem;
        min-height: 50px;
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-top: 0.5rem;
    }
    
    .tag-item {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 20px;
        padding: 0.4rem 0.75rem;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.85rem;
        font-weight: 500;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: all 0.2s ease;
    }
    
    .tag-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }
    
    .tag-remove {
        cursor: pointer;
        background: rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        width: 20px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        transition: background 0.2s ease;
    }
    
    .tag-remove:hover {
        background: rgba(255, 255, 255, 0.5);
    }
    
    .form-check-input:checked {
        background-color: #28a745;
        border-color: #28a745;
    }
    
    .btn-add-tag {
        background: #28a745;
        color: white;
        border: none;
        border-radius: 6px;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        font-weight: bold;
        transition: all 0.3s ease;
        cursor: pointer;
    }
    
    .btn-add-tag:hover {
        background: #218838;
        transform: scale(1.05);
    }
    
    .btn-add-tag:disabled {
        background: #6c757d;
        cursor: not-allowed;
        opacity: 0.5;
    }
    
    .action-buttons {
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
        margin-top: 2rem;
    }
    
    .btn-action {
        padding: 0.75rem 2rem;
        font-size: 1rem;
        font-weight: 600;
        border-radius: 6px;
        border: none;
        transition: all 0.3s ease;
        cursor: pointer;
        min-width: 150px;
    }
    
    .btn-edit {
        background: #6c757d;
        color: white;
    }
    
    .btn-edit:hover {
        background: #5a6268;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    
    .btn-save {
        background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%);
        color: white;
    }
    
    .btn-save:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(243, 156, 18, 0.4);
    }
    
    .checkbox-label {
        font-weight: 500;
        color: #2c3e50;
        margin-left: 0.5rem;
    }
</style>
@endpush

@section('content')
<div class="container-fluid px-4 py-3">
    
    {{-- Seção: Dados do Militar --}}
    <div class="form-section">
        <h2 class="section-title">Dados do Militar</h2>
        
        <div class="row g-3">
            <div class="col-md-4">
                <label for="numbm" class="form-label">Nº</label>
                <input
                    type="text"
                    class="form-control"
                    id="numbm"
                    name="numbm"
                    maxlength="9"
                    value="{{ $user->numbm ?? '' }}"
                    placeholder="Digite apenas os números"
                />
            </div>
            
            <div class="col-md-4">
                <label for="namebm" class="form-label">Nome Completo</label>
                <input
                    type="text"
                    class="form-control"
                    id="namebm"
                    name="namebm"
                    value="{{ $user->nome_completo ?? '' }}"
                />
            </div>
            
            <div class="col-md-4">
                <label for="postgradbm" class="form-label">Posto/Graduação</label>
                <select class="form-select" id="postgradbm" name="postgradbm">
                    <option selected disabled>Escolha o Posto/Grad</option>
                    @foreach($postgrad_choices ?? [] as $key => $value)
                    <option value="{{ $key }}" {{ ($user->postgrad ?? '') == $key ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="row g-3 mt-2">
            <div class="col-md-4">
                <label for="firstinc" class="form-label">Data 1ª Inclusão</label>
                <input
                    type="text"
                    class="form-control"
                    id="firstinc"
                    name="firstinc"
                    value="{{ $user->date_include ?? '' }}"
                    readonly
                />
            </div>
            
            <div class="col-md-4">
                <label for="tempserv" class="form-label">Tempo de Serviço</label>
                <input
                    type="text"
                    class="form-control"
                    id="tempserv"
                    name="tempserv"
                    value="{{ $user->tempo_servico ?? '0 anos' }}"
                    readonly
                />
            </div>
            
            <div class="col-md-4">
                <label for="statusativ" class="form-label">Status</label>
                <select class="form-select" id="statusativ" name="statusativ">
                    <option selected disabled>Escolha o Status</option>
                    <option value="A" {{ ($user->status ?? '') == 'A' ? 'selected' : '' }}>Ativo</option>
                    <option value="I" {{ ($user->status ?? '') == 'I' ? 'selected' : '' }}>Inativo</option>
                </select>
            </div>
        </div>
        
        <div class="row g-3 mt-2">
            <div class="col-md-4">
                <label for="sitfunc" class="form-label">Situação Funcional</label>
                <select class="form-select" id="sitfunc" name="sitfunc">
                    <option>Escolha a Sit. Func.</option>
                    @foreach($choices_sitfunc ?? [] as $key => $value)
                    <option value="{{ $key }}" {{ ($user->sitfunc ?? '') == $key ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="col-md-4">
                <label for="sexo" class="form-label">Sexo</label>
                <select class="form-select" id="sexo" name="sexo">
                    <option value="M" {{ ($user->sexo ?? 'M') == 'M' ? 'selected' : '' }}>Masculino</option>
                    <option value="F" {{ ($user->sexo ?? '') == 'F' ? 'selected' : '' }}>Feminino</option>
                </select>
            </div>
            
            <div class="col-md-4">
                <label for="emailfunc" class="form-label">Email Funcional</label>
                <input
                    type="email"
                    class="form-control"
                    id="emailfunc"
                    name="emailfunc"
                    value="{{ $user->emailfunc ?? '' }}"
                    placeholder="exemplo@bombeiros.mg.gov.br"
                />
            </div>
        </div>
    </div>
    
    {{-- Seção: GTO e Atividades Especializadas --}}
    <div class="form-section">
        <h2 class="section-title">Atribuições e Especializações</h2>
        
        <div class="row g-3">
            {{-- GTO --}}
            <div class="col-md-6">
                <input type="hidden" id="gtos_own" name="gtos_own" value="{{ $user->gto ?? '' }}">
                <label for="compgto" class="form-label">GTO - Grupo Tático Operacional</label>
                <select class="form-select" id="compgto" name="compgto">
                    <option value="">Selecione um GTO</option>
                    <option value="Atendimento a Tentativa de Suicídio">Atendimento a Tentativa de Suicídio</option>
                    <option value="Atendimento Pré-Hospitalar">Atendimento Pré-Hospitalar</option>
                    <option value="Busca e Resgate em Estruturas Colapsadas">Busca e Resgate em Estruturas Colapsadas</option>
                    <option value="Busca, Resgate e Salvamento com Cães">Busca, Resgate e Salvamento com Cães</option>
                    <option value="Classificação Internacional">Classificação Internacional</option>
                    <option value="Incêndio Florestal">Incêndio Florestal</option>
                    <option value="Incêndio Urbano">Incêndio Urbano</option>
                    <option value="Investigação de Incêndio">Investigação de Incêndio</option>
                    <option value="Mergulho Autônomo / Salvamento Aquático">Mergulho Autônomo / Salvamento Aquático</option>
                    <option value="Movimentos de Massas, Enchentes e Inundações">Movimentos de Massas, Enchentes e Inundações</option>
                    <option value="Produtos Perigosos">Produtos Perigosos</option>
                    <option value="Proteção e Defesa Civil">Proteção e Defesa Civil</option>
                    <option value="Salvamento em Altura">Salvamento em Altura</option>
                    <option value="Salvamento Terrestre">Salvamento Terrestre</option>
                    <option value="Salvamento Veicular">Salvamento Veicular</option>
                </select>
                <div class="tags-container" id="tags-input-gto"></div>
            </div>
            
            {{-- Atividade Especializada --}}
            <div class="col-md-6">
                <label class="form-label">Atividade Especializada</label>
                
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="atividadeEspecializadaCheckbox" 
                           {{ ($user->ativ_esp ?? '') == 'S' ? 'checked' : '' }}>
                    <label class="checkbox-label" for="atividadeEspecializadaCheckbox">
                        Exerce atividade especializada?
                    </label>
                </div>
                
                <div class="input-group mb-2">
                    <select class="form-select" id="atividadeSelect" disabled>
                        <option value="">Selecione uma Atividade</option>
                        <option value="Núcleo de Atenção e Resposta às Chuvas">Núcleo de Atenção e Resposta às Chuvas</option>
                        <option value="Núcleo de Incêndio Florestal">Núcleo de Incêndio Florestal</option>
                        <option value="Busca e Salvamento com Cães">Busca e Salvamento com Cães</option>
                        <option value="Perito de Incêndio e Explosão">Perito de Incêndio e Explosão</option>
                        <option value="Inspetor de Incêndio">Inspetor de Incêndio</option>
                        <option value="Motorresgate">Motorresgate</option>
                    </select>
                    <input type="text" class="form-control" id="docDesignInput" placeholder="Doc de Designação" disabled>
                    <button class="btn-add-tag" type="button" id="addAtividadeBtn" disabled>+</button>
                </div>
                
                <div class="tags-container" id="tags-atividade"></div>
                <input type="hidden" id="exp_own" name="exp_own" value="">
            </div>
        </div>
    </div>
    
    {{-- Seção: Unidade de Lotação --}}
    <div class="form-section">
        <h2 class="section-title">Unidade de Lotação</h2>
        
        <div class="row g-3">
            <div class="col-md-4">
                <label for="cob" class="form-label">COB</label>
                <input
                    type="text"
                    class="form-control"
                    id="cob"
                    name="cob"
                    value="{{ $user->cob ?? '' }}"
                    readonly
                />
            </div>
            
            <div class="col-md-4">
                <label for="uniprinc" class="form-label">Unidade Principal</label>
                <input
                    type="text"
                    class="form-control"
                    id="uniprinc"
                    name="uniprinc"
                    value="{{ $user->unid_princ ?? '' }}"
                    readonly
                />
            </div>
            
            <div class="col-md-4">
                <label for="uniloc" class="form-label">Unidade de Lotação</label>
                <input
                    type="text"
                    class="form-control"
                    id="uniloc"
                    name="uniloc"
                    value="{{ $user->unid_lot ?? '' }}"
                    readonly
                />
            </div>
        </div>
        
        <div class="row g-3 mt-2">
            <div class="col-md-4">
                <label for="priclassif" class="form-label">Classificação (Prioridade pela ITLF)</label>
                <select class="form-select" id="priclassif" name="priclassif">
                    <option value="A" {{ ($user->priorit ?? 'B') == 'A' ? 'selected' : '' }}>Alta</option>
                    <option value="M" {{ ($user->priorit ?? 'B') == 'M' ? 'selected' : '' }}>Média</option>
                    <option value="B" {{ ($user->priorit ?? 'B') == 'B' ? 'selected' : '' }}>Baixa</option>
                </select>
            </div>
        </div>
    </div>
    
    {{-- Botões de Ação --}}
    <div class="action-buttons">
        <button type="button" class="btn-action btn-edit">Editar</button>
        <button type="button" id="validateButton" class="btn-action btn-save">Salvar</button>
    </div>
    
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // ===== FUNÇÕES PARA GTO =====
        const tagsInputGTO = document.getElementById('tags-input-gto');
        const tagsSelectGTO = document.getElementById('compgto');
        const gtosOwnInput = document.getElementById('gtos_own');
        let gtoList = [];
        
        function loadInitialGtoTags(gtos_user) {
            if (gtos_user) {
                const gtos = gtos_user.split(';');
                gtos.forEach(function (gto) {
                    gto = gto.trim();
                    if (gto && !gtoTagExists(gto)) {
                        gtoList.push(gto);
                        renderGtoTag(gto);
                    }
                });
                updateGtoOwnInput();
            }
        }
        
        tagsSelectGTO.addEventListener('change', function () {
            const selectedGto = tagsSelectGTO.value.trim();
            if (selectedGto && !gtoTagExists(selectedGto)) {
                addGtoTag(selectedGto);
                tagsSelectGTO.value = '';
            }
        });
        
        function addGtoTag(text) {
            gtoList.push(text);
            renderGtoTag(text);
            updateGtoOwnInput();
        }
        
        function renderGtoTag(text) {
            const tagElement = document.createElement('span');
            tagElement.classList.add('tag-item');
            tagElement.innerHTML = `
                <span>${text}</span>
                <span class="tag-remove">×</span>
            `;
            
            tagElement.querySelector('.tag-remove').addEventListener('click', function () {
                removeGtoTag(text);
                tagsInputGTO.removeChild(tagElement);
            });
            
            tagsInputGTO.appendChild(tagElement);
        }
        
        function removeGtoTag(text) {
            const index = gtoList.indexOf(text);
            if (index > -1) {
                gtoList.splice(index, 1);
                updateGtoOwnInput();
            }
        }
        
        function updateGtoOwnInput() {
            gtosOwnInput.value = gtoList.join(';');
        }
        
        function gtoTagExists(text) {
            return gtoList.includes(text);
        }
        
        // Carregar GTOs iniciais
        const gtos_user = gtosOwnInput.value;
        if (gtos_user) {
            loadInitialGtoTags(gtos_user);
        }
        
        // ===== FUNÇÕES PARA ATIVIDADES ESPECIALIZADAS =====
        const checkbox = document.getElementById('atividadeEspecializadaCheckbox');
        const atividadeSelect = document.getElementById('atividadeSelect');
        const docDesignInput = document.getElementById('docDesignInput');
        const addAtividadeBtn = document.getElementById('addAtividadeBtn');
        const tagsAtividadeInput = document.getElementById('tags-atividade');
        const expOwnInput = document.getElementById('exp_own');
        let atividadeList = [];
        
        function loadInitialTags(ativ_esps) {
            const atividades = ativ_esps.split(';');
            atividades.forEach(function (atividade) {
                if (atividade.trim() && !atividadeTagExists(atividade)) {
                    atividadeList.push(atividade);
                    renderAtividadeTag(atividade);
                }
            });
            updateExpOwnInput();
        }
        
        checkbox.addEventListener('change', function () {
            const isChecked = checkbox.checked;
            atividadeSelect.disabled = !isChecked;
            docDesignInput.disabled = !isChecked;
            addAtividadeBtn.disabled = !isChecked;
        });
        
        addAtividadeBtn.addEventListener('click', function () {
            const atividade = atividadeSelect.value.trim();
            const docDesign = docDesignInput.value.trim();
            
            if (!atividade || !docDesign) {
                alert('Por favor, preencha ambos os campos.');
                return;
            }
            
            const tagText = `${atividade} - ${docDesign}`;
            addAtividadeTag(tagText);
            
            atividadeSelect.value = '';
            docDesignInput.value = '';
        });
        
        function addAtividadeTag(text) {
            if (atividadeTagExists(text)) return;
            
            atividadeList.push(text);
            renderAtividadeTag(text);
            updateExpOwnInput();
        }
        
        function renderAtividadeTag(text) {
            const tagElement = document.createElement('span');
            tagElement.classList.add('tag-item');
            tagElement.innerHTML = `
                <span>${text}</span>
                <span class="tag-remove">×</span>
            `;
            
            tagElement.querySelector('.tag-remove').addEventListener('click', function () {
                removeAtividadeTag(text);
                tagsAtividadeInput.removeChild(tagElement);
            });
            
            tagsAtividadeInput.appendChild(tagElement);
        }
        
        function removeAtividadeTag(text) {
            const index = atividadeList.indexOf(text);
            if (index > -1) {
                atividadeList.splice(index, 1);
            }
            updateExpOwnInput();
        }
        
        function updateExpOwnInput() {
            expOwnInput.value = atividadeList.join(';');
        }
        
        function atividadeTagExists(text) {
            return atividadeList.includes(text);
        }
        
        // Carregar atividades iniciais
        const ativ_esps = "{{ $user->list_ativ_esp ?? '' }}";
        if (ativ_esps && ativ_esps !== "None" && ativ_esps !== "") {
            loadInitialTags(ativ_esps);
        }
    });
</script>
@endpush
