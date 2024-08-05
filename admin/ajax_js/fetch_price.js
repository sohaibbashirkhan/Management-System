const categories = document.querySelector('.categories');
const color_list = document.querySelector('.color_list');
const product_list = document.querySelector('.product_list');
const pack_list = document.querySelector('.pack_list');

categories.addEventListener('change', () => {
    let cate_id = categories.value;

    let xhr = new XMLHttpRequest();
    xhr.open('GET', `./ajax_php/fetch_products.php?cat_id=${cate_id}`, true);
    xhr.onload = () => {
        if (xhr.status == 200) {
            let data = JSON.parse(xhr.responseText);
            color_list.innerHTML = data.colors; // Clear color and pack lists
            product_list.innerHTML = '';
            pack_list.innerHTML = '';
        }
    }
    xhr.send();
});

color_list.addEventListener('change', () => {
    let product_id = color_list.value;

    let xhr = new XMLHttpRequest();
    xhr.open('GET', `./ajax_php/fetch_details.php?product_id=${product_id}`, true);
    xhr.onload = () => {
        if (xhr.status == 200) {
            let data = JSON.parse(xhr.responseText);
            product_list.innerHTML = data.titles;
            pack_list.innerHTML = data.packs;
        }
    }
    xhr.send();
});
