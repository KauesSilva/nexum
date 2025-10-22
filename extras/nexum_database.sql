-- ========================= BANCO ========================= --
create database nexum;
use nexum;
-- ====================== TABELAS ========================= --
/* Criação da tabela plano */
create table tb_Plano
(id_Plano int not null auto_increment,
vl_Plano decimal,

primary key (id_Plano))
DEFAULT CHARSET = utf8;

/* Criação da tabela usuário */
create table tb_Usuario
(id_Usuario int not null auto_increment,
nm_Usuario varchar(100),
ds_Email varchar(50),
cd_Senha varchar (255),
ds_Descricao varchar (255),
ds_profilePath varchar (255),
dt_Acesso datetime,
ds_tipo_Usuario enum ('ONG', 'A'),
id_Plano int (11),  

primary key (id_Usuario),
foreign key (id_Plano) references tb_Plano(id_Plano))
DEFAULT CHARSET = utf8;

/* Criação da tabela pacote pagamento */
create table tb_Pagamento
(id_Pagamento int not null auto_increment,
ds_EstadoPagamento enum ("Pago", "Não Pago") not null,
dt_Emissao datetime,
dt_Vencimento datetime,
id_Usuario int(11) not null, 
id_Plano int(11) not null, /* Opcional, no caso do plano grátis */
primary key (id_Pagamento),
foreign key (id_Usuario) references tb_Usuario(id_Usuario),
foreign key (id_Plano) references tb_Plano(id_Plano))
DEFAULT CHARSET = utf8;

/* Criação da tabela multa */
create table tb_multa
(id_Multa int not null auto_increment,
dt_Multa datetime, -- Data que a multa é emitida --
vl_Multa double,
id_Usuario int,
primary key (id_multa),
foreign key (id_Usuario) references tb_Usuario(id_Usuario))
DEFAULT CHARSET = utf8;

/* Criação da tabela template */
create table tb_Template
(id_Template int not null auto_increment,
ds_Titulo varchar (50),
ds_Descricao varchar (255),
dt_Criacao datetime,
dt_Atualizacao datetime,
ds_Versao decimal (7,2),
ds_zipPath varchar (255),
ds_imagePath varchar (255),
ds_previewPath varchar (255),
id_Usuario int (11),

primary key (id_Template),
foreign key (id_Usuario) references tb_Usuario(id_Usuario))
DEFAULT CHARSET = utf8;

/* Criação da tabela alteração */
create table tb_Alteracao
(id_Alteracao int not null auto_increment,
dt_Alteracao date,
id_Template int (11),

primary key (id_Alteracao),
foreign key (id_Template) references tb_Template(id_Template))
DEFAULT CHARSET = utf8;

/* Criação da tabela pacote plano */
CREATE TABLE tb_PacotePlano (
    id_PacotePlano INT NOT NULL AUTO_INCREMENT,
    dt_Compra datetime,
    dt_Expiracao datetime,
    ds_tipoPacotePlano ENUM('tri', 'ses', 'ano'),
    id_Usuario INT(11),
    PRIMARY KEY (id_PacotePlano),
    FOREIGN KEY (id_Usuario)
        REFERENCES tb_Usuario (id_Usuario)
)  DEFAULT CHARSET=UTF8;
-- ============================================================= --

-- =========================== INSERTS =========================== --
insert into tb_Plano(vl_plano)
values
(00.00),
(15.00),
(50.00),
(100.00);


insert into tb_Usuario(nm_Usuario, ds_Email, cd_Senha, ds_Descricao, ds_profilePath, dt_Acesso, ds_tipo_usuario, id_Plano)
values
("Admin", "admin@gmail.com", "$2y$10$1xsN95/Wt4ADH1Bvzrr9je6Lg/oLnl3z.OQAmkpubszjJ8Mu1FM2a", "TCC | Projeto para facilitar o marketing digital das pequenas instituições não governamentais através de uma ferramenta que disponibiliza templates de sites customizáveis", "../assets/uploads/profile/nexum.png", "2022-06-11", "ONG", 1),
("Nexum", "nexum@gmail.com", "$2y$10$1xsN95/Wt4ADH1Bvzrr9je6Lg/oLnl3z.OQAmkpubszjJ8Mu1FM2a", "TCC | Projeto para facilitar o marketing digital das pequenas instituições não governamentais através de uma ferramenta que disponibiliza templates de sites customizáveis", "../assets/uploads/profile/nexum.png", "2022-06-11", "ONG", 1),
("Gabriel", "g@gmail.com", "12345", "Insira aqui uma breve descrição da sua instituição não governamental!", "../assets/uploads/profile/profile-default.png", "2022-06-11", "ONG", 2),
("Daniel", "d@gmail.com", "12345", "Insira aqui uma breve descrição da sua instituição não governamental!", "../assets/uploads/profile/profile-default.png", "2022-06-11", "ONG", 2),
("Kleber", "k@gmail.com", "12345", "Insira aqui uma breve descrição da sua instituição não governamental!", "../assets/uploads/profile/profile-default.png", "2022-06-11", "ONG", 3),
("Silva", "s@gmail.com", "12345", "Insira aqui uma breve descrição da sua instituição não governamental!", "../assets/uploads/profile/profile-default.png", "2022-06-11", "ONG", 3),
("Roberto", "r@gmail.com", "12345", "Insira aqui uma breve descrição da sua instituição não governamental!", "../assets/uploads/profile/profile-default.png", "2022-06-11", "ONG", 4),
("Pedro", "p@gmail.com", "12345", "Insira aqui uma breve descrição da sua instituição não governamental!", "../assets/uploads/profile/profile-default.png", "2022-06-11", "ONG", 4);

