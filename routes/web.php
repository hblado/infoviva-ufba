<?php

use Illuminate\Support\Facades\Route;

/* ======== HomePage ======== */
Route::get('/', function () {
    return view('home', ['title' => 'Início']);
});

/* ======== Sobre ======== */
Route::get('/pesquisa', function () {
    return view('sobre/pesquisa', ['title' => 'A Pesquisa']);
});

Route::get('/objetivos', function () {
    return view('sobre/objetivos', ['title' => 'Objetivos']);
});

/* ======== Quem Somos ======== */
Route::get('/quem-somos', function () {
    $whoWeAre = [
        [
            'title' => "Bruna Lessa",
            'text' => "Criadora da Plataforma Info Viva, professora e pesquisadora da UFBA. Pós-doutora em Documentação
            e Estudos Interdisciplinares sobre a Mulher (UC3M, Espanha). Doutora em Ciência da Informação e fundadora
            do LabRecriE (UFBA/CNPq).",
            'orcid' => "https://orcid.org/0000-0003-4485-203X",
            'lattes' => "http://lattes.cnpq.br/4775068257764378",
            'imagePath' => "bruna.png"
        ],
        [
            'title' => "Eneida Santana",
            'text' => "Pesquisadora e coordenadora da Plataforma Info Viva. Bibliotecária-documentalista no IFBA, doutora
            em Difusão do Conhecimento (UFBA), mestre em Ciência da Informação e especialista em EaD. Atua com dados
            governamentais, tecnologias educacionais e redes complexas. Vice-líder do Ticase, integra o LabRecrie e fundou
            o LabDage.",
            'orcid' => "https://orcid.org/0000-0002-0884-4756",
            'lattes' => "http://lattes.cnpq.br/9832000444934835",
            'imagePath' => "eneida.png"
        ]
    ];
    return view('quemsomos', compact('whoWeAre') , ['title' => 'Quem Somos']);
});

