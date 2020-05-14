/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import '../css/app.css';

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
// import $ from 'jquery';

console.log(document.getElementById('select'));

let select = document.getElementById('select');

select.addEventListener('change', function(event){

    let number = select.options[select.selectedIndex].value;

   const url =  this.href


switch (number) {
    case 1:

        fetch("/resultats")
        .then((res) => res.json())
        .then((data) => {
          this.recipes = data;});

          
        break;

    default:
        break;
}
   
})