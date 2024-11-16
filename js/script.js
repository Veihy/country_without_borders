// Пример данных (замени на реальные данные из базы)
const citySlides = {

    'nizhny-novgorod': [
        'images/photo_nn/1.jpg',
        'images/photo_nn/2.jpg',
        'images/photo_nn/3.jpg',
        'images/photo_nn/4.jpg',
        'images/photo_nn/5.jpg',
        'images/photo_nn/6.jpg',
        'images/photo_nn/7.jpg',
        'images/photo_nn/8.jpg',
        'images/photo_nn/9.jpg',
        'images/photo_nn/10.jpg'

    ],
    irkutsk: [
        'images/photo_i/1.jpg',
        'images/photo_i/2.jpg',
        'images/photo_i/3.jpg',
        'images/photo_i/4.jpg',
        'images/photo_i/5.jpg',
        'images/photo_i/6.jpg',
        'images/photo_i/7.jpg',
        'images/photo_i/8.jpg',
        'images/photo_i/9.jpg',
        'images/photo_i/10.jpg'
    ],
    yaroslavl: [
        'images/photo_ya/1.jpg',
        'images/photo_ya/2.jpg',
        'images/photo_ya/3.jpg',
        'images/photo_ya/4.jpg',
        'images/photo_ya/5.jpg',
        'images/photo_ya/6.jpg',
        'images/photo_ya/7.jpg',
        'images/photo_ya/8.jpg',
        'images/photo_ya/9.jpg',
        'images/photo_ya/10.jpg'
    ],
    perm: [
        'images/photo_p/1.jpg',
        'images/photo_p/2.jpg',
        'images/photo_p/3.jpg',
        'images/photo_p/4.jpg',
        'images/photo_p/5.jpg',
        'images/photo_p/6.jpg',
        'images/photo_p/7.jpg',
        'images/photo_p/8.jpg',
        'images/photo_p/9.jpg',
        'images/photo_p/10.jpg'
    ],

    vologda: [
        'images/photo_v/1.jpg',
        'images/photo_v/2.jpg',
        'images/photo_v/3.jpg',
        'images/photo_v/4.jpg',
        'images/photo_v/5.jpg',
        'images/photo_v/6.jpg',
        'images/photo_v/7.jpg',
        'images/photo_v/8.jpg',
        'images/photo_v/9.jpg',
        'images/photo_v/10.jpg'
    ],
};

// Функция для загрузки фотографий выбранного города
function loadCitySlides(city) {
    const slidesContainer = document.querySelector('.slides');
    const indicatorsContainer = document.querySelector('.carousel-indicators');

    // Очистка старых слайдов и индикаторов
    slidesContainer.innerHTML = '';
    indicatorsContainer.innerHTML = '';

    // Добавление новых слайдов
    citySlides[city].forEach((photo, index) => {
        // Создаем элемент <li> для слайда
        const slide = document.createElement('li');
        slide.classList.add('slide');
        if (index === 0) slide.setAttribute('data-active', '');

        const img = document.createElement('img');
        img.src = photo;
        img.alt = `Фото города ${city} #${index + 1}`;
        img.loading = 'lazy';

        slide.appendChild(img);
        slidesContainer.appendChild(slide);

        // Создаем индикатор
        const indicator = document.createElement('span');
        indicator.classList.add('carousel-indicator');
        if (index === 0) indicator.classList.add('active');
        indicator.onclick = () => goToSlide(index);
        indicatorsContainer.appendChild(indicator);
    });

    // Обновляем активный индекс и кнопку
    activeIndex = 0;
    toggleButtons();
}
