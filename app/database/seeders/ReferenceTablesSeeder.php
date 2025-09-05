<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReferenceTablesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('postgrad_ref')->upsert([
            ['code'=>'sd2cl','label'=>'Sd 2ª Classe BM'],
            ['code'=>'sd','label'=>'Sd BM'],
            ['code'=>'cb','label'=>'Cb BM'],
            ['code'=>'3sgt','label'=>'3º Sgt BM'],
            ['code'=>'2sgt','label'=>'2º Sgt BM'],
            ['code'=>'1sgt','label'=>'1º Sgt BM'],
            ['code'=>'subten','label'=>'Sub Ten BM'],
            ['code'=>'2ten','label'=>'2º Ten BM'],
            ['code'=>'1ten','label'=>'1º Ten BM'],
            ['code'=>'cap','label'=>'Cap BM'],
            ['code'=>'maj','label'=>'Maj BM'],
            ['code'=>'tencel','label'=>'Ten Cel BM'],
            ['code'=>'cel','label'=>'Cel BM'],
        ], ['code'], ['label']);

        DB::table('status_ref')->upsert([
            ['code'=>'A','label'=>'Ativo'],
            ['code'=>'I','label'=>'Inativo'],
        ], ['code'], ['label']);

        DB::table('sitfunc_ref')->upsert([
            ['code'=>'1','label'=>'ATIVIDADE MEIO'],
            ['code'=>'2','label'=>'ATIVID.FIM NA SEDE'],
            ['code'=>'3','label'=>'ATIVID.FIM DESTACADO'],
            ['code'=>'4','label'=>'MATRICULADO EM CURSO'],
            ['code'=>'5','label'=>'RESERVA NAO REMUNERA'],
            ['code'=>'6','label'=>'RES. TEMPO SERVICO'],
            ['code'=>'7','label'=>'RES.TEMPO EFET. SERV'],
            ['code'=>'8','label'=>'RES.LIMITE IDADE'],
            ['code'=>'9','label'=>'RESERVA CARGO ELETIV'],
            ['code'=>'10','label'=>'RESERVA CARGO PUBLIC'],
            ['code'=>'11','label'=>'REFORMA LIMITE IDADE'],
            ['code'=>'12','label'=>'REFORMA INCAP.FISICA'],
            ['code'=>'13','label'=>'REFORMA DISCIPLINAR'],
            ['code'=>'14','label'=>'EXCLUIDO'],
            ['code'=>'15','label'=>'QOR DESIGNADO'],
            ['code'=>'16','label'=>'LIC.TRAT.PROP.SAUDE'],
            ['code'=>'17','label'=>'LIC.TRAT.PES.FAMILIA'],
            ['code'=>'18','label'=>'LIC.INTERESSE PARTIC'],
            ['code'=>'19','label'=>'AGREG.FIL.PART.POLIT'],
            ['code'=>'20','label'=>'AGREG.EXCEDER QUADRO'],
            ['code'=>'21','label'=>'DESERTOR'],
            ['code'=>'22','label'=>'AGREG. DISP.ORG.PUBL'],
            ['code'=>'23','label'=>'AGREG. EXTRAVIO'],
            ['code'=>'24','label'=>'AFAST.AG.TRANSF.INAT'],
            ['code'=>'25','label'=>'AG.CARGO PUB.S/VENC.'],
            ['code'=>'26','label'=>'AGREG.SUSP.EX.FUNCAO'],
            ['code'=>'27','label'=>'AGREG.CUMP SENT PENA'],
            ['code'=>'28','label'=>'AG. ELEICAO ANTES 98'],
            ['code'=>'29','label'=>'CONDENADO PREST.SERV'],
            ['code'=>'30','label'=>'PRESO A DISP JUSTICA'],
            ['code'=>'31','label'=>'SUBMETIDO A CJ'],
            ['code'=>'32','label'=>'APOSENTADO'],
            ['code'=>'33','label'=>'JUIZ / TJM'],
            ['code'=>'34','label'=>'F.C.DISP.FUN.PUBLICA'],
            ['code'=>'35','label'=>'INAT VENC OUT ORGAOS'],
            ['code'=>'36','label'=>'FERIAS'],
            ['code'=>'37','label'=>'FC AG. APOSENTADORIA'],
            ['code'=>'38','label'=>'LICENCA A GESTANTE'],
            ['code'=>'39','label'=>'PERDA DO POSTO/GRAD'],
            ['code'=>'40','label'=>'REF.VOLUNT. QOR/QPR'],
            ['code'=>'41','label'=>'REF.LIM.IDAD.QOR/QPR'],
            ['code'=>'42','label'=>'INAT PRESO/JUSTICA'],
            ['code'=>'43','label'=>'F.C.DISP.OUTRO ORGAO'],
            ['code'=>'44','label'=>'REFORMA P/ INVALIDEZ'],
            ['code'=>'45','label'=>'QPR DESIGNADO'],
            ['code'=>'46','label'=>'AG LIC.SAU.SUP 1 ANO'],
            ['code'=>'47','label'=>'QUADRO ESPECIALISTA'],
            ['code'=>'48','label'=>'CONDENADO/SEM SERVI'],
            ['code'=>'49','label'=>'PRESO JUST/SEM SERV'],
            ['code'=>'50','label'=>'INATIVA'],
            ['code'=>'51','label'=>'ART.12/EC 39/1999'],
            ['code'=>'52','label'=>'DISP CAUTELAR'],
            ['code'=>'53','label'=>'AG.CARGO PUB.C/VENC.'],
            ['code'=>'54','label'=>'PRACA ADIDO.AG.REF'],
            ['code'=>'55','label'=>'OFICIAL ADIDO AG REF'],
            ['code'=>'56','label'=>'PARCIALMENTE CAPAZ'],
            ['code'=>'57','label'=>'INTERD.JUDIC.-ATIVO'],
            ['code'=>'58','label'=>'AGR.ELEICAO POS 1998'],
            ['code'=>'59','label'=>'AGREGA ENTID. CLASSE'],
            ['code'=>'60','label'=>'MAT CURSO FORA CBMMG'],
            ['code'=>'61','label'=>'OFICIAL AG. 393 CPPM'],
            ['code'=>'62','label'=>'AG.ART.134/L.5301/69'],
            ['code'=>'63','label'=>'LIC.MED. NAO HOMOLOG'],
            ['code'=>'64','label'=>'AFASTADO JUDIC CBMMG'],
            ['code'=>'65','label'=>'REFORMA INTERDIÃO'],
            ['code'=>'66','label'=>'EX BM C/PROVENTO JUD'],
            ['code'=>'67','label'=>'PESSOAL DA SAUDE'],
            ['code'=>'68','label'=>'AGRG. DEC. JUDICIAL'],
            ['code'=>'69','label'=>'FUNCIONARIO CIVIL'],
            ['code'=>'70','label'=>'FORÇA NACIONAL'],
        ], ['code'], ['label']);

        DB::table('cargo_ref')->upsert([
            ['code'=>'A','label'=>'Administrador'],
            ['code'=>'U','label'=>'Usuário'],
        ], ['code'], ['label']);

        DB::table('sexo_ref')->upsert([
            ['code'=>'M','label'=>'Masculino'],
            ['code'=>'F','label'=>'Feminino'],
        ], ['code'], ['label']);

        DB::table('estado_conservacao_ref')->upsert([
            ['id'=>1,'code'=>'otimo','label'=>'Ótimo'],
            ['id'=>2,'code'=>'bom','label'=>'Bom'],
            ['id'=>3,'code'=>'razoavel','label'=>'Razoável'],
            ['id'=>4,'code'=>'ruim','label'=>'Ruim'],
        ], ['id'], ['code','label']);

        DB::table('epi_grupo')->upsert([
            ['id'=>1,'code'=>'ciurb','label'=>'EPI_CIURB'],
            ['id'=>2,'code'=>'multimissao','label'=>'EPI_MULTIMISSAO'],
            ['id'=>3,'code'=>'salvamento','label'=>'EPI_SALVAMENTO'],
            ['id'=>4,'code'=>'motorresgate','label'=>'EPI_MOTORRESGATE'],
        ], ['id'], ['code','label']);

        DB::table('epi_tipo_item')->upsert([
            ['id'=>1,'code'=>'jaqueta','label'=>'Jaqueta'],
            ['id'=>2,'code'=>'calca','label'=>'Calça'],
            ['id'=>3,'code'=>'capacete','label'=>'Capacete'],
            ['id'=>4,'code'=>'luva','label'=>'Luva'],
            ['id'=>5,'code'=>'balaclava','label'=>'Balaclava'],
            ['id'=>6,'code'=>'bota','label'=>'Bota'],
            ['id'=>7,'code'=>'capacete_aquatico','label'=>'Capacete Aquático'],
            ['id'=>8,'code'=>'capacete_altura','label'=>'Capacete de Altura'],
            ['id'=>9,'code'=>'luva_veicular','label'=>'Luva Veicular'],
        ], ['id'], ['code','label']);
    }
}
