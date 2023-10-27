/* EJECUTAR ESTE SCRIPT EN SU CONEXIÓN */

CREATE SEQUENCE usuario_seq
  START WITH 1
  INCREMENT BY 1
  NOMAXVALUE;

CREATE TABLE usuario (
    idusuario NUMBER DEFAULT usuario_seq.NEXTVAL PRIMARY KEY,
    username VARCHAR2(100),
    password VARCHAR2(100),
    estatus NUMBER DEFAULT 1
);

------------------------------------------------------------------------

/* TABLA PRODUCTO */

-- Crear una secuencia para id_producto
CREATE SEQUENCE producto_seq
START WITH 1
INCREMENT BY 1
NOCACHE
NOCYCLE;

-- Crear la tabla "producto" utilizando la secuencia y la restricción de "estado"
CREATE TABLE producto (
    id_producto NUMBER,
    titulo VARCHAR2(255),
    descripcion CLOB,
    precio NUMBER(10, 2),
    url VARCHAR2(500),
    id_marca NUMBER,
    estado NUMBER(1) DEFAULT 1, -- Usamos NUMBER(1) para representar 0 o 1
    CONSTRAINT chk_estado CHECK (estado IN (0, 1)) -- Restricción de "estado"
);

-- Crear una clave primaria utilizando la secuencia
ALTER TABLE producto ADD CONSTRAINT pk_producto PRIMARY KEY (id_producto);

-- Crear un disparador (trigger) para insertar valores en id_producto
CREATE OR REPLACE TRIGGER producto_id_trigger
BEFORE INSERT ON producto
FOR EACH ROW
BEGIN
    SELECT producto_seq.NEXTVAL
    INTO :NEW.id_producto
    FROM dual;
END;

/* TABLA CATEGORIA */

-- Crear una secuencia para id_categoria
CREATE SEQUENCE categoria_seq
START WITH 1
INCREMENT BY 1
NOCACHE
NOCYCLE;

-- Crear la tabla "categoria" utilizando la secuencia y la restricción de "estado"
CREATE TABLE categoria (
    id_categoria NUMBER,
    descripcion VARCHAR2(255),
    estado NUMBER(1) DEFAULT 1,
    CONSTRAINT chk_estado_categoria CHECK (estado IN (0, 1))
);

-- Crear una clave primaria utilizando la secuencia
ALTER TABLE categoria ADD CONSTRAINT pk_categoria PRIMARY KEY (id_categoria);

-- Crear un disparador (trigger) para insertar valores en id_categoria
CREATE OR REPLACE TRIGGER categoria_id_trigger
BEFORE INSERT ON categoria
FOR EACH ROW
BEGIN
    SELECT categoria_seq.NEXTVAL
    INTO :NEW.id_categoria
    FROM dual;
END;
/

/* TABLA MARCA */

-- Crear una secuencia para id_marca
CREATE SEQUENCE marca_seq
START WITH 1
INCREMENT BY 1
NOCACHE
NOCYCLE;

-- Crear la tabla "marca" utilizando la secuencia y la restricción de "estado"
CREATE TABLE marca (
    id_marca NUMBER,
    descripcion VARCHAR2(255),
    estado NUMBER(1) DEFAULT 1,
    CONSTRAINT chk_estado_marca CHECK (estado IN (0, 1))
);

-- Crear una clave primaria utilizando la secuencia
ALTER TABLE marca ADD CONSTRAINT pk_marca PRIMARY KEY (id_marca);

-- Crear un disparador (trigger) para insertar valores en id_marca
CREATE OR REPLACE TRIGGER marca_id_trigger
BEFORE INSERT ON marca
FOR EACH ROW
BEGIN
    SELECT marca_seq.NEXTVAL
    INTO :NEW.id_marca
    FROM dual;
END;
/

/* TABLA PRODUCTO_CATEGORIA */

-- Crear una secuencia para id_producto_categoria
CREATE SEQUENCE producto_categoria_seq
START WITH 1
INCREMENT BY 1
NOCACHE
NOCYCLE;

-- Crear la tabla "producto_categoria" utilizando la secuencia y la restricción de "estado"
CREATE TABLE producto_categoria (
    id_producto_categoria NUMBER,
    id_categoria NUMBER,
    id_producto NUMBER,
    estado NUMBER(1) DEFAULT 1,
    CONSTRAINT chk_estado_producto_categoria CHECK (estado IN (0, 1))
);

-- Crear una clave primaria utilizando la secuencia
ALTER TABLE producto_categoria ADD CONSTRAINT pk_producto_categoria PRIMARY KEY (id_producto_categoria);

-- Crear un disparador (trigger) para insertar valores en id_producto_categoria
CREATE OR REPLACE TRIGGER producto_categoria_id_trigger
BEFORE INSERT ON producto_categoria
FOR EACH ROW
BEGIN
    SELECT producto_categoria_seq.NEXTVAL
    INTO :NEW.id_producto_categoria
    FROM dual;
END;
/