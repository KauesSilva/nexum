<?php
require_once "login.php";
session_start();
// Verificando se o usuário está logado, se não, redireciona-o para o login
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: form.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Nexum</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/information.css?=3 crossorigin=" anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
    <script src="https://kit.fontawesome.com/e40051a8be.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Navbar -->
    <div class="sidebar">
        <div class="logo-details">
            <div class="logo_name">Nexum</div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav-list">
            <li>
                <i class='bx bx-search'></i>
                <input type="text" placeholder="Pesquisar...">
                <span class="tooltip">Buscar</span>
            </li>
            <li>
                <a href="home.php" class="navItem">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Projetos</span>
                </a>
                <span class="tooltip">Projetos</span>
            </li>
            <li>
                <a href="../php/profile.php" class="navItem">
                    <i class='bx bx-user'></i>
                    <span class="links_name">Usuário</span>
                </a>
                <span class="tooltip">Usuário</span>
            </li>
            <li>
                <a href="information.php" class="navItem active">
                    <i class='bx bx-pie-chart-alt-2 active'></i>
                    <span class="links_name active">Informações</span>
                </a>
                <span class="tooltip">Informações</span>
            </li>
            <li>
                <a href="#" onclick="errorConstruction()" class="navItem">
                    <i class='bx bx-heart'></i>
                    <span class="links_name">Favoritos</span>
                </a>
                <span class="tooltip">Favoritos</span>
            </li>
            <li>
                <a href="#" onclick="errorConstruction()" class="navItem">
                    <i class='bx bx-cog'></i>
                    <span class="links_name">Configurações</span>
                </a>
                <span class="tooltip">Configurações</span>
            </li>
            <li class="profile">
                <div class="profile-details">
                    <img src="<?php
                                require_once "login.php";
                                $id = $_SESSION["id_Usuario"];
                                $stmt = $pdo->prepare(
                                    "SELECT ds_profilePath FROM tb_Usuario WHERE id_Usuario = '$id' "
                                );
                                $stmt->execute();
                                $fetch = $stmt->fetch();
                                echo $fetch["ds_profilePath"];
                                ?>" alt="profileImg">
                    <div class="name_job">
                        <div class="name">
                            <?php
                            require_once "login.php";
                            $id = $_SESSION["id_Usuario"];
                            $stmt = $pdo->prepare(
                                "SELECT nm_Usuario FROM tb_Usuario WHERE id_Usuario = '$id' "
                            );
                            $stmt->execute();
                            $fetch = $stmt->fetch();
                            echo $fetch["nm_Usuario"];
                            ?>
                        </div>
                        <div class="job">
                            <?php
                            require_once "login.php";
                            echo $_SESSION["ds_Email"];
                            ?>
                        </div>
                    </div>
                </div>
                <a href="logout.php"><i class='bx bx-log-out' id="log_out"></i></a>
            </li>
        </ul>
    </div>
    <!-- FAQ -->
    <section class="faq">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8 text-center">
                    <div class="section-title">
                        <h4>Dúvidas Frequentes</h4>
                        <h2>Como abrir uma <span>ONG?</span></h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="accordion" id="accordionExample">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                Você quer abrir uma associação ou uma fundação?
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <p>Apesar de popular, o termo Organização Não-Governamental (ONG) não existe no Código Civil brasileiro. Este é um nome genérico para se referir a dois tipos de pessoas jurídicas: fundações e associações.</p>

                                            <p><span class="font-weight-bold">Associações</span>: têm como ponto central uma causa, em torno da qual pessoas se unem. Exemplo: você e seu vizinho querem preservar um rio de seu bairro. Vocês se mobilizam e criam a associação “Bairro feliz”, para lutar pela sua causa. O processo é simples e barato.</p>

                                            <p>Estes são os requisitos para abrir uma associação:</p>
                                            <ul class="list-group mb-4">
                                                <li class="list-group-item">Constituição feita a partir de pessoas</li>
                                                <li class="list-group-item">Patrimônio inicial não obrigatório</li>
                                                <li class="list-group-item">Finalidade (causa) da associação é livre</li>
                                                <li class="list-group-item">Os fundadores decidem</li>
                                                <li class="list-group-item"> As regras de funcionamento são livremente definidas pelos membros</li>
                                                <li class="list-group-item">A Assembleia Geral é o órgão soberano</li>
                                            </ul>
                                            <p><span class="font-weight-bold">Fundações</span>: têm como ponto central o patrimônio. Uma pessoa física ou jurídica faz uma dotação financeira para um propósito específico. Um exemplo é a Fundação Roberto Marinho, formada a partir da doação de parte do patrimônio do bilionário brasileiro. Este processo é bem mais complexo, incluindo fiscalização do Ministério Público.</p>

                                            <p>Estes são os requisitos para abrir uma fundação:</p>

                                            <ul class="list-group mb-4">
                                                <li class="list-group-item">Constituição a partir de patrimônio aprovado pelo Ministério Público</li>
                                                <li class="list-group-item">Finalidade (causa) da fundação deve ser: assistência social; cultura; defesa e conservação do patrimônio histórico e artístico; educação; saúde; segurança alimentar e nutricional; defesa, preservação e conservação do meio ambiente e promoção do desenvolvimento sustentável; pesquisa científica, desenvolvimento de tecnologias alternativas, modernização de sistemas de gestão, produção e divulgação de informações e conhecimentos técnicos e científicos; promoção da ética, cidadania, democracia e dos direitos humanos; atividades religiosas</li>
                                                <li class="list-group-item">As regras de funcionamento são fiscalizadas pelo Ministério Público</li>
                                                <li class="list-group-item">Criada por escritura pública ou testamento</li>
                                                <li class="list-group-item">Todos os atos devem ser aprovados pelo Ministério Público</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Como abrir uma ONG do tipo associação?
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <p class="font-weight-bold">1º passo: Atraia os interessados</p>

                                            <p>Uma associação é a união de pessoas em torno de um interesse comum, então é natural que o primeiro passo seja o de reunir as pessoas.</p>
                                            <p>Esse passo pode parecer banal, mas é a base de tudo. Se o desejo de abrir uma associação é só seu e você não deseja envolver mais ninguém, infelizmente isso não será possível. Para o próximo passo você precisará ter pelo menos cinco pessoas dispostas a assumir responsabilidade legal.</p>

                                            <p class="font-weight-bold">2º passo: Defina o estatuto social e os representantes legais</p>

                                            <p>O estatuto social é a alma da associação. Ele é como uma constituição que reúne todos os princípios e regras. Por isso, deve ser debatido ANTES da fundação legal, para ter certeza que todos os associados estão de acordo com os termos.</p>

                                            <p>Os estatutos não precisam ser iguais, visto que refletem as especificidades de cada associação. Porém, em linhas gerais, os tópicos são os seguintes:</p>

                                            <ol>
                                                <li>Nome e sigla da entidade</li>
                                                <li>Sede e foro</li>
                                                <li>Finalidades e objetivos</li>
                                                <li>Sócios e seus tipos</li>
                                                <li>Quem responde pela entidade</li>
                                                <li>Poderes como assembleia, diretoria e conselho fiscal</li>
                                                <li>Tempo de duração</li>
                                                <li>Como os estatutos serão modificados</li>
                                                <li>Como a entidade pode ser dissolvida</li>
                                                <li>O destino do patrimônio em caso de dissolução</li>
                                            </ol>

                                            <p>Ainda neste segundo passo, alinhe com os associados quem serão os representantes legais da organização. Devem ser designadas no mínimo cinco pessoas que se dividirão entre: Diretoria (presidente e vice-presidente) e Conselho Fiscal (três conselheiros)</p>
                                            <p>Vale frisar que a Diretoria pode ser composta por mais representantes legais, mas nunca por menos. Tenha estas funções claras antes de seguir para o próximo passo</p>

                                            <p class="font-weight-bold">3º passo: A Assembleia Geral</p>

                                            <p>Se o estatuto social é a alma da sua associação, a Assembleia Geral é o corpo. Ela é a reunião de seus sócios e a instância maior de decisão.</p>

                                            <p>A primeira Assembleia Geral deve ser acompanhada por um secretário e um vice-secretário, que devem ser responsáveis por fazer a ata do encontro. Note que esta função é MUITO IMPORTANTE, pois, assim como o estatuto, a ata da Assembleia também é um documento obrigatório para a fundação legal da associação.</p>

                                            <p>A pauta da assembleia é livre, mas recomenda-se que na primeira sejam lidos em voz alta todos os artigos do estatuto, para ter certeza de que os associados concordam com todo teor.</p>

                                            <p>Na primeira Assembleia Geral também tomará posse a Diretoria, por um mandato cujo tempo deve estar estipulado no estatuto.</p>

                                            <p class="font-weight-bold">4º passo: Registro legal</p>

                                            <p>O último passo para que a associação seja reconhecida como pessoa jurídica é que ela seja registrada em um cartório de Registro Civil de Pessoas Jurídicas.</p>

                                            <p>Devem ser apresentados os seguintes documentos:</p>

                                            <ol>
                                                <li>Duas vias do estatuto social assinadas por um advogado</li>
                                                <li>Duas vias da ata da Assembleia Geral de constituição assinadas por advogado, com eleição dos dirigentes e termo de posse</li>
                                                <li>Requerimento de registro assinado pelo representante da organização</li>
                                            </ol>

                                            <p>Para concluir o registro você precisará pagar taxas correspondentes, registrar e publicar um extrato do livro de atas e dos estatutos aprovados, no Diário Oficial.</p>
                                            <p>Depois, deve registrar a associação na Receita Federal, passando a ter um CNPJ.</p>
                                            <p>Por fim, você deve regularizar o alvará na sede da prefeitura municipal, contratar um contador e abrir conta bancária.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                Como abrir uma ONG do tipo fundação?
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <p class="font-weight-bold">1º passo: O instituidor e a escritura pública</p>

                                            <p>Em primeiro lugar, consulte o Ministério Público para o direcionamento das ações. Ele precisa autorizar todas as etapas do processo, então saiba exatamente quais passos você pode e quais não pode dar.</p>
                                            <p>Depois de uma consulta prévia ao Ministério Público, é hora de falar de patrimônio. Uma fundação é constituída em torno de uma doação financeira, portanto, é natural que seu primeiro passo seja a transferência do patrimônio. Isso deve ser feito por uma figura chamada “instituidor”, quem formaliza a escritura pública ou o testamento da organização. A escritura deve especificar os fins a que se destinam os recursos e declarar a forma de administração prevista.</p>

                                            <p class="font-weight-bold">2º passo: Defina o estatuto social</p>

                                            <p>Assim como ocorre com a associação, o estatuto social é a alma de uma fundação. Nele constarão os princípios e regras da nova organização.</p>
                                            <p>Os estatutos não precisam ser iguais, visto que refletem as especificidades de cada Fundação. Porém, em linhas gerais, os tópicos são os seguintes:</p>

                                            <ol>
                                                <li>A denominação, o fundo social, os fins, a sede da sua fundação e sua duração</li>
                                                <li>O modo como será administrada e representada, judicial e extrajudicialmente</li>
                                                <li>Se o estatuto é reformável, e de que modo</li>
                                                <li>Se os membros respondem ou não, solidariamente, pelas obrigações sociais</li>
                                                <li>As condições de extinção e, nesse caso, o destino do seu patrimônio</li>
                                                <li>Os nomes dos fundadores ou instituidores e dos membros da diretoria provisória ou definitiva, com nacionalidade, estado civil e profissão de cada um, bem como o nome e a residência de quem apresenta os exemplares</li>
                                            </ol>

                                            <p class="font-weight-bold">3º passo: Aprovação do estatuto</p>

                                            <p>Ao contrário do caso das associações, em que a aprovação do estatuto é imediata pela Assembleia Geral, nas fundações a aprovação do documento cabe ao Ministério Público. Ele tem o poder de aprovar ou não o estatuto, sendo a instância maior que definirá se a fundação poderá existir legalmente.</p>
                                            <p>Vale ressaltar que, caso o instituidor não faça o estatuto, o próprio Ministério Público deve fazer e caberá a um juiz aprová-lo.</p>

                                            <p class="font-weight-bold">4º passo: Registro Geral</p>

                                            <p>O registro legal de uma fundação é muito semelhante ao de uma associação. Dê uma olhada no quarto passo do item anterior para concluir o processo.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapseThree">
                                                O que é necessário para receber verba governamental?
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapse4" class="collapse" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <p>Após a sanção do <a href="http://www.planalto.gov.br/ccivil_03/_ato2011-2014/2014/lei/l13019.htm">Marco Regulatório das Organizações da Sociedade Civil (Lei nº 13.019/2014)</a>,
                                                passou-se a flexibilizar as possíveis parcerias entre as empresas/instituições que compõem o Terceiro Setor (como as ONGs e as OSCIPs) e o Setor Público (Nas esferas Municipais,
                                                Estaduais e Federais). A ideia desse documento é tornar esse processo de doação mais prático e transparente.
                                            </p>
                                            <p>Uma das principais mudanças prevista está na criação de dois tipos de contratos que serão devidamente firmados entre Governo e ONGs. são eles: Termo de Colaboração e o Termo de
                                                Fomento. Assim, os entes federados serão obrigados a fazer um chamamento público, que nada mais é do que uma espécie de edital de concorrência entre as ONGs.</p>
                                            <P>Um dos pontos mais interessantes é a obrigatoriedade da experiência. Agora, para que uma ONG tenha acesso ao repasse de verbas financeiras, é necessário que ela tenha, ao menos,
                                                três anos de experiência no setor de atuação. Além disso, ela deverá comprovar a experiência nesses serviços. Também poderão cobrir possíveis despesas com remuneração de pessoal,
                                                alimentação e até hospedagem. Também deverão ser “Ficha Limpa”.</P>
                                            <p>A lei também deixa bem explícito que o órgão público deverá acompanhar de perto as atividades desempenhadas pelas ONGs, a fim de atestar que o dinheiro não está sendo investido de
                                                forma indevida. Também está previsto um sistema de prestação de contas.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapseOne">
                                                Termos de Colaboração e Fomento
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapse5" class="collapse" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <p class="font-weight-bold">Termos de Colaboração e Fomento</p>

                                            <p>Em 2014, para facilitar as regras de captação de recursos governamentais, a <a href="http://www.planalto.gov.br/ccivil_03/_ato2011-2014/2014/lei/l13019.htm" target="_blank">Lei 13.019/2014</a> dividiu os contratos entre governos e ONGs em “Termo de Colaboração” e “Termo de Fomento”</p>

                                            <p>O Termo de Colaboração é um instrumento para que administração pública e organizações sociais trabalhem juntos para uma finalidade definida.</p>

                                            <p>Nos termos de colaboração, o objetivo é estabelecido pela administração pública. É o ente público que define o impacto desejado, sugere o plano de trabalho e seleciona as organizações que vão colaborar com esta tarefa.</p>

                                            <p>Já nos Termos de Fomento, o ente público, através da transferência de recursos financeiros, incentiva uma organização social a atingir seus objetivos.</p>

                                            <p>Isso pode soar semelhante aos termos de colaboração, mas há uma diferença. Nos termos de colaboração, parte do estado a oferta de recursos e as condições necessárias para ter acesso a eles. Já nos termos de fomento, parte da organização social o pedido de recursos. É a ONG que elabora o plano de trabalho, estabelece seus objetivos e busca o recurso junto ao Estado.</p>

                                            <p class="font-weight-bold">Emendas Parlamentares</p>

                                            <p>Emendas parlamentares são recursos do Orçamento público que podem ser alocados por indicação de deputados estaduais, deputados federais e senadores. Normalmente os parlamentares enviam estes recursos para suas regiões de origem. Em 2021, por exemplo, cada congressista teve pouco mais de R$ 16 milhões para alocar.</p>

                                            <p>Associações podem receber recursos oriundos de emendas parlamentares.</p>

                                            <p>Assim como nos termos de colaboração e de fomento, há normas específicas para garantir que este tipo de transação seguirá as normas legais. Para entender como proceder, entre em contato com um parlamentar próximo.</p>

                                            <p class="font-weight-bold">Leis de Incentivo</p>

                                            <p>Leis de incentivo são leis que permitem que indivíduos e empresas doem para organizações sociais com restituição fiscal, ou seja, abatendo o valor doado do imposto pago. Usando uma das leis, uma pessoa poderia, por exemplo, doar R$ 1.000 para uma ONG e pagar R$ 1.000 a menos de impostos para o governo.</p>

                                            <p>As leis de incentivo no Brasil podem ser divididas em federais, estaduais e municipais.</p>

                                            <p>As federais são: Lei Rouanet (Cultura), Lei Federal de Incentivo ao Esporte (Esporte), Pronas (Saúde), Pronon (saúde), Lei do Idoso (saúde) e fundos da criança e do adolescente (criança e adolescente). Cada uma delas tem um funcionamento específico e é direcionada a uma causa específica.</p>

                                            <p>Se sua organização não tem cultura no estatuto, por exemplo, não poderá se inscrever numa lei de incentivo de cultura.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse6" aria-expanded="false" aria-controls="collapseTwo">
                                                Quantas ONGS existem no Brasil?
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapse6" class="collapse" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <figure class="highcharts-figure">
                                                <div id="container"></div>
                                                <p class="highcharts-description">
                                                    Segundo o site "Mapa das OSCS", no Brasil, existem aproximadamente 815.676 ONGS
                                                </p>
                                            </figure>
                                        </div>
                                    </div>
                                </div>


                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse7" aria-expanded="false" aria-controls="collapseTwo">
                                                Qual a diferença entre uma ONG com site x ONG sem site?
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapse7" class="collapse" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="container">
                                                <p class="font-weight-bold">Instituto Luisa Mell</p>
                                                <p>O Instituto Luisa Mell é uma ONG brasileira sem fins lucrativos de proteção animal e meio ambiente, que atua principalmente no resgate de animais feridos ou em situação de risco, recuperação e adoção, sendo referência nesse ramo, possuindo credibilidade em seu nome e redes sociais além de possuir um site próprio</p>
                                                <img src="../assets/img/luisaMell-ong.png" class="img-fluid mb-3" alt="">

                                                <p class="font-weight-bold">ONG Cactos</p>
                                                <p>A ONG Cactos foi criada em 1989 e tem como missão reintegrar e ressocializar ex-dependentes químicos na sociedade, dando todo o suporte e recursos necessários ao mesmo. Porém mesmo existindo a bastante tempo, ela ainda não possuí uma rede social reconhecida e nem mesmo um site próprio para divulgar seus projetos sociais.</p>
                                                <img src="../assets/img/cactos-ong.png" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse8" aria-expanded="false" aria-controls="collapseTwo">
                                                Por que uma ONG precisa de um site?
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapse8" class="collapse" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="container">
                                                <p>
                                                    Por definição, ONGs são organizações não governamentais sem fins lucrativos que tem como objetivo realizar assistências sociais.
                                                </p>
                                                <p>
                                                    E Segundo a <a href="https://www1.folha.uol.com.br/ambiente/2019/09/apenas-8-das-ongs-estao-no-norte-e-3-recebem-verba-federal.shtml" target="_blank">Folha de São Paulo</a>, cerca de 4 bilhões de reais são dispostos como verba para ONGs, porém apenas cerca de 3% de todas as ongs do Brasil inteiro recebem verba (o que é aproximadamente 24.470 ONGs).
                                                </p>
                                                <p>
                                                    Um exemplo desse tipo de verba do governo foi o <a href="https://www1.folha.uol.com.br/poder/2022/04/governo-bolsonaro-autoriza-verba-a-ongs-de-prateleira-de-sheik-e-daniel-alves.shtml" target="_blank">repasse de 6,2 milhões de reais para duas ONGS inativas</a> que eram de dois jogadores famosos.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Map-->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script src='../js/home.js'></script>
    <script src='../js/information.js?=2'></script>

    <!-- jQuery & Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>