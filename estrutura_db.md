usuarios
    nome string
    postgrad=>
    (
        ('sd2cl', 'Sd 2ª Classe BM'),
        ('sd', 'Sd BM'),
        ('cb', 'Cb BM'),
        ('3sgt', '3º Sgt BM'),
        ('2sgt', '2º Sgt BM'),
        ('1sgt', '1º Sgt BM'),
        ('subten', 'Sub Ten BM'),
        ('2ten', '2º Ten BM'),
        ('1ten', '1º Ten BM'),
        ('cap', 'Cap BM'),
        ('maj', 'Maj BM'),
        ('tencel', 'Ten Cel BM'),
        ('cel', 'Cel BM'),
    )
    date_include date
    email string
    status
    (('A', 'Ativo'),
                      ('I', 'Inativo'),)
    sitfunc=>
    (('1', 'ATIVIDADE MEIO'),
                      ('2', 'ATIVID.FIM NA SEDE'),
                      ('3', 'ATIVID.FIM DESTACADO'),
                      ('4', 'MATRICULADO EM CURSO'),
                      ('5', 'RESERVA NAO REMUNERA'),
                      ('6', 'RES. TEMPO SERVICO'),
                      ('7', 'RES.TEMPO EFET. SERV'),
                      ('8', 'RES.LIMITE IDADE'),
                      ('9', 'RESERVA CARGO ELETIV'),
                      ('10', 'RESERVA CARGO PUBLIC'),
                      ('11', 'REFORMA LIMITE IDADE'),
                      ('12', 'REFORMA INCAP.FISICA'),
                      ('13', 'REFORMA DISCIPLINAR'),
                      ('14', 'EXCLUIDO'),
                      ('15', 'QOR DESIGNADO'),
                      ('16', 'LIC.TRAT.PROP.SAUDE'),
                      ('17', 'LIC.TRAT.PES.FAMILIA'),
                      ('18', 'LIC.INTERESSE PARTIC'),
                      ('19', 'AGREG.FIL.PART.POLIT'),
                      ('20', 'AGREG.EXCEDER QUADRO'),
                      ('21', 'DESERTOR'),
                      ('22', 'AGREG. DISP.ORG.PUBL'),
                      ('23', 'AGREG. EXTRAVIO'),
                      ('24', 'AFAST.AG.TRANSF.INAT'),
                      ('25', 'AG.CARGO PUB.S/VENC.'),
                      ('26', 'AGREG.SUSP.EX.FUNCAO'),
                      ('27', 'AGREG.CUMP SENT PENA'),
                      ('28', 'AG. ELEICAO ANTES 98'),
                      ('29', 'CONDENADO PREST.SERV'),
                      ('30', 'PRESO A DISP JUSTICA'),
                      ('31', 'SUBMETIDO A CJ'),
                      ('32', 'APOSENTADO'),
                      ('33', 'JUIZ / TJM'),
                      ('34', 'F.C.DISP.FUN.PUBLICA'),
                      ('35', 'INAT VENC OUT ORGAOS'),
                      ('36', 'FERIAS'),
                      ('37', 'FC AG. APOSENTADORIA'),
                      ('38', 'LICENCA A GESTANTE'),
                      ('39', 'PERDA DO POSTO/GRAD'),
                      ('40', 'REF.VOLUNT. QOR/QPR'),
                      ('41', 'REF.LIM.IDAD.QOR/QPR'),
                      ('42', 'INAT PRESO/JUSTICA'),
                      ('43', 'F.C.DISP.OUTRO ORGAO'),
                      ('44', 'REFORMA P/ INVALIDEZ'),
                      ('45', 'QPR DESIGNADO'),
                      ('46', 'AG LIC.SAU.SUP 1 ANO'),
                      ('47', 'QUADRO ESPECIALISTA'),
                      ('48', 'CONDENADO/SEM SERVI'),
                      ('49', 'PRESO JUST/SEM SERV'),
                      ('50', 'INATIVA'),
                      ('51', 'ART.12/EC 39/1999'),
                      ('52', 'DISP CAUTELAR'),
                      ('53', 'AG.CARGO PUB.C/VENC.'),
                      ('54', 'PRACA ADIDO.AG.REF'),
                      ('55', 'OFICIAL ADIDO AG REF'),
                      ('56', 'PARCIALMENTE CAPAZ'),
                      ('57', 'INTERD.JUDIC.-ATIVO'),
                      ('58', 'AGR.ELEICAO POS 1998'),
                      ('59', 'AGREGA ENTID. CLASSE'),
                      ('60', 'MAT CURSO FORA CBMMG'),
                      ('61', 'OFICIAL AG. 393 CPPM'),
                      ('62', 'AG.ART.134/L.5301/69'),
                      ('63', 'LIC.MED. NAO HOMOLOG'),
                      ('64', 'AFASTADO JUDIC CBMMG'),
                      ('65', 'REFORMA INTERDIÃO'),
                      ('66', 'EX BM C/PROVENTO JUD'),
                      ('67', 'PESSOAL DA SAUDE'),
                      ('68', 'AGRG. DEC. JUDICIAL'),
                      ('69', 'FUNCIONARIO CIVIL'),
                      ('70', 'FORÇA NACIONAL'),
                      )
    gto string
    ativ_esp string
    senha string
    cargo=>(('A', 'Administrador'),
                     ('U', 'Usuário'))
    numbm string
    cob string
    unid_lot string
    unid_princ string
    sexo=>
    (('M', 'Masculino'),
                   ('F', 'Feminino'))
    emailfunc string
    telefone string

