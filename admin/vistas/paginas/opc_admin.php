<?php
    echo '<li class="nav-item">
    <a href="'; echo $ruta; echo 'usuarios" class="nav-link">
        <i class="fas fa-users text-info"></i> &nbsp
        <p>Administradores</p>
    </a>
</li>';
echo '<li class="nav-item">
    <a href="'; echo $ruta; echo 'clientes" class="nav-link">
        <i class="fas fa-users text-warning"></i> &nbsp
        <p>Clientes</p>
    </a>
</li>';

echo '<li class="nav-item">
    <a href="'; echo $ruta; echo 'solicitud" class="nav-link">
    <i class="fas fa-hourglass-start text-success"></i> &nbsp
        <p>Solicitudes de alta</p>
    </a>
</li>';
echo '<li class="nav-item">
    <a href="';echo $ruta; echo 'ligas" class="nav-link">
    <i class="fas fa-clipboard-list text-primary"></i> &nbsp
        <p>Ligas</p>
    </a>
</li>';

echo '<li class="nav-item">
    <a href="';echo $ruta; echo 'jugando" class="nav-link">
    <i class="fas fa-futbol text-danger"></i> &nbsp
        <p>Jugando</p>
    </a>
</li>';
