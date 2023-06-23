<?PHP 

class Alerta 
{



    /**
     * Registra un alerta en el sistema y la guarda en la sesion
     * @param string $tipo El tipo de alerta (success, info, warning, danger)
     * @param string $mensaje El mensaje de la alerta
     */
    public function registrar_alerta(string $tipo, string $mensaje)
    {
        $_SESSION ['alertas'][] = [ //cada vez que llamo al método hago un push de un array de dos posiciones al array de alertas
            'tipo' => $tipo,
            'mensaje' => $mensaje
        ]; 
    }


    /**
     * Vacía la lista de alertas de la sesión
     *
     */
    public function vaciar_alertas()
    {
        $_SESSION ['alertas'] = [];
    }


    /**
     * Devuelve la lista completa de alertas acumuladas en la sesión y vacía la lista
     * @return string
     *
     */
    public function mostrar_alertas(): ?string
    {
        if (!empty($_SESSION['alertas'])) { //si el array de alertas no está vacío
          
            $alertasGuardados = "";

            foreach ($_SESSION['alertas'] as $alerta) { //recorro el array de alertas
                $alertasGuardados .= $this->imprimir_alerta($alerta); //imprimo cada alerta
            }

            $this->vaciar_alertas(); //vacío el array de alertas
            return $alertasGuardados;
        } else {
            return null;
        }
    }


    /**
     * Imprime en pantalla un alerta
     */
    private function imprimir_alerta($alerta):string
    {
        $html = "<div class='alert alert-{$alerta['tipo']} alert-dismissible fade show' role='alert'>";
        $html .= $alerta['mensaje'];
        $html .= "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
        $html .= "</div>";    

        return $html;
    }


}