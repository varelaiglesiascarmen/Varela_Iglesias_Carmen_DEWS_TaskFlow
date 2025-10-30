// 2 puntos por ejercicio (20 pts)

// 1. Suma de dos números
// Escribe una función que tome dos números como argumentos y devuelva su suma.
function suma() {
    let num1= Number(prompt("Dime el primer númer que quieras sumar"));
    let num2 = Number(prompt("Dime el segundo númer que quieras sumar"));
    let total = num1+num2;

    alert("La suma de ambos número es: "+total);
}
// 2. Número par o impar
// Crea una función que reciba un número y devuelva "par" si el número es par, y "impar" si no lo es.
function consultaParOImpar() {
    let num= Number(prompt("Dime el númer que quieras consultar"));

    if(num %2 === 0){
        alert("El número es par");
    } else{
        alert("El número es impar");
    }
}
// 3. Celsius a Fahrenheit
// Escribe una función que convierta una temperatura de grados Celsius a Fahrenheit. La fórmula es: F = C * 9/5 + 32.
function conversionCtoF() {
    let celcius= Number(prompt("¿Cuantos ºC hace?"));
    let total = (celcius * 9/5) +32;

    alert("En ºF son: "+total);
}
// 4. El número más grande
// Crea una función que tome dos números como entrada y devuelva el mayor de los dos.
function numGrande(){
    let num1= Number(prompt("Dime el primer número"));
    let num2= Number(prompt("Dime el segundo número"));

    if(num1 > num2){
        alert("El número más grande es "+num1);
    } else{
        alert("El número más grande es "+num2);
    }
}
// 5. Invertir una cadena de texto
// Escribe una función que reciba un string y devuelva el mismo string pero invertido. Por ejemplo, hola debería devolver aloh.
function stringBorracho(){
    let name1= prompt("Escribe tu nombre");
    let name2 = name1.split("").reverse().join("");

        // la parte de name2 la busqué en chatgpt y me explicó que primero había que convertirlo en un array (split), darle la vuelta (reverse) y juntarlo (join)
    alert("Tu nombre en elfico es: " + name2);
}
// 6. Área de un círculo
// Crea una función que calcule el área de un círculo a partir de su radio. La fórmula es: Área = π * r².
function areaCirculo(){
    let radio= Number(prompt("Dime el radio"));
    let pi= Math.PI;
    let area = pi * (radio * 2);

    alert("El área del circulo es: "+area);
}
// 7. Contar caracteres
// Escribe una función que reciba una cadena de texto y devuelva el número total de caracteres que contiene.
function contadorLetras(){
    let name1= prompt("Escribe tu nombre");
    let contador = name1.length;

    alert ("Tu nombre tiene "+ contador + " lertas");
}
// 8. Suma de un array
// Crea una función que reciba un array de números y devuelva la suma de todos sus elementos.
function contadorArray(){
    let array = ["4","2","8"];

    let suma = 0;

    for (let i=0; i < array.length ; i++){
        suma = suma + Number(array[i]);
    }

    alert ("La suma del array es "+suma);
}
// 9. Encontrar el número máximo en un array
// Escribe una función que encuentre y devuelva el número más grande en un array de números.
function buscadoMaxArray(){
    let array = ["4","2","8"];
    let numMax = Number(array[0]);

    for (let i=0; i < array.length ; i++){
        // esta parte usé chatgpt para que me explicase la funcionalidad del bucle
        // convertimos lo de dentro del array a numero
        let num = Number(array[0]);
        // comparar los numeros para que devuelva en alert el mas grande
        if (num > numMax) {
            numMax = num;
        }
    }

    alert ("El número más grande es "+numMax);
}
// 10. Filtrar números pares
// Crea una función que reciba un array de números y devuelva un nuevo array que contenga únicamente los números pares.
function newArray(){
    let array = ["4","2","1","8","3","7","5"];
    let pares = [];

    for (let i=0; i < array.length ; i++){
        if (array[i] % 2 === 0){
            // push sirve para añadir un elemento al final del array
            pares.push(array[i]);
        }
    }

    alert ("Los números pares del array son: "+pares);
}