insert into tb_Pagamento(ds_estadopagamento, dt_emissao, dt_vencimento, id_plano, id_usuario)
values
("Pago", "2022-07-15", "2022-08-21", 2, 1),
("Não Pago", "2022-07-15", "2022-08-21", 3, 2),
("Pago", "2022-07-15", "2022-08-21", 4, 3);
                        
insert into tb_Multa(dt_Multa, vl_multa, id_Usuario)
values
("", 0.25, 7),
("", 0.5, 8);

insert into tb_Template (ds_Titulo, ds_Descricao, dt_Criacao, dt_Atualizacao, ds_Versao, ds_zipPath, ds_imagePath, ds_previewPath) 
values
("Doe Para Quem Precisa", "Template com tema alimentar para instituições sociais sem fins lucrativos de auxílio à pessoas em situação de insegurança alimentar", "2022-10-15 14:15:12", "2022-10-21 18:12:21", "1.5", "../assets/templates/download-files/template01.zip", "../assets/templates/cover-img/template01.png", "../assets/templates/preview-files/template01/"),
("De Volta aos Estudos", "Template com tema educacional para instituições sociais sem fins lucrativos de incentivo à volta de pessoas que abondaram os estudos ou que estão no ambiente escolar ou acadêmico", "2022-10-17 12:12:55", "2022-10-20 19:21:02", "2.0", "../assets/templates/download-files/template02.zip", "../assets/templates/cover-img/template02.png", "../assets/templates/preview-files/template02/"),
("Salve um Cachorro de Rua", "Template com tema animal para instituições sociais sem fins lucrativos de apoio ou resgate aos cachorros de rua", "2022-10-09 09:30:00", "2022-10-15 22:26:25", "3.5", "../assets/templates/download-files/template03.zip", "../assets/templates/cover-img/template03.png", "../assets/templates/preview-files/template03/"),
("Titulo 4", "Descrição 4", "2022-10-20 11:10:02", "2022-10-21 18:12:21", "1.0", "../assets/templates/download-files/template04.zip", "../assets/templates/cover-img/template04.png", "../assets/templates/preview-files/template04/");
-- ============================================================= --
select * from tb_Template;
-- =========================== VIEWS =========================== --

/* View para exibir planos que foram pagos*/
create view vwPlanoPago (ONG, N_Conta, Valor_Plano) as
select usu.nm_usuario, pag.id_pagamento, plan.vl_plano, usu.id_plano
    from tb_usuario as usu,
        tb_pagamento as pag,
            tb_plano as plan
                where pag.ds_estadopagamento = "Pago"
					and ds_tipo_usuario = "ONG"
						and usu.id_plano = plan.id_plano
						and plan.id_plano = pag.id_plano;
desc vwPlanoPago;
select * from vwPlanoPago;

/* View para exibir multas*/
create view vwMultas (ONG, Num_Multa, Valor_Multa, Num_Plano) as
select usu.nm_usuario, mul.id_multa, mul.vl_multa, plan.id_plano
    from tb_usuario as usu,
        tb_plano as plan,
            tb_multa as mul
				where ds_tipo_usuario = "ONG"
					and plan.id_plano = usu.id_plano
					and usu.id_usuario = mul.id_usuario;
                    
desc vwMultas;
select * from vwMultas;

/* View para visualizar a data e o horário de login de cada usuário*/
create view vwDataHorLogin (Nome, Tipo_Usuario, Acesso, Num_Plano) as 
	select usu.nm_usuario, usu.ds_tipo_usuario, usu.dt_Acesso, plan.id_plano
		from tb_usuario as usu,
        tb_plano as plan;

