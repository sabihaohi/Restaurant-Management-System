function deleteFood(pForm) {
    const method = pForm.method;
    const key = pForm.id.value;
    const url = pForm.action + "?id=" + key;
    const foodid = "food" + pForm.id.value;

    console.log(method, foodid, url);

    const fooditem = document.getElementById(foodid);
    console.log(fooditem);

    console.log(fooditem);
    let xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        fooditem.style.display = 'none';
    }
    xhttp.open(method, url);
    xhttp.send();

    return false;
}

function searchFood(pForm) {
    const method = pForm.method;
    const key = pForm.name.value;
    const url = pForm.action + "?name=" + key;
    const foodContainer = document.getElementById('foodscontainer')
    foodContainer.innerHTML = '';

    let xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        const res = this.responseText;
        const foods = JSON.parse(res);
        foods.map(food => {
            const foodDiv = document.createElement('div');
            foodDiv.classList.add('fooditem');
            foodDiv.setAttribute('id', `food${food.id}`);
            foodDiv.innerHTML = `<img src='${food.image}'><h3>${food.name}</h3><p>Price: ${food.price} BDT</p><div class='adddel'><button class='upb'><a href='update_food_item_view.php?id=${food.id}'>Update Food</a></button> <form action="../controllers/delete_food_item.php" method="GET" onsubmit="return deleteFood(this);">
            <input type="hidden" name="id" value="${food.id}">
            <input class="deb" type="submit" value="Delete Food">
        </form></div>`;
            console.log(foodDiv);
            foodContainer.appendChild(foodDiv);
        })
    }
    xhttp.open(method, url);
    xhttp.send();

    return false;
}