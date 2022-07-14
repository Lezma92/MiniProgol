use db_quinielas;

select * from ligas, jornadas;

SELECT 
    lg.id AS id_ligas,
    lg.nombre AS nombre_liga,
    lg.src_img AS img_liga,
    lg.estado AS estado_liga,
    jor.id AS id_jornada,
    jor.nombre AS nombre_jornada
FROM
    ligas AS lg
        INNER JOIN
    jornadas AS jor ON lg.id = jor.id_ligas
WHERE
    lg.estado = 'Activo'
        AND jor.stats_encuentros = 'Abierto';
    