desc vwDataHoraLogin;
select * from vwDataHorLogin;

/* View para exibir planos não pagos */
create view vwPlanoNaoPago (ONG, N_Conta, Valor_Plano, Estado_Pagamento) as
select usu.nm_usuario, pag.id_pagamento, plan.vl_plano, ds_estadopagamento
    from tb_usuario as usu,
		 tb_pagamento as pag,
		 tb_plano as plan
				where pag.ds_estadopagamento = "Não Pago"
                    and usu.id_plano = plan.id_plano
                    and plan.id_plano = pag.id_pagamento;
                    
desc vwPlanoNaoPago;
select * from vwPlanoNaoPago;

/* View para visualizar o login */
create view vwLogin (Nome, Tipo_Usuário, E_mail, Senha) as
select usu.nm_usuario, usu.ds_tipo_usuario, usu.ds_Email, usu.cd_Senha
    from tb_usuario as usu;

select * from vwLogin;

/* View para visualizar os templates usados pelos usuários */
create view vwTemplUsados (Nome, Template) as
select usu.nm_usuario, temp.id_template
     from tb_usuario as usu,
		  tb_template as temp;
            
select * from vwTemplUsados;

/* View para visualizar a data de alteração dos templates usados pelos usuários */
create view vwAlterTempl (Usuário, Num_Plano, Template, Data_Alteração) as
select usu.nm_usuario, plan.id_Plano, temp.id_template, alt.dt_Alteracao
	from tb_usuario as usu,
		tb_plano as plan,
        tb_template as temp,
        tb_alteracao as alt;

select * from vwAlterTempl;

/* View para visualizar os pacotes comprados */
create view vwCompraPlano (Usuário, Num_Plano, Data_Compra, Data_Expiração) as
select usu.nm_usuario, plan.id_Plano, dat.dt_Compra, dt_Expiracao
	from tb_usuario as usu,
		tb_plano as plan,
        tb_pacoteplano as dat;

select * from vwCompraPlano;

/* View para verificar tipo de usuario*/
create view TpUsuario (Usuário,nm_Usuario,ds_tipo_Usuario) as 
select  id_Usuario,nm_Usuario,ds_tipo_Usuario
from tb_usuario as usu;

select * from TpUsuario;

/* View para verificar planos já pagos */
create view vwPlanoPago (ONG, N_Conta, Valor_Plano, Estado_Pagamento) as
select usu.nm_usuario, pag.id_pagamento, plan.vl_plano, ds_estadopagamento
    from tb_usuario as usu,
		 tb_pagamento as pag,
		 tb_plano as plan
				where pag.ds_estadopagamento = "Pago"
                    and usu.id_plano = plan.id_plano
                    and plan.id_plano = pag.id_pagamento;
                    
SELECT * FROM vwPlanoPago;
-- ============================================================= --

-- =========================== PROCEDURES =========================== --

-- CRUD 1: Usuario
delimiter $$
create procedure spCrudUsu(in opcao int, in id int, in nome varchar(100), in email varchar(50), in senha varchar(15))
begin
    if (opcao = 1) then
        -- Insert --
        insert into tb_usuario(nm_usuario, ds_email, cd_senha)
            values (nome, email, senha);
    elseif (opcao = 2) then
        select * from tb_usuario where id_usuario = id;
    elseif (opcao = 3) then
        update tb_usuario set nm_usuario = nome, ds_email = email, cd_senha = senha where id_usuario = id;
    elseif (opcao = 4) then
        delete from tb_usuario where id_usuario = id;
    end if;
end $$

call spCrudUSu('1', '1', 'Joaquina', 'joaquina@gmail.com', '1234');
drop spCrudUsu;

-- CRUD 2: Plano
delimiter $$
create procedure spCrudPlano(in opcao int, in id int, in valor decimal)
begin
    if (opcao = 1) then
        -- Insert --
        insert into tb_plano(vl_plano) values (valor);
    elseif (opcao = 2) then
        select * from tb_plano where id_plano = id;
    elseif (opcao = 3) then
        update tb_plano set vl_plano = valor where id_plano = id;
    elseif (opcao = 4) then
        delete from tb_plano where id_plano = id;
    end if;
end $$

-- Procedure para buscar templates por X versão --
delimiter $
create procedure sp_BuscaVersao(in versao decimal)
begin
    declare counter int default 1;
    while counter <= (select max(ds_Versao) from tb_Template) do
        select id_Template as 'Nº Template', ds_Versao as 'Versão' FROM tb_Template
            where versao=left(ds_Versao , 1);
        set counter = counter + 1;    
    end while;