Cada usuario deve ter:

EPI_CIURB
    conjunto
        jaqueta
            jaqueta_tamanho=>lista
            [
            ('Pequeno', 'Pequeno'), ('Médio', 'Médio'), ('Grande', 'Grande'),
            ('1º Extra Grande', '1º Extra Grande'), ('2º Extra Grande', '2º Extra Grande'),
            ('3º Extra Grande', '3º Extra Grande')
            ]
            jaqueta_complemento=>lista
            [
                0, 1, 2, 3, 4
            ]
        calca
            calca_tamanho=>lista
            [
            ('Pequeno', 'Pequeno'), ('Médio', 'Médio'), ('Grande', 'Grande'),
            ('1º Extra Grande', '1º Extra Grande'), ('2º Extra Grande', '2º Extra Grande'),
            ('3º Extra Grande', '3º Extra Grande')
            ]
            calca_complemento=>lista
            [
                0, 1, 2, 3, 4
            ]
        estado_concerv=>lista
        [
        ('Ótimo', 'Ótimo'), ('Bom', 'Bom'), ('Razoável', 'Razoável'), ('Ruim', 'Ruim')
        ]
        analise_procede=>boolean
        marca string
        modelo string
        ano_fabricacao int
        plano_distribuicao string
        recebido boolean
        date_recebido date

    capacete
        cor=>lista
        [
            ('B', 'Branco'), ('A', 'Amarelo'), ('V', 'Vermelho')
        ]
        estado_concerv=>lista
        [
        ('Ótimo', 'Ótimo'), ('Bom', 'Bom'), ('Razoável', 'Razoável'), ('Ruim', 'Ruim')
        ]
        analise_procede=>boolean
        marca string
        modelo string
        ano_fabricacao int
        plano_distribuicao string
        recebido boolean
        date_recebido date

    luva
        circunferencia_mao=>lista
        [
        ('12 a 15 cm', '12 a 15 cm'), ('18 a 19 cm', '18 a 19 cm'),
        ('19 a 20 cm', '19 a 20 cm'), ('20 a 21,5 cm', '20 a 21,5 cm'),
        ('21,5 a 23 cm', '21,5 a 23 cm'), ('23 a 25 cm', '23 a 25 cm'),
        ('25 a 28 cm', '25 a 28 cm'), ('28 a 30 cm', '28 a 30 cm')
        ]
        tamanho=>lista
        [
        ('Pequeno', 'Pequeno'), ('Médio', 'Médio'), ('Grande', 'Grande'),
        ('1º Extra Grande', '1º Extra Grande'), ('2º Extra Grande', '2º Extra Grande'),
        ('3º Extra Grande', '3º Extra Grande')
        ]
        estado_concerv=>lista
        [
        ('Ótimo', 'Ótimo'), ('Bom', 'Bom'), ('Razoável', 'Razoável'), ('Ruim', 'Ruim')
        ]
        analise_procede=>boolean
        marca string
        modelo string
        ano_fabricacao int
        plano_distribuicao string
        recebido boolean
        date_recebido date

    balaclava
        camadas=>lista
        [
        ('S', 'Simples'), ('D', 'Dupla'), ('T', 'Tripla')
        ]
        estado_concerv=>lista
        [
        ('Ótimo', 'Ótimo'), ('Bom', 'Bom'), ('Razoável', 'Razoável'), ('Ruim', 'Ruim')
        ]
        analise_procede=>boolean
        marca string
        modelo string
        ano_fabricacao int
        plano_distribuicao string
        recebido boolean
        date_recebido date

    bota
        tamanho=>lista
        [lista de 35 a 51]
        estado_concerv=>lista
        [
        ('Ótimo', 'Ótimo'), ('Bom', 'Bom'), ('Razoável', 'Razoável'), ('Ruim', 'Ruim')
        ]
        analise_procede=>boolean
        marca string
        modelo string
        ano_fabricacao int
        plano_distribuicao string
        recebido boolean
        date_recebido date

