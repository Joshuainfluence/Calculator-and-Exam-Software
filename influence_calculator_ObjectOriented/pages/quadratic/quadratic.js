document.getElementById("submitBtn").onclick = function () {
    console.log("You have clicked the button");
    let value = Math.round(Number(12.5555555));
    console.log(value)

    let question;
    let a;
    let b;
    let c;
    

    function isEmpty(x) {
        if (x === null || x === undefined || x === '') {
            return true;
        }
    }

    question = document.getElementById("question").value;
    a = document.getElementById("a").value;
    b = document.getElementById("b").value;
    c = document.getElementById("c").value;


    if (isEmpty(question) || isEmpty(a) || isEmpty(b) || isEmpty(c)) {
        console.log("Fields cannot be empty");
        let error;
        error = "Error";
        message = "Fields cannot be empty";

        document.getElementById('overlay').style.display = 'block';

        Swal.fire({
            title: error,
            text: message,
            icon: 'error',
            showCancelButton: true,

        });

    } else {
        function quadraticSolving(a, b, c) {

            var positive_quadrant = -1 * b + Math.sqrt((b ** 2 - 4 * a * c))

            var negative_quadrant = -1 * b - Math.sqrt((b ** 2 - 4 * a * c))
            var d = 2 * a;
            var result = "The roots are x = " + positive_quadrant / d + " and " + negative_quadrant / d;

            return result;
        }
        function quadraticSolvingExp(a, b, c) {
            let d = -1 * b;
            let e = b * b;
            let f = -4 * a * c;
            let g = 2 * a;
            let h = e + f;
            let i = Math.sqrt(h);
            let j = d + i;
            let k = d - i;
            let l = j / g;
            let m = k / g;

            var result = `<b> Explanation</b> <br> Note: <code>-1 + -1 = -2, -1 x - 1 = 2, -1 + 1 = 0, 1 + 1 = 2</code>.</i> <br> x = (−𝑏 ± √(𝑏^2 − 4𝑎𝑐))/2𝑎<br> Where a = ${a} , b = ${b}, and c = ${c} <br> x = (− x ${b} ± √((${b}^2) − 4 x ${a} x ${c}))/2 x ${a} <br> (- x ${b}<sup>2</sup> = ${b} x ${b} = ${e})<br> (-4 x ${a} x ${c} = ${f})<br> x = (− x ${b} ± √(${e} ${f})) / ${g} <br> x = (${d} ± √(${h})) / ${g} <br> so we know that the √${h} = ${i} <br> x = (${d} ± ${i}) / ${g} <br> We will now split the equation into two because of the '±' sign <br> x = (${d} + ${i}) / ${g} or x = (${d} - ${i}) /${g}<br> x = ${j} / ${g} or x = ${k} / ${g} <br>  x = ${l} or x = ${m} <br> x = ${l} or ${m} ✅`;

            return result;
        }
        const header = document.getElementById('quadratic');
        header.style = "color:blue; background-color:green; border:1px solid green; width:70%; height:70px; display:flex; font-size:1rem; color:#fff; align-items:center; margin-bottom:2rem;padding: .375rem .75rem;";
        header.innerHTML = quadraticSolving(a, b, c);
        console.log(quadraticSolving(1, -5, 6));

        const explanation = document.getElementById('explanation');
        explanation.innerHTML = quadraticSolvingExp(a, b, c);
        explanation.style = "margin-bottom:2rem; width:70%; font-size:1.2rem;";

    }


}