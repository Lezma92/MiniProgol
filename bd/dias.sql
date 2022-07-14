SELECT 
    CASE (DATE_FORMAT(lg.fecha_registro, '%W'))
        WHEN 'Monday' THEN 'Lunes'
        WHEN 'Tuesday' THEN 'Martes'
        WHEN 'Wednesday' THEN 'Miércoles'
        WHEN 'Thursday' THEN 'Jueves'
        WHEN 'Friday' THEN 'Viernes'
        WHEN 'Saturday' THEN 'Sábado'
        WHEN 'Sunday' THEN 'Domingo'
    END dias
FROM
    ligas AS lg
        INNER JOIN
    jornadas AS jor ON lg.id = jor.id_ligas
WHERE
    lg.estado = 'Activo'
        AND jor.stats_encuentros = 'Abierto';