<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EpiController extends Controller
{
    /**
     * Exibe a página de EPIs CIURB
     */
    public function ciurb()
    {
        // Dados mockados do usuário (posteriormente virá do Auth::user())
        $user = (object) [
            'numbm' => '123456',
            'nome' => 'João Silva',
            'nome_completo' => 'João Silva',
            'postgrad' => 'soldado',
            'cargo_code' => 'U', // U = Usuário, A = Administrador
        ];

        // Dados dos EPIs CIURB do usuário
        $episCiurb = [
            'conjunto' => [
                'possui' => true,
                'marca' => 'Lion',
                'modelo' => 'X-TREME',
                'jaqueta_tamanho' => 'grande',
                'jaqueta_numeracao' => '2',
                'calca_tamanho' => 'grande',
                'calca_numeracao' => '2',
                'ano_fabricacao' => '2020',
                'plano_distribuicao' => ['2023', '01', '15'],
                'estado_conservacao' => 'bom',
                'condicao_analisada' => 'procede',
                'recebido' => true,
                'data_recebimento' => '2023-01-20',
            ],
            'capacete' => [
                'possui' => true,
                'marca' => 'MSA',
                'modelo' => 'Cairns 1044',
                'cor' => 'amarelo',
                'ano_fabricacao' => '2021',
                'plano_distribuicao' => ['2023', '01', '15'],
                'estado_conservacao' => 'otimo',
                'condicao_analisada' => 'procede',
                'recebido' => true,
                'data_recebimento' => '2023-01-20',
            ],
            'luva' => [
                'possui' => true,
                'marca' => 'Dragon Fire',
                'modelo' => 'Alpha X',
                'circunferencia_mao' => 'grande',
                'tamanho' => 'grande',
                'ano_fabricacao' => '2022',
                'plano_distribuicao' => ['2023', '01', '15'],
                'estado_conservacao' => 'bom',
                'condicao_analisada' => 'procede',
                'recebido' => true,
                'data_recebimento' => '2023-01-20',
            ],
            'balaclava' => [
                'possui' => true,
                'marca' => 'Nomex',
                'modelo' => 'Pro-tech',
                'camadas' => 'dupla',
                'ano_fabricacao' => '2022',
                'plano_distribuicao' => ['2023', '01', '15'],
                'estado_conservacao' => 'otimo',
                'condicao_analisada' => 'procede',
                'recebido' => true,
                'data_recebimento' => '2023-01-20',
            ],
            'bota' => [
                'possui' => true,
                'marca' => 'Haix',
                'modelo' => 'Fire Hero 2',
                'tamanho' => '42',
                'ano_fabricacao' => '2021',
                'plano_distribuicao' => ['2023', '01', '15'],
                'estado_conservacao' => 'bom',
                'condicao_analisada' => 'procede',
                'recebido' => true,
                'data_recebimento' => '2023-01-20',
            ],
        ];

        // Notificações para o usuário
        $notificacoes = [
            ['tipo' => 'warning', 'mensagem' => 'Seu conjunto CIURB precisa de inspeção técnica'],
            ['tipo' => 'info', 'mensagem' => 'Novo plano de distribuição disponível'],
        ];

        return view('epis.ciurb', compact('user', 'episCiurb', 'notificacoes'));
    }

    /**
     * Exibe a página de EPIs Multimissão
     */
    public function multimissao()
    {
        // Dados mockados do usuário
        $user = (object) [
            'numbm' => '123456',
            'nome' => 'João Silva',
            'nome_completo' => 'João Silva',
            'postgrad' => 'soldado',
            'cargo_code' => 'U',
        ];

        // Dados dos EPIs Multimissão do usuário
        $episMultimissao = [
            'conjunto' => [
                'possui' => true,
                'marca' => '',
                'modelo' => '',
                'jaqueta_tamanho' => '',
                'jaqueta_numeracao' => '',
                'calca_tamanho' => '',
                'calca_numeracao' => '',
                'ano_fabricacao' => '',
                'plano_distribuicao' => ['', '', ''],
                'estado_conservacao' => '',
                'prioridade' => '',
                'condicao_analisada' => '',
                'recebido' => false,
                'data_recebimento' => '',
            ],
            'capacete' => [
                'possui' => true,
                'marca' => '',
                'modelo' => '',
                'cor' => '',
                'ano_fabricacao' => '',
                'plano_distribuicao' => ['', '', ''],
                'estado_conservacao' => '',
                'prioridade' => '',
                'condicao_analisada' => '',
                'recebido' => false,
                'data_recebimento' => '',
            ],
            'luva' => [
                'possui' => true,
                'marca' => '',
                'modelo' => '',
                'circunferencia_mao' => '',
                'tamanho' => '',
                'ano_fabricacao' => '',
                'plano_distribuicao' => ['', '', ''],
                'estado_conservacao' => '',
                'prioridade' => '',
                'condicao_analisada' => '',
                'recebido' => false,
                'data_recebimento' => '',
            ],
            'bota' => [
                'possui' => true,
                'marca' => '',
                'modelo' => '',
                'tamanho' => '',
                'ano_fabricacao' => '',
                'plano_distribuicao' => ['', '', ''],
                'estado_conservacao' => '',
                'prioridade' => '',
                'condicao_analisada' => '',
                'recebido' => false,
                'data_recebimento' => '',
            ],
        ];

        return view('epis.multimissao', compact('user', 'episMultimissao'));
    }

    /**
     * Atualiza os dados do EPI CIURB
     */
    public function updateCiurb(Request $request)
    {
        // Validação e salvamento dos dados
        // Implementar posteriormente
        
        return redirect()->route('ciurb')->with('success', 'Dados atualizados com sucesso!');
    }

    /**
     * Atualiza os dados do EPI Multimissão
     */
    public function updateMultimissao(Request $request)
    {
        // Validação e salvamento dos dados
        // Implementar posteriormente
        
        return redirect()->route('multimissao')->with('success', 'Dados atualizados com sucesso!');
    }

    /**
     * Exibe a página de EPIs SALVAMENTO
     */
    public function salvamento()
    {
        // Dados mockados do usuário
        $user = (object) [
            'numbm' => '123456',
            'nome' => 'João Silva',
            'nome_completo' => 'João Silva',
            'postgrad' => 'soldado',
            'cargo_code' => 'U',
        ];

        // Dados dos EPIs SALVAMENTO do usuário
        $episSalvamento = [
            'capacete_aquatico' => [
                'possui' => true,
                'marca' => 'Petzl',
                'modelo' => 'Vertex',
                'cor' => 'branco',
                'ano_fabricacao' => '2022',
                'plano_distribuicao' => ['2023', '01', '15'],
                'estado_conservacao' => 'otimo',
                'prioridade' => '1',
                'condicao_analisada' => 'procede',
                'recebido' => true,
                'data_recebimento' => '2023-01-20',
            ],
            'capacete_altura' => [
                'possui' => true,
                'marca' => 'Petzl',
                'modelo' => 'Alveo Best',
                'cor' => 'vermelho',
                'ano_fabricacao' => '2022',
                'plano_distribuicao' => ['2023', '01', '15'],
                'estado_conservacao' => 'bom',
                'prioridade' => '1',
                'condicao_analisada' => 'procede',
                'recebido' => true,
                'data_recebimento' => '2023-01-20',
            ],
            'luva' => [
                'possui' => true,
                'marca' => 'Raptor',
                'modelo' => 'Pro Grip',
                'circunferencia_mao' => 'medio',
                'tamanho' => 'grande',
                'ano_fabricacao' => '2022',
                'plano_distribuicao' => ['2023', '02', '10'],
                'estado_conservacao' => 'bom',
                'prioridade' => '2',
                'condicao_analisada' => 'procede',
                'recebido' => true,
                'data_recebimento' => '2023-02-15',
            ],
        ];

        return view('epis.salvamento', compact('user', 'episSalvamento'));
    }

    /**
     * Atualiza os dados do EPI Salvamento
     */
    public function updateSalvamento(Request $request)
    {
        // Validação e salvamento dos dados
        // Implementar posteriormente
        
        return redirect()->route('salvamento')->with('success', 'Dados atualizados com sucesso!');
    }
}
