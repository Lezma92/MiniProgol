SELECT 
    qui.id AS id_quiniela,
    qui.nombre_quiniela,
    pt.voto_a,
    enc.resultado,
    IF(pt.voto_a = enc.resultado,
        'Verde',
        IF(enc.resultado = 'C',
            'Naranja',
            'Blanco')) AS colorColumna,
    (SELECT 
            COUNT(q.id) AS puntos
        FROM
            quinielas AS q
                INNER JOIN
            puntos AS p ON q.id = p.id_quiniela
                INNER JOIN
            encuentros AS e ON e.resultado = p.voto_a
                AND e.id = p.id_encuentro
        WHERE
            q.id = qui.id
        GROUP BY p.id_quiniela) totalPuntos
FROM
    quinielas AS qui
        INNER JOIN
    puntos AS pt ON qui.id = pt.id_quiniela
        LEFT JOIN
    encuentros AS enc ON enc.id = pt.id_encuentro
WHERE
    qui.id_ligas = 1 AND qui.id_jornada = 1
GROUP BY qui.id , pt.id
ORDER BY totalPuntos DESC , qui.id , enc.id ASC;

SELECT 
    qui.id AS id_quiniela,
    qui.nombre_quiniela,
    pt.voto_a,
    enc.resultado,
    IF(pt.voto_a = enc.resultado,
        'Verde',
        'Blanco') AS colorColumna,
    ifnull((SELECT 
            COUNT(q.id) AS puntos
        FROM
            quinielas AS q
                INNER JOIN
            puntos AS p ON q.id = p.id_quiniela
                INNER JOIN
            encuentros AS e ON e.resultado = p.voto_a
                AND e.id = p.id_encuentro
        WHERE
            q.id = qui.id
        GROUP BY p.id_quiniela),0) totalPuntos
FROM
    quinielas AS qui
        INNER JOIN
    puntos AS pt ON qui.id = pt.id_quiniela
        LEFT JOIN
    encuentros AS enc ON enc.id = pt.id_encuentro
WHERE
    qui.id_ligas = 1 AND qui.id_jornada = 2
GROUP BY qui.id , pt.id
ORDER BY totalPuntos DESC , qui.id , enc.id ASC