$(document).ready(function(){
 
    //Если на странице есть контейнер для яндекс карты с id map_container, начинаем её формировать
    if($("#map_container").length > 0)
        {
 
        //yandex map
        ymaps.ready(function() {
            var map = new ymaps.Map("map_container", {
                center: [55.753215, 37.622504], //Создаём карту с центром в городе "Ростов-на-Дону"
                zoom: 11,   //Увеличение 11
            });
 
                //Кластера - группируем близко расположенные друг к другу объекты, чтобы при отдалении карты появлялась другая иконка
                // с количеством объектов в данной точке 
 
                var ClusterContent = ymaps.templateLayoutFactory.createClass('<div class="claster">$[properties.geoObjects.length] шт.</div>');
 
                //Параметры иконки кластера, обычно её делают отличной от точки, чтобы пользователь не путал номер объекта
                // и количество объектов
 
                var clusterIcons=[{
                    href: '/bitrix/templates/furniture_pale-blue/images/map-claster.png',
                    size:[58, 80],
                    offset:[-24, -80],
                }];
 
                //Создание самого кластера
                myClusterer = new ymaps.Clusterer({
                    clusterIcons: clusterIcons,
                    clusterNumbers:[1],
                    zoomMargin: [30],
                    clusterIconContentLayout: ClusterContent
                });
 
            //HTML шаблон балуна, того самого всплывающего блока, который появляется при щелчке на карту
             var myBalloonLayout = ymaps.templateLayoutFactory.createClass(
                        '<address class="address-map">'+                      '
    <p><strong>$[properties.name]</strong>'+                      '
      <br />
    '+                      '</p>
 
    <ul class="balloon-info">'+                       '
      <li><strong>Адрес:&nbsp;</strong>$[properties.address]</li>
    '+                      '
      <li><strong>Часы работы:&nbsp;</strong>$[properties.hours]</li>
    '+                      '
      <li><strong>Телефон:&nbsp;</strong>$[properties.phone]</li>
    '+                      '
      <li><strong>Руоководитель:&nbsp;</strong>$[properties.manager]</li>
    '+                      '</ul>
  '+                        '</address>'
                    );
 
                var Placemark = {}; //Пустой объекта, куда будут помещены точки на для карты
 
                //Перебираем все блоки с картой и считываем данные для формирования точки и балуна по ранее заданному шаблону
                $(".shop-data").each(function(){
 
                    //Координаты точки
                    var X = $(this).attr("data-yandex-x");
                    var Y = $(this).attr("data-yandex-y");
 
                        Obj = $(this).attr("pointindex");
 
                        //Создаём объект с заданными координатами и доп.свойствами
                        Placemark[Obj] = new ymaps.Placemark([X,Y], {
                            name: $(this).attr("data-name"),    //Наименование магазина
                            address: $(this).attr("data-address"),  //Адрес
                            hours: $(this).attr("data-hours"),  //Часы работы
                            phone: $(this).attr("data-phone"),  //Контактный телефон
                            manager: $(this).attr("data-shop-manager"), //Руководитель
                            iconContent: "<div class="marker-circ">"+$(this).attr("data-index")+"</div>",   //Порядковый номер на карте
                    },{ //Ниже некоторые параметры точки и балуна
                        balloonContentLayout: myBalloonLayout,
                        balloonOffset: [5,0],
                        balloonCloseButton: true,
                        balloonMinWidth: 450,
                        balloonMaxWidth:450,
                        balloonMinHeught:150,
                        balloonMaxHeught:200,
                        iconImageHref: '/bitrix/templates/furniture_pale-blue/images/map.png',  //Путь к картинке точки
                        iconImageSize: [58, 80],
                        iconImageOffset: [-24, -80],
                        iconLayout: 'default#imageWithContent',
                        iconactive: '/bitrix/templates/furniture_pale-blue/images/map-a.png' //Путь к картинке точки при наведении курсора мыши
 
                    });
 
                    //Добавляем маркер (точку) через кластер
                    myClusterer.add(Placemark[Obj]);
 
                });
 
                //Добавление кластеры на карту
                map.geoObjects.add(myClusterer);
                //Запрещаем изменение размеров карты по скролу мыши
                map.behaviors.disable("scrollZoom");
        }); 
 
        }
});