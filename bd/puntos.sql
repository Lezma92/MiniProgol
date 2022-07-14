select * from quinielas,encuentros,puntos;
SELECT 
    count(q.id) as puntos
FROM
    quinielas AS q
        INNER JOIN
    puntos AS p ON q.id = p.id_quiniela
        INNER JOIN
    encuentros AS e ON e.resultado = p.voto_a and e.id=p.id_encuentro where q.id = 5 group by p.id_quiniela;
    
    
    SELECT 
    qui.id AS id_quiniela,
    qui.nombre_quiniela,
    pt.voto_a,
    enc.resultado,
    IF(pt.voto_a = enc.resultado,
        'Verde',
        'Blanco') AS colorColumna,
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
        GROUP BY p.id_quiniela,q.id) totalPuntos
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