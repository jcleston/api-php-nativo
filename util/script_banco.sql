-- public.clientes definition

-- Drop table

-- DROP TABLE public.clientes;

CREATE TABLE public.clientes (
	id bigserial NOT NULL,
	nome varchar NULL,
	email varchar NULL,
	cidade varchar NULL,
	estado varchar NULL,
	telefone varchar NULL,
	CONSTRAINT clientes_pk PRIMARY KEY (id)
);