EPI_MULTIMISSAO
    conjunto
        jaqueta
            jaqueta_tamanho=>lista
            [
            ('Pequeno', 'Pequeno'), ('Médio', 'Médio'), ('Grande', 'Grande'),
            ('1º Extra Grande', '1º Extra Grande'), ('2º Extra Grande', '2º Extra Grande'),
            ('3º Extra Grande', '3º Extra Grande')
            ]
            jaqueta_complemento=>lista
            [
                0, 1, 2, 3, 4
            ]
        calca
            calca_tamanho=>lista
            [
            ('Pequeno', 'Pequeno'), ('Médio', 'Médio'), ('Grande', 'Grande'),
            ('1º Extra Grande', '1º Extra Grande'), ('2º Extra Grande', '2º Extra Grande'),
            ('3º Extra Grande', '3º Extra Grande')
            ]
            calca_complemento=>lista
            [
                0, 1, 2, 3, 4
            ]
        estado_concerv=>lista
        [
        ('Ótimo', 'Ótimo'), ('Bom', 'Bom'), ('Razoável', 'Razoável'), ('Ruim', 'Ruim')
        ]
        analise_procede=>boolean
        marca string
        modelo string
        ano_fabricacao int
        plano_distribuicao string
        recebido boolean
        date_recebido date

    capacete
        cor=>lista
        [
            ('B', 'Branco'), ('A', 'Amarelo'), ('V', 'Vermelho')
        ]
        estado_concerv=>lista
        [
        ('Ótimo', 'Ótimo'), ('Bom', 'Bom'), ('Razoável', 'Razoável'), ('Ruim', 'Ruim')
        ]
        analise_procede=>boolean
        marca string
        modelo string
        ano_fabricacao int
        plano_distribuicao string
        recebido boolean
        date_recebido date

    luva
        circunferencia_mao=>lista
        [
        ('12 a 15 cm', '12 a 15 cm'), ('18 a 19 cm', '18 a 19 cm'),
        ('19 a 20 cm', '19 a 20 cm'), ('20 a 21,5 cm', '20 a 21,5 cm'),
        ('21,5 a 23 cm', '21,5 a 23 cm'), ('23 a 25 cm', '23 a 25 cm'),
        ('25 a 28 cm', '25 a 28 cm'), ('28 a 30 cm', '28 a 30 cm')
        ]
        tamanho=>lista
        [
        ('Pequeno', 'Pequeno'), ('Médio', 'Médio'), ('Grande', 'Grande'),
        ('1º Extra Grande', '1º Extra Grande'), ('2º Extra Grande', '2º Extra Grande'),
        ('3º Extra Grande', '3º Extra Grande')
        ]
        estado_concerv=>lista
        [
        ('Ótimo', 'Ótimo'), ('Bom', 'Bom'), ('Razoável', 'Razoável'), ('Ruim', 'Ruim')
        ]
        analise_procede=>boolean
        marca string
        modelo string
        ano_fabricacao int
        plano_distribuicao string
        recebido boolean
        date_recebido date

    bota
        tamanho=>lista
        [lista de 35 a 51]
        estado_concerv=>lista
        [
        ('Ótimo', 'Ótimo'), ('Bom', 'Bom'), ('Razoável', 'Razoável'), ('Ruim', 'Ruim')
        ]
        analise_procede=>boolean
        marca string
        modelo string
        ano_fabricacao int
        plano_distribuicao string
        recebido boolean
        date_recebido date