end $

call sp_BuscaVersao(6.00);

-- Procedure para pesquisar templates por X número --
delimiter $
create procedure tipoTemplate (in template int)
begin
declare counter int default 1;
    while counter <= (select max(id_Template) from tb_Template) do
        select id_Template as 'Nº Template', dt_Criacao as 'Data de Criação' , dt_Atualizacao as 'Data de Atualização' FROM tb_Template
            where template=left(id_Template , 1);
        set counter = counter + 1;    
    end while;
end $

call tipoTemplate(1);

-- Procedure para pesquisar planos por X númerp --
delimiter$
create procedure sp_TipoPlano (in plano varchar(3))
begin
	select  id_PacotePlano as 'Nº Pacote Plano', ds_tipoPacotePlano as 'Tipo de Pacote'
	from tb_pacoteplano as pctpl;
end $

call sp_TipoPlano("tri"); 
select * from tb_pacoteplano;

delimiter $
create procedure sp_dtTemplate (in alteracao int)
begin
declare counter int default 1;
    while counter <= (select max(id_Alteracao) from tb_Alteracao) do
        select id_Alteracao as 'Nº Alteração', dt_Alteracao as 'Data de Alteração' FROM tb_Alteracao
            where alteracao=left(id_Alteracao , 1);
        set counter = counter + 1;    
    end while;
end $

call sp_dtTemplate(1);

delimiter $
create procedure sp_ValorPlano (in valor int)
begin
declare counter int default 1;
    while counter <= (select max(id_Plano) from tb_Plano) do
        select id_Plano as 'Plano', vl_Plano as 'Valor do Plano' FROM tb_Plano
            where valor=left(id_Plano , 1);
        set counter = counter + 1;    
    end while;
end $

call sp_ValorPlano(2);

-- Procedure para verificar planos pagos --
delimiter $
create procedure verificar_pago (in pago varchar(10))
begin
select usu.nm_usuario, pag.id_pagamento, plan.vl_plano, ds_estadopagamento
    from tb_usuario as usu,
		 tb_pagamento as pag,
		 tb_plano as plan
				where pag.ds_estadopagamento = Pago
                    and usu.id_plano = plan.id_plano
                    and plan.id_plano = pag.id_pagamento;
end $

call verificar_pago("Pago");

-- Procedure para verificar planos não pagos --
delimiter $
create procedure verificar_naopago (in naopago varchar(10))
begin
select usu.nm_usuario, pag.id_pagamento, plan.vl_plano, ds_estadopagamento
    from tb_usuario as usu,
		 tb_pagamento as pag,
		 tb_plano as plan
				where pag.ds_estadopagamento = naopago
                    and usu.id_plano = plan.id_plano
                    and plan.id_plano = pag.id_pagamento;
end $

call verificar_naopago("Não Pago");

-- Procedure para verificar tipo de usuario --
create procedure tipoUsuario (in usuario varchar(10))
begin 
	select id_Usuario,nm_Usuario,ds_tipo_Usuario
	from tb_usuario;

end $ 

call tipoUsuario("ONG");

-- Procedura para buscar multas --
delimiter $
create procedure multas (in multa varchar(10)) 
begin
select usu.nm_usuario, mul.id_multa, mul.vl_multa, plan.id_plano
    from tb_usuario as usu,
        tb_plano as plan,
            tb_multa as mul
				where ds_tipo_usuario = multa 
					and plan.id_plano = usu.id_plano
					and usu.id_usuario = mul.id_usuario;
end $
call multas("ONG");

-- Procedure para pesquisar usuários que estão X dias sem acessar o sistema --
delimiter $
create procedure sp_DiasOff(in dias int)
begin
    declare counter int default 1;
    while counter <= (select max(id_Usuario) from tb_Usuario) do
		select id_Usuario as 'ID', 
				nm_Usuario as 'Nome',
                ds_Email as 'E-mail',
                ds_Descricao as 'Descrição',
                ds_Tipo_Usuario as 'Tipo de Usuário',
                datediff(curdate(), dt_Acesso) as 'Dias Offline' from  tb_Usuario 
					where dias<=datediff(curdate(), dt_Acesso);
		set counter = counter + 1;	
	end while;
end $

delete procedure sp_DiasOff;
call procedure sp_DiasOff(2);
select * from tb_Usuario;

