CREATE DATABASE phalcon_relationships WITH ENCODING='UTF-8';

\c phalcon_relationships;

CREATE TABLE document_histories (
    id serial4 NOT NULL,
    id_document int4 NOT NULL,
    CONSTRAINT document_histories_pkey PRIMARY KEY (id)
);

CREATE TABLE documents (
    id serial4 NOT NULL,
    number varchar(255),
    CONSTRAINT documents_pkey PRIMARY KEY (id)
);

ALTER TABLE document_histories ADD CONSTRAINT "fk.document_histories.id_document" FOREIGN KEY (id_document) REFERENCES documents(id) ON DELETE CASCADE;

INSERT INTO documents (id, number) VALUES (1, '1');
INSERT INTO documents (id, number) VALUES (2, '2');

INSERT INTO document_histories (id_document) VALUES (2);