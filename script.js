
async function loadNum() {
    let nums = [];
    for (let i=0; i < 10000; i++) {
        const response = await fetch('/random-back/generate.php', {method: 'POST'});
        const data = await response.json();
        nums = nums.concat(data);
    }
    displayArrayObjects(nums);
    location.href = "#about";
    let response = await fetch('/random-back/evmax.php', {method: 'POST'});
    let data = await response.json();
    nums = data;
    displayMaxMin(nums, true);
    response = await fetch('/random-back/evmin.php', {method: 'POST'});
    data = await response.json();
    nums = data;
    displayMaxMin(nums, false);
    nums = [];
}

function displayArrayObjects(arrayObjects) {
    let text = '';
    let inst = [];
    let names = '';

    for (let i = 0; i < 10000; i++) {
        const myObject = arrayObjects[i];

        for (const x in myObject) {
            text += (x + ": " + myObject[x] + ", ");
            inst.push(x);
        }
    }

    for (let y of Array.from(new Set(inst))) {
        names += (y + ", ");
    }
    document.getElementById("instances").innerHTML = names;
    document.getElementById("nums").innerHTML = text;
}

function displayMaxMin(arrayObjects, isMax) {
         $name = Object.keys(arrayObjects);
         $num = Object.values(arrayObjects);
            if (isMax) {
                const text = ("The largest number is " + $num + " and has been generated by " + $name);
                document.getElementById("largest").innerHTML = text;
            } else {
                const text = ("The smallest number is " + $num + " and has been generated by " + $name);
                document.getElementById("smallest").innerHTML = text;
            }
}