-- Procedure para pesquisar nomes por X letra inical --
delimiter $
create procedure sp_BuscaInicial(in letra char)
begin
	declare counter int default 1;
    while counter <= (select max(id_Usuario) from tb_Usuario) do
		select nm_Usuario as 'Nome' FROM tb_Usuario 
			where letra=left(nm_Usuario , 1); 
		set counter = counter + 1;	
	end while;
end $

delete procedure sp_BuscaInicial;
call procedure sp_BuscaInical('K');
select * from tb_Usuario;

-- Procedure para dobrar multa baseado na quantidade de dias sem pagar --
delimiter $
create procedure sp_dobraMulta(in dias char)
begin
    declare counter int default 1;
    while counter <= (select max(id_Usuario) from tb_usuario) do
		if exists (select vl_Multa, dt_Multa from tb_Multa where dias<=datediff(curdate(), dt_Multa)) then 
			update tb_Multa set vl_Multa = vl_Multa * 2 where id_Multa = counter;
        set counter = counter + 1;
        end if;
    end while;
end $

delete sp_dobraMulta;
call sp_dobraMulta(2);
select * from tb_Multa;

insert into tb_Multa (dt_Multa, vl_Multa, id_Usuario) values ('2022-10-18 16:30:12', '2', '1');

-- Procedure para apagar usuários pelo nome --
delimiter $
create procedure sp_apagaUsuario(in nome varchar(55))
begin
    declare counter int default 1;
    while counter <= (select max(id_Usuario) from tb_usuario) do
		if exists (select id_Usuario from tb_Usuario where id_Usuario = counter) then 
			select concat('O usuário ',nm_Usuario,' foi deletado!')as Aviso from tb_Usuario where id_Usuario = counter;
			delete from tb_Usuario where nm_Usuario = nome and id_Usuario = counter;
        set counter = counter + 1;
        end if;
    end while;
end $

call sp_apagaUsuario('Rebeca');
drop procedure sp_apagaUsuario;

-- Procedure para atualizar campos do usuário -- 
delimiter $
create procedure spUpdateUsu(in id int, in nome varchar(100), in email varchar(50), in senha varchar(15))
begin
    update tb_usuario set nm_usuario = nome, ds_email = email, cd_senha = senha where id_usuario = id;
end $

call spUpdateUsu(1, 'Rebeca', 'rebeca@gmail.com', '1234');
delete procedure spUpdateUsu;
select * from tb_Usuario;

-- Procedure mostrar as multas relacionadas aos usuários --
delimiter $
create procedure spVerMultas(in id int)
begin
    select 
		usu.nm_Usuario as 'Nome',
        usu.ds_Email as 'E-mail',
        mul.dt_Multa as 'Data da Multa',
        mul.vl_Multa as 'Valor da Multa'
		from tb_multa as mul,
			 tb_Usuario as usu
            where mul.id_usuario = id
            and mul.id_usuario = usu.id_usuario;
end $

call spVerMultas(1);
drop procedure spVerMultas;
select * from tb_Multa;
select * from tb_Usuario;
insert into tb_Multa(id_Multa, dt_Multa, vl_Multa, id_Usuario) values ('1', '2022-10-19 18:32:12', '2.0', '1'); 

-- Procedure mostrar as alterações realizadas nos templates de acordo com o ID --
delimiter $
create procedure spShowUpdateTem(in id int)
begin
    select 
		tem.id_Template as 'Número do Template',
        alt.dt_Alteracao as 'Data de Alteração',
        tem.dt_Criacao as 'Data de Criação',
        tem.dt_Atualizacao as 'Data de Atualização',
        tem.ds_Versao as 'Versão'
		from tb_alteracao as alt,
		     tb_template as tem
		where alt.id_template = id
			and alt.id_template = tem.id_template;
end $

call spShowUpdateTem(1);
drop procedure spShowUpdateTem;
select * from tb_Alteracao;
select * from tb_Template;

-- Procedure para mostrar os usuários que não pagaram o plano de assinatura -- 
delimiter $
create procedure spPagamento(in estado varchar(10))
begin
    select 
		usu.nm_Usuario as 'Nome',
        pag.dt_Emissao as 'Data de Emissão',
        pag.dt_Vencimento as 'Data de Vencimento',
        pla.vl_Plano as 'Valor do Plano'
		from tb_pagamento as pag,
				  tb_Usuario as usu,
                  tb_Plano as pla
            where pag.id_Usuario = usu.id_Usuario and
				  pag.id_Plano = pla.id_Plano and
                  ds_estadopagamento = estado;
end $

call spPagamento('Pago');
drop procedure spPagamento;
select * from tb_Plano;
select * from tb_Pagamento;
select * from tb_Usuario;