/* ======== FAQ ======== */
Route::get('/faq', function () {
    $faq = [
        [
            'question' => "Quem mantém a plataforma?",
            'answer' => "A Info Viva é vinculada ao LabRecrie/UFBA, com recursos financiados para sua criação
            provenientes do Edital Jovem Pesquisador (2024) , da Pró-Reitoria de Pesquisa e Pós-Graduação (PRPPG),
            da Universidade Federal da Bahia."
        ],
        [
            'question' => "A Info Viva oferece atendimento direto a casos?",
            'answer' => "Não. A plataforma não é um serviço de emergência nem substitui a Rede de Atendimento.
            Nosso foco é informação qualificada, navegação de serviços e formação sobre direitos da mulher.
            Em situação de risco imediato, procure os serviços de atenção e a rede local da sua cidade/estado."
        ],
        [
            'question' => "Como uso os mapas?",
            'answer' => "Você pode filtrar por tipo de serviço, território e temas. Cada ponto possui uma ficha com
            endereço, horários e canais oficiais (quando disponíveis). Os mapas priorizam dados públicos e fontes
            oficiais e indicam a data da última atualização."
        ],
        [
            'question' => "Como encontro materiais formativos?",
            'answer' => "Em Fontes de Informação, a partir do tema/assunto tema (direitos, prevenção, saúde, justiça,
            assistência, segurança, educação), nível de leitura e formato (cartilha, vídeo, guia rápido, glossário etc.)."
        ],
        [
            'question' => " A plataforma tem versões para celular e leitores de tela?",
            'answer' => "Sim. O site é responsivo e segue diretrizes de acessibilidade (WCAG) e linguagem simples.
            Seguimos aprimorando contrastes, navegação por teclado e descrições alternativas."
        ],
        [
            'question' => "De onde vêm os dados?",
            'answer' => "De fontes públicas, bases governamentais, pesquisas acadêmicas, algumas desenvolvidas no
            Projeto Macro, e parcerias institucionais. Cada painel indica fonte, metodologia e limitações."
        ],
        [
            'question' => "Com que frequência os dados são atualizados?",
            'answer' => "Variável por fonte. Os painéis exibem a data de atualização e o período de cobertura.
            Itens descontinuados permanecem sinalizados para histórico e transparência."
        ],
        [
            'question' => "Como citar a Info Viva?",
            'answer' => "UNIVERSIDADE FEDERAL DA BAHIA. LabRecrie. Plataforma Info Viva – LabRecrie/.
            Título/Seção consultada. Ano. URL. Acesso em: dia mês ano."
        ],
        [
            'question' => "A Info Viva coleta dados pessoais?",
            'answer' => "Evitamos sempre que possível. Trabalhamos com dados agregados e/ou anonimizados. Em áreas
            com formulário (ex.: RedeCris Mulher), coletamos apenas informações já disponibilizados em âmbito
            público/acadêmico."
        ],
        [
            'question' => "A plataforma armazena informações de casos individuais?",
            'answer' => "Não. Não realizamos prontuário nem acompanhamento de casos. Quando houver módulos de
            monitoramento em parceria com a Plataforma, eles seguirão consentimento, minimização e governança
            específicas, e serão claramente identificados."
        ],
        [
            'question' => "Como envio uma correção ou solicito inclusão de informação?",
            'answer' => "Escreva para contatoinfoviva@gmail.com. Inclua fonte oficial, link e descrição."
        ],
        [
            'question' => "Posso sugerir materiais?",
            'answer' => "Sim. Envie o material (ou link) com autoria, licença, data e público-alvo através
            de nosso e-mail contatoinfoviva@gmail.com.  Daremos retorno após curadoria."
        ],
        [
            'question' => "Como colaborar como pesquisador(a) ou instituição?",
            'answer' => "Temos chamadas de colaboração e acordos de cooperação. Escreva para contatoinfoviva@gmail.com
            e no assunto inclua PARCERIAS INFOVIVA."
        ],
        [
            'question' => "A Info Viva cobre apenas a Bahia?    ",
            'answer' => "A plataforma nasce com foco na Bahia, mas foi construída para ser modular e replicável em outros
            contextos, em parceria com redes locais."
        ],
        [
            'question' => "Como reporto um problema de acessibilidade?",
            'answer' => "Escreva para contatoinfoviva@gmail.com, e no assunto inclua ACESSIBILIDADE PLATAFORMA INFOVIVA,
            descrevendo o recurso assistivo utilizado e a página afetada. "
        ],
    ];
    return view('faq', ['faq' => $faq, 'title' => 'FAQ']);
});

/* ======== Rede de Atenção à Mulher ======== */
Route::get('/ram/sobre', function () {
    return view('ram/about', ['title' => 'Sobre a RAM']);
});

Route::get('/ram/violencia', function () {
    return view('ram/violencia', ['title' => 'O que é Violência']);
});

Route::get('/ram/dados', function () {
    return view('ram/dados', ['title' => 'Dados']);
});

Route::get('/ram/violencia-informativa', function () {
    return view('ram/info-violence', ['title' => 'Violência Informativa']);
});

