#importar la libreria urllib 
import urllib.request, urllib.parse, urllib.error, operator
import re

datos=[]
def eliminaEtiqueta(value):
    return re.sub(r'<[^>]*?>', '', value)
# direccio
# telefono
def crearRegistro(nombre,rue,director,direccion,telefono,dependencia,nivel,turno,departamento,provincia,municipio,distrito,areageografica,coordenadax,coordenaday):
    registro = "INSERT INTO colegios(nombre,rue,director,direccion,telefono,dependencia,nivel,turno,departamento,provincia,municipio,distrito,areageografica,coordenadax,coordenaday)"
    registro=registro+"value('"+nombre+"','"+rue+"','"+director+"','"+direccion+"','"+telefono+"','"+dependencia+"','"+nivel+"','"+turno+"','"+departamento+"','"+provincia+"','"+municipio+"','"+distrito
    registro = registro+"','"+areageografica+"','"+coordenadax+"','"+coordenaday+"');"
    return registro+"\n"

def dato(linea,buscado):
    respuesta="";
    pos = linea.find(buscado)
    if pos>=0:
        nombre=linea[16-len(linea)+1:]
        if(nombre!=buscado+":"):
            respuesta=nombre
    return respuesta

def vectorar(rue):
    url = "https://seie.minedu.gob.bo/reportes/mapas_unidades_educativas/ficha/ver/"+str(rue)
    url_data=urllib.request.urlopen(url)
    i=1
    for line in url_data:
        linea =(eliminaEtiqueta(line.decode().strip())).strip()
        if((i<124)&(i>54)):
            if linea:
                datos.append(linea)
                #print(linea)
        if(i>=124):
            break            
        i=i+1
        
    return datos


rue = 81986840
while(rue<81989999):
    archivo = open('colegios.txt', 'a', encoding='utf-8')
    while (rue % 10!=0):
        datos=[]
        vectorar(rue)
        if(len(datos)==30):
            nombre=datos[0]
            rude=datos[1]
            director=datos[6]
            direccion=datos[8]
            telefono=datos[10]
            dependencia=datos[12]
            niveles=datos[14]
            turno=datos[16]
            departamento=datos[19]
            provincia=datos[21]
            municipio=datos[23]
            distrito=datos[25]
            areageografica=datos[27]
            coordenadas=datos[29].split(" ")
            datos[28]=coordenadas[1]
            datos[29]=coordenadas[3]
            coordenadax=datos[28]
            coordenaday=datos[29]
            sql=crearRegistro(nombre, rude, director, direccion, telefono, dependencia, niveles, turno,departamento, provincia, municipio, distrito, areageografica, coordenadax, coordenaday)
            archivo.write(sql)
            print(rue)
        else:
            print("not found: "+str(rue))
        rue=rue+1
    print("terminer un intervalo:"+ str(rue))
    archivo.write("ya voy por aca"+str(rue)+"\n")
    rue=rue+1
    archivo.close()
    