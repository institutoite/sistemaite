# importar la libreria urllib
import urllib.request
import urllib.parse
import urllib.error
import operator
import re
try:
    url = "https://eldeber.com.bo/"
    url_data = urllib.request.urlopen(url)
    i = 1
    for line in url_data:
        linea = (eliminaEtiqueta(line.decode().strip())).strip()
            print(linea)
        i = i+1
except Exception as err:
    print("Error:", err)

