use miniprog_quinielas;
select current_timestamp();
select * from encuentros;
DELIMITER ab
CREATE PROCEDURE mostrarQuinielas(in id_jornada int(11))
BEGIN
SELECT 
    j.id_ligas,
    j.id AS id_jornada,
    j.nombre AS nombre_jornada,
    j.stats_encuentros,
    j.fecha_hora_cierre,
    enc.id AS id_encuentros,
    enc.id_eq_local AS id_equi_local,
    enc.id_eq_visi AS id_equi_visit, (SELECT 
            nombre
        FROM
            equipos
        WHERE
            nombre = enc.id_eq_local) equipo_local,
    (SELECT 
            nombre
        FROM
            equipos
        WHERE
            nombre = enc.id_eq_visi) equipo_visitante,
    (SELECT 
            url_img
        FROM
            equipos
        WHERE
            nombre = enc.id_eq_local) url_img_local,
    (SELECT 
            url_img
        FROM
            equipos
        WHERE
            nombre = enc.id_eq_visi) url_img_visi
FROM
    jornadas AS j
        INNER JOIN
    encuentros AS enc ON enc.id_jornada = j.id
WHERE
    j.stats_encuentros = 'Abierto'
        AND j.fecha_hora_cierre > CURRENT_TIMESTAMP()
        AND j.id = id_jornada
GROUP BY enc.id;
END ab