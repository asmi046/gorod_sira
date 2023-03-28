if (typeof  ymaps !== 'undefined')
    ymaps.ready(init);

function init () {
    var myMap = new ymaps.Map("render_map", {
        // Координаты центра карты
        center: [51.578853072367195,34.728123499999946],
        // Масштаб карты
        zoom: 17,
        // Выключаем все управление картой
        controls: []
    });

    var myGeoObjects = [];

    // Указываем координаты метки
    myGeoObjects = new ymaps.Placemark([51.578853072367195,34.728123499999946],{
                                        hintContent: '<div class="map-hint">Общество с ограниченной ответственностью  «НМ Ингредиенты»</div>',
                                        balloonContent: '<div class="map-hint">Общество с ограниченной ответственностью  «НМ Ингредиенты»</div>',
                                    }
                                    ,{
                                        iconLayout: 'default#image',
                    // Путь до нашей картинки
                    iconImageHref: '/img/icon/map_pin_full.svg',
                    // Размеры иконки
                    iconImageSize: [50, 60],
                    // Смещение верхнего угла относительно основания иконки
                    iconImageOffset: [-20, -60]
                });

    var clusterer = new ymaps.Clusterer({
        clusterDisableClickZoom: false,
        clusterOpenBalloonOnClick: false,
    });

    clusterer.add(myGeoObjects);
    myMap.geoObjects.add(clusterer);
    // Отключим zoom
    myMap.behaviors.disable('scrollZoom');

}
