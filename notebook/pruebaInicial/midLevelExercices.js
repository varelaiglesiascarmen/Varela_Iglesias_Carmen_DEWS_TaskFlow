// 3 puntos por ejercicio (15 pts)

//11. Comprobar si es un palíndromo
// Escribe una función que determine si una palabra es un palíndromo (se lee igual de izquierda a derecha que de derecha a izquierda). Debe ignorar mayúsculas y minúsculas.
function checkPalindrome(){
    //toLowerCase guarda la palabra en minusculas
    let word = prompt("Escribe una palabra").toLowerCase();
    // separamos el string, le damos la vuelta a los caracteres y los juntamos
    let reverseWord = word.split("").reverse().join("");

    //comparamos la palabra inicial con la obtenida si es igual te dice que si es polindroma y si no, no
    if(word === reverseWord){
        alert ("La palabra es políndroma");
    }else{
        alert ("La palabra no es políndroma");
    }
}
// 12. Calcular el factorial
// Crea una función que calcule el factorial de un número. El factorial de n (representado como n!) es el producto de todos los enteros positivos menores o iguales a n.
function factorial() {
    let num = Number(prompt("Escribe un numero"));
    let resultado= 1;

    for(let i = 1; i <= num; i++){
        resultado = resultado * i;
    }

    alert("El factorial de " + num + " es " + resultado);
}
// 13. Secuencia de Fibonacci
// Escribe una función que genere los primeros n números de la secuencia de Fibonacci.
function fibonacci() {
    let num1 = Number(prompt("Escribe el primer número de la secuencia"));
    let num2 = Number(prompt("Escribe el segundo número de la secuencia"));

    let secuence = [num1, num2];

    for(let i = 2; i < 10; i++){
        secuence[i] = secuence[i - 1] + secuence[i - 2];
    }

    alert("Los 10 primeros números de la secuencia son: " + secuence.join(", "));
}
// 14. Eliminar duplicados de un array
// Crea una función que reciba un array y devuelva un nuevo array sin elementos duplicados.
function eliminarDuplicados() {
    let newArray = [];

    for(let i=0; i < array.length; i++){
        // !newArray.includes(array[i] => lo que hace es que si el no existe el número todavía en el array nuevo, lo guarda
        if(!newArray.includes(array[i])){
            // newArray.push(array[i]); => push lo que hace es guardar en el array nuevo el numero
            newArray.push(array[i]);
        }
    }

    // devuelve el nuevo array
    return newArray;

}

//comprobación
    let array = ["4","2","1","8","3","7","5","2","4","8"];
    // eliminarDuplicados(array); => llamar la funcion
    let resultado = eliminarDuplicados(array);

    alert("Array original: "+array+"\nArray sin duplicados: "+resultado);

// 15. Contar vocales
// Escribe una función que reciba un string y devuelva el número de vocales (a, e, i, o, u) que contiene.
function contadorVocales(){
    //pregunta el nombre y lo convierte todo en minus para que pille las palabras mayus pj "Ana"
    let name1= prompt("Escribe tu nombre").toLowerCase();
    let contador = 0;

    // comprueba el resultado
    for(let i = 0; i < name1.length; i++){
        // esta variable guarda todas las letras de la palabra/nombre entrada por teclado para comparar luego si es vocal o no
        let letra = name1[i];
        // si hay alguna vocal la cuenta
        if (letra === "a" || letra === "e" || letra === "i" || letra === "o" || letra === "u" ||
            letra === "á" || letra === "é" || letra === "í" || letra === "ó" || letra === "ú") {
            contador++;
        }
    }

    // muestra el resultado
    if(contador > 0){
        alert ("Tu nombre tiene "+ contador + " vocales");
    }else {
        alert ("Tu nombre no tiene vocales");
    }
}
// 16. Capitalizar la primera letra
// Crea una función que reciba una frase y devuelva la misma frase pero con la primera letra de cada palabra en mayúscula.
function capitalizar() {
    let frase = prompt("Escribe una frase").split(separator);
}
// 17. Encontrar elementos comunes
// Escribe una función que reciba dos arrays y devuelva un nuevo array con los elementos que son comunes en ambos.

// 18. Ordenar un array (sin .sort())
// Implementa un algoritmo de ordenamiento (como el de burbuja) para ordenar un array de números de menor a mayor sin usar el método Array.prototype.sort().

// 19. Convertir objeto a array
// Crea una función que convierta un objeto en un array de arrays, donde cada subarray contiene la clave y el valor. Ejemplo: { a: 1, b: 2 } se convierte en [['a', 1], ['b', 2]].

// 20. Calcular la media y la mediana
// Escribe una función que reciba un array de números y devuelva un objeto con la media y la mediana de esos números.