EPI_SALVAMENTO

    capacete_aquatico
        cor=>lista
        [
            ('B', 'Branco'), ('A', 'Amarelo'), ('V', 'Vermelho')
        ]
        estado_concerv=>lista
        [
        ('Ótimo', 'Ótimo'), ('Bom', 'Bom'), ('Razoável', 'Razoável'), ('Ruim', 'Ruim')
        ]
        analise_procede=>boolean
        marca string
        modelo string
        ano_fabricacao int
        plano_distribuicao string
        recebido boolean
        date_recebido date
    
    capacete_altura
        cor=>lista
        [
            ('B', 'Branco'), ('A', 'Amarelo'), ('V', 'Vermelho')
        ]
        estado_concerv=>lista
        [
        ('Ótimo', 'Ótimo'), ('Bom', 'Bom'), ('Razoável', 'Razoável'), ('Ruim', 'Ruim')
        ]
        analise_procede=>boolean
        marca string
        modelo string
        ano_fabricacao int
        plano_distribuicao string
        recebido boolean
        date_recebido date

    luva_veicular

        circunferencia_mao=>lista
        [
        ('12 a 15 cm', '12 a 15 cm'), ('18 a 19 cm', '18 a 19 cm'),
        ('19 a 20 cm', '19 a 20 cm'), ('20 a 21,5 cm', '20 a 21,5 cm'),
        ('21,5 a 23 cm', '21,5 a 23 cm'), ('23 a 25 cm', '23 a 25 cm'),
        ('25 a 28 cm', '25 a 28 cm'), ('28 a 30 cm', '28 a 30 cm')
        ]
        tamanho=>lista
        [
        ('Pequeno', 'Pequeno'), ('Médio', 'Médio'), ('Grande', 'Grande'),
        ('1º Extra Grande', '1º Extra Grande'), ('2º Extra Grande', '2º Extra Grande'),
        ('3º Extra Grande', '3º Extra Grande')
        ]
        estado_concerv=>lista
        [
        ('Ótimo', 'Ótimo'), ('Bom', 'Bom'), ('Razoável', 'Razoável'), ('Ruim', 'Ruim')
        ]
        analise_procede=>boolean
        marca string
        modelo string
        ano_fabricacao int
        plano_distribuicao string
        recebido boolean
        date_recebido date


EPI_MOTORRESGATE
    conjunto
        jaqueta
            jaqueta_tamanho=>lista
            [
            ('Pequeno', 'Pequeno'), ('Médio', 'Médio'), ('Grande', 'Grande'),
            ('1º Extra Grande', '1º Extra Grande'), ('2º Extra Grande', '2º Extra Grande'),
            ('3º Extra Grande', '3º Extra Grande')
            ]
            jaqueta_complemento=>lista
            [
                0, 1, 2, 3, 4
            ]
        calca
            calca_tamanho=>lista
            [
            ('Pequeno', 'Pequeno'), ('Médio', 'Médio'), ('Grande', 'Grande'),
            ('1º Extra Grande', '1º Extra Grande'), ('2º Extra Grande', '2º Extra Grande'),
            ('3º Extra Grande', '3º Extra Grande')
            ]
            calca_complemento=>lista
            [
                0, 1, 2, 3, 4
            ]
        estado_concerv=>lista
        [
        ('Ótimo', 'Ótimo'), ('Bom', 'Bom'), ('Razoável', 'Razoável'), ('Ruim', 'Ruim')
        ]
        analise_procede=>boolean
        marca string
        modelo string
        ano_fabricacao int
        plano_distribuicao string
        recebido boolean
        date_recebido date

    capacete
        cor=>lista
        [
            ('B', 'Branco'), ('A', 'Amarelo'), ('V', 'Vermelho')
        ]
        estado_concerv=>lista
        [
        ('Ótimo', 'Ótimo'), ('Bom', 'Bom'), ('Razoável', 'Razoável'), ('Ruim', 'Ruim')
        ]
        analise_procede=>boolean
        marca string
        modelo string
        ano_fabricacao int
        plano_distribuicao string
        recebido boolean
        date_recebido date

    luva
        circunferencia_mao=>lista
        [
        ('12 a 15 cm', '12 a 15 cm'), ('18 a 19 cm', '18 a 19 cm'),
        ('19 a 20 cm', '19 a 20 cm'), ('20 a 21,5 cm', '20 a 21,5 cm'),
        ('21,5 a 23 cm', '21,5 a 23 cm'), ('23 a 25 cm', '23 a 25 cm'),
        ('25 a 28 cm', '25 a 28 cm'), ('28 a 30 cm', '28 a 30 cm')
        ]
        tamanho=>lista
        [
        ('Pequeno', 'Pequeno'), ('Médio', 'Médio'), ('Grande', 'Grande'),
        ('1º Extra Grande', '1º Extra Grande'), ('2º Extra Grande', '2º Extra Grande'),
        ('3º Extra Grande', '3º Extra Grande')
        ]
        estado_concerv=>lista
        [
        ('Ótimo', 'Ótimo'), ('Bom', 'Bom'), ('Razoável', 'Razoável'), ('Ruim', 'Ruim')
        ]
        analise_procede=>boolean
        marca string
        modelo string
        ano_fabricacao int
        plano_distribuicao string
        recebido boolean
        date_recebido date

    bota
        tamanho=>lista
        [lista de 35 a 51]
        estado_concerv=>lista
        [
        ('Ótimo', 'Ótimo'), ('Bom', 'Bom'), ('Razoável', 'Razoável'), ('Ruim', 'Ruim')
        ]
        analise_procede=>boolean
        marca string
        modelo string
        ano_fabricacao int
        plano_distribuicao string
        recebido boolean
        date_recebido date