<?php
class datos {
    private $ip = "localhost";
    private $bd = "colegiocarlossoublette";
    private $bd1 = "colegiocarlossoublette_usuario";
    private $usuario = "root";
    
    private $contrasena = "";

    private $privateKey = '-----BEGIN PRIVATE KEY-----
MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCX+z+UyDygly6L
Pi9GVi5D3o4WOXCEjL9ykReBjG2v81XjsE0hIq/7gvQi6UORxixOPxiO4Jfp1lXR
3LrTI6szFNVZvXral9W85CYcPMHg5RAbL6SyO+5QWemZnbS9jsHNYinZrZ6wGW6I
cCcDPwitaZm+CiTqJo66eRx2Z9tvzxlic+5w8jLSDR/Wd1CCz2hFDhV00Lp9BjIf
eBkwEd9/LydrHGnPx7DwJPZszVBstlRZWwHchKfvOB7f4bMiBSfyzYOiVKVnX8MI
RWF/WwA6T2Tzbw+c5PgRb8v77sj4mVnkTG4RcubjnNxymgqvAOWWtsONVO1WjcBK
Z4TmMlSBAgMBAAECggEAC8vXycXH9OP/HBYpx7EROrnXt/Bh5BvjkTIjS64ZZmaB
9F//AJMnayNlLR+DW9lwn2skzhQvHlqBQz55bsFuPJMBo0tCcZyG3bgsoBT0LG9D
EoUeaKofq3NrHv3/ZRYjQzx7CJcCAeObcXIZCRa3pvQTF43EgzsWaXFUjPkvLkyb
UCmojcQ/mubeVYMQp/ggnzAyYahqThrLWgnFyNm1Kj8k7FeDr9eFMa1dRjx6xpjz
ffh2x8T9XbtdgdAOXe2HelMadKi2B2587umkVQ6CsQ6FUIGoa5NM5GEsOaZfkVTl
JGj5uR0YhxWnXDepDxtFZPa7oN5aZDmzJbrRdq9MpQKBgQDWB+0COvR7LnspJoxq
yo+GurLgBiQ5VrbDPw1u/iW3YWmO5xzJzRSrQOuMvbPm5zZnxi+R/vNZy+X0ByKb
MoiFoj1t69MK3ucPIXH4geERs3qUTn5YZlhdHdvJl0ySiGkLIZBNKXn8eNKoWOOA
WmK6AAswcdPQDgyGeB+jjElNFQKBgQC1yISL452zQME4oki5J1G0aBSL3QaQ84aH
1act3nSxTz16ci+cN9WBwV05CbzZFGD0vo25qHWORLOAANdXjKZyoyuUovVe/UEJ
FbbMsK96xYchJARVkToiQjkgW+wRo5Y7vzf55fsfektBwhFdylp7CvTe+4w5OSaH
3ol/KdW8vQKBgQC+gDd4cLkCmxCMQ/9fXgP5y1tDArRjRMdPaWOvkw5G9rFZvGNn
St5Gv3Xow0DJGKrYGxJkRCSdnFqEpYUr1gKlzw4WNHyXhGbslLw4kIGfm7xTHLpg
PFgSKW1jNQO2uSul+K3TwEMPcQsvRE7aA5k0LK3I5Me+u4JyfaDLlSX5MQKBgFQT
PLKSgLKSRYuTCz2PYOumo7IYdNv/tf4HI/5EAAat1opWW4zOChKsQxiJV22zTjCE
HXp73nsBbV/Lg817QNSOgS6KvB/F1BmGkHhVU6PdzeTXCqYkuBV2OYOs4B88YNSb
WSFca+wgHMR6JJwTZgu4go7LGwywURDQLRnCWJelAoGAd5K8BQGc6BSU1PePLTMt
NcFh8zm7trhXUuGbjI+DzJsx3mInyiI2S8K+/kpKi+TKnlbr0FagO4luFpYx5yiU
6psYvBmL4ATI4ARJHHdPufjf/7oRVMF7671H/Fb71u3Ef42c0ffjRNfUtcNedemU
1EQk5kXb2ILhr/SQrbA/ECc=
-----END PRIVATE KEY-----';




    protected function conecta() {
        $pdo = new PDO("mysql:host=".$this->ip.";dbname=".$this->bd."", $this->usuario, $this->contrasena);
        $pdo->exec("set names utf8");
        return $pdo;
    }
    protected function conecta1() {
        $pdo = new PDO("mysql:host=".$this->ip.";dbname=".$this->bd1."", $this->usuario, $this->contrasena);
        $pdo->exec("set names utf8");
        return $pdo;
    }

    function decryptMessage($encryptedMessage) {
        openssl_private_decrypt(base64_decode($encryptedMessage), $decryptedMessage, $this->privateKey);
        return $decryptedMessage;
    }

    

    function existe($cedula, $consul, $parametro){
		
		$co = $this->conecta();
		
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		
		try{
			
			$resultado = $co->prepare($consul);
			
			$resultado->bindParam($parametro,$cedula);
			$resultado->execute();
			$fila = $resultado->fetchAll(PDO::FETCH_BOTH);
			if($fila){ 

				return true; 
			    
			}
			else{
				
				return false; 
			}
			
		}catch(Exception $e){
			
			return false;
		}
	}

    function existe98($cedula, $consul, $parametro){
		
		$co = $this->conecta1();
		
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		
		try{
			
			$resultado = $co->prepare($consul);
			
			$resultado->bindParam($parametro,$cedula);
			$resultado->execute();
			$fila = $resultado->fetchAll(PDO::FETCH_BOTH);
			if($fila){ 

				return true; 
			    
			}
			else{
				
				return false; 
			}
			
		}catch(Exception $e){
			
			return false;
		}
	}



    public function registrar_bitacora($accion, $modulo, $id) {
        $sql = "INSERT INTO bitacora (fecha, accion, modulo, id_usuario) 
                VALUES(CURDATE(), :accion, :modulo, :id_usuario)";

        $stmt = $this->conecta1()->prepare($sql);

        $stmt->execute(array(
            ":accion" => $accion,
            ":modulo" => $modulo,
            ":id_usuario" => $id
        ));
    }
}
?>