/* ======== Fontes ======== */
Route::get('/fontes', function () {
    $sources = [
        'observatorios' => [
            [
                'name' => 'Observatório Brasil da Igualdade de Gênero',
                'link' => 'https://gov.br/mulheres/observatorio-brasil-da-igualdade-de-genero',
                'description' => 'Subsidiado pelo Ministério das Mulheres, monitora indicadores de desigualdade de gênero e apoia a formulação de políticas públicas para mulheres.',
                'coverage' => 'Nacional'
            ],
            [
                'name' => 'Observatório USP Mulheres',
                'link' => 'https://uspmulheres.usp.br/observatorio',
                'description' => 'Analisa dados da comunidade da USP com recorte de gênero, promovendo a equidade dentro da universidade.',
                'coverage' => 'São Paulo (SP)'
            ],
            [
                'name' => "Observatório das Mulheres",
                'link' => "observatoriomulheres.org",
                'description' => "Mecanismo nacional que representa a diversidade de vozes femininas, promovendo o empoderamento e a remoção de barreiras aos direitos das mulheres.",
                'coverage' => "Nacional"
            ],
            [
                'name' => "Observatório Nacional da Mulher na Política (ONMP)",
                'link' => "camara.leg.br/observatorio-nacional-da-mulher-na-politica",
                'description' => "Vinculado à Câmara dos Deputados, monitora indicadores e pesquisas sobre a atuação política de mulheres em todas as esferas.",
                'coverage' => "Nacional"
            ],
            [
                'name' => "Observatório da Mulher contra a Violência (OMV)",
                'link' => "senado.leg.br/omv",
                'description' => "Integrado ao Senado Federal, coleta dados e promove estudos sobre violência contra a mulher, auxiliando na elaboração de políticas públicas.",
                'coverage' => "Nacional"
            ],
            [
                'name' => "Observatório Mulheres - UFSCar",
                'link' => "observatoriomulheres.ufscar.br",
                'description' => "Projeto da Universidade Federal de São Carlos que desenvolve pesquisas e ações voltadas à promoção dos direitos das mulheres.",
                'coverage' => "São Paulo (SP)"
            ],
            [
                'name' => "Observatório da Mulher 4.0",
                'link' => "observatoriodamulher.org",
                'description' => "Iniciativa que utiliza tecnologia e ciência de dados para enfrentar o feminicídio e outras formas de violência contra mulheres.",
                'coverage' => "Nacional"
            ],
            [
                'name' => "Observatório Caleidoscópio",
                'link' => "observatoriocaleidoscopio.unicamp.br",
                'description' => "Projeto da Unicamp que integra a Rede de Observatórios sobre Mulheres, focando em estudos de gênero e diversidade.",
                'coverage' => "São Paulo (SP)"
            ],
            [
                'name' => "Rede de Observatórios da Segurança",
                'link' => "observatorioseguranca.com.br",
                'description' => "Monitora dados de violência, incluindo contra mulheres, em diversos estados, promovendo análises e relatórios periódicos.",
                'coverage' => "BA, CE, MA, PA, PE, PI, RJ, SP"
            ],
        ],
        'organizacoes' => [
            [
                'name' => 'Associação Fala Mulher',
                'link' => 'https://falamulher.ong.br',
                'coverage' => 'São Paulo (SP)',
                'description' => 'Oferece acolhimento, apoio psicossocial e orientação jurídica para mulheres em situação de violência doméstica.'
            ],
            [
                'name' => 'ONG Recomeçar',
                'link' => 'https://observatorio3setor.org.br',
                'description' => 'Localizada em Mogi das Cruzes, oferece acolhimento institucional sigiloso para mulheres em risco iminente de morte.',
                'type' => 'São Paulo (SP)'
            ],
            [
                'name' => 'Think Olga',
                'link' => 'https://thinkolga.com',
                'description' => 'Organização feminista que atua na produção de conteúdo e campanhas de conscientização sobre os direitos das mulheres.',
                'type' => 'São Paulo (SP)'
            ],
            [
                'name' => 'Instituto Maria da Penha',
                'link' => 'https://institutomariadapenha.org.br',
                'description' => 'Criado por Maria da Penha, atua na promoção de políticas públicas e na defesa dos direitos das mulheres.',
                'type' => 'Ceará (CE)'
            ],
            [
                'name' => 'Centro Feminista de Estudos e Assessoria (CFEMEA)',
                'link' => 'https://cfemea.org.br',
                'description' => 'ONG dedicada à promoção dos direitos das mulheres, igualdade de gênero e fortalecimento da democracia.',
                'type' => 'Distrito Federal (DF)'
            ],
            [
                'name' => 'Casa da Mulher Brasileira',
                'link' => 'https://pt.wikipedia.org/wiki/Casa_da_Mulher_Brasileira',
                'description' => 'Centro de atendimento humanizado que reúne serviços especializados para mulheres em situação de violência.',
                'type' => 'Nacional'
            ],
            [
                'name' => 'Grupo Mulheres do Brasil',
                'link' => 'https://grupomulheresdobrasil.org.br',
                'description' => 'Movimento suprapartidário que reúne mulheres para atuar em causas sociais, incluindo o combate à violência contra a mulher.',
                'type' => 'Nacional'
            ],
            [
                'name' => 'Mapa do Acolhimento',
                'link' => 'https://mapadoacolhimento.org',
                'description' => 'Plataforma que conecta mulheres em situação de violência a psicólogas e advogadas voluntárias para atendimento gratuito.',
                'type' => 'Nacional'
            ],
            [
                'name' => 'Quem Ama Liberta',
                'link' => 'https://www.instagram.com/quemamaliberta',
                'description' => 'Projeto que documenta casos de feminicídio no Brasil, buscando preservar a memória das vítimas e conscientizar sobre a violência de gênero.',
                'type' => 'Nacional'
            ],
            [
                'name' => 'Conselho Nacional dos Direitos da Mulher (CNDM)',
                'link' => 'https://www.gov.br/secretariageral/pt-br/assuntos/conselhos-e-comissoes/cndm',
                'description' => 'Órgão colegiado responsável por formular e propor diretrizes para políticas públicas voltadas às mulheres.',
                'type' => 'Nacional'
            ],
            [
                'name' => 'Tamo Juntas',
                'link' => 'https://tantojuntas.org.br',
                'description' => 'Presta assistência a mulheres em situação de violência e possui incidência política para denunciar e combater a violência contra a mulher.',
                'type' => 'Bahia (BA)'
            ],
            [
                'name' => 'Instituto Barbara Penna',
                'link' => 'https://institutobpenna.org',
                'description' => 'Oferece assistência e conscientização sobre a violência contra a mulher, além de fiscalizar o cumprimento da Lei Maria da Penha.',
                'type' => 'Rio Grande do Sul (RS)'
            ],
            [
                'name' => 'Associação Artemis',
                'link' => 'https://artemis.org.br',
                'description' => 'Atua na promoção da autonomia feminina, prevenção e erradicação de todas as formas de violência contra as mulheres.',
                'type' => 'São Paulo (SP)'
            ],
            [
                'name' => 'Associação Fênix',
                'link' => 'https://associacaofenix.org.br',
                'description' => 'Oferece apoio psicológico, jurídico e social para mulheres em situação de violência, além de promover ações de prevenção.',
                'type' => 'Santa Catarina (SC)'
            ],
            [
                'name' => 'Casa da Mulher do Nordeste (CMN)',
                'link' => 'https://casadamulherdonordeste.org.br',
                'description' => 'Contribui para a igualdade de gênero no Nordeste do Brasil, fortalecendo a autonomia econômica e política das mulheres.',
                'type' => 'Pernambuco (PE)'
            ],
            [
                'name' => 'Instituto Patrícia Galvão',
                'link' => 'https://agenciapatriciagalvao.org.br',
                'description' => 'Atua na defesa dos direitos das mulheres no Brasil, combinando pesquisa e produção de dados com ações de comunicação estratégica.',
                'type' => 'Nacional'
            ],
        ],
        'guias' => [
            [
                'name' => 'Cartilha de Enfrentamento à Violência contra Mulheres LBT+',
                'link' => 'https://www.gov.br/mulheres/pt-br/central-de-conteudos/publicacoes/cartilha-digital-de-enfrentamento-a-violencia-3-6mb.pdf/view',
                'description' => 'Elaborada pelo Ministério das Mulheres e MDHC, aborda formas de violência e orientações para mulheres LBT+.',
                'type' => 'Cartilha'
            ],
            [
                'name' => 'Cartilha “Prevenção de Violência contra Mulheres Brasileiras no Exterior”',
                'link' => 'https://www.gov.br/mre/pt-br/assuntos/portal-consular/cartilhas/cartilha-201cprevencao-de-violencia-contra-mulheres-brasileiras-no-exterior201d',
                'description' => 'Oferece orientações para brasileiras no exterior sobre identificação e prevenção da violência.',
                'type' => 'Cartilha'
            ],
            [
                'name' => 'Cartilha de Enfrentamento à Violência Doméstica e Familiar contra a Mulher: Mitos e Verdades',
                'link' => 'https://www.defensoria.df.gov.br/wp-content/uploads/2023/01/Cartilha-de-Violencia-Domestica-e-Familiar-Contra-a-Mulher-Mitos-e-Verdades.pdf',
                'description' => 'Esclarece mitos e verdades sobre violência doméstica e familiar.',
                'type' => 'Cartilha'
            ]
            
        ],
        'legislacao' => [
            [
                'name' => 'Lei Maria da Penha (Lei nº 11.340/2006)',
                'link' => 'https://www.planalto.gov.br/ccivil_03/_ato2004-2006/2006/lei/l11340.htm',
                'description' => 'Cria mecanismos para coibir e prevenir a violência doméstica e familiar contra a mulher.',
                'type' => 'Lei Federal'
            ],
            [
                'name' => 'Lei do Feminicídio (Lei nº 13.104/2015)',
                'link' => 'https://www.planalto.gov.br/ccivil_03/_ato2015-2018/2015/lei/l13104.htm',
                'description' => 'Tipifica o feminicídio como circunstância qualificadora do crime de homicídio.',
                'type' => 'Lei Federal'
            ],
            [
                'name' => 'Lei nº 14.899/2024',
                'link' => 'https://www.planalto.gov.br/ccivil_03/_ato2023-2026/2024/lei/L14899.htm',
                'description' => 'Dispõe sobre a elaboração e implementação de plano de metas para enfrentamento integrado da violência doméstica e familiar contra a mulher.',
                'type' => 'Lei Federal'
            ]
        ],
        'decretos' => [
            [
                'name' => 'Decreto nº 11.640/2023',
                'link' => 'https://www.planalto.gov.br/ccivil_03/_ato2023-2026/2023/decreto/d11640.htm',
                'description' => 'Institui o Pacto Nacional de Prevenção aos Feminicídios.',
                'type' => 'Decreto'
            ],
            [
                'name' => 'Decreto nº 11.431/2023',
                'link' => 'https://www.planalto.gov.br/ccivil_03/_ato2023-2026/2023/decreto/d11431.htm',
                'description' => 'Institui o Programa Mulher Viver sem Violência.',
                'type' => 'Decreto'
            ]
        ],
        'projetos_de_lei' => [
            [
                'name' => 'PL 2.083/2022 – Lei Bárbara Penna',
                'link' => 'https://www12.senado.leg.br/noticias/materias/2025/03/12/ccj-aprova-projeto-contra-ameacas-reiteradas-a-mulher-vitima-de-violencia',
                'description' => 'Proíbe que condenados por violência doméstica se aproximem da casa ou do local de trabalho da vítima.',
                'type' => 'Projeto de Lei'
            ],
            [
                'name' => 'PL 5.710/2023',
                'link' => 'https://www12.senado.leg.br/noticias/videos/2025/03/violencia-contra-mulher-cdh-aprova-plano-nacional-e-punicao-financeira-a-agressor',
                'description' => 'Institui o Plano Nacional de Prevenção e Enfrentamento à Violência contra a Mulher.',
                'type' => 'Projeto de Lei'
            ],
            
        ],
        'acoes_governamentais' => [
            [
                'name' => 'Programa Nacional das Salas Lilás',
                'link' => 'https://www.gov.br/secom/pt-br/assuntos/noticias/2025/03/governo-lanca-o-programa-nacional-das-salas-lilas-para-atendimento-as-mulheres-em-situacao-de-violencia',
                'description' => 'Estrutura salas reservadas ao acolhimento de vítimas de violência de gênero no Sistema Único de Segurança Pública e nos órgãos do sistema de justiça.',
                'type' => 'Ação Governamental'
            ],
            [
                'name' => 'Programa Mulher Viver sem Violência',
                'link' => 'https://www.planalto.gov.br/ccivil_03/_ato2023-2026/2023/decreto/d11431.htm',
                'description' => 'Integra e amplia os serviços públicos existentes destinados às mulheres em situação de violência.',
                'type' => 'Ação Governamental'
            ]
        ]
    ];
    return view('/fontes', ['sources' => $sources, 'title' => 'Fontes']);
});

Route::get('/redecris', function() {
    return view('redecris', ['title' => 'Rede Cris']);
});

/* ======== Rede de Atenção à Mulher ======== */
Route::get('/ram/sobre', function () {
    return view('ram/about', ['title' => 'Sobre a RAM']);
});

Route::get('/contato', function () {
    return view('contact', ['title' => 'Contato']);
});

