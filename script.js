
async function loadNum() {
    const loader = document.getElementById('loader');
    loader.style.display = 'block';
    let nums = [];
    let promises = [];
    let current = 0;

    while (current < 10000) {
        promises.push(fetch('/generate.php', {method: 'POST'}));
        current++;
    }
    await Promise.all(promises);
    let response = await fetch('/getnums.php', {method: 'POST'});
    let data = await response.json();
    nums = nums.concat(data);
    location.href = "#about";
    loader.style.display = 'none';
    displayArrayObjects(nums);
    response = await fetch('/evmax.php', {method: 'POST'});
    data = await response.json();
    nums = data;
    displayMaxMin(nums, true);
    response = await fetch('/evmin.php', {method: 'POST'});
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

        try {
            text += ('<strong>' + myObject['name'] + '</strong>: ' + myObject['num'] + '  ');
            inst.push(myObject['name']);
        } catch (e) {}
    }

    const map = inst.reduce(function(prev, cur) {
        prev[cur] = (prev[cur] || 0) + 1;
        return prev;
    }, {});

    for (let key in map) {
        const value = map[key];
        names += ('<strong>' + key + "</strong>: " + value + "  ");
    }

    document.getElementById("instances").innerHTML = names;
    document.getElementById("nums").innerHTML = text;
}

function displayMaxMin(arrayObjects, isMax) {
         $name = Object.keys(arrayObjects);
         $num = Object.values(arrayObjects);
            if (isMax) {
                const text = ("The largest number is " + $num + " and has been generated by <strong>" + $name + "</strong>");
                document.getElementById("largest").innerHTML = text;
            } else {
                const text = ("The smallest number is " + $num + " and has been generated by <strong>" + $name + "</strong>");
                document.getElementById("smallest").innerHTML = text;
            }
}