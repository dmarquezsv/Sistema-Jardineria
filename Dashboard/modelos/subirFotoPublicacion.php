<?php 

            require_once '../../main/mainModel.php';

            session_start();


            if (isset($_POST['SubirImg'])) 
            {
               $IDplanta = $_POST['idVideo'];
                $NombreImg = $_POST['nomimg'];


                if($_FILES["imgusu"]["error"]>0){
            //Si entra aqui es porque ha tenido un error al subir la img

                    header("Location: ../?vistas=DetallesVideos&id=".$IDplanta);
                    $_SESSION['message'] = "No has selecciona el archivo";

                }else
                {

                    if($NombreImg != "image_1.jpg")
                    {
                        if ($NombreImg !=null) {
                            $destino = "../img/".$NombreImg;
                            unlink($destino);
                        }
                    }



                     //Si entra aqui es porqueno tenemos ningun error
                    $tipoimg = array("image/jpg","image/png","image/jpeg");

        //verifica con la funcion in_array si el tipo de la imagen es igual a algun tipo de dato en la variable $tipoimg
                    if(in_array($_FILES["imgusu"]["type"], $tipoimg)){

            //hacemos referencia a la ruta donde guardaremos la imagen
                        $rutaimg = '../img/';

            //guardamos la extencion de la imagen
                        $extensionimg = explode("/",$_FILES["imgusu"]["type"]);

            //se genera un numero de 5 cifras para renombrar la imagen
            //esto es opcional porque esto lo utilice para mis imagenes
                        $d="0000".$IDplanta;

            //en la variable $nombreimg concatenamos toda la ruta y el nombre de la imagen para
            //que no se escriba si hay otra imagen con el mismo nombre en esa ruta
                        $nombreimg = $rutaimg . "img" .$d . "." . $extensionimg[1];

            //guardamos solo el nombre de la imagen con su extencion
                        $img = "img" . $d . "." . $extensionimg[1];

            //verificamos si existe la carpeta /img y si no existe se crea
                        if(!file_exists($rutaimg)){
                            mkdir($rutaimg);
                        }


            //verificamos si existe una imagen con 
                        if(!file_exists($nombreimg)){               
                //guardando el nombre de la imagen en la base de datos



                //copiano la imagen con la funcion @move_uploaded_file()
                //y como parametros le pasamos la imagen que subio el usuario
                //y como segundo parametro toda la ruta hasta con el nombre de la imagen para que la guarde
                            $resultadoimg = @move_uploaded_file($_FILES["imgusu"]["tmp_name"], $nombreimg);

                //Consulta de actualización de datos
                            $respuesta = new mainModel();
                            $sql = "UPDATE `video` SET `img` = :img WHERE `IDVideo` = :IDVideo";
                            $stmt = $respuesta->conectar()->prepare($sql);
                            $stmt->bindParam(":img",$img);
                            $stmt->bindParam(":IDVideo",$IDplanta);

                //Verifica si ha insertado los datos
                            if ($stmt->execute()) 
                            {
                //Si todo fue correcto muestra el resultado con exito;

                                $_SESSION['message'] = 'Imagen Cambiada con exito';


                                header("Location: ../?vistas=DetallesVideos&id=".$IDplanta);
                            }
                            else
                            {   

                                $_SESSION['message'] = 'No se pude actualizar la imagen en la BDD';
                                
                                header("Location: ../?vistas=DetallesVideos&id=".$IDplanta);
                            }

                            echo "Si se pudo subir la IMAGEN";
                        }else{

                            $_SESSION['message'] = 'existe una imagen con el mismo nombre generado';
                            $_SESSION['message2'] = 'danger';
                            header("Location: ../?vistas=DetallesVideos&id=".$IDplanta);
                //entra a este else si existe una imagen con el mismo nombre generado
                        }
                    }else{

                        $_SESSION['message'] = 'No se pude cambiar la imagen ya que no esta con una extencion valida';
                        $_SESSION['message2'] = 'danger';
                        header("Location: ../?vistas=DetallesVideos&id=".$IDplanta);
            //Si entra a este else es porque la imagen no esta con una extencion valida

                    }




                    



                    
                    
                }//Fin del else











            }else
            {
                echo "No encuetnra los archivos";
            }


  ?>