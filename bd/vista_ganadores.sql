use miniprog_quinielas;

SELECT 
    jor.id AS idJornada, lg.id AS idLiga,lg.nombre as nombreLiga, jor.nombre as nombr
FROM
    jornadas AS jor
        INNER JOIN
    ligas AS lg ON jor.id_ligas = lg.id
WHERE
    jor.estado = 'A'
        AND jor.stats_encuentros = 'Abierto';
        
        select * from ligas;
        
        