

        <div class="contenido">

            <div id="titulo">
                <h2>Creación de pregunta</h2>
            </div>
            <!-- TODO : <form action="index.php?controller=pregunta&action=create" method="post"> -->
            <form id="formCrearPregunta" action="index.php?controller=pregunta&action=crear" method="post">

                <div>
                    <label for="enunciado">Enunciado</label>
                    <input type="text" id="enunciado" name="enunciado" required>
                </div>
                <div>
                    <label for="tema">Tema</label>
                    <select name="tema" id="tema" required>
                        <option>Seleccionar opción</option>
                        <option value="diseno_aeronaves">Diseño y Desarrollo de Aeronaves</option>
                        <option value="fabricacion_produccion">Fabricación y Producción</option>
                        <option value="mantenimiento_operaciones">Mantenimiento y Operaciones</option>
                        <option value="innovacion_sostenibilidad">Innovación y Sostenibilidad</option>
                        <option value="certificaciones_reglamentacion">Certificaciones y Reglamentación</option>
                        <option value="problemas_tecnicos">Problemas Técnicos y Soluciones</option>
                        <option value="colaboracion_interdepartamental">Colaboración Interdepartamental</option>
                        <option value="software_herramientas">Software y Herramientas de Ingeniería</option>
                        <option value="gestion_conocimiento">Gestión del Conocimiento</option>
                        <option value="otro">Otro</option>
                    </select>
                </div>
                <div>
                    <label for="descripcion">Descripción</label>
                    <input type="text" id="descripcion" name="descripcion" required>
                </div>

                <input type="submit" id="bCrearPregunta" class="bCrearPregunta" value="Crear pregunta">
                <a href="foro.html" class="bVolver">Cancelar</a>

            </form>

        </div>


    </main>

    <script src="../assets/javascript/menuPerfil.js"></script>
    <script src="../assets/javascript/crearPregunta.js"></script>

</body>
</html>