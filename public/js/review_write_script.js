var star_count = 0;

document.addEventListener("DOMContentLoaded", function () {

    var target1 = document.getElementById('star-1');
    var target2 = document.getElementById('star-2');
    var target3 = document.getElementById('star-3');
    var target4 = document.getElementById('star-4');
    var target5 = document.getElementById('star-5');

    //ON
    target1.addEventListener('mouseup', () => {　　
        target1.style.color = "#FBC02D";　　
        target2.style.color = "#FFF9C4";　　
        target3.style.color = "#FFF9C4";　　
        target4.style.color = "#FFF9C4";　　
        target5.style.color = "#FFF9C4";
        star_count = 1;
    }, false);


    //ON
    target2.addEventListener('mouseup', () => {　　
        target1.style.color = "#FBC02D";　　
        target2.style.color = "#FBC02D";　　
        target3.style.color = "#FFF9C4";　　
        target4.style.color = "#FFF9C4";　　
        target5.style.color = "#FFF9C4";
        star_count = 2;

    }, false);



    //ON
    target3.addEventListener('mouseup', () => {　　
        target1.style.color = "#FBC02D";　　
        target2.style.color = "#FBC02D";　　
        target3.style.color = "#FBC02D";　　
        target4.style.color = "#FFF9C4";　　
        target5.style.color = "#FFF9C4";
        star_count = 3;

    }, false);



    //ON
    target4.addEventListener('mouseup', () => {　　
        target1.style.color = "#FBC02D";　　
        target2.style.color = "#FBC02D";　　
        target3.style.color = "#FBC02D";　　
        target4.style.color = "#FBC02D";　　
        target5.style.color = "#FFF9C4";
        star_count = 4;

    }, false);

    //ON
    target5.addEventListener('mouseup', () => {　　
        target1.style.color = "#FBC02D";　　
        target2.style.color = "#FBC02D";　　
        target3.style.color = "#FBC02D";　　
        target4.style.color = "#FBC02D";　　
        target5.style.color = "#FBC02D";
        star_count = 5;

    }, false);

}, false);

function get_star(){
    var classroom = document.getElementById('classroomid');
    classroom.setAttribute('value',star_count);
}