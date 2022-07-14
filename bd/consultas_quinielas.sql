use db_quinielas;

    SELECT 
    tabla.id as id_encuentro,
    tabla.id_jornada,
    (SELECT 
            id
        FROM
            equipos
        WHERE
            nombre = tabla.equipo_local) id_equi_local,
    (SELECT 
            id
        FROM
            equipos
        WHERE
            nombre = tabla.equipo_visitante) id_equi_visit,
    tabla.equipo_local,
    tabla.equipo_visitante,
    (SELECT 
            url_img
        FROM
            equipos
        WHERE
            nombre = tabla.equipo_local) url_img_local,
    (SELECT 
            url_img
        FROM
            equipos
        WHERE
            nombre = tabla.equipo_visitante) url_img_visi,
    (SELECT 
            stats_encuentros
        FROM
            jornadas
        WHERE
            id = tabla.id_jornada) stats_encuentros
FROM
    (SELECT 
        id,
            id_jornada,
            (SELECT 
                    nombre
                FROM
                    equipos
                WHERE
                    id = en.id_eq_local) equipo_local,
            (SELECT 
                    nombre
                FROM
                    equipos
                WHERE
                    id = en.id_eq_visi) equipo_visitante
    FROM
        encuentros AS en
    WHERE
        en.id_jornada = 1
    GROUP BY en.id) tabla;
        
        
	delimiter //
    create procedure mostrarEncuentros(in id_jornada int(11))
    begin
    SELECT 
    tabla.id as id_encuentro,
    tabla.id_jornada,
    (SELECT 
            id
        FROM
            equipos
        WHERE
            nombre = tabla.equipo_local) id_equi_local,
    (SELECT 
            id
        FROM
            equipos
        WHERE
            nombre = tabla.equipo_visitante) id_equi_visit,
    tabla.equipo_local,
    tabla.equipo_visitante,
    (SELECT 
            url_img
        FROM
            equipos
        WHERE
            nombre = tabla.equipo_local) url_img_local,
    (SELECT 
            url_img
        FROM
            equipos
        WHERE
            nombre = tabla.equipo_visitante) url_img_visi,
    (SELECT 
            stats_encuentros
        FROM
            jornadas
        WHERE
            id = tabla.id_jornada) stats_encuentros
FROM
    (SELECT 
        id,
            id_jornada,
            (SELECT 
                    nombre
                FROM
                    equipos
                WHERE
                    id = en.id_eq_local) equipo_local,
            (SELECT 
                    nombre
                FROM
                    equipos
                WHERE
                    id = en.id_eq_visi) equipo_visitante
    FROM
        encuentros AS en 
    WHERE
        en.id_jornada = id_jornada
    GROUP BY en.id) tabla;
    end //
    
    call mostrarEncuentros(1);
