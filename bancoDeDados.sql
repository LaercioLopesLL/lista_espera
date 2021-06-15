-- CRIA BANCO DE DADOS

CREATE DATABASE lista_espera ENCODING = 'UTF8';


-- CRIA TABELAS

CREATE TABLE alunos (
    id SERIAL PRIMARY KEY,
    nome character varying(45) NOT NULL,
    datanasc date NOT NULL,
    cpf character varying(14) NOT NULL,
    telefone character varying(16) NOT NULL,
    whatsapp character varying(16) NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);

CREATE TABLE cursos (
    id SERIAL PRIMARY KEY,
    nome character varying(80) NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);

CREATE TABLE cursos_alunos (
    curso_id bigint NOT NULL,
    aluno_id bigint NOT NULL,
    CONSTRAINT cursos_alunos_aluno_id_foreign FOREIGN KEY (aluno_id)
        REFERENCES alunos(id),
    CONSTRAINT cursos_alunos_curso_id_foreign FOREIGN KEY (curso_id)
        REFERENCES cursos(id)
);