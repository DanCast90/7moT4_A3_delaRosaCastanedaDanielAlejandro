<?php
	include_once("Conexion_bdM.php");
	class AlumnoDAO {
		
		private  $conexion;
		public function __construct(){
			$this->conexion=new ConexionBD();
		}
		
		//=========================Metodos ABCC==========================
		//
		//
		//
		//=========================ALTAS=================================

		public function agregar($nc,$nom,$app,$apm,$edad,$sem,$carr){

				$sql ="INSERT INTO ALUMNOS VALUES('$nc','$nom','$app','$apm',$edad,$sem,'$carr')";


				$res=mysqli_query($this->conexion->getConection(),$sql);
				if($res){
					//echo "Exito";
					header("location:../vista/altas1.php");
					echo "<script> alert('Agregado Correctamente...');</script>";
					
				}else{
					echo "Fracaso";
					echo mysqli_error($this->conexion->getConection());
				}
		}

		//=========================BAJAS===========================================

		public function eliminar($nc){
			$sql="DELETE FROM ALUMNOS WHERE Num_Control='$nc'";
			
			$res=mysqli_query($this->conexion->getConection(),$sql);
			if($res){
					echo "Exito";
					header("location:../vista/bajas.php");
					//echo "<script> alert('Agregado Correctamente...');</script>";
					
				}else{
					echo "Fracaso";
					echo mysqli_error($this->conexion->getConection());
				}
		}
  	public function modificar($NumControl, $name, $fAp, $sAp, $age, $sem, $car){

            $stmt = mysqli_prepare($this->conexion->getConection(), "UPDATE alumnos SET Nombre_Alumno = ?, Primer_Ap_Alumno = ?, Segundo_Ap_Alumno = ?, edad = ?, Semestre = ?, Carrera = ? WHERE Num_Control=?");
            mysqli_stmt_bind_param($stmt, 'sssiiss', $name, $fAp, $sAp, $age, $sem, $car, $NumControl);

            if ( mysqli_stmt_execute($stmt) ) {
                mysqli_stmt_close($stmt);
                header("location:../vista/formulario_actualizar.php");
                // return true;
            } else {
                mysqli_stmt_close($stmt);
                header("location:../vista/menu_principal.html.php");
                //return false;
            }

        }



		//==============================CONSULTAS==========================================

		public function mostrarTodos(){
			$sql="SELECT * FROM ALUMNOS";
			
			$res=mysqli_query($this->conexion->getConection(),$sql);
			if($res){
					
					return $res;
					//echo "<script> alert('Agregado Correctamente...');</script>";
					
				}else{
					echo "Fracaso";
					echo mysqli_error($this->conexion->getConection());
					return -1;
				}
		}

	


        // ============================================ CONSULTAS ============================================
    

        public function consultaEspesifica($Busqueda) {

            $stmt = mysqli_prepare($this->conexion->getConection(), "SELECT * FROM alumnos WHERE Num_Control like ? OR Nombre_Alumno like ? OR Primer_Ap_Alumno like ? OR Segundo_Ap_Alumno like ? OR edad = ? OR Semestre = ? OR Carrera like ?");
            $BusquedaINT = $Busqueda;
            $BusquedaTXT = "%".$Busqueda."%";
            mysqli_stmt_bind_param($stmt, 'ssssiis', $BusquedaTXT, $BusquedaTXT, $BusquedaTXT, $BusquedaTXT, $BusquedaINT, $BusquedaINT, $BusquedaTXT);

            if ( mysqli_stmt_execute($stmt) ) {
                $res = $stmt->get_result();
                mysqli_stmt_close($stmt);
                return $res;
            } else {
                mysqli_stmt_close($stmt);
            }

        }

        public function consultaEspNumCont($numeroDeControl) {
            $stmt = mysqli_prepare($this->conexion->getConection(), "SELECT * FROM alumnos WHERE Num_Control = ? ");
            mysqli_stmt_bind_param($stmt, 's', $numeroDeControl);

            if ( mysqli_stmt_execute($stmt) ) {
                $res = $stmt->get_result();
                mysqli_stmt_close($stmt);
                return $res;
                
            } else {

                mysqli_stmt_close($stmt);

            }
        }

    }
    

?>