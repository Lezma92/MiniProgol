SELECT 
    q.id AS idQuinielas,
    q.id_ligas AS idLigas,
    q.id_jornada AS idJornada,
    q.id_acceso AS idAcceso,
    q.nombre_quiniela AS nomQuiniela,
    j.nombre AS nomJornada,
    (SELECT 
            nombre
        FROM
            ligas
        WHERE
            id = q.id_ligas) nomLigas,
    q.fecha_registro,
    DATE_ADD(q.fecha_registro,
        INTERVAL 3 DAY) AS diasAtras
FROM
    quinielas AS q
        INNER JOIN
    jornadas AS j ON j.id = q.id_jornada
WHERE
    q.id_acceso = 12
        AND DATE_ADD(q.fecha_registro,
        INTERVAL 10 DAY) > CURRENT_TIMESTAMP()
        AND j.estado = 'A'
        OR j.estado = 'D'
GROUP BY q.id;