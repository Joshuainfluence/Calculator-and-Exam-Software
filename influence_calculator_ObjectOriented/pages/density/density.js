document.getElementById("submitBtn").onclick = function () {
    let mass;
    let volume;
    let density;
    let result;
    

    function empty(x) {
        if (x === null || x === undefined || x === '') {
            return true;
        }
    }

    mass = document.getElementById("mass").value;
    volume = document.getElementById("volume").value;
    if (empty(mass) || empty(volume)) {
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
        mass = document.getElementById("mass").value;
        mass = Number(mass);

        volume = document.getElementById("volume").value;
        volume = Number(volume);

        density = mass / volume;
        
        result = `The Density of a substance is ${density}kg/m<sup>3</sup>`;
        const header = document.getElementById("density");
        header.style = "color:blue; background-color:green; border:1px solid green; width:70%; height:70px; display:flex; font-size:1rem; color:#fff; align-items:center; margin-bottom:2rem;padding: .375rem .75rem;";
        header.innerHTML = result;
        const explanation = document.getElementById("explanation");
        explanation.innerHTML = `<b>Explanation</b> <br> According to the formula <br> Density = Mass/Volume <br> the mass  ${mass}kg was being divided by the volume ${volume}m<sup>3</sup> (${mass}/${volume}) to give density which is ${density}kgm/3`;
        explanation.style = "margin-bottom:2rem; width:70%; font-size:1.2rem;";
    }
}

