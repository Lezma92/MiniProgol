use miniprog_quinielas;


SHOW TABLES;
select * from equipos;

SELECT * FROM ENCUENTROS;
SELECT 
    e.id,
    (SELECT 
            nombre
        FROM
            equipos
        WHERE
            id = id_eq_local) AS eq_local,
    (SELECT 
            url_img
        FROM
            equipos
        WHERE
            id = id_eq_local) AS img_local,
    (SELECT 
            nombre
        FROM
            equipos
        WHERE
            id = id_eq_visi) AS eq_visi,
    (SELECT 
            url_img
        FROM
            equipos
        WHERE
            id = id_eq_visi) AS img_visi
FROM
    ENCUENTROS AS e
WHERE
    e.id_jornada = 1;