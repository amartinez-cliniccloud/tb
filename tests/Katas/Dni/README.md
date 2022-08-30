# Kata DNI
# Producto a Desarrollar
Un DNI (Documento Nacional de Identidad) es un identificador que consta de ocho cifras numéricas y una letra que actúa 
como dígito de control. Existen algunos casos particulares en los que el primer número se sustituye por una letra y ésta, 
a su vez, por un número para el cómputo de validez que viene a continuación. 
Este último es el caso del NIE o Número de Identificación para Extranjeros residentes.

El algoritmo para validar un DNI es muy sencillo: se toma la parte del numero del documento y se divide entre 23 
y se obtiene el resto. Ese resto es un índice que se consulta en una tabla de letras. La letra correspondiente 
al índice es la que debería tener un DNI válido. Por tanto, si la letra del DNI concuerda con la que hemos obtenido, 
es que es válido.

* Son cadenas de 9 caracteres.
* Los primeros 8 caracteres son números, y el último es una letra.
* La letra puede ser cualquiera, excepto U, I, O y Ñ.
* La última letra se obtiene a partir de un algoritmo que la consulta de una tabla a partir de obtener el resto de dividir la suma de los dígitos numéricos entre 23. Si la letra suministrada no se corresponde con la calculada, el DNI no es válido.
* El primer carácter puede ser X, Y o Z, lo que indica un NIE (Número de identificación para personas extranjeras).
* Para la validación, las letras XYZ se reemplazan por 0, 1 ó 2, respectivamente.


| RESTO | LETRA |
|:------|:-----:|
| 0     |   T   |
| 1     |   R   |
| 2     |   W   |
| 3     |   A   |
| 4     |   G   |
| 5     |   M   |
| 6     |   Y   |
| 7     |   F   |
| 8     |   P   |
| 9     |   D   |
| 10    |   X   |
| 11    |   B   |
| 12    |   N   |
| 13    |   J   |
| 14    |   Z   |
| 15    |   S   |
| 16    |   Q   |
| 17    |   V   |
| 18    |   H   |
| 19    |   L   |
| 20    |   C   |
| 21    |   K   |
| 22    |   E   |

