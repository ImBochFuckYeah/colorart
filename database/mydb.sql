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

INSERT INTO usuario (username, password) VALUES ('admin', 'admin');
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
    descripcion VARCHAR2(800),
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

-- Crear un procedimiento almacenado para insertar un producto y su relación con categoría
CREATE OR REPLACE PROCEDURE InsertarProducto(
    p_titulo VARCHAR2,
    p_descripcion VARCHAR2,
    p_precio NUMBER,
    p_url VARCHAR2,
    p_id_marca NUMBER,
    p_id_categoria NUMBER,
    p_estado NUMBER
) AS
BEGIN
    DECLARE
        v_id_producto NUMBER;
    BEGIN
        INSERT INTO producto (titulo, descripcion, precio, url, id_marca, estado)
        VALUES (p_titulo, p_descripcion, p_precio, p_url, p_id_marca, p_estado)
        RETURNING id_producto INTO v_id_producto;
        
        INSERT INTO producto_categoria (id_producto, id_categoria, estado)
        VALUES (v_id_producto, p_id_categoria, p_estado);
        
        COMMIT;
        DBMS_OUTPUT.PUT_LINE('Producto y relación con categoría insertados correctamente');
    EXCEPTION
        WHEN OTHERS THEN
            ROLLBACK;
            DBMS_OUTPUT.PUT_LINE('Error al insertar el producto y la relación con categoría: ' || SQLERRM);
    END;
END;
/

-- Crear un procedimiento almacenado para cambiar el estado de un producto
CREATE OR REPLACE PROCEDURE CambiarEstadoProducto(
    p_id_producto NUMBER,
    p_nuevo_estado NUMBER
) AS
BEGIN
    BEGIN
        UPDATE producto
        SET estado = p_nuevo_estado
        WHERE id_producto = p_id_producto;
        
        IF SQL%ROWCOUNT = 1 THEN
            COMMIT;
            DBMS_OUTPUT.PUT_LINE('Estado del producto actualizado con éxito.');
        ELSE
            ROLLBACK;
            DBMS_OUTPUT.PUT_LINE('El producto no se encontró.');
        END IF;
    EXCEPTION
        WHEN OTHERS THEN
            ROLLBACK;
            DBMS_OUTPUT.PUT_LINE('Error al cambiar el estado del producto: ' || SQLERRM);
    END;
END;
/

-- Crear una vista para obtener datos detallados de producto, marca y categoría
CREATE OR REPLACE VIEW vista_producto AS
SELECT
    p.id_producto,
    p.titulo,
    p.descripcion AS descripcion_producto,
    p.precio,
    p.url,
    m.id_marca,
    m.descripcion AS descripcion_marca,
    c.id_categoria,
    c.descripcion AS descripcion_categoria,
    p.estado AS estado
FROM producto p
JOIN marca m ON p.id_marca = m.id_marca
JOIN producto_categoria pc ON p.id_producto = pc.id_producto
JOIN categoria c ON pc.id_categoria = c.id_categoria;

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

-- Crear un procedimiento almacenado para insertar una categoría
CREATE OR REPLACE PROCEDURE InsertarCategoria(
    p_descripcion VARCHAR2,
    p_estado NUMBER
) AS
BEGIN
    INSERT INTO categoria (descripcion, estado)
    VALUES (p_descripcion, p_estado);
    COMMIT;
    DBMS_OUTPUT.PUT_LINE('Categoría insertada correctamente');
EXCEPTION
    WHEN OTHERS THEN
        ROLLBACK;
        DBMS_OUTPUT.PUT_LINE('Error al insertar la categoría: ' || SQLERRM);
END;
/

-- Crear un procedimiento almacenado para actualizar el estado de una categoría
CREATE OR REPLACE PROCEDURE ActualizarEstadoCategoria(
    p_id_categoria NUMBER,
    p_nuevo_estado NUMBER
) AS
BEGIN
    BEGIN
        UPDATE categoria
        SET estado = p_nuevo_estado
        WHERE id_categoria = p_id_categoria;
        
        IF SQL%ROWCOUNT = 1 THEN
            COMMIT;
            DBMS_OUTPUT.PUT_LINE('Estado de la categoría actualizado con éxito.');
        ELSE
            ROLLBACK;
            DBMS_OUTPUT.PUT_LINE('La categoría no se encontró.');
        END IF;
    EXCEPTION
        WHEN OTHERS THEN
            ROLLBACK;
            DBMS_OUTPUT.PUT_LINE('Error al actualizar el estado de la categoría: ' || SQLERRM);
    END;
END;
/

-- Crear una vista para la tabla "categoria"
CREATE OR REPLACE VIEW vista_categoria AS
SELECT id_categoria, descripcion, estado
FROM categoria;


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

-- Crear un procedimiento almacenado para insertar una marca
CREATE OR REPLACE PROCEDURE InsertarMarca(
    p_descripcion VARCHAR2,
    p_estado NUMBER
) AS
BEGIN
    INSERT INTO marca (descripcion, estado)
    VALUES (p_descripcion, p_estado);
    COMMIT;
    DBMS_OUTPUT.PUT_LINE('Marca insertada correctamente');
EXCEPTION
    WHEN OTHERS THEN
        ROLLBACK;
        DBMS_OUTPUT.PUT_LINE('Error al insertar la marca: ' || SQLERRM);
END;
/

-- Crear un procedimiento almacenado para actualizar el estado de una marca
CREATE OR REPLACE PROCEDURE ActualizarEstadoMarca(
    p_id_marca NUMBER,
    p_nuevo_estado NUMBER
) AS
BEGIN
    BEGIN
        UPDATE marca
        SET estado = p_nuevo_estado
        WHERE id_marca = p_id_marca;
        
        IF SQL%ROWCOUNT = 1 THEN
            COMMIT;
            DBMS_OUTPUT.PUT_LINE('Estado de la marca actualizado con éxito.');
        ELSE
            ROLLBACK;
            DBMS_OUTPUT.PUT_LINE('La marca no se encontró.');
        END IF;
    EXCEPTION
        WHEN OTHERS THEN
            ROLLBACK;
            DBMS_OUTPUT.PUT_LINE('Error al actualizar el estado de la marca: ' || SQLERRM);
    END;
END;
/

-- Crear una vista para la tabla "marca"
CREATE OR REPLACE VIEW vista_marca AS
SELECT id_marca, descripcion, estado
FROM marca;

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