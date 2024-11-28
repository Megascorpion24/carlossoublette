
function identificacion(modulo) {
   
        switch (modulo.toUpperCase()) {
          case "L":
            return "Login";
          case "GU":
            return "Gestión de Usuarios";
          case "GD":
            return "Gestión de Docentes";
          case "GR":
            return "Gestión de Representantes";
          case "GI":
            return "Gestión de Inscripciones";
          case "GP":
            return "Gestión de Pagos";
          case "GM":
            return "Gestión de Materias";
          case "GS":
            return "Gestión de Secciones";
          case "GAA":
            return "Gestión de Año Académico";
          case "GE":
            return "Gestión de Eventos";
          case "GH":
            return "Gestión de Horarios";
          case "GSEG":
            return "Gestión de Seguridad";
          case "GMANT":
            return "Gestión de Mantenimiento";
          default:
            return "Abreviatura no válida";
        }
     
}

export { identificacion };
